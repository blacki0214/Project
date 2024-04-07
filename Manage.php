<!DOCTYPE html>
<html>
<head>
    <title>EOI Management</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <?php include_once ('menu.inc'); ?>
  <div class="management">
  <h1>EOI Management</h1>

  <h2>List all EOIs</h2>
  <form method="post" action="Manage.php">
    <input type="submit" name="list_all" value="List all EOIs">
  </form>

  <?php
  require_once ('settings.php');
  if (isset($_POST['list_all'])) {
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
      die('Connection failed: '. mysqli_connect_error());
    }
    $sql = 'SELECT * FROM eoi';
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo '<table border="1">';
      echo '<tr><th>ID</th><th>Job Reference Number</th><th>First Name</th><th>Last Name</th><th>Date of birth</th><th>Street Address</th><th>Suburb</th><th>State</th><th>Postcode</th><th>Gender</th><th>Email Address</th><th>Phone Number</th><th>Skill</th><th>Other Skills</th><th>Status</th></tr>';
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'. $row['EOInumber']. '</td>';
        echo '<td>'. $row['JobReferenceNumber']. '</td>';
        echo '<td>'. $row['FirstName']. '</td>';
        echo '<td>'. $row['LastName']. '</td>';
        echo '<td>'. $row['Dateofbirth']. '</td>';
        echo '<td>'. $row['StreetAddress']. '</td>';
        echo '<td>'. $row['Suburb']. '</td>';
        echo '<td>'. $row['State']. '</td>';
        echo '<td>'. $row['Postcode']. '</td>';
        echo '<td>'. $row['Gender']. '</td>';
        echo '<td>'. $row['EmailAddress']. '</td>';
        echo '<td>'. $row['PhoneNumber']. '</td>';
        echo '<td>'. $row['Skill']. '</td>';
        echo '<td>'. $row['OtherSkills']. '</td>';
        echo '<td>'. $row['Status']. '</td>';
        echo '</tr>';
      }
      echo '</table>';
    } else {
      echo 'No EOIs found.';
    }
    mysqli_close($conn);
  }
 ?>

  <h2>List all EOIs for a particular position</h2>
  <form method="post" action="Manage.php">
    Job Reference: <input type="text" name="job_ref">
    <input type="submit" name="list_position" value="List EOIs">
  </form>

  <?php
  if (isset($_POST['list_position'])) {
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    $job_ref = mysqli_real_escape_string($conn, $_POST['job_ref']);
    $sql = "SELECT * FROM eoi WHERE JobReferenceNumber = '$job_ref'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo '<table border="1">';
      echo '<tr><th>ID</th><th>Job Reference Number</th><th>First Name</th><th>Last Name</th><th>Date of birth</th><th>Street Address</th><th>Suburb</th><th>State</th><th>Postcode</th><th>Gender</th><th>Email Address</th><th>Phone Number</th><th>Skill</th><th>Other Skills</th><th>Status</th></tr>';
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'. $row['EOInumber']. '</td>';
        echo '<td>'. $row['JobReferenceNumber']. '</td>';
        echo '<td>'. $row['FirstName']. '</td>';
        echo '<td>'. $row['LastName']. '</td>';
        echo '<td>'. $row['Dateofbirth']. '</td>';
        echo '<td>'. $row['StreetAddress']. '</td>';
        echo '<td>'. $row['Suburb']. '</td>';
        echo '<td>'. $row['State']. '</td>';
        echo '<td>'. $row['Postcode']. '</td>';
        echo '<td>'. $row['Gender']. '</td>';
        echo '<td>'. $row['EmailAddress']. '</td>';
        echo '<td>'. $row['PhoneNumber']. '</td>';
        echo '<td>'. $row['Skill']. '</td>';
        echo '<td>'. $row['OtherSkills']. '</td>';
        echo '<td>'. $row['Status']. '</td>';
        echo '</tr>';
      }
      echo '</table>';
    } else {
      echo 'No EOIs found for this position.';
    }
  }
  ?>

  <h2>List all EOIs for a particular applicant</h2>
  <form method="post" action="Manage.php">
    First Name: <input type="text" name="first_name">
    Last Name: <input type="text" name="last_name">
    <input type="submit" name="list_applicant" value="List EOIs">
  </form>

  <?php
  if (isset($_POST['list_applicant'])) {
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $sql = "SELECT * FROM eoi WHERE FirstName = '$first_name' AND LastName = '$last_name'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo '<table border="1">';
      echo '<tr><th>ID</th><th>Job Reference Number</th><th>First Name</th><th>Last Name</th><th>Date of birth</th><th>Street Address</th><th>Suburb</th><th>State</th><th>Postcode</th><th>Gender</th><th>Email Address</th><th>Phone Number</th><th>Skill</th><th>Other Skills</th><th>Status</th></tr>';
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'. $row['EOInumber']. '</td>';
        echo '<td>'. $row['JobReferenceNumber']. '</td>';
        echo '<td>'. $row['FirstName']. '</td>';
        echo '<td>'. $row['LastName']. '</td>';
        echo '<td>'. $row['Dateofbirth']. '</td>';
        echo '<td>'. $row['StreetAddress']. '</td>';
        echo '<td>'. $row['Suburb']. '</td>';
        echo '<td>'. $row['State']. '</td>';
        echo '<td>'. $row['Postcode']. '</td>';
        echo '<td>'. $row['Gender']. '</td>';
        echo '<td>'. $row['EmailAddress']. '</td>';
        echo '<td>'. $row['PhoneNumber']. '</td>';
        echo '<td>'. $row['Skill']. '</td>';
        echo '<td>'. $row['OtherSkills']. '</td>';
        echo '<td>'. $row['Status']. '</td>';
        echo '</tr>';
      }
      echo '</table>';
    } else {
      echo 'No EOIs found for this applicant.';
    }
  }
  ?>

  <h2>Delete all EOIs with a specified job reference number</h2>
  <form method="post" action="Manage.php">
    Job Reference: <input type="text" name="job_ref">
    <input type="submit" name="delete_eois" value="Delete EOIs">
  </form>

  <?php
  if (isset($_POST['delete_eois'])) {
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    $job_ref = mysqli_real_escape_string($conn, $_POST['job_ref']);
    $sql = "DELETE FROM eoi WHERE JobReferenceNumber = '$job_ref'";
    if (mysqli_query($conn, $sql)) {
      echo 'All EOIs with job reference number ' . $job_ref . ' have been deleted.';
    } else {
      echo 'Error: ' . mysqli_error($conn);
    }
  }
  ?>

  <h2>Change the status of an EOI</h2>
  <form method="post" action="Manage.php">
    EOI ID: <input type="text" name="eoi_id">
    New Status: <input type="text" name="new_status">
    <input type="submit" name="change_status" value="Change Status">
  </form>

  <?php
  if (isset($_POST['change_status'])) {
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    $eoi_id = mysqli_real_escape_string($conn, $_POST['eoi_id']);
    $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);
    $sql = "UPDATE eoi SET Status = '$new_status' WHERE EOInumber = $eoi_id";
    if (mysqli_query($conn, $sql)) {
      echo 'The status of EOI with ID ' . $eoi_id . ' has been changed to ' . $new_status . '.';
    } else {
      echo 'Error: ' . mysqli_error($conn);
    }
  }
  ?>

</div>
  <?php require_once('footer.inc') ?>
</body>
</html>