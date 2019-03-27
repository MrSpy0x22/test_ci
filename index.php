<?php

    echo '
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <meta charset="UTF-8">
        <title>Czat</title>
    </head>
    <body>
        <div id="topbar">
            <a href="#" class="tbb_home"><i class="fa fa-home"></i></a>
        </div>

        <div id="wrapper">
            <div id="chat_window">
            </div>
            <div id="chat_box">
                <form id="chat_text_box">
                    <input class="chat_input" type="text" name="chattext">
                    <input class="chat_submit" type="submit" name="chatbtn" value="Wyślij">
                </form>
            </div>
        </div>
    </body>
</html>
    ';

?>