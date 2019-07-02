let contactSector = document.querySelector("#contactSectors")
let containSelect = document.querySelector("#containSelect")
let containMessage = document.querySelector("#containMessage")
let stateValue
let input

let  subjectSelect = document.createElement("select")

//state = etat de mise en page, state1 étant l'etat  de base

let state2 = function () {
    containMessage.style.visibility = "visible"
    containMessage.style.display = "block"
    containSelect.style.width = "50%"
    document.querySelectorAll("#containSelect select").forEach(function (element) {
        element.style.width = "80%"
    })
    stateValue = 2
}
let state3 = function () {
    containMessage.style.display = "block"
    containMessage.style.visibility = "hidden"
    stateValue = 3
}

if (contactSector) {
    contactSector.addEventListener("change", function (e) {
        if (stateValue === 2)
            state3()
        if (contactSector.value === "5"){
            createMesssage(null,1)
        }else{
            ajaxRequest(`index.php?action=contact&sector_id=${contactSector.value}`, contactSector.value)
                .then((data) => {
                    if (document.querySelector("#contactsubject option[value]")){
                        nodeDelete(document.querySelectorAll("#contactsubject option"),1)
                    }
                    createMesssage(data)
                })
        }


    })
}


let createMesssage = function (data,action){
    let contactsubject = document.querySelector("#contactsubject")

    if (contactsubject)
        containSelect.removeChild(contactsubject)
    if (document.querySelector("#containSelect span"))
        containSelect.removeChild(document.querySelector("#containSelect span"))
    if (document.querySelector("#containSelect input"))
        containSelect.removeChild(document.querySelector("#containSelect input"))



    if (data !== null && data.length === 0 ) {
        let textError = document.createElement("span")
        textError.style.color = "white"
        textError.innerText = "aucun subject en lien avec ce secteur"
        containSelect.insertBefore(textError, contactSector.nextSibling)

    } else {

        if (action ){

            input = document.createElement("input")
            input.setAttribute("type", "text")
            input.setAttribute("placeholder", "votre sujet :")
            containSelect.insertBefore(input, contactSector.nextSibling)


        }else{
            subjectSelect.id = "contactsubject"
            let option = document.createElement("option")
            option.innerText = "sujet"
            subjectSelect.appendChild(option)


            data.forEach(function (subject) {
                let option = document.createElement("option")
                option.setAttribute("value", subject['id'])
                option.innerText = subject['name']
                subjectSelect.appendChild(option)
            })
            containSelect.insertBefore(subjectSelect, contactSector.nextSibling)
        }

        if (stateValue === 3) {
            document.querySelectorAll("#containSelect select").forEach(function (element) {
                element.style.width = "80%"
            })
        }
        let titleMessage = document.querySelector("#titleMessage")

        if (input !== undefined) {
            input.addEventListener("change",function(){
                titleMessage.innerText =  this.value
                state2()
            })
        }


        subjectSelect.addEventListener("change", function () {

            let textOption = document.querySelector(`#contactsubject option[value="${subjectSelect.value}"]`).innerText
            titleMessage.innerText = textOption
            state2()
            document.querySelector("#story").focus()
        })
    }
}

if (document.querySelector("#containMessage button")) {
    document.querySelector("#containMessage button").addEventListener("click", function () {

        let email = document.querySelector("#mailContact")
        let content = document.querySelector("#content")

        // vide les erreur du formulaire
        document.querySelectorAll('.errorDisplay').forEach(function (item) {
            item.innerText = ""
        })

        if (email.value === "")
            email.after(DisplayErrorStyle('Veuilliez rentrer un email'))
        else if (validateSubject(email.value) !== 1) {
            email.after(DisplayErrorStyle(" Veuillez rentrer une adresse mail valide "))
        }

        if (content.value.trim() === "")
            content.after(DisplayErrorStyle('Veuilliez rentrer un message'))
        if (email.value !== "" && validateSubject(email.value) === 1 && content.value.trim() !== "") {
            let messageContent = {
                subjectId: document.querySelector("#titleMessage").innerText,
                email: document.querySelector("#mailContact").value,
                content: document.querySelector("#content").value
            }
            ajaxRequest("index.php?action=send-message", messageContent)
                .then((data) => {
                    if (data.sendMessage === 1) {
                        notyNotif("Message envoyer")
                        state3()
                        document.querySelector("#content").value = ""
                    } else {
                        notyNotif("Echec de l'envoi du message")
                    }
                })
                .catch((data) => {
                    notyNotif("Echec de l'envoi du message")
                })
        }
    })
}







