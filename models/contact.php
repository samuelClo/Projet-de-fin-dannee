<?php


function getContactInfo ($queryAllSectors = null , $idSectors = null ){

    $db = dbConnect();
    $res = new stdClass();
    $execusubjectring = [];
    $array = [];

    if ($queryAllSectors){
        $prepareString = "SELECT name ,id FROM sectors ORDER BY id";
    }else {
        $prepareString = "
        SELECT t.name, t.id FROM subject t 
        JOIN sectors s
        ON  t.sector_id = s.id
        WHERE sector_id = ?";
        $execusubjectring[] = $idSectors;
    }

    $prepareInfoContact = $db->prepare($prepareString);
    $prepareInfoContact->execute($execusubjectring);
    $infoContact = $prepareInfoContact->fetchAll(PDO::FETCH_ASSOC);

    return $res->arrayAllsubject = $infoContact;

}