// var n = 0
// while(true){
//     n++
//     //document.getElementById('hh').innerHTML = n //동작안함
//     //워커는 UI변경작업 불가

//     //값을 변경하고 싶다면.. main thread쪽으로 출력하고 싶은 값을 전달
//     postMessage(n)
// }

//반복문 사용하면 너무 빨라서 숫자값을 온전히 보기 어려움

var n = 0
function fff(){
    n++
    postMessage(n)

    setTimeout(fff, 500)
}

fff()