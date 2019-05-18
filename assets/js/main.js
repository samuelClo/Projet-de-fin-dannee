////////////////registration
function registrationClick() {

    if (document.querySelector("[data-size=desktop] .connexion")) {
        document.querySelector("[data-size=desktop] .connexion").addEventListener("click", function () {
            callModal(`
    <div class="modal-content">
        <div class="modal-header">
            <span class="close"> &times; </span>
            <h2>Se connecter</h2>
        </div>
        <div class="modal-body">
               <input placeholder="Email..." id="email" name="email" type="email" value="sam@sam.fr">
                <input placeholder="Mot de passe..." id="password" name="password" type="password" value="123456789">
                <button id="validate" class="btn bcgGreen">Valider</button>
        </div>
    </div>
`, "connexion")
            document.body.style.overflow = "hidden"
        })
    }
    if (document.querySelector("[data-size=smartphone] .connexion")) {
        document.querySelector("[data-size=smartphone] .connexion").addEventListener("click", function () {
            callModal(`
    <div class="modal-content">
        <div class="modal-header">
            <span class="close"> &times; </span>
            <h2>Se connecter</h2>
        </div>
        <div class="modal-body">
               <input placeholder="Email..." id="email" name="email" type="email" value="sam@sam.fr">
                <input placeholder="Mot de passe..." id="password" name="password" type="password" value="123456789">
                <button id="validate" class="btn bcgGreen">Valider</button>
        </div>
    </div>
`, "connexion")

        })
    }

///////deconnexion
    if (document.querySelector(".disconnection")) {
        document.querySelector(".disconnection").addEventListener("click", function () {
            ajaxRequest("./index.php/?action=switchConnexion&disconnection")
                .then(function (value) {
                    notyNotif(value.msg)
                    switchConnexion("disconnect")
                })
                .catch(function () {
                    console.log("probleme lors de l'enregistrement")
                })
        })

    }
}

registrationClick()

let navSmartphone = document.querySelector(".navSmartphone")

function burgerMenuOpen() {
    navSmartphone.classList.remove("navSmartphoneClose")
    navSmartphone.classList.add("navSmartphoneActive");
}

function burgerMenuClose(){
    navSmartphone.classList.add("navSmartphoneClose");
    navSmartphone.addEventListener("animationend",function () {
        navSmartphone.classList.remove("navSmartphoneActive")
    })
}

document.querySelector("#burger").addEventListener("click", burgerMenuOpen)
document.querySelector(".navsmartphone[data-size=smartphone]  span").addEventListener("click", burgerMenuClose)








