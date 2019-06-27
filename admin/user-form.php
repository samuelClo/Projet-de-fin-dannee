<?php

if (isset($_POST['save'])) {

    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $phone = intval($_POST['phone']);
    $is_admin = intval($_POST['is_admin']);


    if (empty($_POST['name'])) {
        $messages['name'] = 'le nom est obligatoire';
    }
    if (empty($_POST['firstname'])) {
        $messages['firstname'] = 'le prénom est obligatoire';
    }
    if (empty($_POST['address'])) {
        $messages['address'] = 'l\'adresse est obligatoire';
    }
    if (empty($_POST['email'])) {
        $messages['email'] = 'l\'email est obligatoire';
    }

    if (empty($messages)) {


        $password = md5(microtime() . rand(5, 20));


        $query = $db->prepare('INSERT INTO user (email, password, firstname, name, birthday, phone, is_admin, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $newUser = $query->execute([
            htmlspecialchars($_POST['email']),
            md5($password),
            htmlspecialchars($_POST['firstname']),
            htmlspecialchars($_POST['name']),
            htmlspecialchars($_POST['birthday']),
            htmlspecialchars($_POST['phone']),
            htmlspecialchars($_POST['is_admin']),
            htmlspecialchars($_POST['address']),
        ]);

        if (!isset($newUser)) {
            $message = "Impossible d'enregistrer le nouvel utilisateur...";
        } else {
            $subject = "votre nouveau mot de passe";
            $email = $_POST['email'];
            mail($email, $subject, $password);
            $message = "Nouvel utilisateur crée";
        }
    }

} else if (isset($_GET["user_id"], $_GET["action"]) && $_GET["action"] == "edit") {

    $personne1 = new stdClass();
    $personne1->nom = 'Hamon';



    $queryUser = $db->prepare('SELECT * FROM user WHERE id = ?');
    $result = $queryUser->execute([$_GET["user_id"]]);
    $user = $queryUser->fetch(PDO::FETCH_ASSOC);

    $email = $user['email'];
    $isAdmin = $user['is_admin'];
    $email = $user['email'];
    $firstname = $user['firstname'];
    $name = $user['name'];
    $birthday = $user['birthday'];
    $address = $user['address'];
    $phone = $user['phone'];
    $is_admin = $user['is_admin'];

    if (isset($_POST['submit'])) {



        $phone = $_POST['phone'];

        if (preg_match('/^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/', $phone, $output_array)) {
            $messages['phone'] =  "Le numéro de téléphone entré est incorrect.";
            // On ne peut pas ajouter le numéro à la base de donnée
        }



        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $name = $_POST['name'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        $is_admin = intval($_POST['is_admin']);


        if (empty($_POST['email'])) {
            $messages['$email'] = 'L\'email est obligatoire';
        }

        if (empty($messages)) {
            $queryUser = $db->prepare('UPDATE user SET email = ?,firstname = ?, name = ?, birthday = ?, phone = ?, is_admin = ?, address = ? WHERE id = ?');
            $resultUser = $queryUser->execute(
                [
                    htmlspecialchars($_POST['email']),
                    htmlspecialchars($_POST['firstname']),
                    htmlspecialchars($_POST['name']),
                    htmlspecialchars($_POST['birthday']),
                    htmlspecialchars($_POST['phone']),
                    htmlspecialchars($_POST['is_admin']),
                    htmlspecialchars($_POST['address']),
                    $_GET["user_id"]
                ]
            );
            $msg = '
<div class="bg-success text-white p-2 mb-4">Modification effectuer</div>';


        }
    }
}

?>
<section class="col-9">
    <header class="pb-3">


        <?php if (isset($msg)) : ?>
            <?= $msg ?>
        <?php endif; ?>


        <h4>
            <?php if (isset($_GET["user_id"], $_GET["action"]) && $_GET["action"] == "edit"): ?>
                <?php echo "Modifier un utilisateur"; ?>
            <? else: echo "Ajouter un utilisateur"; ?>
            <?php endif; ?>
        </h4>
    </header>

    <?php if (isset($message)): //si un message a été généré plus haut, l'afficher ?>
        <div class="bg-danger text-white">
            <?= $message; ?>
        </div>
    <?php endif; ?>


    <form action="<?php if (isset($_GET["user_id"], $_GET["action"]) && $_GET["action"] == "edit") : ?>
                         <?php echo 'index.php?page=user-form&user_id=' . $_GET["user_id"] . '&action=edit'; ?>
                            <?php else: ?>index.php?page=user-form<?php endif; ?>" method="post">

        <div class="form-group">
            <label for="email">Email :</label>
            <input class="form-control" value="<?php if (isset($email)) : ?><?= $email; ?><?php endif; ?>"
                   type="email" placeholder="Email" name="email" id="email"/>
            <?php if (!empty($messages['email'])) : ?>
                <?= $messages['email'] ?>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="firstname">Prénom :</label>
            <input class="form-control" value="<?php if (isset($firstname)) : ?><?= $firstname; ?><?php endif; ?>"
                   type="text" placeholder="Prénom" name="firstname" id="firstname"/>
            <?php if (!empty($messages['firstname'])) : ?>
                <?= $messages['firstname'] ?>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="name">Nom :</label>
            <input class="form-control" value="<?php if (isset($name)) : ?><?= $name; ?><?php endif; ?>"
                   type="text" placeholder="nom" name="name" id="name"/>
            <?php if (!empty($messages['name'])) : ?>
                <?= $messages['name'] ?>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="birthday">Date de naissance :</label>
            <input class="form-control" value="<?php if (isset($birthday)) : ?><?= $birthday; ?><?php endif; ?>"
                   type="date" placeholder="Date de naissance" name="birthday" id="birthday"/>
        </div>

        <div class="form-group">
            <label for="phone">Numéro de téléphone :</label>
            <input class="form-control" value="<?php if (isset($phone)) : ?><?= $phone; ?><?php endif; ?>"
                   type="number" placeholder="Numéro de téléphone" name="phone" id="phone"/>
            <?php if (!empty($messages['phone'])) : ?>
                <?= $messages['phone'] ?>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="address">Adresse :</label>
            <input class="form-control" value="<?php if (isset($address)) : ?><?= $address; ?><?php endif; ?>"
                   type="text" placeholder="adresse" name="address" id="address"/>
            <?php if (!empty($messages['address'])) : ?>
                <?= $messages['address'] ?>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="is_admin"> Admin ?</label>
            <select class="form-control" name="is_admin" id="is_admin">
                <option value="0"
                    <?php if (isset($_GET["user_id"], $_GET["action"]) && $_GET["action"] == "edit" && $isAdmin == 0): ?>

                        <?php echo 'selected' ?>

                    <?php endif ?> >
                    Non

                </option>
                <option value="1" <?php if (isset($_GET["user_id"], $_GET["action"]) && $_GET["action"] == "edit" && $isAdmin == 1): ?><?php echo 'selected' ?><?php endif ?> >
                    Oui
                </option>
            </select>
        </div>

        <div class="text-right">

            <?php if (isset($_GET["user_id"], $_GET["action"]) && $_GET["action"] == "edit") : ?>
                <input class="btn btn-success" type="submit" name="submit" value="Changer l'utilisateur"/>
            <?php else: ?>
                <input class="btn btn-success" type="submit" name="save" value="Enregistrer"/>
            <?php endif; ?>


        </div>
    </form>
</section>

