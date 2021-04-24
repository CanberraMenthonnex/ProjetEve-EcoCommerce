
(function () {

    const basketBtns = Array.from( document.querySelectorAll(".basketIcon") )
    const listCart = document.querySelector("#listShopping")

    if(Array.isArray(basketBtns)) {
        listCart.style.display = "none"

        basketBtns.forEach(basketBtn => {
            basketBtn.addEventListener("click", function() {
                listCart.style.display = listCart.style.display === "none" ? "flex" : "none"
            })
        })

    }


  const burgerBtn = document.querySelector("#burger-btn")
  const navBar = document.querySelector("#nav-bar")
  const enableNavClass = "header--nav--enable"
  const enableBurgerBtn = "header--burger-btn--enable"

  burgerBtn.addEventListener("click", () => {
      const isOpen = navBar.classList.toggle(enableNavClass)
    
      if(isOpen) {
        document.body.style = "overflow:hidden"
        window.scrollTo(0,0)
      } else {
        document.body.style = null
      }

      burgerBtn.classList.toggle(enableBurgerBtn)
  })

})();