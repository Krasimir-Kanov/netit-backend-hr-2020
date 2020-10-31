<?php include('./templates/headers/employ_header.php'); ?>
<?php include('./src/controllers/jobs.php'); ?>

<div id="job--content">
    <?php foreach (listAllJobOffers() as $key => $jobOffer) { ?>
        <form method="$_POST">
            <div class="row job_offers">
                <div class="col-sm-2 mb-10">
                    <div class="col-sm-2"><b>Company</b> </div> <?php echo $jobOffer['title']; ?>
                </div>
                <div class="col-sm-8 mb-10">
                    <div class="col-sm-8"><b>Content</b> </div> <?php echo $jobOffer['content']; ?>
                </div>
                <div class="col mb-10">
                    <div class="col"><b>Apply for Job </b> </div> <input type="submit" class="btn btn-primary btn-block" name="jobRequest">
                </div>
            </div>
        </form>
    <?php } ?>
    <?php Pagination::display(); ?>
</div>
<?php include('./templates/footers/footer.php'); ?>