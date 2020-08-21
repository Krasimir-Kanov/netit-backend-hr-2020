<?php include('./templates/employer/header.php'); ?>
<?php include('./src/util/static_list.php'); ?>
<?php include('./src/controllers/employer.php'); ?>


<br><h4>Fill the form to upload new job offer</h4>

<section class="row justify-content-center">
    <section class="col-12 col-sm-6 col-md-3">
        <form class="log-in-form" method="POST">

            <input class="input" type="text" name="job_title" placeholder="Job Title">

            <?php getCategoryStaticList('job_category'); ?>

            <textarea class="input" name="job_content" placeholder="Job Information"></textarea>

            <input type="hidden" value="1" name="create_new_job_offer_tokken">

            <input class="btn btn-primary btn-block" type="submit" value="Upload Job Offer">
        </form>
    </section>
</section>

<?php include('./templates/employer/footer.php'); ?>