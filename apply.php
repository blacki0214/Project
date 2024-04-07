<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Application Form</title>
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0" />
    <link rel="stylesheet" href="styles/formstyle.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
</head>

<body>
<?php include_once ('menu.inc'); ?>
    <div class="container">
        <h1 class="form-title">Application form</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" novalidate = "novalidate">
            <div class="main-user-info">
                <div class="user-input-box">
                    <label for="jrn">Job Reference Number</label>
                    <input type="text" id="jrn" name="jobrefnum" pattern="[a-zA-Z0-9]{5}" required
                        placeholder="Please enter 5 characters" />
                </div>
                <div class="user-input-box">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Enter Phone Number"
                        pattern="[\d\-+\s]{8,12}" required  />
                </div>
                <div class="user-input-box">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" maxlength="20" required >
                </div>
                <div class="user-input-box">
                    <label for="LastName">Last Name</label>
                    <input type="text" id="LastName" name="lastname" maxlength="20" required />
                </div>
                <div class="user-input-box">
                    <label for="dob">Date of birth</label>
                    <input type="text" id="dateofbirth" name="dateofbirth" placeholder="dd/mm/yyyy"
                        pattern="\d{1,2}\/\d{1,2}\/\d{4}" />
                </div>
                <div class="user-input-box">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="Email" />
                </div>
                <div class="user-input-box">
                    <label for="street">Street address</label>
                    <input type="text" name="streetaddress" id="sa" maxlength="40" required />
                </div>
                <div class="user-input-box">
                    <label for="s/t">Suburb/town</label>
                    <input type="text" id="suburb" name="Suburb" maxlength="40" required />
                </div>
                <div class="user-input-box">
                    <label for="State">State</label>
                    <select name="state" id="state" required>
                        <option value="">Please select</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>
                </div>
                <div class="user-input-box">
                    <label for="Postcode">Postcode</label>
                    <input type="text" name="Postcode" id="PC" pattern="[0-9]{4}" required 
                        placeholder="Please enter 4 numbers">
                </div>
                <div class="gender-details-box">
                    <span class="gender-title">Gender</span>
                    <div class="gender-category">
                        <input type="radio" name="Gender" id="male" value="Male">
                        <label for="male">Male</label>
                        <input type="radio" name="Gender" id="female" value="Female">
                        <label for="female">Female</label>
                        <input type="radio" name="Gender" id="other" value="Other">
                        <label for="other">Other</label>
                    </div>
                </div>
                
                <div class="user-skill">
                    <label for="">Select your skill</label>
                    <br>
                    <label for="skill-1">Programming</label>
                    <input type="checkbox" id="skill-1" name="Skill[]" value="Programming">
                 <br>
                    <label for="skill-2">Data analysis</label>
                    <input type="checkbox" id="skill-2" name="Skill[]" value="Data analysis">
                 <br>
                    <label for="skill-3">Systems and networks</label>
                    <input type="checkbox" id="skill-3" name="Skill[]" value="Systems and networks">
                <br>
                    <label for="other">Other</label>
                    <input type="checkbox" id="other" name="othercheck" value="Other">
                    <textarea id="other-skill" name="otherskill" rows="7" cols="50" placeholder="Enter any other skills you possess"></textarea>
                </div>
                    
            </div>
            <div class="form-submit-btn">
                <input type="submit" value="Apply">
            </div>
        </form>
        
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        require_once('processEOI.php');
    }
    ?>
    <?php
        include_once('footer.inc');
    ?>
</body>
</html>