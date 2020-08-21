<?php include('./templates/users/header.php'); ?>
<?php include('./src/controllers/signin.php'); ?>


<section class="row justify-content-center">
    <section class="col-12 col-sm-6 col-md-3">

        <form class="log-in-form" method="POST">

            <b class="form-text">Welcome</b>

            <div class="col-md-12">
                <b class="b-registration-text">Enter Your E-Mail</b>
                <input class="input" placeholder="User E-mail" type="text" name="user_email">
                <?php displayFormError('signin', 'user_email'); ?>
            </div>

            <div class="col-md-12">
                <b class="b-registration-text">Enter Your Password</b>
                <input class="input" placeholder="User Password" type="password" name="user_pass">
                <?php displayFormError('signin', 'user_pass'); ?>
            </div>

            <input type="hidden" name="user_request_tokken" value="1">

            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>


    </section>
</section>






<?php include('./templates/users/footer.php'); ?>