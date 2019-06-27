<?php


function getContactInfo ($queryAllSectors = null , $idSectors = null ){

    $db = dbConnect();
    $res = new stdClass();
    $executeString = [];
    $array = [];

    if ($queryAllSectors){
        $prepareString = "SELECT name ,id FROM sectors ORDER BY id";
    }else {
        $prepareString = "
        SELECT t.name, t.id FROM test t 
        JOIN sectors s
        ON  t.sector_id = s.id
        WHERE sector_id = ?";
        $executeString[] = $idSectors;
    }

    $prepareInfoContact = $db->prepare($prepareString);
    $prepareInfoContact->execute($executeString);
    $infoContact = $prepareInfoContact->fetchAll(PDO::FETCH_ASSOC);

    return $res->arrayAlltest = $infoContact;

}