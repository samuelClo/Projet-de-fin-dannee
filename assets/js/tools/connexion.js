function validateEmail(email) {
    let re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validateTest(email) {

    if (validateEmail(email)) {
        return 1
    } else {
        return 0
    }
}

function DisplayErrorStyle(element) {
    let errorDisplay = document.createElement("span")
    errorDisplay.classList.add("errorDisplay")
    errorDisplay.innerText = element
    return errorDisplay
}


let regularInputCheck = function () {

    const emailRegister = document.querySelector('#email')
    const passwordRegister = document.querySelector('#password')

    let inpuUsers = {
        email: emailRegister,
        password: passwordRegister,
    }

    if (emailRegister.value !== "" && validateTest(emailRegister.value) !== 1)
        emailRegister.after(DisplayErrorStyle(" Veuillez rentrer une adresse mail valide "))

    if (emailRegister.value === "")
        emailRegister.after(DisplayErrorStyle("Veuillez rentrez une adresse mail"))

    if (passwordRegister.value === "")
        passwordRegister.after(DisplayErrorStyle("Veuillez rentrez votre mot de passe"))

    if (emailRegister.value !== "" && validateTest(emailRegister.value) === 1 && passwordRegister.value !== "")
        Register(inpuUsers)

}


let Register = function (user) {

    let person = {
        email: user.email.value,
        password: user.password.value,
    }

    ajaxRequest("./index.php/?action=switchConnexion&connect", person)
        .then(function (value) {
            console.log(value)
            if (value.msg)
                document.querySelector("#validate").after(DisplayErrorStyle(value.msg))
            if (value.userConnect === "yes") {
                switchConnexion("connect",value.is_admin)
                closeModal().then(() => {
                    notyNotif(value.msg)
                })
            }
        })
    //.catch(value => console.log(value))
}
