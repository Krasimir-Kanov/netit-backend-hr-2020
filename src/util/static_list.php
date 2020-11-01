<?php
function getCategoryStaticList($staticListName)
{
    $listQuery = "SELECT id AS _value , title AS _key FROM tm_job_categories";
    $staticListCollection = Database::getAll($listQuery);
    $htmlTemplate = "<select name=$staticListName class=input>";

    foreach ($staticListCollection as $key => $value) {
        $categoryKey   = $value['_key'];
        $categoryValue = $value['_value'];
        $htmlTemplate .= "<option value=$categoryValue>$categoryKey</option>";
    }
    $htmlTemplate .= "</option>";
    echo $htmlTemplate;
}