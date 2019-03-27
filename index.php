<?php
    // Początek pliku HTML
    echo '
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <meta charset="UTF-8">
        <title>Czat</title>
    </head>
    <body>';

    // Tworzenie połączenia z bazą danych
    $self       = $_SERVER['php_self'];
    $address    = $_SERVER[REMOTE_ADDR];

    include('src/db.php');

    $db_svr = mysql_connect($db_host , $db_user , $db_passwd) or die('<p class="error">DB Connection Error!</p>');
    mysql_select_db($db_name , $db_svr) or die('<p class="error">DB Select Error!</p>');

    if (isset($_POST['send']))
    {
        if (empty($_POST['name']) || empty($_POST['message']))
        {
            echo
        '<script>alert("Pola formularza nie mogą być puste!")</script>';
        }
        else
        {
            $user = htmlspecialchars(mysql_real_escape_string($_POST['name']));
            $text = htmlspecialchars(mysql_real_escape_string($_POST['message']));

            if (!@mysql_query('INSERT INTO messages SET uname=\'' , $user , '\', message=\'', $text , '\', timestamp=NOW()'))
            {
                echo
        '<script>alert("Nie można wysłać wiadomości!")</script>';
            }

        }
    }
    else
    {
    }

    // Koniec pliku HTML
    echo '
    </body>
</html>
    ';

?>