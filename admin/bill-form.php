<?php

if (isset($_FILES['bill']) && $_FILES['bill']['error'] === 0) {

    $allowed_extensions = array('pdf');

    $my_file_extension = pathinfo($_FILES['bill']['name'], PATHINFO_EXTENSION);


    if (in_array($my_file_extension, $allowed_extensions)) {

        do {
            $new_file_name = time() . rand();

            $nameBill = $new_file_name . '.' . $my_file_extension;

            $destination = '../assets/file/bills/' . $new_file_name . '.' . $my_file_extension;

        } while (file_exists($destination));

    } else {
        $messages['error'] = "Fichiers non autorisé";
    }


}

if (isset($_FILES['bill']) && $_FILES['bill']['error'] !== 0)
    $messages['bill'] = 'la facture est obligatoire';

    if (isset($_POST['save'])) {


        $price = $_POST['price'];
        $date = $_POST['date'];
        $service = $_POST['service'];
        $name = $_POST['name'];
        $user = ($_POST['user']);


        if (empty($_POST['price']))
            $messages['price'] = 'le prix est obligatoire';

        if (empty($_POST['date']))
            $messages['date'] = 'la date est obligatoire';

        if (empty($_POST['service']))
            $messages['service'] = 'le choix du service associé est obligatoire';

        if (empty($_POST['name']))
            $messages['name'] = 'le nom est obligatoire';

        if (empty($_POST['user']) || $_POST['user'] === "0")
            $messages['user'] = 'le destinataire de la facture doit etre précisé';

        if (empty($messages)) {


            $query = $db->prepare('
        INSERT INTO bills
        (price, date, services, name, user_id, file)
        VALUES (?, ?, ?, ?, ?, ?)');

            $newBill = $query->execute(
                [
                    htmlspecialchars($_POST['price']),
                    htmlspecialchars($_POST['date']),
                    htmlspecialchars($_POST['service']),
                    htmlspecialchars($_POST['name']),
                    htmlspecialchars($_POST['user']),
                    $nameBill
                ]
            );

            move_uploaded_file($_FILES['bill']['tmp_name'], $destination);
            $lastBillIdInsert = $db->lastInsertId();

            if ($newBill) {
                header('location:index.php?page=bill-list');
                exit;
            } else {
                $message = "Impossible d'enregistrer la nouvelle facture...";
            }
        }

    } else if (isset($_GET["article_id"], $_GET["action"]) && $_GET["action"] == "edit") {

        $query = $db->prepare('SELECT c.id

                            FROM category c
                            JOIN article_category ac
                            ON ac.category_id = c.id
                            JOIN article a
                            ON a.id = ac.article_id
                            WHERE a.id = ?

                            ');
        $selectArticle = $query->execute([$_GET["article_id"]]);


        $queryArticle = $db->prepare('SELECT * FROM article WHERE id = ?');
        $selectArticle = $queryArticle->execute([$_GET["article_id"]]);
        $articles = $queryArticle->fetch();

        $title = $articles['title'];
        $summary = $articles['summary'];
        $content = $articles['content'];
        $date = $articles['created_at'];
        $image = $articles['image'];
        $is_published = intval($articles['is_published']);


        if (isset($_POST['submit'])) {

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
                if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                    unlink('../img/article/' . $image);
                    $image = $nameImg;
                }

                $query = $db->prepare('UPDATE article SET title = ?, created_at = ?,  summary = ?, is_published = ?, content = ?, image= ? WHERE id = ? ');
                $result = $query->execute(
                    [
                        $_POST['title'],
                        $_POST['created_at'],
                        $_POST['summary'],
                        $_POST['is_published'],
                        $_POST['content'],
                        $image,
                        $_GET["article_id"]
                    ]
                );


                foreach ($_POST["category_id"] as $key => $category) {



                    $updateCategory = $db->prepare('UPDATE article_category
                  SET category_id = ?,
                  WHERE article_id = ?
            ');

                    $categoryUpdated = $updateCategory->execute(
                        [
                            $_POST["category_id"][$key],
                            $_GET["article_id"],
                            $_GET["article_id"],
                        ]
                    );

                }


                $msg = '<div class="bg-success text-white p-2 mb-4">Modification effectuer.</div>';

            }
        }
    }


if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    move_uploaded_file($_FILES['image']['tmp_name'], $destination);
}

