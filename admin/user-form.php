<?php

if (isset($_POST['save'])) {

    $query = $db->prepare('INSERT INTO user (password, email, is_admin) VALUES (?, ?, ?)');
    $newUser = $query->execute([
        hash('md5', $_POST['password']),
        htmlspecialchars($_POST['email']),
        $_POST['is_admin'],
    ]);

    if (!isset($newUser)) {
        $message = "Impossible d'enregistrer le nouvel utilisateur...";
    }else{
        $message = "Nouvel utilisateur crée";
    }

} else if (isset($_GET["user_id"], $_GET["action"]) && $_GET["action"] == "edit") {

    $personne1 = new stdClass();
    $personne1->nom = 'Hamon';

    var_dump($personne1);


    $queryUser = $db->prepare('SELECT * FROM user WHERE id = ?');
    $result = $queryUser->execute([$_GET["user_id"]]);
    $user = $queryUser->fetch();

    $email = $user['email'];
    $isAdmin = $user['is_admin'];

    if (isset($_POST['submit'])) {


        $email = $_POST['email'];
        $isAdmin = $_POST['is_admin'];


        if (empty($_POST['email'])) {
            $messages['$email'] = 'L\'email est obligatoire';
        }

        if (empty($messages)) {
            $queryUser = $db->prepare('UPDATE user SET email = ?, is_admin = ?   WHERE id = ? ');
            $resultUser = $queryUser->execute(
                [
                    $_POST['email'],
                    intval($_POST['is_admin']),
                    intval($_GET["user_id"])
                ]
            );
            $msg = '<div class="bg-success text-white p-2 mb-4">Modification effectuer </div>';


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
                         <?php echo 'index.php?page=user-form&user_id='.$_GET["user_id"].'&action=edit'; ?>
                            <?php else: ?>index.php?page=user-form<?php endif; ?>" method="post">

                <div class="form-group">
                    <label for="email">Email :</label>
                    <input class="form-control" value="<?php if (isset($email)) : ?><?= $email; ?><?php endif; ?>"
                           type="email" placeholder="Email" name="email" id="email"/>
                </div>
                <?php if (!isset($_GET["user_id"], $_GET["action"])) : ?>
                    <div class="form-group">
                        <label for="password">Password : </label>
                        <input class="form-control" type="password" placeholder="Mot de passe" name="password"
                               id="password"/>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="is_admin"> Admin ?</label>
                    <select class="form-control" name="is_admin" id="is_admin">
                        <option value="0"
                            <?php if ( isset($_GET["user_id"], $_GET["action"]) && $_GET["action"] == "edit" && $isAdmin == 0): ?>

                                <?php echo 'selected' ?>

                        <?php endif ?> >
                            Non

                        </option>
                        <option value="1" <?php if ( isset($_GET["user_id"], $_GET["action"]) && $_GET["action"] == "edit" && $isAdmin == 1): ?><?php echo 'selected' ?><?php endif ?> >
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

