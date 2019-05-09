
allCheckBox = document.querySelectorAll(".checkBox")
allSliderImage = document.querySelectorAll(".sliderImage")

let arrayAttribu = []
const tableOrigin = []

let pathToCheckBox = 'url("../assets/pictures/caroussel/check-box.svg")'
let pathToCheckBoxCheck = 'url("../assets/pictures/caroussel/check-box-uncheck.svg")'

let moveTable = function (array, numberToMove) {

    let test = []

    if (numberToMove < 0) {
        numberToMove = numberToMove * -1
        for (let i = 0; i < numberToMove; i++) {
            test.push(array.shift())
        }

        for (let i = 0; i < numberToMove; i++) {
            array.push(test.shift())
        }

    } else {
        for (let i = 0; i < numberToMove; i++) {
            test.push(array.pop())
        }
        for (let i = 0; i < numberToMove; i++) {
            array.unshift(test.shift())
        }
    }
    return array
}


let generateImage = function (action) {

    allSliderImage.forEach(function (sliderImage) {
        let translateLenght = sliderImage.getAttribute("data-imagePosition") * 15
        let perspectivPlacement = sliderImage.getAttribute("data-imagePosition").replace("-", "") * 100
        sliderImage.style.transform = `translate3d(${translateLenght}%, 0, -${perspectivPlacement}px)`
        if (action === "get") {

            tableOrigin.push(sliderImage.getAttribute("data-imagePosition"))
            arrayAttribu.push(sliderImage.getAttribute("data-imagePosition"))
        }
    });

}
generateImage("get")

let decalTable = function (action) {
    let j = 0
    allSliderImage.forEach(function (sliderImage) {
        sliderImage.setAttribute("data-imagePosition", arrayAttribu[j])
        j++
    })
    generateImage()
    if (action !== "auto") {
        for (let i = 0; i < arrayAttribu.length; i++) {
            arrayAttribu[i] = tableOrigin[i]
        }
    }

}

allSliderImage.forEach(function (sliderImage) {
    sliderImage.addEventListener("click", function () {
        sliderImage.getAttribute("data-imagePosition")
        allCheckBox.forEach(function (checkBox) {
            checkBox.setAttribute("checked", "0")
            checkBox.style.background = pathToCheckBox

            if (checkBox.getAttribute("data-checkboxAlias") === sliderImage.getAttribute("data-imagePosition")) {
                checkBox.style.background = 'url("check-box-uncheck.svg")'
                checkBox.setAttribute("checked", "1")
                let test = sliderImage.getAttribute("data-imagePosition")
                arrayAttribu = moveTable(arrayAttribu, test)
                decalTable(arrayAttribu)

                let j = 0
                allSliderImage.forEach(function (sliderImage) {
                    sliderImage.setAttribute("data-imagePosition", arrayAttribu[j])
                    console.log(sliderImage.getAttribute("data-imagePosition"))
                    j++
                })
            }

        })
    })
});

allCheckBox.forEach(function (checkBox) {
    checkBox.setAttribute("checked", "0")
    checkBox.addEventListener("click", function () {
        allCheckBox.forEach(function (checkBox) {
            checkBox.setAttribute("checked", "0")
            checkBox.style.background = pathToCheckBox
        })
        this.style.background = pathToCheckBoxCheck
        this.setAttribute("checked", 1)

        arrayAttribu = moveTable(arrayAttribu, this.getAttribute("data-checkboxAlias"))
        decalTable(arrayAttribu)
    })
});

let defilPicture = function(){

    arrayAttribu = moveTable(arrayAttribu, 1)
    decalTable("auto")
    let j = 0
    allSliderImage.forEach(function (sliderImage) {

        allCheckBox.forEach(function (checkBox) {
            checkBox.setAttribute("checked", "0")
            checkBox.style.background = pathToCheckBox

            if (checkBox.getAttribute("data-checkboxAlias") === sliderImage.getAttribute("data-imagePosition")) {
                checkBox.style.background = pathToCheckBoxCheck
                checkBox.setAttribute("checked", "1")
            }
        });

        j++
    })


}
intervalID = setInterval(defilPicture,5000);



