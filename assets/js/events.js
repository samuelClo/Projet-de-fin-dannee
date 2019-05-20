let sendDate = function (date, type) {
    let object = {
        date: date,
        type: type,
    }
    console.log(object.date , object.type)
    ajaxRequest('index.php?action=eventList', object)
        .then((data) => {
            createEvent(data.arrayAllEvents)
        })

}



let createEvent = function (array) {
    array.forEach(function (element) {

        let eventBox = document.createElement("div")
        eventBox.classList.add("eventBox")

        eventBox.innerHTML = `
            <div class="eventPicture" style="background-image:url('./assets/pictures/events/${element.title_picture}');"></div>
            <div class="eventContent">
                <h6> ${element.title} </h6>
                <p> ${element.description} </p>
            </div>`

        document.querySelector("#allEventBox").appendChild(eventBox)


    })
}

