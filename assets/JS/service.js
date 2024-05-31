const buyBtns = document.querySelectorAll('.booking-button')
for (const buyBtn of buyBtns) {
    buyBtn.addEventListener('click', () => {
        var ServiceID=buyBtn.dataset.id;
        console.log(ServiceID)
        createCookie("ServiceID", ServiceID, 1);
        addOpenFlex(modal)
    })
}

modalClose.addEventListener('click', () => removeOpenFlex(modal))
stopProba(modalContainer, modal)

var doorstepList = document.querySelector('.doorstep-slider .doorstep-list')
var doorstepItem = document.querySelectorAll('.doorstep-list .doorstep-item')
var dots = document.querySelectorAll('.dots li')
var prev = document.getElementById('prev')
var next = document.getElementById('next')
let active = 0;
let lengthItems = doorstepItem.length - 1
next.onclick = function () {
    if (active + 1 > lengthItems) {
        active = 0;
    }
    else {
        active += 1;
    }
    reloadSlider();
}
prev.onclick = function () {
    if (active == 0) {
        active = lengthItems
    } else {
        active -= 1
    }
    reloadSlider();
}
dots.forEach(function (li, index) {
    li.addEventListener('click', function () {
        active = index;
        reloadSlider();
    })
})

let refreshSlider = setInterval(() => next.click(), 4000)
function reloadSlider() {
    let checkLeft = doorstepItem[active].offsetLeft
    doorstepList.style.left = -checkLeft + 'px'
    let previousDot = document.querySelector('.doorstep-slider .dots li.active')
    previousDot.classList.remove('active')
    dots[active].classList.add('active')
    clearInterval(refreshSlider);
    refreshSlider = setInterval(() => next.click(), 4000)
}
const errorMessageDiv = document.querySelector('.date-error');
document.getElementById('dateForm').addEventListener('submit', function(event) {
    const inputDateValue = document.getElementById('inputDate').value;
    const inputDate = new Date(inputDateValue);
    const currentDate = new Date();
    console.log(currentDate)
    console.log(inputDate)
    if (inputDate <= currentDate) {
        event.preventDefault();
        addOpenBlock(errorMessageDiv);
    }
});
