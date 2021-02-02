let formCode = $('#code-div');
let formResend = $('#send-div');

$('#code-p').click((e)=>{
    formCode.hide();
    formResend.show();
})

$('#send-p').click((e)=>{
    formResend.hide();
    formCode.show();
})

$("#resend").click((e)=>{
    e.preventDefault();

    const email = $("#email-resend").val();

    $.ajax({
        url: MAIN_PATH + "/customer/verify/resend",
        method:"POST",
        data: {email}
    })
    .done((res)=> {
        alert(res);
    })

})