let ajaxRequest = function (pathToPhpTraitement, objectToSend) {

    return new Promise(function (resolve, reject) {

        let initFetch = {
            headers: new Headers(),
        }

        if (objectToSend !== null) {
            initFetch.body = JSON.stringify(objectToSend)
            initFetch.method = 'POST'
        }

        fetch(pathToPhpTraitement, initFetch)

            .then((res) => {
                return res.json()
            })
            .then((data) => {
                console.log(data)
                resolve(data)
            })
            .catch((data) => {
                reject(`echec de la requete : ${data}`)
            })

    })

}
let notyNotif = function (textContent) {

    new Noty({
        text: textContent,
        timeout: 2000,
        layout: 'centerRight'
    }).show()

}

function validateEmail(email) {
    let re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validateSubject(email) {

    if (validateEmail(email)) {
        return 1
    } else {
        return 0
    }
}

function DisplayErrorStyle(text) {
    let errorDisplay = document.createElement("span")
    errorDisplay.classList.add("errorDisplay")
    errorDisplay.innerText = text
    return errorDisplay
}

function nodeDelete(node,foreach) {
    if (node){
        if (foreach === 1 && typeof node === "array" || foreach === 1 && typeof node === "object" ){
            console.log(node)
            node.forEach(function (e) {
                e.parentNode.removeChild(e)
            })
        }else {
            node.parentNode.removeChild(node)
        }
    }
}




