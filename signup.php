<?php include('./templates/headers/users_header.php');       ?>
<?php include('./src/controllers/signup.php'); ?>

<section class="row justify-content-center">
    <section class="col-12 col-sm-6 col-md-3">
        <form class="registration-form" method="POST">
            <b class="form-text">Employ Registration Form</b>
            <b class="b-registration-text">Personal Information</b>
            <div class="form-row">
                <div class="col-md-6">
                    <?php displayFormError('signup', 'user_name'); ?>
                    <input placeholder="User name" class="input" type="text" name="user_name">
                </div>

                <div class="col-md-6">
                    <?php displayFormError('signup', 'user_age'); ?>
                    <input placeholder="Date of Birth" class="input" onfocus="(type='date')" name="user_age">
                </div>

                <div class="col-md-6">
                    <?php displayFormError('signup', 'user_fname'); ?>
                    <input placeholder="First Name" class="input" type="text" name="user_fname">
                </div>

                <div class="col-md-6">
                    <?php displayFormError('signup', 'user_lname'); ?>
                    <input placeholder="Last name" class="input" type="text" name="user_lname">
                </div>

                <div class="col-md-6">
                    <?php displayFormError('signup', 'user_city'); ?>
                    <input placeholder="Place of Birth" class="input" type="text" name="user_city">
                </div>

                <div class="col-md-6">
                    <?php displayFormError('signup', 'user_number'); ?>
                    <input placeholder="Phone Number" class="input" type="tel" name="user_number">
                </div>

                <b class="b-registration-text">Account Information</b>
                <div class="col-md-6">
                    <?php displayFormError('signup', 'user_email'); ?>
                    <input placeholder="E-mail" class="input" type="email" name="user_email">
                </div>

                <div class="col-md-6">
                    <input placeholder="Repeat E-mail" class="input" type="text" name="user_email_repeat">
                </div>

                <div class="col-md-6">
                    <?php displayFormError('signup', 'user_pass'); ?>
                    <input placeholder="Password" class="input" type="password" name="user_pass">
                </div>

                <div class="col-md-6">
                    <input placeholder="Repeat Password" class="input" type="password" name="user_pass_repeat">
                </div>
                <input type='hidden' name="user_request_tokken" value="1">
                <input type="submit" class="btn btn-primary btn-block">
            </div>
        </form>
    </section>
</section>
<?php include('./templates/footers/footer.php'); ?>