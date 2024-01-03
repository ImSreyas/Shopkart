const nav = document.querySelector('.nav-bar')
const resNavigationButton = document.querySelector('.nav-button')
resNavigationButton.addEventListener('click', () => {
    if(nav.getAttribute('responsiveNavigation') === 'true') nav.setAttribute('responsiveNavigation', false)
    else nav.setAttribute('responsiveNavigation', true)
})

document.addEventListener('click', (e) =>{
    const resNav = document.querySelector('.nav-bar ul')
    if(nav.getAttribute('responsiveNavigation') === 'true')
        if(e.target != resNav && e.target != resNavigationButton) 
            nav.setAttribute('responsiveNavigation', false)
})