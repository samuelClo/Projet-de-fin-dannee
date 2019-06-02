let switchConnexion = function (type, is_admin, email) {

    let link = document.createElement("a")

    let nav = {
        dekstopMenu : document.querySelector('header nav'),
        smartphoneMenu : document.querySelector('.navSmartphone nav')
    }

    let etat = {
        dekstopEtat : document.querySelectorAll('.switchConnexion')[0],
        smartphoneEtat : document.querySelectorAll('.switchConnexion')[1]
    }

    console.log(etat)



    if (type === "connect") {
        if (is_admin === "1") {
            link.innerText = "Espace admin"
            link.href = "index.php?page=admin"


            nav.dekstopMenu.appendChild(link)
            nav.smartphoneMenu.appendChild(link)

            link = document.createElement("a")
        }
        if (document.querySelector("#mailContact"))
            console.log(email)
            document.querySelector("#mailContact").value = email
        link.classList.add("disconnection")
        link.innerText = "déconnexion"
    } else if (type === "disconnect") {
        console.log(link)

        console.log(document.querySelectorAll('a[href="index.php?page=admin"]'))
        if (document.querySelector('a[href="index.php?page=admin"]')){
            nav.smartphoneMenu.removeChild(document.querySelector('a[href="index.php?page=admin"]'))
            nav.dekstopMenu.removeChild(document.querySelector('a[data-idUserx="index.php?page=admin"]'))
        }

        link.classList.add("connexion")
        link.innerText = "connexion"
    }
    link.classList.add("switchConnexion")
    link.href = "#"

    console.log(link)

    nav.dekstopMenu.replaceChild(link,etat.dekstopEtat)

    nav.smartphoneMenu.replaceChild(link,etat.smartphoneEtat)
    ////// besoin d'update les addevent click sur class switchConnexion
    registrationClick()

}


