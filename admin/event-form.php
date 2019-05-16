<?php


if (isset($_FILES['image'] ) && $_FILES['image']['error'] === 0) {

        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

        $my_file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);


        if (in_array($my_file_extension, $allowed_extensions)) {

            do {
                $new_file_name = time() . rand();

                $nameImg = $new_file_name . '.' . $my_file_extension;

                $destination = './../assets/pictures/events/' . $nameImg;

            } while (file_exists($destination));

        } else {
            $messages['error'] = "Fichiers non autorisé";
        }
}

if (isset($_POST['save'])) {
    var_dump($_POST);

    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $posted_at = $_POST['posted_at'];
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

    if (empty($nameImg)) {
        $messages['title_picture'] = 'L\'image principale est obligatoire';
    }


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
                $nameImg
            ]
        );

        move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        //redirection après enregistrement
        //si $newevent alors l'enregistrement a fonctionné

        echo $newEvent;
        if ($newEvent) {
            //redirection après enregistrement
            echo "retrdyfugkjhlm,";
            $_POST = null;
           // header('./index.php?page=event-form');

            exit;
        } else { //si pas $newevent => enregistrement échoué => générer un message pour l'administrateur à afficher plus bas
            $message = "Impossible d'enregistrer le nouvel event...";
        }
    }
//    if (empty($_POST['content'])) {
//        $messages['content'] = 'le contenu de l\'événement est obligatoire';
//    }




} else if (isset($_GET["event_id"], $_GET["action"]) && $_GET["action"] == "edit") {

    $query = $db->prepare('SELECT c.id

                            FROM category c
                            JOIN event_category ac
                            ON ac.category_id = c.id
                            JOIN event a
                            ON a.id = ac.event_id
                            WHERE a.id = ?

                            ');
    $selectevent = $query->execute([$_GET["event_id"]]);
    $categorySelected = $query->fetchAll();


    $queryevent = $db->prepare('SELECT * FROM event WHERE id = ?');
    $selectevent = $queryevent->execute([$_GET["event_id"]]);
    $events = $queryevent->fetch();




    //var_dump($events);

    $title = $events['title'];
    $summary = $events['summary'];
    $content = $events['content'];
    $date = $events['created_at'];
    $image = $events['image'];
    $is_published = intval($events['is_published']);


    if (isset($_POST['submit'])) {

        var_dump($_POST);


        $title = $_POST['title'];
        $summary = trim($_POST['summary']);
        $content = $_POST['content'];
        $date = $_POST['created_at'];



        if (empty($_POST['title'])) {
            $messages['title'] = 'le nom est obligatoire';
        }
        if (empty($_POST['created_at'])) {
            $messages['created_at'] = 'la date est obligatoire';
        }
        if (empty($_POST['category_id'])) {
            $messages['category_id'] = 'le choix de la categorie est obligatoire';
        }

        if (empty($messages)) {
            if (isset($_FILES['image'] ) && $_FILES['image']['error'] === 0) {
                unlink('../img/event/' . $image);
                $image = $nameImg;
            }

            $query = $db->prepare('UPDATE event SET title = ?, created_at = ?,  summary = ?, is_published = ?, content = ?, image= ? WHERE id = ? ');
            $result = $query->execute(
                [
                    $_POST['title'],
                    $_POST['created_at'],
                    $_POST['summary'],
                    $_POST['is_published'],
                    $_POST['content'],
                    $image,
                    $_GET["event_id"]
                ]
            );



            foreach ($_POST["category_id"] as $key => $category) {

                var_dump( $_POST["category_id"][$key]);
                var_dump( $_GET["event_id"]);


                $updateCategory = $db->prepare('UPDATE event_category
                  SET category_id = ?,
                  WHERE event_id = ?
            ');

                $categoryUpdated = $updateCategory->execute(
                    [
                        $_POST["category_id"][$key],
                        $_GET["event_id"],
                        $_GET["event_id"],
                    ]
                );

            }


            $msg = '<div class="bg-success text-white p-2 mb-4">Modification effectuer.</div>';

        }
    }
}
if (isset($_FILES['image']) && $_FILES['image']['error'] === 0){
    move_uploaded_file($_FILES['image']['tmp_name'], $destination);
}

?>

            <header class="pb-3">

                <?php if (isset($msg)) : ?>
                    <?= $msg ?>
                <?php endif; ?>

                <h4>

                    <?php if (isset($_GET["event_id"], $_GET["action"]) && $_GET["action"] == "edit"): ?>
                        <?php echo "Modifier un event"; ?>
                    <? else: echo "Ajouter un event"; ?>
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
                <input class="form-control" value="<?php if (isset($summary)) : ?> <?= $summary ?> <?php endif; ?>"
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
                       value="<?php if (isset($date)) : ?><?= $date; ?><?php endif; ?>"/>
                <?php if (!empty($messages['posted_at'])) : ?>
                    <?= $messages['posted_at']; ?>
                <?php endif; ?>
            </div>

            <?php if (!empty($messages['category_id'])) : ?>
                <?= $messages['category_id']; ?>
            <?php endif; ?>

            <div class="form-group">
                <label for="image">Image :</label>
                <input class="form-control" type="file" name="image" id="image"/>
                <?php  if (isset($image)) : ?>
                <img class="img-fluid py-4" src='../img/event/<?= $image;  ?>' alt=" " />
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


