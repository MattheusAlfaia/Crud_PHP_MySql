<?php
class LoginController
{

    public function __construct()
    {
        include_once '../model/Dao.php';
    }

    public function login($formulrio_post)
    {
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        if ($login == 'admin' && $senha == 'admin') {
            session_start();
            $_SESSION['id']    = 0;
            $_SESSION['email'] = 'admin';
            header('Location: ../pags/painel.php');
        } else {

            $buscaLogin = new cadastroModel();
            $buscaLogin = $buscaLogin->login($login, $senha);

            if ($buscaLogin) {
                session_start();
                $_SESSION['id']    = $buscaLogin[0]['ID'];
                $_SESSION['email'] = $buscaLogin[0]['Email'];
                header('Location: ../pags/atualizaCadastro.php');
            } else {
                return false;
            }
        }
    }
}
