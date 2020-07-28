<?php

    require_once "config.php";

    $sql = new Sql();

    $teste = new Usuario();

    // $query = $sql->select("SELECT * FROM users");

    // echo json_encode($usuarios);

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // $id = 15;

    // $query = $sql->select("DELETE FROM users WHERE user_id = :ID", array(
    //     ':ID'=>$id
    // ));

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // $inserir = $sql->conn->prepare("INSERT INTO users (user_login, user_senha) VALUES (?, ?)");
    // $login = 'xd';
    // $senha = 'xdd';

    // $inserir->execute(array(
    //     $login,
    //     $senha
    // ));
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    //     $login='testeMaroto';
    //     $senha='senhaMarota';

    // // $sql->query("INSERT INTO users (user_login, user_senha) VALUES (:LOGIN, :PASSWORD)", array(
    // //     ':LOGIN'=>$login,
    // //     ':PASSWORD'=>$senha
    // // ));
    
?>