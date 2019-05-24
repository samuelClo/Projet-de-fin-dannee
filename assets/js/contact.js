
let contactSector = document.querySelector("#contactSectors")

contactSector.addEventListener("change", function (e) {
    ajaxRequest(`index.php?action=contact&sector_id=${contactSector.value}`,contactSector.value)
})