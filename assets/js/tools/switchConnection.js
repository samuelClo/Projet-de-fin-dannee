let switchConnexion = function (type, is_admin, email){

    let headDesktop = document.querySelector('header[data-size="desktop"] nav ')
    let headSmartphone = document.querySelector('.navSmartphone[data-size="smartphone"] nav')

    let linkAllMenu = `
        <a href="#" id="services">services</a>
        <a href="#" id="information">informations</a>
        <a href="index.php?page=contact" id="contact">contact</a>
        <a href="index.php?page=events" id="events">événements</a>
    `
    let linkDisconnect = `
       ${linkAllMenu} 
        <a href="#" class="connexion switchConnexion">connexion</a>
    `
    let linkConnectNoAdmin = `
        ${linkAllMenu}
        <a href="#" class="disconnection switchConnexion">déconnexion</a>
    `
    let linkConnectAdmin = `
        ${linkAllMenu}
        <a href="index.php?page=bills" id="bill">mes factures</a>
        <a href="#" class="disconnection switchConnexion">déconnexion</a>
        <a href="index.php?page=admin" >Espace admin</a>
    `
    if (type === "connect") {
       // billsRecup()
        if (document.querySelector("#mailContact"))
            document.querySelector("#mailContact").value = email
        if (is_admin === "1"){
            headDesktop.innerHTML = linkConnectAdmin
            headSmartphone.innerHTML = linkConnectAdmin
        }else {
            headDesktop.innerHTML = linkConnectNoAdmin
            headSmartphone.innerHTML = linkConnectNoAdmin
        }
    }else if (type === "disconnect"){
        headDesktop.innerHTML = linkDisconnect
        headSmartphone.innerHTML = linkDisconnect
    }
    // update les addEventListener
    registrationClick()
}


