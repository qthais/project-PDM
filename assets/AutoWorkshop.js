//Service part
const buyBtns = document.querySelectorAll('.js-buy-tickets')
const modal = document.querySelector('.js-modal')
const modalContainer = document.querySelector('.js-modal-container')
const modalClose = document.querySelector('.js-modal-close')

function showBuyTickets() {
    modal.classList.add('open')
}
function hidenBuyTickets() {
    modal.classList.remove('open')
}
for (const buyBtn of buyBtns) {
    buyBtn.addEventListener('click', showBuyTickets)
}
modalClose.addEventListener('click', hidenBuyTickets)
modal.addEventListener('click', hidenBuyTickets)
modalContainer.addEventListener('click', function (event) {
    event.stopPropagation()
})
//Login part
const loginHeader = document.querySelector('.login-section')
const loginModal=document.querySelector('.login-modal')
const loginContainer=document.querySelector('.login-modal .container')
loginHeader.addEventListener('click', function () {
    loginModal.classList.add('open')
})
loginModal.addEventListener('click',function(){
    loginModal.classList.remove('open')
})
loginContainer.addEventListener('click', function (event) {
    event.stopPropagation()
})

//Slider part
var sliderHref = document.querySelector('#slider')
var sliderText = [
    { heading: 'So Convenient!', description: 'Convenient doorstep service - We come to you for all your needs.' },
    { heading: 'In home', description: 'Enjoy our doorstep service - We bring the solution to your doorstep.' },
    { heading: 'We Come To You', description: 'Experience our doorstep service - Convenience delivered right to your door.' }
];
var sliderLink = ['./assets/css/img/slider_1/Doorstep_service.jpg', './assets/css/img/slider_1/Doorstep_service2.jpg', './assets/css/img/slider_1/Doorstep_service3.jpg']
var i = 0
setInterval(function () {
    sliderHref.style.backgroundImage = `url(${sliderLink[i]})`;
    document.querySelector('.text-heading h2').textContent = sliderText[i].heading;
    document.querySelector('.text-description p').textContent = sliderText[i].description;
    i++
    if (i == sliderLink.length) {
        i = 0
    }
}, 2500)
const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});