
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
                <span class="priceProduct">${item.price * item.quantity}€</span>
            </div>
            <form class="itemQuantity">
                <input type="hidden" value="${item.product_id}"/>
                <span><input type="number" value="${item.quantity}"></span>
            </form>
            <div class="itemDelete">
                <img src="img/close-btn.png" alt="deleteProduct">
            </div>
        </div>
    ` 
    )) 
    $('.listShopping').html(content)

    $(".itemQuantity input[type=number]").change((e)=> {

        const quantity = e.target.value
        const element = $(e.target)
        const product_id = element.parent().parent().children("input[type=hidden]").val()

        $.ajax({
            url : MAIN_PATH + "/cart/update/" + product_id,
            method : "POST",
            data : {quantity}
        })
        .done((res)=> {
            // element.parent().parent().parent().children(".itemInfo .priceProduct").text(quantity * )
        })

    })
})