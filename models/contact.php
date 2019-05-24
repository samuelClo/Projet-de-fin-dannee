<?php


function getContactInfo ($queryAllSectors = null , $idSectors = null ){

    $db = dbConnect();
    $res = new stdClass();
    $executeString = [];
    $array = [];

    if ($queryAllSectors){
        $prepareString = "SELECT name ,id FROM sectors";
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
    $infoContact = $prepareInfoContact->fetchAll();



    for ($i = 0; $i < sizeof($infoContact); $i++) {

        $array[$i] = [
            'name' => $infoContact[$i]['name'],
            'id' => $infoContact[$i]['id'],
        ];

    }




    return $res->arrayAlltest = $array;

}