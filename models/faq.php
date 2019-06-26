<?php
function getFaqList()
{
    $db = dbConnect();

    $faqList = $db->query("
    SELECT f.question,f.answer,s.name
    FROM faq f
    JOIN sectors s
    ON f.sector_id = s.id
    ");
    return $faqList->fetchAll(PDO::FETCH_ASSOC);
}