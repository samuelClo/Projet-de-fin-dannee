<?php

if (isset($_GET["event_id"], $_GET["action"]) && $_GET["action"] == "delete") {

    $selectImagePath = $db->prepare('SELECT title_picture FROM events WHERE id = ?  ');

    $ImagePath = $selectImagePath->execute(
        [
            $_GET["event_id"]
        ]
    );

    $pathPictures = $selectImagePath->fetchAll();

    if ($pathPictures){
        foreach ($pathPictures[0] as $pathPicture){

            if (file_exists('./../assets/pictures/events/'. $pathPicture)){
                unlink('./../assets/pictures/events/'. $pathPicture);
            }

        }
    }

    $deleteEvent = $db->prepare('DELETE FROM events WHERE id = ?  ');

    $eventDeleted = $deleteEvent->execute(
        [
            $_GET["event_id"]
        ]
    );

    var_dump($eventDeleted);

    $msg = '<div class="bg-success text-white p-2 mb-4">Suppression  effectuer.</div>';


}

//séléctionner tous les articles pour affichage de la liste
$query = $db->query('SELECT * FROM events ORDER BY id DESC');
$events = $query->fetchall();

//var_dump($events);

?>

            <header class="pb-4 d-flex justify-content-between">


                <?php if (isset($msg)) : ?>
                    <?= $msg ?>
                <?php endif; ?>


                <h4>Liste des articles</h4>
                <a class="btn btn-primary" href="./index.php?page=event-form">Ajouter un événement</a>
            </header>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Publié</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($events): ?>
                    <?php foreach ($events as $event): ?>
                        <tr>
                            <th><?= $event['id']; ?></th>
                            <td><?= $event['title']; ?></td>
                            <td>
                                <?php echo ($event['is_published'] == 1) ? 'Oui' : 'Non'; ?>
                            </td>
                            <td>
                                <a href="./index.php?page=event-form&event_id=<?php echo $event['id']; ?>&action=edit"
                                   class="btn btn-warning">Modifier</a>
                                <a onclick="return confirm('Are you sure?')"
                                   href="./index.php?page=events-list&event_id=<?php echo $event['id']; ?>&action=delete"
                                   class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    Aucun événement enregistré.
                <?php endif; ?>
                </tbody>
            </table>
