function show(){
    // document.write("show")
    const e = document.createElement('p')
    e.textContent = "show"
    document.body.appendChild(e)
}

//위 show()함수를 다른 .js에서 import하려면 반드시 이곳에서 추출해야함
//하나의 .js안에 export는 여러개가 가능하지만 반드시 한개는 default export여야함
export default show

//default가 아닌 export를 할때는 뭐래고 했더라 ㅅㅂ 못적었네
export function addHeadingElementToBody(text){
    const h = document.createElement('h3')
    h.textContent = text
    document.body.appendChild(h)
}
//위 함수를 외부에서 import 하려면 추출해야함
//export addHeadingElementToBody //error [export default는 1개만 가능]

//변수나 상수도 export
export let name = "sam"
export const num = 10
