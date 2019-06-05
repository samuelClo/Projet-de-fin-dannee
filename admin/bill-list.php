<?php

if (isset($_GET["bill_id"], $_GET["action"]) && $_GET["action"] == "delete") {

    $deleteBill = $db->prepare('DELETE FROM bills WHERE id = ?  ');
    $billDeleted = $deleteBill->execute(
        [
            $_GET["bill_id"]
        ]
    );


    $msg = '<div class="bg-success text-white p-2 mb-4">Suppression  effectuer.</div>';

}

$selectBill= $db->query('


SELECT b.*,u.email as email
             FROM bills b JOIN user u
             ON  b.user_id = u.id ');

$bills = $selectBill->fetchall();



?>

<header class="pb-4 d-flex justify-content-between">


    <?php if (isset($msg)) : ?>
        <?= $msg ?>
    <?php endif; ?>


    <h4>Liste des articles</h4>
    <a class="btn btn-primary" href="index.php?page=bill-form">Ajouter une facture</a>
</header>

<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Price</th>
        <th>Date</th>
        <th>Services</th>
        <th>Nom</th>
        <th>Facture</th>
        <th>Adresse mail correspondent</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($bills): ?>
        <?php foreach ($bills as $bill): ?>
            <tr>
                <th><?= $bill['id']; ?></th>
                <th><?= $bill['price']; ?>€</th>
                <th><?= $bill['date']; ?></th>
                <th><?= $bill['services']; ?></th>
                <th><?= $bill['name']; ?></th>
                <td><a href="../assets/file/bills/<?= $bill['file']; ?>">Lien vers la facture -></a></td>
                <th><?= $bill['email']; ?></th>

                <td>
                    <a onclick="return confirm('Are you sure?')"
                       href="./index.php?page=bill-list&message_id=<?php echo $bill['id']; ?>&action=delete"
                       class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        Aucun message enregistré.
    <?php endif; ?>
    </tbody>
</table>


