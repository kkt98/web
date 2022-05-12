<?php

    header('Content-Type:text/html; charset=utf-8');//한글깨짐 방지

    //사용자가 POST방식으로 보낸 데이터들은 $_POST[]이라는 배열에 저장되어 있음.
    $id= $_POST['id'];
    $password= $_POST['pw'];

    //사용자[web browser]에게 출력(응답:response)
    echo "아이디 : $id <br>";  //""안에서 $를 변수명으로 인식함
    echo "비밀번호 $password";

?>