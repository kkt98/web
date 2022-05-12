<?php

    $file = $_FILES['img'];

    $name = $file['name'];  //원본 파일명
    $type = $file['type'];  //파일타입
    $size = $file['size'];  //파일사이즈
    $tmpName = $file['tmp_name'];  //임시저장소의 파일위치
    $error = $file['error'];  //에러번호

    //전달이 잘 되었는지 확인
    echo "$name \n";
    echo "$type \n";
    echo "$size \n";
    echo "$tmpName \n";
    echo "$error \n";

    //실제 파일데이터는 임시저장소에 있기에 영구적으로 저장하려면 이동시켜야함
    $dstName = "./uploads/" . date('YmdHis') . $name;
    move_uploaded_file($tmpName, $dstName);

    //파일이 최종 저장된 위치도 확인
    echo "$dstName";

?>