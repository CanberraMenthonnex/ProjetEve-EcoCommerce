
$.ajax({
    url : MAIN_PATH + "/cart/stock",
    dataType :"json"
})
.done((res)=> {
    const content = res.map((item)=> (
       `
        <div class="item">
            <div class="itemPicture">
                <img src="http://localhost/img/product-img.png">
            </div>
            <div class="itemInfo">
                <span>${item.name}</span>
                <span class="priceProduct">${item.price}€</span>
            </div>
            <div class="itemQuantity">
                <span><input type="number" value="${item.quantity}"></span>
            </div>
            <div class="itemDelete">
                <img src="img/close-btn.png" alt="deleteProduct">
            </div>
        </div>
    ` 
    )) 
    $('.listShopping').html(content)
})