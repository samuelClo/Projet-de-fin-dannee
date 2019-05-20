let cal = null;
window.onload = function () {
    cal2 = new WinkelCalendar({
        container: 'cuppaDatePicker',
        bigBanner: true,
        defaultDate: Date(),
        format: "DD-MM-YYYY",
        onSelect: onDateChange
    });
}



function onDateChange(date) {
    document.getElementById('container2').innerHTML = date;
}



let sendDate = function (date, type) {
    let object = {
        date: date,
        type: type,
    }
    console.log(object.date)
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

