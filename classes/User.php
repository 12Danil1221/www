<?php 
class User
{
    private $login;

    public function __construct($login)
    {
        $this->login=$login;
    }

    public function getLogin()
    {
        return htmlspecialchars($this->login);
    }

    public function logout()
    {
        setcookie('login', '', time()-3600 * 24 * 30);
        header('Location: auth.php');
        exit;
    }

}



?>