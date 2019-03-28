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
    $self = htmlspecialchars($_SERVER['PHP_SELF']);

    // Dodanie formularza
    echo '
        <div id="container">
            <form id="post_form" method="POST" action="' , $self , '">
                <p>Twoja nazwa:</p>
                <input id="i-usr" name="name" type="text" cols="25"/></br>
                <p>Wiadomość:</p>
                <input id="i-msg" type="text" name="txt"cols="25"></textarea>
                <input  name="send" type="hidden"/></br>
                <input type="submit" value="Wyślij!"/>
            </form>
        ';

    include('src/db.php');

    $mysqli = new mysqli($db_host , $db_user , $db_passwd , $db_name);

    if ($mysqli->connect_errno)
        die('<p class="error">DB Select Error!</p>');

    if (isset($_POST['send']))
    {
        // Pusty formularz
        if (empty($_POST['name']) || empty($_POST['txt']))
        {
            echo'
            <p class="error">Pola formularza nie mogą być puste!</p>';
        }

        // Wysyłanie wiadomości na serwer
        else
        {
            $user = htmlspecialchars($mysqli->real_escape_string($_POST['name']));
            $text = htmlspecialchars($mysqli->real_escape_string($_POST['txt']));

            if (!$mysqli->query('INSERT INTO ' . $db_tab . ' SET uname=\'' . $user . '\', message=\''. $text . '\', timestamp=NOW();'))
            {
                echo '
            <p class="error">Nie wysłano wiadomości!</p>';
            }
            
            header('Location: ' . $self);
        }
    }

    // Pobieranie wiadomości
    $result = $mysqli->query('SELECT * FROM ' . $db_tab . ' ORDER BY msg_id DESC LIMIT 50;');

    echo '
            <ul class="msg_box">';

    // Przetwarzanie wyniku
    while ($tmp = $result->fetch_array())
    {
        $res_name = stripslashes($tmp['uname']);
        $res_msg = stripslashes($tmp['message']);

        // Dodawanie wiadomości
        echo '
                <li>
                    <span class="c-id">#' , $tmp['msg_id'] , '</span>
                    <span class="c-time">' , $tmp['timestamp'] , '</span>
                    <span class="c-name">' , $res_name , ': </span>
                    <span>' , $tmp['message'] , '</span>
                </li>
            ';
    }

    $result->free();
    $mysqli->close();

?>

            </ul>
</div>
    </body>
</html>