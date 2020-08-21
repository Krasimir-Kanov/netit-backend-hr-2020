<?php

//Тук добавяме логика ако не сме админ в кой страници неможем да влизаме или employer
if ((!Auth::isAdmin() || Auth::isHR())) {
    redirectTo('index');
}

if (isset($_POST["create_new_job_offer_tokken"]) && $_POST["create_new_job_offer_tokken"] == '1') {

    $jobTitle = $_POST['job_title'];
    $jobCategory = $_POST['job_category'];
    $jobContent = $_POST['job_content'];
    //Insert заявка
    $createJobOfferQuery = "INSERT INTO tb_job_offer (title, content) VALUES('$jobTitle', '$jobContent')";

    Database::query($createJobOfferQuery);

    $postID = Database::getLastInsertedId();
    $createJobCategoryQuery = "INSERT INTO tb_job__categories(job_offer_id, category_id) VALUES ($postID, $jobCategory)";

    Database::query($createJobCategoryQuery); //Да добавим опция като е успешно публикуването да излиза,че е успешно

}
