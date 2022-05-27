//전역변수의 위치에 이미지객체 생성
var imgPlayer = new Image()
imgPlayer.src="./image/uni.png"

var x=200, y=250 //이미지의 중심좌표.
var w=40, h=40   //이미지의 절반 넓이, 높이
var dx=1, dy=1 //이미지 좌표의 변화량

var imgBack = new Image()
imgBack.src="./image/bg.png"

var bg_x=0 //배경이미지 x좌표

//body문서가 로드완료되는 실행될 함수
function loaded(){
    canvas = document.getElementById('c1')
    context = canvas.getContext('2d')

    runGame()

    //일정 시간마다 특정함수를 반복수행하는 window객체의 메소드
    window.setInterval( runGame, 10) //10ms마다 (1초에 100장)
}

function runGame(){
    moveAll() //움직이기
    drawAll() //그리기
}

//모든 화면에 그려지는 작업은 이 함수에서
function drawAll(){
    context.drawImage(imgBack, bg_x, 0, 400, 500)
    context.drawImage(imgBack, bg_x+400, 0, 400, 500)
    context.drawImage(imgPlayer, x-w, y-h, w*2, h*2)
}

//모든 움직이는(좌표를 바꾸는)
function moveAll(){
    //내 플레이어 이미지 좌표 변경
    x += dx
    y += dy

    //내 플레이어가 벽에 닿으면 반대로 튕기도록
    if(x >= 400-w || x <= w) dx = -dx
    if(y >= 500-h || y <= h) dy = -dy 

    //배경 이미지 좌표 변경
    bg_x -= 1
    if(bg_x<= -400) bg_x = 0

}

//키보드의 방향키는 onkeydown으로
function keydown(){
    var keyCode = window.event.keyCode
    switch(keyCode){
        case 37: //Left 
            dx=-1
            break

        case 38: //up
            dy=-1
            break
        
        case 39: //right
            dx = 1
            break

        case 40: //Down
            dy = 1
            break

        default:
            dx=1
            dy=1
    }
}

function keyup(){
    var keyCode = window.event.keyCode
    if(keyCode >= 37 && keyCode <= 40){
        dx = 0
        dy = 0
    }  

}