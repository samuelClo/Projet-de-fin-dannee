
let contactSector = document.querySelector("#contactSectors")

contactSector.addEventListener("change", function (e) {
    if (contactSector.value !== 1000 ){
        ajaxRequest(`index.php?action=contact&sector_id=${contactSector.value}`,contactSector.value)
            .then((data)=> {
                if (data.length === 0){
                    let textError = document.createElement("span")
                    textError.style.color = "whithe"
                    textError.innerText = "aucun test en lien avec ce secteur"
                    document.querySelector('#containSelect').insertBefore(textError, contactSector.nextSibling)
                }else{
                    testSelect = document.createElement("select")
                    testSelect.id = "contactSectors"
                    data.forEach(function (test) {
                        let option = document.createElement("option")
                        option.setAttribute("value",test['id'])
                        option.innerText = test['name']
                        testSelect.appendChild(option)
                    })
                    document.querySelector('#containSelect').insertBefore(testSelect, contactSector.nextSibling)
                    console.log(testSelect)
                }




            })
    }

})