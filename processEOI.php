<?php
require_once ('settings.php');
$conn = new mysqli($host, $user, $pwd, $sql_db);
$applyTableSql = "CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT(11) AUTO_INCREMENT PRIMARY KEY,
    JobReferenceNumber VARCHAR(50) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    Dateofbirth DATE NOT NULL,
    Gender ENUM('Male', 'Female', 'Other') NOT NULL,
    Streetaddress VARCHAR(50) NOT NULL,
    Suburb VARCHAR(50) NOT NULL,
    State ENUM('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT') NOT NULL,
    Postcode INT NOT NULL,
    EmailAddress VARCHAR(50) NOT NULL,
    PhoneNumber VARCHAR(12) NOT NULL,
    Skill VARCHAR(100) NOT NULL,
    OtherSkills VARCHAR(100),
    Status VARCHAR(50) NOT NULL,
)";

$conn->query($applyTableSql) === TRUE;
    $jobrefnum = $_POST['jobrefnum'];
    $firstname = $_POST['firstname'];
    $lastname = ($_POST['lastname']);
    if (isset($_POST['dateofbirth'])) {
        $date = $_POST['dateofbirth'];
    
        // Attempt to convert the date string to a DateTime object
        $dob = DateTime::createFromFormat('d/m/Y', $date);
    
        // Check if the conversion was successful
        if ($dob !== false) {
            // Get the current date
            $currentDate = new DateTime();
    
            // Calculate the age difference in years
            $age = $currentDate->diff($dob)->y;
        } else {
            // Display the input and the error
            echo "Invalid date input: $date. Please enter the date in the format dd/mm/yyyy.";
            exit;
        }
    } else {
        $age = 20;
        $date = "";
    }
    if (isset($_POST['Gender'])) {$gender = $_POST['Gender'];} else $gender = null;
    $address = $_POST['streetaddress'];
    $town = $_POST['Suburb'];
    if (isset($_POST['state'])) {$state = $_POST['state'];} else $state = null;
    $postcode = $_POST['Postcode'];
    $email = $_POST['Email'];
    $phonenum = $_POST['phoneNumber'];
    $skills = isset($_POST['Skill']) ? implode(", ", $_POST['Skill']) : null;
    if (isset($_POST['othercheck'])) {$other_check = $_POST['othercheck'];} else $other_check = null;
    if (isset($_POST['otherskill'])) {$other_skill = $_POST['otherskill'];} else $other_skill = null;
    $status_name = 'New';

    function sanitise_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $jobrefnum = sanitise_input($jobrefnum);
    $firstname = sanitise_input($firstname);
    $lastname = sanitise_input($lastname);
    $date = sanitise_input($date);
    $gender = sanitise_input($gender);
    $address = sanitise_input($address);
    $town = sanitise_input($town);
    $state = sanitise_input($state);
    $postcode = sanitise_input($postcode);
    $email = sanitise_input($email);
    $phonenum = sanitise_input($phonenum);
    $skills = sanitise_input($skills);
    $other_skill = sanitise_input($other_skill);

    $errMSg =  "";


    
    $conn = new mysqli($host, $user, $pwd, $sql_db);


    if ($jobrefnum == "") {
        $errMSg .= "<p>You must enter your job reference number </p>";
    }
    else if (!preg_match("/^[A-Za-z0-9]{5}$/", $jobrefnum)) {
        $errMSg .= "<p>Exactly 5 alphanumeric charactersr in your job refernce number </p>";
    }
    if ($firstname == "") {
        $errMSg .= "<p>You must enter your first name </p>";
    }
    else if (!preg_match("/^[A-Za-z]{1,20}$/", $firstname)) {
        $errMSg .= "<p>Maximum 20 alpha characters in your first name </p>";
    }
    if ($lastname == "") {
        $errMSg .= "<p>You must enter your last name </p>";
    }
    else if (!preg_match("/^[A-Za-z]{1,20}$/", $lastname)) {
        $errMSg .= "<p>Maximum 20 alpha character in your last name </p>";
    }
    if ($date==""){
        $errMSg .= "<p>You must enter a date of birth</p>";
    }
    else if (!preg_match("/^(0[1-9]|[1-2][0-9]|3[01])\/(0[1-9]|1[0-2])\/((?!0000)\d{4})$/", $date)){
        $errMSg .= "<p> You must enter dd/mm/yyyy </p>";
    }
    else if ($age < 15 || $age > 80){
        $errMSg .= "<p> Your age must be between 15 and 80</p>";
        
    }
    if ($gender == "") {
        $errMSg .= "<p>You must choose 1 gender </p>";
    }
    if ($address == "") {
        $errMSg .= "<p>You must enter your address</p>";
    }
    else if (!preg_match("/^.{1,40}$/", $address)) {
        $errMSg .= "<p>Maximum 40 character in your address </p>";
    }

    if ($town == "") {
        $errMSg .= "<p>You must enter your town</p>";
    }
    else if (!preg_match("/^.{1,40}$/", $town)) {
        $errMSg .= "<p>Maximum 40 character in your town </p>";
    }

    if ($state == "") {
        $errMSg .= "<p>You must choose your state</p>";
    }

    if ($postcode == "") {
        $errMSg .= "<p>You must enter your postcode</p>";
    }
    else if (!preg_match("/^\d{4}$/", $postcode)) {
        $errMSg .= "<p>Exactly 4 digits in your postcode </p>";
    }
    else {
        switch ($state) {
            case 'NSW':
                if (!in_array($postcode, range(1000, 2599)) && !in_array($postcode, range(2619, 2899)) && !in_array($postcode, range(2921, 2999))) {
                    $errMSg .= "<p>The entered postcode isn't within the NSW region.</p>";
                }
                break;
    
            case 'ACT':
                if (!in_array($postcode, range(200, 299)) && !in_array($postcode, range(2600, 2618)) && !in_array($postcode, range(2900, 2920))) {
                    $errMSg .= "<p>The entered postcode isn't within the ACT region.</p>";
                }
                break;
    
            case 'VIC':
                if (!in_array($postcode, range(3000, 3999)) && !in_array($postcode, range(8000, 8999))) {
                    $errMSg .= "<p>The entered postcode isn't within the VIC region.</p>";
                }
                break;
    
            case 'QLD':
                if (!in_array($postcode, range(4000, 4999)) && !in_array($postcode, range(9000, 9999))) {
                    $errMSg .= "<p>The entered postcode isn't within the QLD region.</p>";
                }
                break;
    
            case 'SA':
                if (!in_array($postcode, range(5000, 5999))) {
                    $errMSg .= "<p>The entered postcode isn't within the SA region.</p>";
                }
                break;
    
            case 'WA':
                if (!in_array($postcode, range(6000, 6999))) {
                    $errMSg .= "<p>The entered postcode isn't within the WA region.</p>";
                }
                break;
    
            case 'TAS':
                if (!in_array($postcode, range(7000, 7999))) {
                    $errMSg .= "<p>The entered postcode isn't within the TAS region.</p>";
                }
                break;
    
            case 'NT':
                if (!in_array($postcode, range(800, 999))) {
                    $errMSg .= "<p>The entered postcode isn't within the NT region.</p>";
                }
                break;
    
            default:
                $errMSg .= "<p>The selected state doesn't match the expected format.</p>";
        }
    }

    if ($email == "") {
        $errMSg .= "<p>You must enter your email</p>";
    }
    else if (!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/", $email)) {
        $errMSg .= "<p>You must enter correct form in your email </p>";
    }

    if ($phonenum == "") {
        $errMSg .= "<p>You must enter your phone number</p>";
    }
    else if (!preg_match("/^[0-9\s]{8,12}$/", $phonenum)) {
        $errMSg .= "<p>Your phone number must be between 8 to 12 </p>";
    }

    if ($other_check != "" && $other_skill == "") {
        $errMSg .= "You must enter your descrption for other skills if other skills checkbox is checked.</p>";
    }

    if ($errMSg != ""){
        echo '<div class="errorMsg">' . $errMSg .  '</div>';
    } else {
        $conn = new mysqli($host, $user, $pwd, $sql_db);
$newdate = date("Y-m-d", strtotime(str_replace('/','-',$date)));

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL insert query
$sql = "INSERT INTO eoi (JobReferenceNumber, FirstName, LastName, Dateofbirth, StreetAddress, Suburb, State, Gender, Postcode, EmailAddress, PhoneNumber, Skill, OtherSkills, Status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Prepare the statement
$stmt = $conn->prepare($sql);


// Bind the parameters
$stmt->bind_param(
    'ssssssssisssss', 
    $jobrefnum,
    $firstname,
    $lastname,
    $newdate,
    $address,
    $town,
    $state,
    $gender,
    $postcode,
    $email,
    $phonenum,
    $skills,
    $other_skill,
    $status_name
);

if ($stmt->execute()) {
    echo '<div class = "errMSg">Your EOI number is: </div>'. $conn -> insert_id;
} else {
    echo "Error submitting application: " . $conn->error;
}



// Close the statement and database connection
$stmt->close();
$conn->close();
}
$currentURL = $_SERVER['REQUEST_URI'];
if (strpos($currentURL, 'apply.php') !==false){
}else{
   header("Location: apply.php");
   exit();
}
?>