<?php
if (!(Auth::isAdmin() || Auth::isHR())) {
    redirectTo('signin');
}

if (isset($_POST['create_new_post_tokken']) && $_POST['create_new_post_tokken'] == '1') {

    Database::insert('tb_job_offer', array(
        'title'             => $_POST['job_title'],
        'content'           => $_POST['job_content'],
    ));

    Database::insert('tb_job__categories', array(
        'job_offer_id'  => Database::getLastInsertedId(),
        'category_id'   => $_POST['post_category'],
    ));
}