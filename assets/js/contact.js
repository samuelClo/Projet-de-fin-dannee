let contactSector = document.querySelector("#contactSectors")
let containSelect = document.querySelector("#containSelect")
let containMessage = document.querySelector("#containMessage")
let stateValue

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

        ajaxRequest(`index.php?action=contact&sector_id=${contactSector.value}`, contactSector.value)
            .then((data) => {
                let contactTest = document.querySelector("#contactTest")

                if (contactTest)
                    containSelect.removeChild(contactTest)
                if (document.querySelector("#containSelect span"))
                    containSelect.removeChild(document.querySelector("#containSelect span"))

                if (data.length === 0) {
                    let textError = document.createElement("span")
                    textError.style.color = "white"
                    textError.innerText = "aucun test en lien avec ce secteur"
                    containSelect.insertBefore(textError, contactSector.nextSibling)

                } else {

                    testSelect = document.createElement("select")
                    testSelect.id = "contactTest"
                    let option = document.createElement("option")
                    option.innerText = "test"
                    testSelect.appendChild(option)

                    data.forEach(function (test) {
                        let option = document.createElement("option")
                        option.setAttribute("value", test['id'])
                        option.innerText = test['name']
                        testSelect.appendChild(option)
                    })

                    containSelect.insertBefore(testSelect, contactSector.nextSibling)

                    if (stateValue === 3) {
                        document.querySelectorAll("#containSelect select").forEach(function (element) {
                            element.style.width = "80%"
                        })
                    }
                    testSelect.addEventListener("change", function () {
                        let titleMessage = document.querySelector("#titleMessage")
                        titleMessage.setAttribute("data-testId", testSelect.value)
                        let textOption = document.querySelector(`#contactTest option[value="${testSelect.value}"]`).innerText
                        titleMessage.innerText = textOption
                        state2()
                        document.querySelector("#story").focus()
                    })
                }
            })
    })
}


if (document.querySelector("#containMessage button")) {
    document.querySelector("#containMessage button").addEventListener("click", function () {

        let email = document.querySelector("#mailContact")
        let content = document.querySelector("#content")

        document.querySelectorAll('.errorDisplay').forEach(function (item) {
            item.innerText = ""
        })

        if (email.value === "")
            email.after(DisplayErrorStyle('Veuilliez rentrer un email'))
        else if (validateTest(email.value) !== 1) {
            email.after(DisplayErrorStyle(" Veuillez rentrer une adresse mail valide "))
        }

        if (content.value.trim() === "")
            content.after(DisplayErrorStyle('Veuilliez rentrer un message'))
        if (email.value !== "" && validateTest(email.value) === 1 && content.value.trim() !== "") {
            let messageContent = {
                testId: document.querySelector("#titleMessage").getAttribute("data-testId"),
                email: document.querySelector("#mailContact").value,
                content: document.querySelector("#content").value
            }
            ajaxRequest("index.php?action=send-message", messageContent)
                .then((data) => {
                    if (data.sendMessage === 1) {
                        notyNotif("Message envoyer")
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





