<?php

    header('Content-Type:text/plain; charset=utf-8');

    //Android로 부터 POST방식을 통해 보낸 데이터 받기
    $id= $_POST['id'];
    $pw= $_POST['pw'];

    //잘 받았는지 확인하기 위해 Android로 응답(response)
    echo "$id : $pw";
?>