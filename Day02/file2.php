<?php
    $files = $_FILES['bbb'];

    //$files는 배열임 근데 파일이 여러개
    echo count($files); //5임 [파일 개수와 상관없이]
    
    //선택된 파일의 개수
    $num = count($files['name']);

    for($i=0; $i<$num; $i++){
        $srcName = $files['name'][$i];
        $size = $files['size'][$i];
        $tmpName = $files['tmp_name'][$i];

        echo "$srcName<br>";
        echo "$size<br>";
        echo "$tmpName<br>";

        $dstName = "./image/" . date("YmdHis") . $srcName;
        move_uploaded_file($tmpName, $dstName);

        echo "<img src='$dstName'>";

        echo "====================<br>";
    }
?>