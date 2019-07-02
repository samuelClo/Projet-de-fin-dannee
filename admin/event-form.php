<?php
$messages = array();
$destinationPicture = './../assets/pictures/events/';

if (isset($_FILES['title_picture']) && $_FILES['title_picture']['error'] === 0) {


    $allowed_extensions = array('jpg','png','gif');



    $my_file_extension = pathinfo($_FILES['title_picture']['name'], PATHINFO_EXTENSION);

    var_dump($allowed_extensions);


    if (in_array($my_file_extension, $allowed_extensions)) {

        do {
            $new_file_name = time() . rand();

            $titlePicture = $new_file_name . '.' . $my_file_extension;

            $destination = $destinationPicture . $titlePicture;

        } while (file_exists($destination));

    } else {
        $messages['error'] = "Fichiers non autorisé";
    }
}

if (isset($_POST['save'])) {
    // var_dump($_POST);


    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $postedAt = $_POST['posted_at'];
    $is_published = intval($_POST['is_published']);


    if (empty($_POST['title'])) {
        $messages['title'] = 'le nom est obligatoire';
    }
    if (empty($_POST['posted_at'])) {
        $messages['posted_at'] = 'la date de publication est obligatoire';
    }
    if (empty($_POST['content'])) {
        $messages['content'] = 'le contenu de l\'événement est obligatoire';
    }
    if (empty($_FILES['title_picture'])) {
        $messages['title_picture'] = 'L\'image principale est obligatoire';
    }

    //var_dump($titlePicture);


    if (empty($messages)) {


        $query = $db->prepare('
        INSERT INTO events
        (title, description, content, posted_at, is_published, title_picture)
        VALUES (?, ?, ?, ?, ?, ?)');

        $newEvent = $query->execute(
            [
                htmlspecialchars($_POST['title']),
                htmlspecialchars($_POST['description']),
                htmlspecialchars($_POST['content']),
                htmlspecialchars($_POST['posted_at']),
                ctype_digit($_POST['is_published']),
                $titlePicture
            ]
        );

        move_uploaded_file($_FILES['title_picture']['tmp_name'], $destination);

        //redirection après enregistrement
        //si $newevent alors l'enregistrement a fonctionné


        if ($newEvent) {
            $_POST = null;
            header('location:index.php?page=event-form');
            exit;
        } else { //si pas $newevent => enregistrement échoué => générer un message pour l'administrateur à afficher plus bas
            $message = "Impossible d'enregistrer le nouvel event...";
        }
    }
//    if (empty($_POST['content'])) {
//        $messages['content'] = 'le contenu de l\'événement est obligatoire';
//    }


} else if (isset($_GET["event_id"], $_GET["action"]) && $_GET["action"] == "edit") {

    $queryEvent = $db->prepare('SELECT * FROM events WHERE id = ?');
    $selectEvent = $queryEvent->execute([$_GET["event_id"]]);
    $event = $queryEvent->fetch();

    $title = $event['title'];
    $description = $event['description'];
    $content = $event['content'];
    $postedAt = $event['posted_at'];
    $isPublished = intval($event['is_published']);

    $image = $event['title_picture'];

    // echo $image;

    if (isset($_POST['submit'])) {

        var_dump($_POST);

        $title = $_POST['title'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $postedAt = $_POST['posted_at'];
        $is_published = intval($_POST['is_published']);


        if (empty($_POST['title'])) {
            $messages['title'] = 'le nom est obligatoire';
        }
        if (empty($_POST['posted_at'])) {
            $messages['posted_at'] = 'la date de publication est obligatoire';
        }
        if (empty($_POST['content'])) {
            $messages['content'] = 'le contenu de l\'événement est obligatoire';
        }
//        if (empty($_FILES['title_picture']['name'])) {
//            $messages['title_picture'] = 'L\'image principale est obligatoire';
//        }

        if (empty($messages)) {


            if (isset($_FILES['title_picture']) && $_FILES['title_picture']['error'] === 0) {
                echo $destinationPicture . $titlePicture;
                unlink($destinationPicture . $image);
                $image = $titlePicture;
            }


            $query = $db->prepare('UPDATE events SET title = ?, description = ?,  content = ?, posted_at= ?, is_published= ?, title_picture= ? WHERE id = ? ');
            $result = $query->execute(
                [
                    $_POST['title'],
                    $_POST['description'],
                    $_POST['content'],
                    $_POST['posted_at'],
                    intval($_POST['is_published']),
                    $image,
                    $_GET["event_id"]
                ]
            );

            move_uploaded_file($_FILES['title_picture']['tmp_name'], $destination);

            $msg = '<div class="bg-success text-white p-2 mb-4">Modification effectuer.</div>';

        }
    }
}


?>

<header class="pb-3">

    <?php if (isset($msg)) : ?>
        <?= $msg ?>
    <?php endif; ?>

    <h4>

        <?php if (isset($_GET["picture_id"], $_GET["action"]) && $_GET["action"] == "edit"): ?>
            <?php echo "Modifier une facture"; ?>
        <? else: echo "Ajouter une facture"; ?>
        <?php endif; ?>


    </h4>
</header>

<?php if (isset($message)): //si un message a été généré plus haut, l'afficher ?>
    <div class="bg-danger text-white">
        <?= $message; ?>
    </div>
<?php endif; ?>

<form action="<?php if (isset($_GET["event_id"], $_GET["action"]) && $_GET["action"] == "edit") : ?>
                         <?php echo './index.php?page=event-form&event_id=' . $_GET["event_id"] . '&action=edit'; ?>
                          <?php else: ?>./index.php?page=event-form<?php endif; ?>"
      method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Titre :</label>
        <input class="form-control" type="text" placeholder="Titre" name="title" id="title"
               value="<?php if (isset($title)) : ?><?= $title; ?><?php endif; ?>"/>
        <?php if (!empty($messages['title'])) : ?>
            <?= $messages['title'] ?>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="summary">Déscription :</label>
        <input class="form-control" value="<?php if (isset($description)) : ?> <?= $description ?> <?php endif; ?>"
               type="text" placeholder="description" name="description" id="description"/>
    </div>
    <div class="form-group">
        <label for="content">Contenu :</label>
        <textarea class="form-control" name="content" id="content"
                  placeholder="Contenu"><?php if (isset($content)) : ?><?= $content; ?><?php endif; ?></textarea>
    </div>

    <div class="form-group">
        <label for="published_at">Date de publication :</label>
        <input class="form-control" type="date" placeholder="" name="posted_at" id="posted_at"
               value="<?php if (isset($postedAt)) : ?><?= $postedAt; ?><?php endif; ?>"/>
        <?php if (!empty($messages['posted_at'])) : ?>
            <?= $messages['posted_at']; ?>
        <?php endif; ?>
    </div>

    <?php if (!empty($messages['category_id'])) : ?>
        <?= $messages['category_id']; ?>
    <?php endif; ?>

    <div class="form-group">
        <label for="image">Image :</label>
        <input class="form-control" type="file" name="title_picture" id="image"/>
        <?php if (!empty($messages['title_picture'])) : ?>
            <?= $messages['title_picture']; ?>
        <?php endif; ?>

        <?php if (!empty($messages['error'])) : ?>
            <?= $messages['error']; ?>
        <?php endif; ?>


        <?php if (isset($destination)) : ?>
            <img class="img-fluid py-4" src='<?= $destination; ?>' alt=" <?= $title; ?>"/>
        <?php endif; ?>
    </div>


    <div class="form-group">
        <label for="is_published"> Publié ?</label>
        <select class="form-control" name="is_published" id="is_published">

            <option value="0" <?php if (isset($is_published) && $is_published == 0): ?><?php echo 'selected' ?><?php endif ?> >
                Non
            </option>
            <option value="1" <?php if (isset($is_published) && $is_published == 1): ?><?php echo 'selected' ?><?php endif ?> >
                Oui
            </option>


        </select>
    </div>


    <div class="text-right">
        <?php if (isset($_GET["event_id"], $_GET["action"]) && $_GET["action"] == "edit") : ?>
            <input class="btn btn-success" type="submit" name="submit" value="Changer l'événement"/>
        <?php else: ?>
            <input class="btn btn-success" type="submit" name="save" value="Enregistrer"/>
        <?php endif; ?>


    </div>
</form>


