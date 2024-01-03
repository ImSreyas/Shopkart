document.querySelector('.to-productSection-link').addEventListener('click', (e)=> {
    e.preventDefault()
    const productSection = document.querySelector('#product-section')
    productSection.scrollIntoView({behavior: "smooth"})
})
