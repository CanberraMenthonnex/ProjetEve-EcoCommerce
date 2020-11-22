
function displayCart(item) {
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
             <form action="${MAIN_PATH}/cart/update" method="POST" class="update-form">
                 <span>
                     <span>x</span>
                     <input type="hidden" value="${item.product_id}" />
                     <input type="number" name="quantity" value="${item.quantity}" min="1" max="99" class="product_quantity">
                     <input class="newQuantityBtn" type="submit" name="newQuantity" value="Valider">
                 </span>
             </form>
         </div>
         <div class="itemDelete">
             <button class="imageBtn"><img src="${MAIN_PATH}/img/close-btn.png" alt="deleteProduct"></button>
         </div>
     </div>
 ` )
}

$.ajax({
    url : MAIN_PATH + "/cart/stock",
    dataType :"json"
})
.done((res)=> {
    console.log(res);
    const content = res.map((item)=> (
      displayCart(item)
    )) 
    $('.listShopping').html(content)

    $(".update-form").submit((e)=> {

        e.preventDefault()

        const element = $(e.target)

        const quantity = element.children().children("input[type=number]").val()
        
        const product_id = element.children().children("input[type=hidden]").val()
        

        $.ajax({
            url : MAIN_PATH + "/cart/update/" + product_id,
            method : "POST",
            data : {quantity},
            dataType : "json"
        })
        .done((res)=> {
            console.log(res);
        })

    })
})