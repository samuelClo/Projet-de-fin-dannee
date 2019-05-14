////////////////registration
function registrationClick() {

    if (document.querySelector(".connexion")) {
        document.querySelector(".connexion").addEventListener("click", function () {
            console.log("ehheh")
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


function burgerMenu() {
    console.log(this)
    navSmartphone = document.createElement("div")
    navSmartphone.innerHTML = `

        <nav>
        <a href="#" id="bill">mes factures</a>
    <a href="#" id="services">services</a>
        <a href="#" id="information">informations</a>
        <a href="index.php?page=events" id="events">événements</a>
    <?php if (isset($_SESSION['user'])) : ?>
<a href="#" class="disconnection switchConnexion">déconnexion</a>
    <?php else : ?>
<a href="#" class="connexion switchConnexion">connexion</a>
    <?php endif; ?>
<?php if (isset($_SESSION['user']['is_admin']) && $_SESSION['user']['is_admin'] == 1): ?>
<a href="index.php?page=admin" >Espace admin</a>
    <?php endif; ?>
<a href="#" id="contact">contact</a>
        </nav>`
    navSmartphone.classList.add("navSmartphone");
    document.querySelector("body").appendChild(navSmartphone)
    navSmartphone.classList.add("navSmartphoneActive");




}

document.querySelector("#burger").addEventListener("click",burgerMenu)








