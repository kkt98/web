<?php


header('Content-Type:text/plain; charset=utf-8');


//@partMab 으로 전단된 포스트파트
$name = $_POST['name'];
$title=$_POST['title'];
$msg = $_POST['msg'];
$price = $_POST['price'];

// part로 전달된 이미ㅣㅈ
$file=$_FILES['img'];
$srcName=$file['name'];
$tmpName=$file['tmp_name'];

// echo" $name \n";
// echo" $title \n";
// echo" $msg \n";
// echo" $srcName \n";
// echo" $tmdName \n";


// 이미지

$dstName="./uploadss/" . date('YmdHis') . $srcName;
move_uploaded_file($tmpName,$dstName);
$now = date('Y-m-d H:i:s');

// 메세지중에 특수문자 사용 가능성이 ㅣㅇㅆ음.
// "  " 안에 특수문자는 프로그램이 인식함.
// 그래서 \를 찍으면 \\ 이렇게 써야 문자 자체 \ 로 해석 됨
// --> 이스케이프 문자~~
// 이 글자들 앞에 슬래시 하나 더 추가해야 함.
$title=addslashes($title);
$msg=addslashes($msg);




$db = mysqli_connect("localhost","sux1011","rlarlxo^^7","sux1011"); // 네번째는 db명
// 
// 한글 깨짐 방지
//  ㄴmysqli_query 는 디비에게 말할 수 있음
mysqli_query($db, "set names utf8");

// mysql 문법 네가지가 있음 1. insert, select, update, delete
//3.값을 삽입하는 인서트 쿼리문 작성.
// 우린 이제 $name,$title,$msg,$price, $dstName, $now
//  이 값들ㅇ 넣어야 함


// 테이블명은 대소문자 구별됨. 주의. 변수 명도 같아야 하니까 주의.!
// 쿼리문은 띄어쓰기 등도 주의해야 함 ㅜ1!
// 나중에 회사가면 명세서 줌. 거기에 파일 명 써있어서 그거 보고 작성해야 함!!
$sql = "INSERT INTO market(name,title,msg,price,file,date) VALUES('$name','$title','$msg','$price', '$dstName', '$now')";

$result = mysqli_query($db,$sql); // 결과 확인용 확인용 result

if($result) echo " 게시글 업로드 되따";
else echo "망";


mysqli_close($db);




?>