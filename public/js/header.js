
(function () {

  $("#basketIcon").click(function() {
  $(".listShopping").toggle("slow");
  });

  $(".listShopping").toggle()


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

})()