<?php 

class CtrlAuthentification {

    private $vue;
    private $model;

    public function __construct()
    {
        $this->vue = new ViewAuthentification();
        $this->model = new ModelAuthentification();
    }

    function login (){
        $this->vue->afficherLogin();
    }

    function logout(){
        Session::destroyUser();
        $this->login();
    }

    function seConnecter(){
        $user = $this->model->selectUser($_POST['login'],$_POST['password']);
        if (is_object($user)){
            Session::setUser($user);
            $this->vue->afficherLoginOk();

        } else {
            $this->vue->afficherLogin(true);
        }
    }
}