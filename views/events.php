


<main>
    <div id="cuppaDatePicker"></div>
    <h1 class="titleMain">Tous les événement</h1>
    <div id="allEventBox">

    </div>
</main>
<script>

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


</script>





