<?php 
namespace MVC;

class Article 
{
    private $datas = array(
        array(
            'title' => 'Article 1',
            'body'  => 'Mon article 1'
        ),
        array(
            'title' => 'Article 2',
            'body'  => 'Mon article 2'
        ),
        array(
            'title' => 'Article 3',
            'body'  => 'Mon article 3'
        ),
        array(
            'title' => 'Article 4',
            'body'  => 'Mon article 4'
        )
    );

    /**
     * Renvoi tous mes articles
     * @return array
     */
    public function getAll()
    {
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