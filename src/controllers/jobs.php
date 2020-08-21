<?php

if (Auth::isNotAuthenticated()) {
    redirectTo("index");
}
// ИЗБОРЪТ НА КАТЕГОРИЯ И СЛЕД ТОВА ТЪРСЕНЕТО ПО КАТЕГОРИЯ НЕ РАБОТИ !!! (ЛИСТВАТЕ СЕ ВСИЧКИ ОБЯВИ)
// РЕШЕНИЕТО НА ПРОБЛЕМА !
//(Да направим функция която да ни връща категорията да я подаваме на Hidden поле в формата и винаги когато 
//ползваме формичката да имаме послендната категория която е избрана формичката с q_selectora в Jobs.php)
function listAllJobOffers()
{

    $myCategory         = null;

    if (isset($_GET['job_search_tokken']) and $_GET['job_search_tokken'] == 1) {

        $searchQuery            = $_GET['q'];
        $searchDescriptorColumn = $_GET['q_selector'];

        $categoryQuery          = $myCategory ? " b.category_id = $myCategory     AND " : "";
        $requestQuery           = "SELECT * FROM tb_job_offer  AS a,
                                                tb_job__categories AS b
                                                WHERE a.id = b.job_offer_id     AND 
                                                $categoryQuery 
                                                a.$searchDescriptorColumn LIKE '%$searchQuery%'";
        return Database::query($requestQuery);
    }

    //Комбинираме категорията и съдържанието от базата данни

    //Тук избираме категория и ще търсим само в нея
    if (isset($_GET['category'])) {

        $myCategory = $_GET['category'];
        return Database::query("SELECT * FROM tb_job_offer a,
                           tb_job__categories b
                           WHERE a.id = b.job_offer_id AND
                           b.category_id = $myCategory");
    }

    //Логика за лимит на страниците на Job_offer
    $pageLimit  = Pagination::getPageLimit();
    $pageOffset = Pagination::getPageOffset();
    Pagination::setTotalCount(Database::count("tb_job_offer"));
    return Database::getAll("SELECT * FROM tb_job_offer LIMIT $pageOffset, $pageLimit");
}


function listAllJobsCategory() {    
    return Database::query("SELECT * FROM tm_job_categories");
}
