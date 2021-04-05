<?php
class Session {

    static $instance;

    /**
     * Verifie si une instance de séssion existe. Si il n'y en pas pas, elle est créée
     */
    static function getInstance(){
        if(!self::$instance){
            self::$instance = new Session();
        }
        return self::$instance;
    }

    /**
     * Démarre la session
     */
    public function __construct(){
        session_start();
    }

    /**
     * Récuprère une information 
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key) {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return null;
    }

    /**
     * Ajoute une information en session
     * @param string $key
     * @param $value
     */
    public function set($key, $value) {
        $_SESSION[$key] = $value;

    }

    /**
     * Supprime une information en session
     * @param string $key
     */
    public function delete($key) {
        unset($_SESSION[$key]);
    }


    
}