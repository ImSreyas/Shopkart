//*changing the PLACEHOLDER of the search bar
let searchBar = document.querySelector(".search-bar")
searchBar.setAttribute("placeholder", 'Lazy search...')

//*focusing the search bar when the page loads
searchBar.focus()

//*getting argument CATEGORY
const param = new URLSearchParams(window.location.search)
const cat = param.get("category")


//*getting the CUSTOMER ID 
let customerId = document.querySelector(".body1")
customerId = customerId.getAttribute("customer-id")
if(customerId == 0) document.querySelector(".my-location-option").style.display = "none"

//-search functionalities : START
function search(item){
    const sp = (document.querySelector(".shop-or-product-btn").innerHTML == "Shop") ? true : false
    item.focus() //?focusing the input field when the search icon is clicked
    const cards2 = document.querySelectorAll(".shop-container-link")
    Array.prototype.forEach.call(cards2, (card) => {
        card.setAttribute('show',false)
    })
    let i, j, k, mistake
    let arr1 = []
    const text = item.value.toLowerCase()
    const names = document.querySelectorAll(".name")
    const location = document.querySelectorAll(".sl")
    const category = document.querySelectorAll(".sc")
    const phone = document.querySelectorAll(".sp1")
    const products = document.querySelectorAll(".products")
    let p = ""
    let phoneArray = []
    Array.prototype.forEach.call(phone, (phn)=> {
        phn = phn.children
        Array.prototype.forEach.call(phn, (ph, index) => {
            p = p.concat(ph.innerHTML)
        })
        phoneArray.push(p)
         p = ""
    })
    for(k = 0; k<names.length; k++){
        arr1.push("".concat(category[k].innerHTML,"-",names[k].innerHTML,"-",location[k].innerHTML,"-",phoneArray[k]))
    }
    if(sp == true){
        Array.prototype.forEach.call(arr1, (con, index) => {
            let total = 0
            exp = con.split("-")
            for(let b = 0; b < 4; b++){
                if(searchEngine(exp[b], text)) total++
            }
            if(total !=0){
                let c = names[index].parentElement.parentElement.parentElement.parentElement
                c.setAttribute('show',true)
            }
        })
    } else {
        Array.prototype.forEach.call(products, (con, index) => {
            let productList = con.getAttribute("list")
            con = productList.split(',')
            let total = 0
            for(let i = 0; i < con.length; i++){
                if(searchEngine(con[i]+location[index].innerHTML, text)) total++
            }
            if(total !=0){
                let c = names[index].parentElement.parentElement.parentElement.parentElement
                c.setAttribute('show',true)
            }
        })
    }
}

let searchI = document.querySelector(".search-clear")
searchI.addEventListener("click", () => {
   collector()
})
//-search functionalities : ENDS 

//-sorting BUTTON 
function btnClicked(value){
    const container0 = document.querySelector(".shop-or-product-options-container")
    const container1 = document.querySelector(".sort-options-container")
    const container2 = document.querySelector(".category-options-container")
    if(value == -1){
        if(container0.getAttribute("show1") === 'true')
            container0.setAttribute("show1", false)
        else {
            container0.setAttribute("show1",true)
            container1.setAttribute("show1", false)
            container2.setAttribute("show1", false)
        }
    } else if(value == 0){
        if(container1.getAttribute("show1") === 'true')
            container1.setAttribute("show1", false) 
        else {
            container0.setAttribute("show1", false)
            container1.setAttribute("show1", true)
            container2.setAttribute("show1", false)
        }
    } else {
        if(container2.getAttribute("show1") === 'true')
            container2.setAttribute("show1", false)
        else{
            container0.setAttribute("show1", false)
            container1.setAttribute("show1", false)
            container2.setAttribute("show1", true)
        }
    }
}

//-option CLICK LISTENER (first)
const spChild = document.getElementById("s0").children
Array.prototype.forEach.call(spChild, (option) => {
    option.addEventListener("click", () =>{
        document.querySelector(".shop-or-product-btn").innerHTML = option.innerHTML
        option.parentElement.setAttribute("show1", false)
        collector()
    })
})

//-option CLICK LISTENERS (1)
const sortChild = document.getElementById("s1").children
Array.prototype.forEach.call(sortChild, (option) => {
    option.addEventListener("click", () =>{
        document.querySelector(".sort-btn").innerHTML = option.innerHTML
        option.parentElement.setAttribute("show1", false)
        collector()
    })
})
//-option CLICK LISTENERS (2)
const filterChild = document.getElementById("s2").children
Array.prototype.forEach.call(filterChild, (option) => {
    option.addEventListener("click", () =>{
        document.querySelector(".filter-btn").innerHTML = option.innerHTML
        option.parentElement.setAttribute("show1", false)
        collector()
    })
})
//-hide OPTIONS when clicking on somewhere else other than the options 
document.addEventListener("click", function(e){
    let isButton = false
    let optionButtons = document.querySelectorAll('.btn-container-wrapper button')
    optionButtons.forEach((button) => {
        if(e.target == button) {
            isButton = true
        }
    })
    if(!isButton){
        let optionContainer = document.querySelectorAll('[show1=true]')
         optionContainer.forEach((container) => {
            e.preventDefault()
            container.setAttribute('show1', false)
        })
    }
})
//-FUNCTION THAT CALLS THE MAIN FUNCTION when the option is clicked
function collector(){
    let sort = document.querySelector(".sort-btn").innerHTML
    switch(sort){
        case "Rating": sort = 0 
        break
        case "Alphabetical": sort = 1
        break
        case "Review": sort = 2
        break
        case "My location": sort = 3
        break
        default: sort = 0
    }
    const filter = document.querySelector(".filter-btn").innerHTML
    getShops(sort, filter)
}
//-default CALLING FUNCTION (when page loads)
if(cat != null)getShops(0, cat)
else getShops(0, "All") 

//-fixing the search bar url to original
history.replaceState({},'','search.php')

//-MAIN CALLING FUNCTION
function getShops(sort, category){
    $.ajax({
        url:'php/get-shops.php',
        type:'POST',
        data: {sort: sort,category: category},
        success: (data) => {
            $(".body").html(data)
            showSelectedItems(4)
            scrollAnimation()
            cardLink()
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

function showSelectedItems(value){
    const cards = document.querySelectorAll(".shop-container-link")
    cards.forEach((card, index) => {
        if(index < value) card.classList.add('_scroll-animation-show')
    })
}
//- card link event listener 
function cardLink(){
    let cards = document.querySelectorAll('.shop-container-link')
    cards.forEach((card) => {
        card.addEventListener('click', function(e) {
            let clipboard = document.querySelectorAll('.clipboard-icon-container')
            clipboard.forEach((clip) => {
                if(e.target == clip) {
                    e.preventDefault()
                    const parent = clip.parentElement
                    const sliced = Array.prototype.slice.call(parent.children)
                    const index = sliced.indexOf(clip)
                    const copyIndex = index - 1 
                    navigator.clipboard.writeText(parent.children[copyIndex].innerHTML)
                    popup('phone number <u>'+parent.children[copyIndex].innerHTML+'</u> copied to clipboard', 'green')
                }
            })
        })
    })
}

document.addEventListener('click', e => {
    console.log(e.target.offsetLeft)
    console.log(e.target.offsetTop)
})


// function layout(){
//     const container = document.querySelector(".body")
//     //console.log(container.childElementCount)
//     for(let i = 0; i < container.childElementCount; i++){
//         let height = container.children[i].offsetHeight
//         console.log(height)
//         container.children[i].style.gridRowEnd = "span " + height
//     }
// }

