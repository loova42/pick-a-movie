<?php

class Authentication {

    private $session;
    private $options = [
        'restiction_msg' => "Cette zone est interdite"
    ];

    public function __construct($session){
        $this->session = $session;
    }

    /**
     * Cree une nouvelle variable session auth 
     * @param $user
     */
    public function connect($user){
        $this->session->set('auth',$user);
    }

    /**
     * restreint l'utilisateur si la session auth n'existe pas
     * @param $url
     */
    public function restrict($url){
        if($this->session->get('auth') == null){
            header("Location : $url");
            exit();
        }
    }

    /**
     * permet de se connecter en tant que client simple
     * @param $db
     * @param $mail
     * @param $pwd
     */
    public function login($db,$mail,$pwd){
        $client = null;
        
        $requete = $db->prepare("SELECT * FROM Client WHERE emailClient = :mail");
        $requete->bindParam('mail', $mail, PDO::PARAM_STR,50);
        $requete->execute();

        $client = $requete->fetchObject();

        if($client != null ){
            if(password_verify($pwd,$client->pwdClient)){
                $this->connect($client);
                return true;
            }else 
                return false;
        }
        return false;
    }

    /**
     * Permet de se connecter en tant qu'admin
     * @param $db
     * @param $mail
     * @param $pwd
     */
    public function loginAdmin($db,$mail,$pwd){
        $admin = null;
        
        $requete = $db->prepare("SELECT Client.* FROM Client INNER JOIN Admin USING(idClient) WHERE emailClient = :mail");
        $requete->bindParam('email', $mail, PDO::PARAM_STR);
        $requete->execute();

        $admin = $requete->fetchObject();

        if($client != null ){
            if(password_verify($pwd,$client->pwdClient)){
                $this->connect($client);
                return true;
            }else 
                return false;
        }
        return false;
    }

    /**
     * Déconnecte l'utilisateur
     * @param $url
     */
    public function logout($url){
       $this->session->delete('auth');
       header("Location:$url");
       exit();
    }
}