<?php

    header('Content-Type:Text/html; charset=utf-8');

    // form요소를 이용하여 GET방식으로 잔달된 데이터 방식
    $name = $_GET['name'];
    $email = $_GET['email'];

    // echo "$name 님이 등록하셨습니다. : $email";
    //form요소를 사용하면 ooo.html 페이지가 ooo.php 로 완전 페이지 전환돰
    //즉, 기존 html페이지가 없어짐.
    //echo 시킬때 <>태그문 사용가능하니 기존 html 모두 다시 echo로 씀

    // echo ("
    // <!DOCTYPE html>
    // <html lang='ko'>
    //     <head>
    //         <meta charset='UTF-8'>
    //         <title>no ajax</title>
    //     </head>
    //     <body>
            
    //         <h3>회원가입 페이지</h3>
    
    //         <form action='./04_noAjax.php' method='GET'>
    
    //             <input type='text' name='name' placeholder='이름'>
    //             <input type='text' name='email' placeholder='이메일'>
    
    //             <input type='submit' value='회원가입'>
    
    //         </form>
    
    //         <hr>
    //         <textarea id='ta' cols='30' rows='3'>$name 님이 등록하셨습니다. : $email</textarea>
    
    //     </body>
    // </html>
    // ")

?>

<!-- php영역 밖에있으면 그냥 ehco -->
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <title>no ajax</title>
    </head>
    <body>
        
        <h3>회원가입 페이지</h3>

        <form action="./04_noAjax.php" method="GET">

            <input type="text" name="name" placeholder="이름">
            <input type="text" name="email" placeholder="이메일">

            <input type="submit" value="회원가입">

        </form>

        <hr>
        <textarea id="ta" cols="30" rows="3"><?php "$name 님이 등록하셨습니다. : $email" ?></textarea>

    </body>
</html>