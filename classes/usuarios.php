<?php

class Usuario
{
    private $pdo;
    public $msgErro = "";//tudo ok

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        try 
        {
            $pdo = new pdo('mysql:host=' . HOST . ';port=' . PORT . ';dbname=' . DBNAME, USER, PASS);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }

    }

    public function cadastrar($nome, $email, $senha)
    {
        global $pdo;
        // verificar email ja cadastrado
        $sql = $pdo->prepare("SELECT ID FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //email ja cadastrado
        }
        else
        {
            // cadastrar
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES(:n, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;//tudo ok
        }
    }

    public function logar($email2, $senha2)
    {
        global $pdo;
        //verificar se o email e senha estao cadastrados, se sim
        $sql = $pdo->prepare("SELECT ID FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email2);
        $sql->bindValue(":s",md5($senha2));
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            //entrar no sistema (sessao)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['ID'] = $dado['ID'];
            return true; //cadastrado com sucesso
        }
        else
        {
            return false;//nao foi possivel logar
        }
    }
}