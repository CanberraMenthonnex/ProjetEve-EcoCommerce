const buttunSignToLog = document.getElementById("signToLog");
const PageSign = document.getElementById("sign");
const PageLog = document.getElementById("log");
const buttonSwitchSign = document.getElementById("logToSign");

buttunSignToLog.onclick = function changePage() {
    PageSign.style.display = "none";
    PageLog.style.display = "flex";
}

buttonSwitchSign.onclick = function changeForm(){
    PageSign.style.display = "flex";
    PageLog.style.display = "none";

}
