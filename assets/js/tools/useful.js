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
        text:textContent,
        timeout:2000,
        layout:'centerRight'
    }).show()

}




