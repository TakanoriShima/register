<?php
require_once 'const.php';
require_once 'User.php';

class UserDAO{
    
    function getConnection(){
        $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // 失敗したら例外を投げる
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,   //デフォルトのフェッチモードはクラス
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',   //MySQL サーバーへの接続時に実行するコマンド
            ); 
            
        $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $options);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
    
    function closeConnection($pdo){
        $pdo = null;
    }
    
    function getAllUsers(){
        $pdo = $this -> getConnection();

        $stmt = $pdo->query('SELECT * FROM users order by id desc');
        $users = $stmt->fetchAll();
        $this -> closeConnection($pdo);
        return $users;
    }
    
    function insertUser($user){
        $pdo = $this -> getConnection();
        $stmt = $pdo -> prepare("INSERT INTO users (name, nickname, email, password, image) VALUES (:name, :nickname, :email, :password, :image)");
        $stmt->bindParam(':name', $user -> name, PDO::PARAM_STR);
        $stmt->bindParam(':nickname', $user -> nickname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $user -> email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $user -> password, PDO::PARAM_STR);
        $stmt->bindParam(':image', $user -> image, PDO::PARAM_STR);
        
        $stmt->execute();
        $this -> closeConnection($pdo);
    }
    
}

?>