<?php

if (isset($_GET["faq_id"], $_GET["action"]) && $_GET["action"] == "delete") {

    $deletefaq = $db->prepare('DELETE FROM faqs WHERE id = ?  ');

    $faqDeleted = $deletefaq->execute(
        [
            $_GET["faq_id"]
        ]
    );

    var_dump($faqDeleted);

    $msg = '<div class="bg-success text-white p-2 mb-4">Suppression  effectuer.</div>';


}

//séléctionner tous les articles pour affichage de la liste
$query = $db->query('SELECT * FROM faq ORDER BY id DESC');
$faqs = $query->fetchall();

//var_dump($faqs);

?>

<header class="pb-4 d-flex justify-content-between">


    <?php if (isset($msg)) : ?>
        <?= $msg ?>
    <?php endif; ?>


    <h4>Liste faq</h4>
    <a class="btn btn-primary" href="./index.php?page=faq-form">Ajouter une faq</a>
</header>

<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Questions</th>
        <th>Réponses</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($faqs): ?>
        <?php foreach ($faqs as $faq): ?>
            <tr>
                <th><?= $faq['id']; ?></th>
                <td><?= $faq['question']; ?></td>
                <td><?= $faq['answer']; ?></td>
                <td>
                    <a href="./index.php?page=faq-form&faq_id=<?php echo $faq['id']; ?>&action=edit"
                       class="btn btn-warning">Modifier</a>
                    <a onclick="return confirm('Are you sure?')"
                       href="./index.php?page=faqs-list&faq_id=<?php echo $faq['id']; ?>&action=delete"
                       class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        Aucune faq enregistré.
    <?php endif; ?>
    </tbody>
</table>
