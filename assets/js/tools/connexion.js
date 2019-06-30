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
            if (value.msg)
                document.querySelector("#validate").after(DisplayErrorStyle(value.msg))
            if (value.userConnect === "yes") {
                closeModal().then(() => {
                    if (value.user.is_confirm === 1) {
                        notyNotif(value.msg)
                        switchConnexion("connect", value.is_admin, value.email)
                    } else {

                        for (let e in value.user){
                            console.log(value.user[e])
                        }


                        callModal(
                            `
                <div class="modal-content">
                    <div>
                    
                    </div>
                    <span><i class="fas fa-times"></i></span>
                </div>
            `
                        )
                    }

                })
            }
        })
    //.catch(value => console.log(value))
}
