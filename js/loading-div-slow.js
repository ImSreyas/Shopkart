const getParameter = (parameterName) =>{
    let parameter= new URLSearchParams( window.location.search )
    return parameter.get( parameterName )
}
const arr = ["logging_in","logging_out","deleting_seller"]
const arr_val = ["Logging in...please wait","Logging out...please wait","Deleting account...please wait"]
if(arr.includes(getParameter("from"))){
    document.getElementById("loader").style.display = "block"
    document.querySelector("body").style.overflow = "hidden"
    document.getElementById("loading-message").innerHTML = arr_val[arr.indexOf(getParameter("from"))]
    window.addEventListener("load" , function(){
    setTimeout(()=>{
        document.getElementById("loader").style.display = "none"
        document.querySelector("body").style.overflow = "visible"
    },2500)
})
}else{
    document.getElementById("loader").style.display = "block"
    document.querySelector("body").style.overflow = "hidden"
    window.addEventListener("load" , function(){
    setTimeout(()=>{
        document.getElementById("loader").style.display = "none"
        document.querySelector("body").style.overflow = "visible"
    })
})
}