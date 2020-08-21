<?php include('./templates/users/header.php'); ?>
<?php include('./src/controllers/signup-employer.php'); ?>
<!-- РЕГИСТРАЦИЯ -->

<section class="row justify-content-center">
    <section class="col-12 col-sm-6 col-md-3">

        <form class="registration-form" method="POST">

            <b class="form-text">Employer Registration Form</b>

            <b class="b-registration-text">Company Information</b>
            <div class="form-row">

                <div class="col-md-6">
                    <?php displayFormError('signup-employer', 'user_name'); ?>
                    <input type="text" placeholder="Company Name" class="input" name="user_name">
                </div>

                <div class="col-md-6">
                    <?php displayFormError('signup-employer', 'user_category'); ?>
                    <input type="text" placeholder="Company Category" class="input" name="user_category">
                </div>

                <div class="col-md-12">
                    <?php displayFormError('signup-employer', 'user_information'); ?>
                    <input placeholder="Company Information" class="input" type="text" name="user_information">
                </div>

                <b class="b-registration-text">Account Information</b>
                <div class="col-md-6">
                    <?php displayFormError('signup-employer', 'user_email'); ?>
                    <input placeholder="E-mail" class="input" type="email" name="user_email">
                </div>

                <div class="col-md-6">
                    <input placeholder="Repeat E-mail" class="input" type="text" name="user_email_repeat">
                </div>

                <div class="col-md-6">
                    <?php displayFormError('signup-employer', 'user_pass'); ?>
                    <input placeholder="Password" class="input" type="password" name="user_pass">
                </div>

                <div class="col-md-6">
                    <input placeholder="Repeat Password" class="input" type="password" name="user_pass_repeat">
                </div>
                <input type='hidden' name="user_request_tokken" value="1">

                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>

    </section>
</section>

<?php include('./templates/users/footer.php'); ?>