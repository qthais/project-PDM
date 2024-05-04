//Service part
const buyBtns = document.querySelectorAll('.booking-button')
const modal = document.querySelector('.js-modal')
const modalContainer = document.querySelector('.js-modal-container')
const modalClose = document.querySelector('.js-modal-close')
function addOpenFlex(element) {
    element.classList.add('openFlex')
}
function removeOpenFlex(element) {
    element.classList.remove('openFlex')
}
function addOpenBlock(element) {
    element.classList.add('openBlock')
}
function removeOpenBlock(element) {
    element.classList.remove('openBlock')
}
function stopProba(container, modal) {
    modal.addEventListener('click', () => removeOpenFlex(modal))
    container.addEventListener('click', function (event) {
        event.stopPropagation()
    })
}
for (const buyBtn of buyBtns) {
    buyBtn.addEventListener('click', () => addOpenFlex(modal))
}
modalClose.addEventListener('click', () => removeOpenFlex(modal))
stopProba(modalContainer, modal)
//Login part
const loginHeader = document.querySelector('.login-section')
const loginModal = document.querySelector('.login-modal')
const loginContainer = document.querySelector('.login-modal .container')
loginHeader.addEventListener('click', () => addOpenFlex(loginModal))
stopProba(loginContainer, loginModal)

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
//CartListpart

var cartButton = document.querySelector('.ti-shopping-cart-full')
var cartList = document.querySelector('#header .cart_login .cart-list')
var closeCartBtn = document.querySelector('#header .closeCartListBtn')
cartButton.addEventListener('click', () => addOpenBlock(cartList))
closeCartBtn.addEventListener('click', () => removeOpenBlock(cartList))
//Dynamic Cart
var cartItemContainer = document.querySelector('.cart-item-container')
var listProductHtml = document.querySelector('.booking-section .productList')
let listProducts = []
let carts = []
let cartQuantity = document.querySelector('.cart-quantity')
addData = () => {
    if (listProducts.length > 0) {
        const htmlString = listProducts.map((product) =>
            `
            <div class="accessories-item" ">
                <img class="accessories-img" src="${product.image}" alt="">
                <div class="accessories-body">
                    <h3 class="accessories-heading">${product.name}</h3>
                    <p class="accessories-desc">Navigate with ease. Grip the future with our steering wheel.</p>
                    <div class="buy-container" data-id="${product.id}">
                        <button class="accessories-buy js-buy-tickets">Add to cart</button>
                        <span class="item-price">$${product.price}</span>
                    </div>
                </div>
            </div>
            `
        ).join(" ")
        listProductHtml.innerHTML = htmlString;
    }
}

const initCart = () => {
    fetch('/assets/Data/Product.json')
        .then(res => res.json())
        .then(data => {
            listProducts = data
            addData();
            if (localStorage.getItem('cart')) {
                carts = JSON.parse(localStorage.getItem('cart'));
                addCartToHTML();
            }
        })
}

listProductHtml.addEventListener('click', (event) => {
    let positionClick = event.target;
    if (positionClick.classList.contains('accessories-buy')) {
        let product_id = positionClick.parentElement.dataset.id;
        addToCart(product_id)
    }
});
var SteeringWheel = document.querySelector('.ticket-list .SteeringWheel')
var Wheel = document.querySelector('.ticket-list .Wheel')
var Clutches = document.querySelector('.ticket-list .Clutches')
const addToCart = (product_id) => {
    let positionThisProductInCart = carts.findIndex((value) => value.product_id == product_id)
    if (carts.length <= 0) {
        carts = [{
            product_id: product_id,
            quantity: 1
        }
        ]
    } else
        if (positionThisProductInCart < 0) {
            carts.push({
                product_id: product_id,
                quantity: 1
            })
        } else {
            carts[positionThisProductInCart].quantity = carts[positionThisProductInCart].quantity + 1;
        }
    console.log(carts);
    addCartToHTML();
    addCartToMeMory();
}
const nameProducts=['SteeringWheel','Wheel','Clutches']
var totalPrice;
const addCartToHTML = () => {
    let tempString = ""
    let total = 0;
    const priceDiv = document.querySelector('.total-price')
    totalPrice = 0;
    if (carts.length >= 0) {
        carts.forEach(item => {
            total = total + item.quantity
            let positionProduct = listProducts.findIndex((value) => value.id == item.product_id)
            let info = listProducts[positionProduct]
            var htmlItem = `
            
            <div class="cart-item">
                <div class="item-img">
                    <img src="${info.image}" alt="">
                </div>
                <div class="item-name">
                    ${info.name}
                </div>
                <div class="cartItem-price">
                    $${info.price}
                </div>
                <div class="item-quantity" data-id="${info.id}">
                    <span class="minus">-</span>
                    <input name="${nameProducts[info.id-1]}" type="text" value="${item.quantity}" readonly>
                    <span class="plus">+</span>
                </div>
            </div>`
            tempString += htmlItem;
            totalPrice += info.price * item.quantity;

        })
        priceDiv.innerText = "$" + totalPrice;
        cartQuantity.innerText = total
    }
    cartItemContainer.innerHTML = tempString;
}
cartItemContainer.addEventListener('click', (e) => {
    let positionClick = e.target;
    if (positionClick.classList.contains('minus') || positionClick.classList.contains('plus')) {
        let product_id = positionClick.parentElement.dataset.id;
        let type = 'minus';

        if (positionClick.classList.contains('plus')) {
            type = 'plus';
        }
        changeQuantity(product_id, type);
    }
})
const changeQuantity = (product_id, type) => {
    let positionItemCart = carts.findIndex((value) => value.product_id == product_id)
    if (positionItemCart >= 0) {
        switch (type) {
            case 'plus':
                carts[positionItemCart].quantity += 1;
                break;
            default:
                let valueChange = carts[positionItemCart].quantity -= 1;
                if (valueChange > 0) {
                    carts[positionItemCart].quantity = valueChange
                } else {
                    carts.splice(positionItemCart, 1);
                }
                break;
        }
        addCartToMeMory();
        addCartToHTML();
    }
}
const addCartToMeMory = () => {
    localStorage.setItem('cart', JSON.stringify(carts));
}
initCart()
//send data to php
const checkOutBtn = document.querySelector('.checkOutBtn');

checkOutBtn.addEventListener('click', () => {
    // Assuming 'carts' array is available globally
    // Convert 'carts' array to JSON format
    const cartsJSON = JSON.stringify(carts);

    // Make a POST request to index.php
    fetch('/index.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: cartsJSON
    })
    .then(response => {
        // Handle response
        if (response.ok) {
            // Handle successful response
            console.log('Carts data sent successfully!');
        } else {
            // Handle error response
            console.error('Error sending carts data:', response.status);
        }
    })
    .catch(error => {
        // Handle network error
        console.error('Network error:', error);
    });
});

//Doorstep service part
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