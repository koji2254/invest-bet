// const openMail = document.getElementById('open-mail')
const mailBody = document.querySelector('.open-email-body')
const openMail = document.querySelector('.open-mail')
const longCard = document.querySelectorAll('.long-card')
const container = document.querySelector('.container')

longCard.forEach(item => {
    
})

// longCard.addEventListener('click', (e) => {
    // if(e.target.classList.contains('open-mail')){
    //    const sis = e.target.parentElement.parentElement.parentElement;
    //     console.log(sis.nextElementSibling.classList.toggle('display-hide'))
    // }
    // console.log('long card')
    // mailBody.classList.toggle('display-hide')
// })

container.addEventListener('click',(e) => {
    if(e.target.classList.contains('open-mail')){
       const sis = e.target.parentElement.parentElement.parentElement;
       sis.nextElementSibling.classList.toggle('display-hide')
    }
    // console.log('long card')

})