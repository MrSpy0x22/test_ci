<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <meta charset="UTF-8">
        <title>Czat</title>
    </head>
    <body>

<?php
    // Tworzenie połączenia z bazą danych
    $self       = $_SERVER['PHP_SELF'];
    $address    = $_SERVER['REMOTE_ADDR'];

    // Dodanie formularza
    echo
        '<form action="' , $self , '">
            <p>Napisz coś:</p>
            <input name="nazwa" type="text" cols="25"/>
            <textarea name="txt" rows=5 cols="25"></textarea>
            <input name="send" type="hidden"/>
            <input type="submit" value="Wyślij!"/>
        </form>';

    include('src/db.php');

    $mysqli = new mysqli($db_host , $db_user , $db_passwd , $db_name);
    
    if ($mysqli->connect_errno)
        die('<p class="error">DB Select Error!</p>');

    if (isset($_POST['send']))
    {
        // Pusty formularz
        if (empty($_POST['name']) || empty($_POST['txt']))
        {
            echo
        '<script>alert("Pola formularza nie mogą być puste!");</script>';
        }

        // Wysyłanie wiadomości na serwer
        else
        {
            $user = htmlspecialchars(mysql_real_escape_string($_POST['name']));
            $text = htmlspecialchars(mysql_real_escape_string($_POST['message']));

            if (!$mysqli->query('INSERT INTO ' , $db_tab , ' SET uname=\'' , $user , '\', message=\'', $text , '\', timestamp=NOW();'))
            {
                echo
        '<script>alert("Nie można wysłać wiadomości!");</script>';
            }

        }
    }
    else
    {
    }

    // Pobieranie wiadomości
    $result = $mysqli->query('SELECT * FROM ' . $db_tab . ' ORDER BY msg_id DESC LIMIT 50;');

    echo
        '<ul>';

    // Przetwarzanie wyniku
    while ($tmp = $result->fetch_array())
    {
        $res_name = stripslashes($tmp['uname']);
        $res_msg = stripslashes($tmp['message']);

        // Dodawanie wiadomości
        echo
            '<li>
                <span>#' , $tmp['msg_id'] , '</span>
                <span>' , $res_name , '</span>
                <span>' , $tmp['timestamp'] , '</span>
                <span>' , $tmp['message'] , '</span>
            </li>';
    }

    $result->free();
    $mysqli->close();

?>
        </ul>
    </body>
</html>