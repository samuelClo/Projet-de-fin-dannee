<?php


if (isset($_POST['save'])) {


    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $sector = $_POST['sector'];

    if (empty($_POST['question'])) {
        $messages['question'] = 'la question est obligatoire';
    }
    if (empty($_POST['answer'])) {
        $messages['answer'] = 'la réponse est obligatoire';
    }
    if (empty($_POST['sector'])) {
        $messages['sector'] = 'le secteur est obligatoire';
    }


    if (empty($messages)) {


        $query = $db->prepare('
        INSERT INTO faq
        (question, answer, sector_id)
        VALUES (?, ?, ?)');

        $newFaq = $query->execute(
            [
                htmlspecialchars($_POST['question']),
                htmlspecialchars($_POST['answer']),
                htmlspecialchars($_POST['sector']),
            ]
        );
echo $newFaq;
        if ($newFaq) {
            echo "ehehh";
            $_POST = null;
            header('Location: ./index.php?page=faq-form');
            exit;
        } else {
            $message = "Impossible d'enregistrer la nouvelle faq...";
        }
    }


} else if (isset($_GET["faq_id"], $_GET["action"]) && $_GET["action"] == "edit") {

    $queryFaq = $db->prepare('SELECT * FROM faq WHERE id = ?');
    $selectFaq = $queryFaq->execute([$_GET["faq_id"]]);
    $faq = $queryFaq->fetch();

    $question = $faq['question'];
    $answer = $faq['answer'];
    $sector = $faq['sector_id'];

    if (isset($_POST['submit'])) {

        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $sector = $_POST['sector'];


        if (empty($_POST['question'])) {
            $messages['question'] = 'la question est obligatoire';
        }
        if (empty($_POST['answer'])) {
            $messages['answer'] = 'la réponse est obligatoire';
        }
        if (empty($_POST['sector'])) {
            $messages['sector'] = 'le secteur est obligatoire';
        }


        if (empty($messages)) {

            $query = $db->prepare('UPDATE faq SET question = ?, answer = ?,  sector_id = ? WHERE id = ? ');
            $result = $query->execute(
                [
                    $_POST['question'],
                    $_POST['answer'],
                    $_POST['sector'],
                    $_GET["faq_id"]
                ]
            );
            $msg = '<div class="bg-success text-white p-2 mb-4">Modification effectuer.</div>';

        }
    }
}


$sectors = $db->query("SELECT * FROM sectors");
$sectors = $sectors->fetchAll();

?>

<header class="pb-3">

    <?php if (isset($msg)) : ?>
        <?= $msg ?>
    <?php endif; ?>

    <h4>

        <?php if (isset($_GET["faq_id"], $_GET["action"]) && $_GET["action"] == "edit"): ?>
            <?php echo "Modifier une faq"; ?>
        <? else: echo "Ajouter une faq"; ?>
        <?php endif; ?>


    </h4>
</header>

<?php if (isset($message)): //si un message a été généré plus haut, l'afficher ?>
    <div class="bg-danger text-white">
        <?= $message; ?>
    </div>
<?php endif; ?>

<form action="<?php if (isset($_GET["faq_id"], $_GET["action"]) && $_GET["action"] == "edit") : ?>
                         <?php echo './index.php?page=faq-form&faq_id=' . $_GET["faq_id"] . '&action=edit'; ?>
                          <?php else: ?>./index.php?page=faq-form<?php endif; ?>"
      method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Question :</label>
        <textarea class="form-control" placeholder="question" name="question" id="question"/>
        <?php if (isset($question)) : ?><?= $question; ?><?php endif; ?>
        </textarea>


        <?php if (!empty($messages['question'])) : ?>
            <?= $messages['question'] ?>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="summary">Réponse :</label>
        <input class="form-control" value="<?php if (isset($answer)) : ?> <?= $answer ?> <?php endif; ?>"
               type="text" placeholder="Réponse" name="answer" id="answer"/>
    </div>

    <div class="form-group">
        <label for="sector"> Secteur ?</label>
        <select class="form-control" name="sector" id="sector">
            <?php foreach ($sectors as $sector) : ?>
                <option value="<?= $sector['id'] ?>">
                    <?= $sector["name"] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>


    <div class="text-right">
        <?php if (isset($_GET["faq_id"], $_GET["action"]) && $_GET["action"] == "edit") : ?>
            <input class="btn btn-success" type="submit" name="submit" value="Changer la faq"/>
        <?php else: ?>
            <input class="btn btn-success" type="submit" name="save" value="Enregistrer"/>
        <?php endif; ?>


    </div>
</form>



