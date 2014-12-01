<?php 
namespace MVC;

class Article 
{

    /**
     * Renvoi tous mes articles
     * @return array
     */
    public function getAll()
    {
        //Je recupère mon instance singleton de la class Sql
        $sql = Sql::getInstance();

        //Creation de la requete
        $sqlQuery = 'SELECT * FROM article';

        //Preparation de la requete, pdo renvoi un objet PDOStatement
        //qui executera la requete et contiendra les resultats
        $statement =  $sql->pdo->prepare($sqlQuery);

        //Execution de la requete sur le server mysql
        $statement->execute();

        //Recuperation et renvoi des résultats
        return $statement->fetchAll();
    }

    /**
     * Renvoi un article
     * @param  integer $id  identifiant de l'article
     * @return array
     */
    public function get($id)
    {
        //Je recupère mon instance singleton de la class Sql
        $sql = Sql::getInstance();

        //Creation de la requete
        $sqlQuery = 'SELECT * FROM article WHERE id =' . $id;

        //Preparation de la requete, pdo renvoi un objet PDOStatement
        //qui executera la requete et contiendra les resultats
        $statement =  $sql->pdo->prepare($sqlQuery);

        //Execution de la requete sur le server mysql
        $statement->execute();

        //Recuperation et renvoi des résultats
        return $statement->fetch();
    }
}