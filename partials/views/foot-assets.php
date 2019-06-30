
<script type="text/javascript" src="./assets/js/tools/useful.js"></script>

<script type="text/javascript" src="./assets/js/tools/connexion.js"></script>
<script type="text/javascript" src="./assets/js/tools/modal/modal.js"></script>


<script type="text/javascript" src="./assets/js/tools/switchConnection.js"></script>
<script type="text/javascript" src="./assets/js/tools/noty.min.js"></script>

<script src="./assets/js/main.js" type="text/javascript"></script>


<!-- <script type="text/javascript"  src="./assets/js/all-js.php"></script> -->

<script>
//    /** @constructor */
//    function CoordMapType(tileSize) {
//         this.tileSize = tileSize;
//    }
//
//    function initMap() {
//        var myLatLng = {lat: 48.670201128955036, lng: 1.8756501175253106};
//
//        var map = new google.maps.Map(document.getElementById('map'), {
//            zoom: 17,
//            center: myLatLng,
//            mapTypeId:'roadmap',
//            disableDefaultUI: false
//        });
//
//        var marker = new google.maps.Marker({
//            map: map,
//            position: myLatLng,
//            title: 'Vieille-Eglise-En-Yvelines'
//        });
//
//        // Insert this overlay map type as the first overlay map type at
//        // position 0. Note that all overlay map types appear on top of
//        // their parent base map.
//        map.overlayMapTypes.insertAt(
//            0, new CoordMapType(new google.maps.Size(256, 256)));
//    }
//
//</script>

<script> //src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQanKZKLf5wnBK8zkZCpaOvdiX1GP1Je0&callback=initMap"  async defer></script>

<?php if (isset($action))echo $action ?>