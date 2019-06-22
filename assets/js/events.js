// appel de sendDate dans cuppa-calendar.js

let sendDate = function (date, type) {

    let object = {
        date: date,
        type: type,
    }

    ajaxRequest('index.php?action=eventList', object)
        .then((data) => {
            createEvent(data)
        })
}

let createEvent = function (array) {

    let allEventBox = document.querySelector("#allEventBox")
    while (allEventBox.firstChild) {
        allEventBox.removeChild(allEventBox.firstChild);
    }
    if (array.length === 0 ){
        allEventBox.innerText = "Pas d'événement a cette date là"
    }

    array.forEach(function (element) {

        let eventBox = document.createElement("div")
        eventBox.classList.add("eventBox")

        eventBox.innerHTML = `
            <div class="eventPicture" style="background-image:url('./assets/pictures/events/${element.title_picture}');"></div>
            <div class="eventContent">
                <div>
                    <h3> ${element.title} </h3>
                </div>
 
                <p> ${element.description} </p>
                <a href="index.php?page=event&eventId=${element.id}">Lire plus</a>
            </div>`

        allEventBox.appendChild(eventBox)

    })
}


sendDate(null, 'allEvents')

