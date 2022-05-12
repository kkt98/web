<?php

    header('Content-Type:text/plain; charset=utf-8');

    //@PartMap으로 전달된 POST방식의 데이터들
    $useremail = $_POST['useremail'];
    $profile = $_POST['profile'];
    $uniqueid = $_POST['uniqueid'];
    $message = $_POST['message'];
    
    //@Part로 전달된 이미지파일
    $file=$_FILES['img'];
    $srcName=$file['name'];
    $tmpName=$file['tmp_name'];

    //잘 전달되었는지 부터 확인
    // echo "$useremail \n";
    // echo "$profile \n";
    // echo "$uniqueid \n";
    // echo "$message \n";


    // 이미지파일을 영구적으로 지정하기 위해 임시저장소에서 이동
    $dstName="./uploadsss/" . date('YmdHis') . $srcName;
    move_uploaded_file($tmpName,$dstName);

    //데이터가 저장되는 순간의 시간
    $now = date('Y-m-d H:i:s');

    //메세지중에 특수문자 사용가능성 있음. 특수문자는 잘못 해석될 수 있기에
    //그 글자들 앞에 슬래시 하나더 추가해야 그대로 해석됨
    $message = addslashes($message);
    $useremail = addslashes($useremail);
    $uniqueid = addslashes($uniqueid);

    //MySQL DB에 데이터를 저장 [테이블명 : market]
    $db = mysqli_connect("localhost","sux1011","rlarlxo^^7","sux1011");
    mysqli_query($db,"set names utf8");

    //값을 삽입하는 쿼리문[SQL언어문법]($name, $title, $msg, $price, $now)
    $sql = "INSERT INTO hospital(useremail,profile,uniqueid,message,picture,date) VALUES('$useremail','$profile','$uniqueid','$message','$dstName','$now')";
    $result = mysqli_query($db,$sql);

    if($result) echo "게시글 업로드 완료";
    else echo "게시글 업로드 실패. 다시시도 해주세요";

    //DB연결 종료
    mysqli_close($db);



?>