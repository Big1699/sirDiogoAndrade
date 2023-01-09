<?php
    function pdo_connect_mysql(){
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'id20112275_diogodbuser';
        $DATABASE_PASS = '05_Andrade_08';
        $DATABASE_NAME = 'id20112275_diogodb';

        try{
            return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8',
                $DATABASE_USER, $DATABASE_PASS);
        } catch(PDOException $exception) {
            exit('Failed to connect to database');
        }
    }

?>