let SyntheticsArea = document.getElementById("SyntheticsArea")

let FooterYear = document.getElementById("footer-CurrentYear")

FooterYear.innerHTML = new Date().getFullYear();



var ContactName = document.getElementById("ContactName")
let NameError = document.getElementById("NameError")

var ContactEmail = document.getElementById("ContactEmail")
let EmailError = document.getElementById("EmailError")

var ContactMessage = document.getElementById("ContactMessage")
let MessageError = document.getElementById("MessageError")

let SendButton = document.getElementById("SendButton")

let ContactThanks = document.getElementById("ContactThanks")


SendButton.addEventListener("click" , function()
{
    let CorrectCount = 0
    if (ContactName.value == "") 
    {
        NameError.style.display = "block"
    }
    else
    {
        NameError.style.display = "none"
        CorrectCount += 1
    }


    if (ContactEmail.value == "") 
    {
        EmailError.style.display = "block"
    }
    else
    {
        EmailError.style.display = "none";
        CorrectCount += 1
    }

    if (ContactMessage.value == "") 
    {
        MessageError.style.display = "block"
    }
    else
    {
        MessageError.style.display = "none"
        CorrectCount += 1
    }


    if(CorrectCount == 3)
    {
        ContactThanks.style.display = "block"
        ContactName.value = ""
        ContactEmail.value = ""
        ContactMessage.value = ""
    }
})