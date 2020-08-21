<?php

//За да качваме нови оферти за работа взимаме title и key
function getCategoryStaticList($staticListName) {

    $listQuery = "SELECT id AS _value , title AS _key FROM tm_job_categories";
    $staticListCollection = Database::getAll($listQuery);

    // Тук buildvame HTML
    $htmlTemplate = "<select name=$staticListName class=input>";

    foreach ($staticListCollection as $key => $value) {

        $categoryKey = $value['_key'];
        $categoryValue = $value ['_value'];
        $htmlTemplate .="<option value=$categoryValue>$categoryKey</option>";
    }
    $htmlTemplate .="</option>";

    echo $htmlTemplate;
}