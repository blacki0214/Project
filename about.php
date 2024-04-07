<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About page</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
</head>
<body>
<?php include_once ('menu.inc'); ?>
    <div class="about">
            <h1>Group Information</h1>
            <dl>
                <dt>Group name</dt>
                <dd>InnoGear</dd>

                <dt>Group ID</dt>
                <dd>104198640 and 105000908</dd>

                <dt>Tutor's name:</dt>
                <dd>Eric Le</dd>

                <dt>Course name:</dt>
                <dd>COS10026</dd>
            </dl>
        
        <figure>
            <img src="images/groupphoto.jpg" alt="">
            <figcaption>Group photo</figcaption>
        </figure>

        <h2>Timetable</h2>

        <table>
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>13:00</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                </tr>
            </tbody>
        </table>

        <dl class="email">
            <dt>Email:</dt>
            <dd><a href="104198640@student.swin.edu.au">104198640@student.swin.edu.au</a> and <a href="105000908@student.swin.edu.au">105000908@student.swin.edu.au</a></dd>
        </dl>
    </div>
    

    <?php
        include_once('footer.inc');
    ?>
</body>
</html>