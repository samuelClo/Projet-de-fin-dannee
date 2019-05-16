let switchConnexion = function (type, is_admin) {

    let link = document.createElement("a")

    let navbar = document.querySelector('header nav')
    let etat = document.querySelector('.switchConnexion')

    if (type === "connect") {

        if (is_admin === "1") {
            link.innerText = "Espace admin"
            link.href = "index.php?page=admin"
            navbar.appendChild(link)
            link = document.createElement("a")
        }
        link.classList.add("disconnection")
        link.innerText = "déconnexion"
    } else if (type === "disconnect") {
        console.log(link)
        if (document.querySelector('a[href="index.php?page=admin"]'))
            navbar.removeChild(document.querySelector('a[href="index.php?page=admin"]'))
        link.classList.add("connexion")
        link.innerText = "connexion"
    }
    link.classList.add("switchConnexion")
    link.href = "#"
    navbar.replaceChild(link, etat)
    ////// besoin d'update les addevent click sur class switchConnexion
    registrationClick()

}

let linkSwitchConnexion = function () {

}
