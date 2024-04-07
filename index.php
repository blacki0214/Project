<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
</head>
<body>
<?php include_once ('menu.inc'); ?>
    
    <section class="home">
        <div class="content">
            <h3>Welcome to</h3>
            <p>InnoGear</p>
            <a href="apply.php" class="btn"><b>Apply Now</b></a> <br>
            <a href="jobs.php" id="job"><b>Job Description</b></a>
        <div class="video-container">
            <video src="images/home.mp4" loop autoplay muted></video>
        </div>
    </section>

<section class="container">
    <div class="card-container">
        <div class="card">
            <img src="images/datascience.jpg" alt="datascience">
            <div class="card-content">
                <h1>Data Sciencetist</h1>
                <p>A Data Scientist is a professional who analyzes and interprets complex data sets to inform business decision-making.</p>
                <a href="jobs.php" class="card-button">Read More</a>
            </div>
        </div>

        <div class="card">
            <img src="images/dev.jpg" alt="datascience">
            <div class="card-content">
                <h1>Web Developer</h1>
                <p>A web developer's job is to create websites. While their primary role is to ensure the website is visually appealing and easy to navigate, many web developers are also responsible for the website’s performance and capacity. </p>
                <a href="jobs.php" class="card-button">Read More</a>
            </div>
        </div>

    </div>
</section>

    

    <?php
        include_once('footer.inc');
    ?>
</body>
</html>