$userList = $db->query('SELECT email,id FROM user')->fetchAll();



?>

<header class="pb-3">

    <?php if (isset($msg)) : ?>
        <?= $msg ?>
    <?php endif; ?>

    <h4>
        <?php if (isset($_GET["article_id"], $_GET["action"]) && $_GET["action"] == "edit"): ?>
            <?php echo "Modifier une facture"; ?>
        <?php else: echo "Ajouter une facture"; ?>
        <?php endif; ?>
    </h4>
</header>

<?php if (isset($message)): //si un message a été généré plus haut, l'afficher ?>
    <div class="bg-danger text-white">
        <?= $message; ?>
    </div>
<?php endif; ?>

<?php echo "jhjhhjh" ?>

<form action="<?php if (isset($_GET["bill_id"], $_GET["action"]) && $_GET["action"] == "edit") : ?>
                         <?php echo 'index.php?page=bill-form&bill_id=' . $_GET["bill_id"] . '&action=edit'; ?>
                          <?php else: ?>index.php?page=bill-form<?php endif; ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="price">Prix :</label>
        <input class="form-control" type="text" placeholder="prix" name="price" id="title"
               value="<?php if (isset($price)) : ?><?= $price; ?><?php endif; ?>"/>
        <?php if (!empty($messages['price'])) echo $messages['price'] ?>
    </div>

    <div class="form-group">
        <label for="published_at">Date :</label>
        <input class="form-control" type="date" placeholder="" name="date" id="date"
               value="<?php if (isset($date)) : ?><?= $date; ?><?php endif; ?>"/>
        <?php if (!empty($messages['date'])) echo  $messages['date'] ?>
    </div>


    <div class="form-group">
        <label for="service">Service :</label>
        <input class="form-control" type="text" name="service" id="service"
               placeholder="Service"><?php if (isset($service)) : ?><?= $service; ?><?php endif; ?>
        <?php if (!empty($messages['service'])) echo $messages['service'] ?>
    </div>
    <div class="form-group">
        <label for="name">Nom de la facture :</label>
        <input class="form-control" type="text" name="name" id="name"
               placeholder="Nom de la facture"><?php if (isset($name)) : ?><?= $name; ?><?php endif; ?>
        <?php if (!empty($messages['name'])) echo $messages['name'] ?>
    </div>

    <div class="form-group">
        <label for="category_id"> User :</label>
        <select class="form-control" name="user" id="user">

            <option value="0">Veuilliez choisir un destinataire :</option>

            <?php foreach ($userList as $user) : ?>
                <option value="<?= $user['id']; ?>"><?= $user['email'] ?></option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($messages['user'])) echo $messages['user'] ?>
    </div>


    <div class="form-group">
        <label for="image">Facture :</label>
        <input class="form-control" type="file" name="bill" id="bill"/>
        <?php if (isset($bill)) : ?>
            <img class="img-fluid py-4" src='../img/article/<?= $image; ?>' alt=" "/>
        <?php endif; ?>

        <?php if (!empty($messages['bill'])) echo $messages['bill'] ?>
    </div>


    <div class="text-right">
        <?php if (isset($_GET["article_id"], $_GET["action"]) && $_GET["action"] == "edit") : ?>
            <input class="btn btn-success" type="submit" name="submit" value="Changer la facture"/>
        <?php else: ?>
            <input class="btn btn-success" type="submit" name="save" value="Enregistrer"/>
        <?php endif; ?>


    </div>
</form>


