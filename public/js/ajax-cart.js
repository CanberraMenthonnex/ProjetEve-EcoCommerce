
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
                            <span>x</span>
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
        }) 

      $('.listShopping .container-products').html(content)

      $(".delete-product").click((e)=>{
          e.preventDefault()

          const delQuestion = confirm("Êtes-vous sûr de vouloir supprimer cet article de votre panier")

          if(delQuestion) {
            $.ajax({
                url : MAIN_PATH + "/cart/remove/" + $(e.currentTarget).data("productId"),
                dataType :"json"
            })
            .done((res)=> {
                console.log(res);
                displayCart(res)
            
            })

          }
      })

      $(".update-form").submit((e)=> {

        e.preventDefault()

        const element = $(e.currentTarget)

        const quantity = element.children().children("input[type=number]").val()
        
        const product_id = element.data("productId")
        console.log(product_id);

        $.ajax({
            url : MAIN_PATH + "/cart/update/" + product_id,
            method : "POST",
            data : {quantity},
            dataType : "json"
        })
        .done((res)=> {
            displayCart(res)
        })

    })
}

$.ajax({
    url : MAIN_PATH + "/cart/stock",
    dataType :"json"
})
.done((res)=> {
    console.log(res);
    displayCart(res)

})