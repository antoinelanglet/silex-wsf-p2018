<?php 
namespace MVC;

class User 
{
    
    public function getByLogin($login)
    {
        //Je recupère mon instance singleton de la class Sql
        $sql = Sql::getInstance();

        //Creation de la requete
        //Les parametre de la requetes sont sous la forme :variable
        //et seront initialisé dans la methode execute
        $sqlQuery = 'SELECT * FROM user WHERE login = :login';        

        //Preparation de la requete, pdo renvoi un objet PDOStatement
        //qui executera la requete et contiendra les resultats
        $statement =  $sql->pdo->prepare($sqlQuery);

        //Execution de la requete sur le server mysql
        //Initialisation des parametre de la requete
        //la valeur de la clé :id correspond au :id dans la requete sql
        $statement->execute(array(':login' => $login));

        //Recuperation et renvoi des résultats
        return $statement->fetch();
    }

    public function add($email, $password, $admin)
    {

        if ($this->getByLogin($email)) {
            throw new \Exception('Email already exist.');
        }

        //Je recupère mon instance singleton de la class Sql
        $sql = Sql::getInstance();

        //Creation de la requete
        //Les parametre de la requete sont sous la forme :variable
        //et seront initialisé dans la methode execute
        $sqlQuery = 'INSERT INTO user(login, password, admin)
                     VALUES(:login, :password, :admin)';        

        //Preparation de la requete, pdo renvoi un objet PDOStatement
        //qui executera la requete et contiendra les resultats
        $statement =  $sql->pdo->prepare($sqlQuery);

        //Execution de la requete sur le server mysql
        //Initialisation des parametre de la requete
        //la valeur de la clé :id correspond au :id dans la requete sql
        $statement->execute(array(
            ':login' => $email, 
            ':password' => $password,
            ':admin' => $admin,
        ));

        return $statement->rowCount();
    }
}