////////////////registration
function registrationClick(){
    if (document.querySelector(".connexion")) {
        document.querySelector(".connexion").addEventListener("click", function () {
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




