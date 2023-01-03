
//-search functionalities : START

function search(item){
    const cards = document.querySelectorAll(".customer-card-container")
    Array.prototype.forEach.call(cards, (card) => {
        card.setAttribute('show',false)
    })
    let i, j
    const text = item.value.toLowerCase()
    const names = document.querySelectorAll(".name")
    Array.prototype.forEach.call(names, (name) => {
        let check = true
        j = 0
        nameText = name.innerHTML.toLowerCase()
        for(i=0; i<text.length; i++){
            if(nameText.includes(text[i], j) || text[i] == " "){
                j = nameText.indexOf(text[i], j) + 1
                continue
            }
            check = false
            break
        }
        if(check == true){
            let c = name.parentElement.parentElement.parentElement
            c.setAttribute('show',true)
        }
    })
}
let searchI = document.querySelector(".search-clear")
searchI.addEventListener("click", () =>{
    const ch = document.querySelector(".btn-container").children
    Array.prototype.forEach.call(ch, (btn, i) => {
        if((btn.getAttribute("selected")) === 'true') {
            if(i == 0) getUsers (1)
            else getUsers(2)
        }
    })
})

//-search functionalities : ENDS 

function btnClicked(value){
    const ch = document.querySelector(".btn-container").children
    console.log(ch)
    Array.prototype.forEach.call(ch, (btn) => {
        btn.setAttribute("selected",false)
    })
    ch[value-1].setAttribute("selected",true)
    if(value == 1) getUsers(1)
    else getUsers(2)
}
getUsers(1)
function getUsers(value){
    $.ajax({
        url:'php/get-users.php',
        type:'POST',
        data: {wh: value},
        success: (data) => {
            $(".body").html(data)
            scrollAnimation()
        }
    })
}
function removeUser(item){
    const id = item.getAttribute("id");
    $.ajax({
        url:'php/remove-user.php',
        type:'POST',
        data: {id : id},
        success: () => {
            getUsers(1)
        }
    })
}
function undoRemove(item){
    const id = item.getAttribute("id");
    $.ajax({
        url:'php/undo-remove.php',
        type:'POST',
        data: {id : id},
        success: () => {
            getUsers(2)
        }
    })
}
function scrollAnimation(){
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if(entry.isIntersecting) entry.target.classList.add('scroll-animation-show')
            else entry.target.classList.remove('scroll-animation-show')
        })
    })
    const hiddenElements = document.querySelectorAll('.scroll-animation-hidden')
        hiddenElements.forEach((element) => {
        observer.observe(element)
    })
}