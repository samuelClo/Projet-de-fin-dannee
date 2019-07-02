
<div class="indexMainPicture"></div>
<main>
    <div class="indexPresentationVE">
        <h1>La commune de Vielle-Eglises-En-Yvelines </h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non purus rhoncus, euismod purus et, rutrum
            mauris. Suspendisse tincidunt elit in eros maximus, a fermentum mauris mattis. Curabitur sodales sapien vel
            eros lobortis, eget vehicula turpis iaculis. Donec luctus nisi tincidunt quam posuere accumsan. Proin
            porttitor eu purus a eleifend. Nam tincidunt dictum augue, in scelerisque nunc convallis vel. Quisque tortor
            risus, dignissim commodo vehicula eu, gravida eget ligula. Sed non magna erat. Etiam lorem mi, vehicula ac
            neque eu, egestas rhoncus metus. Integer hendrerit ultricies porttitor. Donec lacinia id ex quis interdum.
            Maecenas et purus in elit iaculis ultrices sit amet sit amet enim. Integer vel ligula arcu. Nam congue ac
            enim sit amet ultricies.
        </p>
    </div>

    <div class="indexLastArticles">
        <h3>Dernier articles : </h3>
        <section id="slider">

            <?php $y =0 ?>
            <?php for ($i = -2 ;  $i <= 2; $i++ ) :?>
                <?php if (isset($events[$y])): ?>
                <div data-imagePosition="<?=$i?>" id="slide1" class="sliderImage" style="background-image: url('./assets/pictures/events/<?=$events[$y]['title_picture']?>') ; ">
                    <div class="titlePictureCarr"><?=$events[$y]['title']?></div>
                    <div class="descriptionPictureCarr"> <?=$events[$y]['description']?></div>
                    <a href="index.php?page=event&eventId=<?=$events[$y]['id']?>">lien vers l'article</a>
                </div>
                <?php else: ?>
                <span class="error">aucun événement</span>
                <?php endif ?>
                <?php $y++?>
            <?php endfor ?>


        </section>
        <div class="sliderCheckBox">
            <div data-checkboxAlias="-2" class="checkBox"></div>
            <div data-checkboxAlias="-1" class="checkBox"></div>
            <div data-checkboxAlias="0" class="checkBox"></div>
            <div data-checkboxAlias="1" class="checkBox"></div>
            <div data-checkboxAlias="2" class="checkBox"></div>
        </div>

        <div class="flexEnd">
            <a href="index.php?page=events">
                <button class="btn bcgGreen"> Voir plus d'article</button>
            </a>
        </div>
    </div>
</main>









