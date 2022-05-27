<?php
    header('Contnet-Type:Text/plain; Charset=utf-8');

    $title = $_GET['title'];
    $message = $_GET{'msg'};

    echo "$title : $message";


?>