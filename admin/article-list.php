
<?php

if (isset($_GET["article_id"], $_GET["action"]) && $_GET["action"] == "delete") {

    $selectImagePath = $db->prepare('SELECT title_picture FROM articles WHERE id = ?  ');

    $ImagePath = $selectImagePath->execute(
        [
            $_GET["article_id"]
        ]
    );

    $pathPictures = $selectImagePath->fetchAll();

    if ($pathPictures){
        foreach ($pathPictures[0] as $pathPicture){

            if (file_exists('./../assets/pictures/articles/'. $pathPicture)){
                unlink('./../assets/pictures/articles/'. $pathPicture);
            }

        }
    }

    $deletearticle = $db->prepare('DELETE FROM articles WHERE id = ?  ');

    $articleDeleted = $deletearticle->execute(
        [
            $_GET["article_id"]
        ]
    );

    var_dump($articleDeleted);

    $msg = '<div class="bg-success text-white p-2 mb-4">Suppression  effectuer.</div>';


}

//séléctionner tous les articles pour affichage de la liste
$query = $db->query('

SELECT a.* FROM article a
 
 JOIN article_media am
 ON a.id = am.article_id
 ORDER BY id DESC');
$articles = $query->fetchall();



var_dump($articles);

?>

            <header class="pb-4 d-flex justify-content-between">


                <?php if (isset($msg)) : ?>
                    <?= $msg ?>
                <?php endif; ?>


                <h4>Liste des articles</h4>
                <a class="btn btn-primary" href="./index.php?page=article-form">Ajouter un événement</a>
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
                <?php if ($articles): ?>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <th><?= $article['id']; ?></th>
                            <td><?= $article['title']; ?></td>
                            <td>
                                <?php echo ($article['is_published'] == 1) ? 'Oui' : 'Non'; ?>
                            </td>
                            <td>
                                <a href="./index.php?page=article-form&article_id=<?php echo $article['id']; ?>&action=edit"
                                   class="btn btn-warning">Modifier</a>
                                <a onclick="return confirm('Are you sure?')"
                                   href="./index.php?page=articles-list&article_id=<?php echo $article['id']; ?>&action=delete"
                                   class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    Aucun événement enregistré.
                <?php endif; ?>
                </tbody>
            </table>
