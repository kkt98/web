<?php
    header('content-Type:text/html; charset=utf-8');

    //form요소를 통해 GET방식으로 전달된 값들을 받기
    $title = $_GET['title'];
    $message = $_GET['msg'];

    echo "<h2>$title</h2>";
    echo "<p>$message</p>";

?>