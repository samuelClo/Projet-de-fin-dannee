let billsRecup = function () {
    ajaxRequest("index.php?action=bill")
        .then((data) => {

            data.forEach(function (e) {
                let rowBill = document.createElement("div")
                rowBill.classList.add("rowBill")
                rowBill.setAttribute("data-billId",e.id)

                rowBill.innerHTML = `
                   <div class="infoBill">N°${e.name}</div>
                <div class="infoBill">${e.services}</div>
                <div class="infoBill">${e.price}€</div>
                <div class="infoBill">${e.date}</div>
                <div class="infoBill">
                    <a href="${e.id}">
                        <img src="assets/pictures/arrow-left.svg" alt="payer la facture">
                    </a>
                </div>
                <div class="infoBill" ><img  src="assets/pictures/pdf-logo.svg" alt="Prévisualisé la facture" data-bill="${e.file}" ></div>`

                
                document.querySelector(".rowBill:first-child").after(rowBill)
            })

            document.querySelectorAll(".infoBill img").forEach(function (e) {
                e.addEventListener("click",function () {
                

                    console.log(e.getAttribute("data-bill"))

                    callModal(
                        `
                            <div class="modal-content">
                                <div id="example1"></div>
                                <span><i class="fas fa-times"></i></span>
                            </div>
                        `

                    )
                    PDFObject.embed(`./assets/file/bills/${e.getAttribute("data-bill")}`, "#example1")
                    document.querySelector("body").style.overflowY = "hidden"
                        document.querySelector(".modal-content").addEventListener("click",function () {
                            closeModal()
                        })


                    
                    

                })
            })

        })
}
billsRecup()