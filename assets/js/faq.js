document.querySelectorAll(".collapsible").forEach(function (e) {
    e.addEventListener("click", function() {
        this.classList.toggle("active")
        let content = this.nextElementSibling
        if (content.style.maxHeight){
            content.style.maxHeight = null
        } else {
            content.style.maxHeight = content.scrollHeight + "px"
        }
    });
})

