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