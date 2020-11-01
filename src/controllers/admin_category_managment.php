<?php
if ((!Auth::isAdmin() || Auth::isHR())) {
    redirectTo('index');
}

function getJobOffersCollection()
{
    return Database::getAll("SELECT * FROM tm_job_categories");
}

function getAdminCategory()
{
    if (isset($_GET['category_id'])) {
        $job_category_id = $_GET['category_id'];
        $query = Database::query("SELECT title FROM tm_job_categories WHERE id = $job_category_id");
        return mysqli_fetch_assoc($query)['title'];
    }
}

function getAdminActionTokken()
{
    if (isset($_GET['action'])) {
        return $_GET['action'];
    }
    return 'create';
}

function getCategoryTokken()
{
    if (isset($_GET['category_id'])) {
        return $_GET['category_id'];
    }
    return 'NO';
}

if (isset($_GET['admin_action_tokken']) and $_GET['admin_action_tokken'] == 'create') {
    Database::insert('tm_job_categories', array(
        'title' => $_GET['category_title']
    ));
}

if (isset($_GET['admin_action_tokken']) and $_GET['admin_action_tokken'] == 'edit') {
    $categoryTitle  = $_GET['category_title'];
    $categoryId     = $_GET['admin_category_tokken'];
    Database::query("UPDATE tm_job_categories SET title = '$categoryTitle' WHERE id = $categoryId");
}

if (isset($_GET['action']) and $_GET['action'] == 'delete') {
    $categoryId = $_GET['category_id'];
    echo 'Deleted category ' . $categoryId;
    Database::query("DELETE FROM  tm_job_categories WHERE id = $categoryId");
}
?>