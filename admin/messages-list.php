<?php

if (isset($_GET["message_id"], $_GET["action"]) && $_GET["action"] == "delete") {

    $deleteMessage = $db->prepare('DELETE FROM message WHERE id = ?  ');
    $messageDeleted = $deleteMessage->execute(
        [
            $_GET["message_id"]
        ]
    );


    $msg = '<div class="bg-success text-white p-2 mb-4">Suppression  effectuer.</div>';

}

//séléctionner tous les articles pour affichage de la liste
$query = $db->query('SELECT * FROM message ORDER BY id DESC');

$selectMessage = $db->query('SELECT m.content,m.email,m.id,t.name 
             FROM message m JOIN test t 
             ON  m.test_id = t.id ');

$messages = $selectMessage->fetchall();



?>

<header class="pb-4 d-flex justify-content-between">


    <?php if (isset($msg)) : ?>
        <?= $msg ?>
    <?php endif; ?>


    <h4>Liste des articles</h4>

</header>

<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Email</th>
        <th>Objet</th>
        <th>Contenu</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($messages): ?>
        <?php foreach ($messages as $message): ?>
            <tr>
                <th><?= $message['id']; ?></th>
                <th><?= $message['email']; ?></th>
                <td><?= $message['name']; ?></td>
                <th><?= $message['content']; ?></th>

                <td>
                    <a onclick="return confirm('Are you sure?')"
                       href="./index.php?page=message-list&message_id=<?php echo $message['id']; ?>&action=delete"
                       class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        Aucun message enregistré.
    <?php endif; ?>
    </tbody>
</table>

