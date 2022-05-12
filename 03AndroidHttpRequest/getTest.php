<?php

    header('Content-Type:text/plan; charset=stf-8');

    //Android로부터 GET방식으로 보낸 데이터 받기
    $title = $_GET['title'];
    $message = $_GET['msg'];

    //잘 받았는지 확인해보기 위해 Android로 다시 응답(response)하기
    echo "title : $title\n";
    echo "message : $message";

?>