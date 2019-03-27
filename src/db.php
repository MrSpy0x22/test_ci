<?php
    /*
    #1 : Tabela z wiadomościami
    ---------------------------
        CREATE TABLE messages(
            msg_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
            uname VARCHAR(32) NOT NULL ,
            timestamp TIMESTAMP NOT NULL ,
            message VARCHAR(256) NOT NULL ,
            PRIMARY KEY(msg_id)    
        );
    */
    
    $db_host        = "localhost";
    $db_name        = "ci_test";
    $db_user        = "root";
    $db_passwd      = "";
?>