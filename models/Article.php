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
        $sql = Sql::getInstance();

        return $this->datas;
    }

    /**
     * Renvoi un article
     * @param  integer $id  identifiant de l'article
     * @return array
     */
    public function get($id)
    {
        //Renvoi l'article s'il est définit dans le tableau datas
        if (isset($this->datas[$id])) {
            return $this->datas[$id]; //Renvoi l'article, la function s'arrete ici.
        }

        //Sinon renvoi null
        return null;
    }
}