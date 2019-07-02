<!--<pre>-->
<!--   --><?php //var_dump($event); ?>
<!--</pre>-->

<main>
    <a class="backPrev" href="javascript:history.go(-1)" title="Retour a la liste des événements"><i class="fas fa-arrow-circle-left"></i></a>
    <h1><?=$event['title']?></h1>
    <div class="eventBox">
        <img class="eventPicture" src="./assets/pictures/events/<?=$event['title_picture']?>" alt="<?=$event['title']?>">
        <div class="eventText">
            <p>
                <?=$event["content"]?>
            </p>
            <span id="dateEvent"><?=$event["posted_at"]?></span>
        </div>
    </div>
    <h2>Galerie d'image</h2>
    <div class="allEventPictureBox">
        <div class="allEventPicture">
            <h3>titre de la photo</h3>
            <div style="background-image: url('https://picsum.photos/200')"></div>
        </div>
        <div class="allEventPicture">
            <h3>titre de la photo</h3>
            <div style="background-image: url('https://picsum.photos/200')"></div>
        </div>
        <div class="allEventPicture">
            <h3>titre de la photo</h3>
            <div style="background-image: url('https://picsum.photos/200')"></div>
        </div>
        <div class="allEventPicture">
            <h3>titre de la photo</h3>
            <div style="background-image: url('https://picsum.photos/200')"></div>
        </div>
        <div class="allEventPicture">
            <h3>titre de la photo</h3>
            <div style="background-image: url('https://picsum.photos/200')"></div>
        </div>
        <div class="allEventPicture">
            <h3>titre de la photo</h3>
            <div style="background-image: url('https://picsum.photos/200')"></div>
        </div>
        <div class="allEventPicture">
            <h3>titre de la photo</h3>
            <div style="background-image: url('https://picsum.photos/200')"></div>
        </div>
        <div class="allEventPicture">
            <h3>titre de la photo</h3>
            <div style="background-image: url('https://picsum.photos/200')"></div>
        </div>
    </div>
</main>


