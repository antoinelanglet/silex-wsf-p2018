<?php
Namespace MVC;


/**
* 
*/
class Sql
{
    public static $instance;

    public $pdo;

    public function __construct()
    {
        /* Connexion à une base ODBC avec l'invocation de pilote */
        $dsn = 'mysql:dbname=silex-blog;host=127.0.0.1';
        $user = 'root';
        $password = '';

        try {
            $this->pdo = new \PDO($dsn, $user, $password);
        } catch (\PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            $className = __CLASS__;
            self::$instance = new $className();
        }

        return self::$instance;
    }


}