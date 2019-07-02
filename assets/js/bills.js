let state
let info = document.createElement("h1")
info.id = "info"
info.innerText = "Aucune facture a afficher"

let openPDF = function (pdfPicture) {
    pdfPicture.forEach(function (e) {
        e.addEventListener("click", function () {
            callModal(
                `
                <div class="modal-content">
                    <div id="example1"></div>
                    <span><i class="fas fa-times"></i></span>
                </div>
            `
            )
            document.querySelector('.modal-content span').classList.add("modalSpanBill")
            PDFObject.embed(`./assets/file/bills/${e.getAttribute("data-bill")}`, "#example1")
            document.querySelector("body").style.overflowY = "hidden"
            document.querySelector(".modal-content").addEventListener("click", function () {
                closeModal()
            })
        })
    })
}


function cleanAll (state) {

    if (window.matchMedia("(min-width: 870px)").matches && state === 2 ) {

        if (document.querySelector(".rowBill").style.display === "none") {
            document.querySelector(".rowBill").style.display = "flex"
        }
        document.querySelectorAll("#billContent > div").forEach(function (e) {
            if (e.getAttribute("data-state") === "2")
                nodeDelete(e)
        })

    } else if (window.matchMedia("(max-width: 870px)").matches && state === 1 ) {

        if (document.querySelector(".rowBill").style.display === "flex") {
            document.querySelector(".rowBill").style.display = "none"
        }

        document.querySelectorAll("#billContent > div").forEach(function (e) {
            if (e.getAttribute("data-state") === "1")
                nodeDelete(e)
        })
    }
}

let createBill = function (infoElement) {
    if (window.matchMedia("(min-width: 870px)").matches && state === 2 ) {
        cleanAll(2)
    }else if (window.matchMedia("(max-width: 870px)").matches && state === 1 ) {
        cleanAll(1)
    }



    infoElement.forEach(function (e) {


        let rowBill = document.createElement("div")

        rowBill.setAttribute("data-billId", e.id)

        if (window.matchMedia("(min-width: 870px)").matches) {
            rowBill.setAttribute("data-state",1)
            state = 1
            rowBill.classList.add("rowBill")
            rowBill.innerHTML = `
                <div class="infoBill">N°${e.name}</div>
                <div class="infoBill">${e.services}</div>
                <div class="infoBill">${e.price}€</div>
                <div class="infoBill">${e.date}</div>
                <div class="infoBill">
                    <a href="${e.id}">
                        <img  src="assets/pictures/arrow-left.svg" alt="payer la facture">
                    </a>
                </div>
                <div class="infoBill" >
                    <img class="pctBill" src="assets/pictures/pdf-logo.svg" alt="Prévisualisé la facture" data-bill="${e.file}" >
                </div>`
            console.log(rowBill)
            document.querySelector(".rowBill:first-child").after(rowBill)
        } else {
            state = 2
            document.querySelector(".rowBill:first-child").style.display = "none"
            rowBill.classList.add("rowBillSmartphone")
            rowBill.setAttribute("data-state",2)
            rowBill.innerHTML = `
                 <div class="infoBill">N°${e.name}-${e.services}</div>
                   
                <div class="infoBill">
                    <div class="infobillSmartphone">
                        Montant
                    </div>
                    <div class="infobillSmartphone">
                        ${e.price}€
                    </div>              
                </div>
                <div class="infoBill">
                    <div class="infobillSmartphone">
                        Date
                    </div>
                    <div class="infobillSmartphone">
                        ${e.date}
                    </div>              
                </div>
                <div class="infoBill">
                    <div class="infobillSmartphone">
                        Payer
                    </div>
                    <div class="infobillSmartphone">
                        <a href="${e.id}">
                            <img src="assets/pictures/arrow-left.svg" alt="payer la facture">
                        </a>
                    </div>              
                </div>
                <div class="infoBill">
                    <div class="infobillSmartphone">
                        Prévisualiser
                    </div>
                    <div class="infobillSmartphone">       
                      <a href="./assets/file/bills/${e.file}"  download>             
                        <img src="assets/pictures/pdf-logo.svg" alt="Prévisualisé la facture" data-bill="${e.file}" >   
                      </a>                 
                    </div>              
                </div>
             `
            console.log(rowBill)
            document.querySelector("#billContent").appendChild(rowBill)
        }
    })
    openPDF(document.querySelectorAll(".pctBill"))
}

let billsRecup = function () {
    ajaxRequest("index.php?action=bill")
        .then((data) => {
            if (data.length === 0 ){
                document.querySelector(".rowBill:first-child").style.display = "none"
                document.querySelector(".rowBill:first-child").after(info)
            }
            else{
                nodeDelete(document.querySelector("#info"))
                document.querySelector(".rowBill:first-child").style.display = "flex"
                createBill(data)
                window.addEventListener('resize', function () {
                    if (window.matchMedia("(min-width: 870px)").matches && state === 2 )
                        createBill(data)
                     else if (window.matchMedia("(max-width: 870px)").matches && state === 1 )
                        createBill(data)
                })
            }
        })
        .catch( ()=> { document.querySelector(".rowBill:first-child").style.display = "none"
             document.querySelector(".rowBill:first-child").after(info)})



}
billsRecup()





