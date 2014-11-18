<?php 
namespace MVC;

class User 
{
    private $datas = array(
        array(
            'login' => 'admin',
            'password' => 'admin',
            'admin' => true
        ),
        array(
            'login' => 'user1',
            'password' => 'user1',
            'admin' => false
        ),
        array(
            'login' => 'user2',
            'password' => 'user2',
            'admin' => false
        ),
        array(
            'login' => 'user3',
            'password' => 'user3',
            'admin' => false
        ),
    );

    public function getByLogin($login)
    {
        # code...
    }
}