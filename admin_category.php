<?php include('./templates/admin/header.php'); ?>
<?php include('./src/util/static_list.php'); ?>
<?php include('./src/controllers/admin_category_managment.php'); ?>

<!-- Създаваме механизъм за модифициране на обявите изтриване редактиране -->
<h4>Create Edit Or Delete Category</h4><br>
<hr>
<div>

<form>
        <input type         = "text" 
               name         = "category_title"
               class        ="input w-25 category-input" 
               placeholder  = "Category title"
               value        = "<?php echo getAdminCategory() ?>">
        
        <input type         = "hidden"
               name         = "admin_action_tokken"
               value        = "<?php echo getAdminActionTokken(); ?>">
        
        <input type         = "hidden"
               name         = "admin_category_tokken"
               value        = "<?php echo getCategoryTokken(); ?>">

        <input type="submit" class="btn btn-primary">


            <?php            
            $categoryCollection = getJobOffersCollection();
            foreach ($categoryCollection as $key => $value) { ?>
            <li class="list-items">
                <?php echo $value['title']; ?> 
                <div>
                        <a class="category-placeholder--category" href="?action=edit&category_id=<?php echo $value['id']; ?>"> Edit</a>
                        <a class="category-placeholder--category" href="?action=delete&category_id=<?php echo $value['id']; ?>">Delete</a>
                    </div>
                </li>
            <?php } ?>

        
    </form>
</div>

<?php include('./templates/admin/footer.php'); ?>