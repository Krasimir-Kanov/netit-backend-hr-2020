<?php include('./templates/users/header.php'); ?>

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    </ol>

    <div class="carousel-inner">

        <div class="carousel-item active">
        <img src="./img/welcome.jpg" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="animate__animated animate__fadeInDown" style="animation-delay: 0.5s">Registration form for Employers</h5>
                <p class="animate__animated animate__fadeIn" style="animation-delay: 0.8s">If you are looking for a new EMPLOY register today and find it!</p>
                <p class="animate__animated animate__fadeIn" style="animation-delay: 1s"><a href="signup-employer.php">Sign Up</a></p>
            </div>
        </div>

        
        <div class="carousel-item">
        <img src="./img/welcome.jpg" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="animate__animated animate__fadeInDown" style="animation-delay: 0.5s">Registration form for Employ</h5>
                <p class="animate__animated animate__fadeIn" style="animation-delay: 0.8s">If you are looking for JOB please register and find your job!</p>
                <p class="animate__animated animate__fadeIn" style="animation-delay: 1s"><a href="signup.php">Sign Up</a></p>
            </div>
        </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<?php include('./templates/users/footer.php'); ?>