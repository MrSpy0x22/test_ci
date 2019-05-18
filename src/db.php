<?php
    /*
    #1 : Tabela z wiadomościami
    ---------------------------
        CREATE TABLE messages(
            msg_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
            uname VARCHAR(32) NOT NULL ,
            timestamp TIMESTAMP NOT NULL ,
            message TEXT(256) NOT NULL ,
            PRIMARY KEY(msg_id)    
        );
    */

    $db_host        = "localhost";
    $db_name        = "ci_test";
    $db_tab         = "messages";
    $db_user        = "test_ci";
    $db_passwd      = "adgjl0864264";
?>