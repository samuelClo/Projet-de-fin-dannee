<?php
function getBill($idUser){
    $db = dbConnect();

    $query = $db -> prepare('SELECT * FROM  bills WHERE user_id = ?');

    $query -> execute([ $idUser ]);

   return $query -> fetchAll(PDO::FETCH_ASSOC);

}