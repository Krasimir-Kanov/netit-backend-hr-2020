<?php 

if((!Auth::isAdmin() || Auth::isHR())) {
    redirectTo('index');
}

// Взимаме всички категории
function getJobOffersCollection() {
return Database::getAll("SELECT * FROM tm_job_categories");
}

// Коя категория сме избрали в момента
function getAdminCategory() {
    
    if(isset($_GET['category_id'])) {
        
        $job_category_id = $_GET['category_id'];
        $query = Database::query("SELECT title FROM tm_job_categories WHERE id = $job_category_id");
        
        return mysqli_fetch_assoc($query)['title'];
    }    
}

// Функция за избиране на категория // Ако няма категория да създадем нова
function getAdminActionTokken() {
    
    if(isset($_GET['action'])) {
        return $_GET['action'];
    }
    
    return 'create';
}

// Функция която ни връща ид-то на категорията
function getCategoryTokken() {
    
    if(isset($_GET['category_id'])) {
        return $_GET['category_id'];
    }
    
    return 'NO';
}

    // Добавяме нова категория в базата данни по DEFAULT
if(isset($_GET['admin_action_tokken']) AND $_GET['admin_action_tokken'] == 'create') {
    
    Database::insert('tm_job_categories', array(
        'title' => $_GET['category_title']
    ));
}

    // Променяме името на категорията от базата данни
if(isset($_GET['admin_action_tokken']) AND $_GET['admin_action_tokken'] == 'edit') {
    $categoryTitle  = $_GET['category_title'];
    $categoryId     = $_GET['admin_category_tokken'];
    Database::query("UPDATE tm_job_categories SET title = '$categoryTitle' WHERE id = $categoryId");    
}
// if(isset($_GET['admin_action_tokken']) AND  $_GET['admin_action_tokken'] == 'edit') {
    
//     Database::update('tm_job_categories', array('title' => $_GET['category_title']), 
//                                           array('id'    => $_GET['admin_category_tokken']));
// } Не работи


    // Изтриваме дадена категория от базата данни // Трябва да добавя опция да Refresh страницата след изтриване
if(isset($_GET['action']) AND $_GET['action'] == 'delete') {
    $categoryId     = $_GET['category_id'];
    echo 'Deleted category ' . $categoryId;
    Database::query("DELETE FROM  tm_job_categories WHERE id = $categoryId");
}
?>
<!-- if(isset($_GET['action']) AND $_GET['action'] == 'delete') {
    Database::delete('tm_job_categories', array('id' => $_GET['category_id']));
}
?> Не работи -->