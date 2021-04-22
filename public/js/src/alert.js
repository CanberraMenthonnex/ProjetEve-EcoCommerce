const alertBtn = document.querySelector("#alert-btn")
const alertModal = document.querySelector("#alert-modal")

if(alertModal && alertBtn) {

    alertBtn.addEventListener("click", () => {
        alertModal.style.display = "none"
    })
}


console.log("adds")