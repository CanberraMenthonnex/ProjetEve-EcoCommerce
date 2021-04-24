let formCode = document.querySelector('#code-div');
let formResend = document.querySelector('#send-div');

document.querySelector('#code-p').addEventListener("click", (e)=>{
    formCode.style.display = "none"
    formResend.style.display = "block"
})

document.querySelector('#send-p').addEventListener("click", (e)=>{
    formResend.style.display = "none"
    formCode.style.display = "block"
})

document.querySelector("#resend").addEventListener("click", (e)=>{
    e.preventDefault();

    const email = document.querySelector("#email-resend").value;

    return fetch(MAIN_PATH + "/customer/verify/resend", {
        method: "POST",
        headers : {
            "Accept" : "application/json"
        },
        body: JSON.stringify({
            email
        })
    })
        .then(res => res.text())
        .then(res => alert(res))
//com
})