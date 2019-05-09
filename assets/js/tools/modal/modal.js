let modal

let closeModal = function () {
   let animationModalFinish = new Promise (function (resolve, reject){
       modal.classList.add("fadeOutBackground")
       document.querySelector('.modal-content').style.animationName = "animateBottom"
       document.body.style.overflow = "visible"
       document.querySelector('.modal-content').addEventListener("animationend",function () {
           document.body.removeChild(modal)
           resolve()
       })
    })

    return animationModalFinish

}

let callModal = function (htmlModal, action) {
    modal = document.createElement("div")

    modal.id = "myModal"
    modal.className = "modal"

    modal.innerHTML = htmlModal
    document.body.prepend(modal);

    if (document.querySelector(".close"))
        document.querySelector(".close").addEventListener("click", function () {
            closeModal()
        })

    if (document.getElementById("connexion"))
        document.getElementById("connexion").addEventListener("click", function () {
            modal.style.display = "block";
            document.body.style.overflow = "hidden"
        })

    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal()
        }
    }


    if (action === "connexion")
        document.querySelector("#validate").addEventListener("click", function () {

            document.querySelectorAll('.errorDisplay').forEach(function (item) {
                item.innerText = ""
            })
            alert.innerText = ""
            regularInputCheck()
        })
}








