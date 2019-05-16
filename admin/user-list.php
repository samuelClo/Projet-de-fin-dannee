<?php
if (isset($_GET["user_id"], $_GET["action"]) && $_GET["action"] == "delete") {

    $deleteArticle = $db->prepare('DELETE FROM user WHERE id = ?  ');

    $articleDeleted = $deleteArticle->execute(
        [
            $_GET["user_id"]
        ]
    );
    $msg = '<div class="bg-success text-white p-2 mb-4">Suppression  effectuer.</div>';
}

//séléctionner tous les utilisateurs pour affichage de la liste
$query = $db->query('SELECT * FROM user ORDER BY id DESC');
$users = $query->fetchall();
?>

<section class="col-9">
    <header class="pb-4 d-flex justify-content-between">


        <?php if (isset($msg)) : ?>
            <?= $msg ?>
        <?php endif; ?>


        <h4>Liste des utilisateurs</h4>
        <a class="btn btn-primary" href="index.php?page=user-form">Ajouter un utilisateur</a>
    </header>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Admin</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($users): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <th><?= $user['id']; ?></th>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['is_admin']; ?></td>
                    <td>
                        <a href="index.php?page=user-form&user_id=<?php echo $user['id']; ?>&action=edit" class="btn btn-warning">Modifier</a>
                        <a onclick="return confirm('Are you sure?')"
                           href="./index.php?page=users-list&user_id=<?php echo $user['id']; ?>&action=delete" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            Aucun utilisateur enregistré.
        <?php endif; ?>

        </tbody>
    </table>
</section>

