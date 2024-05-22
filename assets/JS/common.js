const menu=document.querySelector("#header .menu")
const navItems=document.querySelectorAll('#header #nav li')
const modal = document.querySelector('.js-modal')
const modalContainer = document.querySelector('.js-modal-container')
const modalClose = document.querySelector('.js-modal-close')
menu.addEventListener('click',()=>{
    navItems.forEach(item => {
        item.classList.toggle('openBlock');
    });
})
function createCookie(name, value, days) {
    let expires;

    // Check if the 'days' parameter is provided
    if (days) {
        // If 'days' is provided, calculate the expiration date
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        // If 'days' is not provided, set the expiration to an empty string
        expires = "";
    }

    // Construct the cookie string and set it
    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
}
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

var cartButton = document.querySelector('.ti-shopping-cart-full')
var cartList = document.querySelector('#header .cart_login .cart-list')
var closeCartBtn = document.querySelector('#header .closeCartListBtn')
cartButton.addEventListener('click', () => addOpenBlock(cartList))
closeCartBtn.addEventListener('click', (event) => {
    event.preventDefault();
    removeOpenBlock(cartList)
})
//Dynamic Cart
checkCartEqualZero = () => {
    if (totalPrice == 0 || totalPrice==undefined) {
        checkOutBtn.disabled = true;
        return true;
    } else {
        checkOutBtn.disabled = false;
        return false;
    }
}
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
const nameProducts = ['SteeringWheel', 'Wheel', 'Clutches']
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
                    <input name="${nameProducts[info.id - 1]}" type="text" value="${item.quantity}" readonly>
                    <span class="plus">+</span>
                </div>
            </div>`
            tempString += htmlItem;
            totalPrice += info.price * item.quantity;
        })
        priceDiv.innerText = "$" + totalPrice;
        cartQuantity.innerText = total
        checkCartEqualZero();
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
//end of dynamic
const checkOutBtn = document.querySelector('.checkOutBtn');

checkOutBtn.addEventListener('click', () => {
    createCookie('totalPrice',totalPrice,1)
    console.log(totalPrice)
    if (checkCartEqualZero()) {
        alert("Your cart is empty!")
    }
});