<?php
    header('Content-Type:text/html; charset=utf-8');

    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $gender = $_POST['rg'];
    $message = $_POST['msg'];
    $brand = $_POST['brand'];

    //textarea 안에 작성한 글 중에 줄바꿈문자는 \n 을 사용한다
    //그래서 \n 을 <br>로 자동 변환해주는 함수를 사용
    $message = nl2br($message);

    echo "$id<br>";
    echo "$pw<br>";
    echo "$gender<br>";
    echo "$message<br>";
    echo "$brand<br>";

    //멀티초이스에 의해 선택된 값들은 배열로 전달받기에 반복문으로 값들 echo
    $fruits = $_POST['fruits'];
    //$fruits는 배열.
    //php언어에서 배열의 개수를 알수 있는 함수 : count()
    $num = count($fruits);
    for($i=0; $i<$num; $i++){
        echo $fruits[$i] . ",";
    }
?>