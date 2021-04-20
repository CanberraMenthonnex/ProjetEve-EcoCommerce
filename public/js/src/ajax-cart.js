
function getCartItems() {
    return fetch(MAIN_PATH + "/cart/stock", {
        method: "GET",
        headers : {
            "Accept" : "application/json"
        }
    })
        .then(res => res.json())
}

function updateCartItem (productId, data) {
    return fetch(MAIN_PATH + "/cart/update/" + productId, {
        method: "POST",
        body : data ,

    })
        .then(res => res.json())
}

function deleteCartItems(productId) {
    return fetch(MAIN_PATH + "/cart/remove/" + productId, {
        method: "GET",
        headers : {
            "Accept" : "application/json"
        }
    })
}

function displayCart(res) {

    const content = res.map((item)=> {
        return ( `
            <div class="item">
                <div class="itemPicture">
                    <img src="${MAIN_PATH}/img/product-img.png">
                </div>
                <div class="itemInfo">
                    <span>${item.name}</span>
                    <span class="priceProduct">${item.price * item.quantity} €</span>
                </div>
                <div class="itemQuantity">
                    <form action="${MAIN_PATH}/cart/update" method="POST" class="update-form" data-product-id="${item.product_id}">
                        <span>
                            <input type="number" name="quantity" value="${item.quantity}" min="1" max="99" class="product_quantity">
                            <input class="newQuantityBtn" type="submit" name="newQuantity" value="Valider">
                        </span>
                    </form>
                </div>
                <div class="itemDelete">
                    <button class="imageBtn delete-product" data-product-id="${item.product_id}"><img src="${MAIN_PATH}/img/close-btn.png" alt="deleteProduct"></button>
                </div>
            </div>
         ` )
        }).join("")

      document.querySelector('.listShopping .container-products').innerHTML = content

        const deleteBtns = Array.from(document.querySelectorAll(".delete-product"))
        const formForUpdating = Array.from(document.querySelectorAll(".update-form"))

        deleteBtns.forEach((btn) => {

            btn.addEventListener("click", (e)=>{
                e.preventDefault()


                const delQuestion = confirm("Êtes-vous sûr de vouloir supprimer cet article de votre panier")

                if(delQuestion) {
                    deleteCartItems(btn.dataset.productId)
                        .then(() => getCartItems())
                        .then((res)=> {
                            displayCart(res)
                        })

                }
            })


        })



        formForUpdating.forEach(form => {
            form.addEventListener("submit", (e)=> {

                e.preventDefault()

                const element = e.currentTarget
                const quantityInput = form.querySelector("input[type=number]")

                const quantity = quantityInput.value

                const productId = element.dataset.productId
                const formData = new FormData()
                formData.append("quantity", quantity)
                updateCartItem(productId, formData)
                    .then((res)=> {
                        console.log(res)
                        displayCart(res)
                    })

            })
        })
}


getCartItems()
    .then((res)=> {
        displayCart(res)
    })
    .catch((e) => {
        console.log(e)
    });
