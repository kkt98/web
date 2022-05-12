<?php
    header('Content-Type:text/html; charset=utf-8');

    //form로 전달된 파일은 조금 특별한 방식으로 전달됨
    //실제 파일데이터를 별도의 임시공간에 저장됨
    //이 php로 전달되는 것을 파일의 데이터가 아니라 파일을 설명하는 데이터가 옴
    //전달된 파일의 정보는 5개임. 그래서 배열로 전달됨
    $file = $_FILES['aaa'];

    //$file은 배열[5칸짜리]
    $srcName = $file['name'];
    $type = $file['type'];
    $size = $file['size'];
    $tmpName = $file['tmp_name'];
    $error = $file['error'];

    echo "$srcName<br>";
    echo "$type<br>";
    echo "$size<br>";
    echo "$tmpName<br>";
    echo "$error<br>";

    //임시저장소에 있는 파일은 이 php가 끝나면 자동으로 사라짐
    //영구적으로 저장하기 위해 위치를 이동해야함
    $dstName = "./" . date("YmdHis") . $srcName;
    move_uploaded_file($tmpName, $dstName);
?>