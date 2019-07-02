let regularInputCheck = function () {

    const emailRegister = document.querySelector('#email')
    const passwordRegister = document.querySelector('#password')

    let inpuUsers = {
        email: emailRegister,
        password: passwordRegister,
    }

    if (emailRegister.value !== "" && validateSubject(emailRegister.value) !== 1)
        emailRegister.after(DisplayErrorStyle(" Veuillez rentrer une adresse mail valide "))

    if (emailRegister.value === "")
        emailRegister.after(DisplayErrorStyle("Veuillez rentrez une adresse mail"))

    if (passwordRegister.value === "")
        passwordRegister.after(DisplayErrorStyle("Veuillez rentrez votre mot de passe"))

    if (emailRegister.value !== "" && validateSubject(emailRegister.value) === 1 && passwordRegister.value !== "")
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
                    if (value.user.is_confirm === "1") {
                        notyNotif(value.msg)
                        switchConnexion("connect", value.user.is_admin, value.user.email)
                    } else {
                        callModal(`
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span class="close"><i class="fas fa-times"></i></span>
                                    <h1>Veuillez confirmez vos informations :</h1>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <li> Prénom : ${value.user["firstname"]} </li>
                                        <li> Nom : ${value.user["name"]} </li>
                                        <li> Email : ${value.user["email"]} </li>
                                        <li> Adresse : ${value.user["address"]} </li>
                                        <li> Date de naissance : ${value.user["birthday"]} </li>
                                        <li> Téléphone : ${value.user["phone"]} </li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                <button id="infoConfirm" class="btn bcgGreen">
                                    Valider
                                </button>
                                <button id="infoMofidy" class="btn bcgGreen">
                                    Modifier ses informatrions
                                </button>
                                </div>
                            </div>
                            `)
                        document.querySelector("#infoConfirm").addEventListener("click", () =>
                            ajaxRequest("index.php?action=infoConfirm")
                                .then( (data) => {
                                    closeModal().then(() => {
                                        notyNotif(data.msg)
                                        switchConnexion("connect", value.user.is_admin, value.user.email)
                                    })
                                })
                        )
                        document.querySelector("#infoMofidy").addEventListener("click", function(){
                            document.location.href="index.php?page=contact&modifyinfo"
                        })




                    }
                })
            }
        })
}
