<?php

    header('Content-Type:application/json; charset=utf-8');

    $useremail = $_GET['useremail'];
    $no = $_GET['no'];

    $db = mysqli_connect('localhost',"sux1011","rlarlxo^^7","sux1011");
    mysqli_query($db, "set names utf8");

   
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "DELETE FROM hospital WHERE useremail='$useremail'";
    //결과표 ($result)로부터 총 레코드(row) 수

    //여러줄을 읽어야 하므로 각 줄($row배열)을 요소로 가질 빈 인덱스 배열 준비
    if (mysqli_query($db, $sql)) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . mysqli_error($db);
      }
      
      mysqli_close($db);

?>