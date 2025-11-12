<!DOCTYPE html>
<html>
<head>
    <title>Student Details Form</title>
</head>
<body>

<h2 style="text-align:center">Student Details Form</h2>

<form method="post" action="">
	<table border="1" cellpadding="8" cellspacing="0" align="center">
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" required></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email" required></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><textarea name="address" rows="3" cols="30" required></textarea></td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>
                <input type="radio" name="gender" value="Male" required> Male
                <input type="radio" name="gender" value="Female"> Female
                <input type="radio" name="gender" value="Other"> Other
            </td>
        </tr>
        <tr>
            <td>Date of Birth:</td>
           <td><input type="date" name="dob" min="1980-01-01" max="2010-12-31" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Submit">
            </td>
        </tr>
    </table>
</form>

<?php
if (isset($_REQUEST['submit'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];
    $gender = $_REQUEST['gender'];
    $dob = $_REQUEST['dob'];

    echo "<h3 style='text-align:center'>Student Details:</h3>";
    echo "<table border='1' cellpadding='8' cellspacing='0' align='center'>";
    echo "<tr><td>Name</td><td>$name</td></tr>";
    echo "<tr><td>Email</td><td>$email</td></tr>";
    echo "<tr><td>Address</td><td>$address</td></tr>";
    echo "<tr><td>Gender</td><td>$gender</td></tr>";
    echo "<tr><td>Date of Birth</td><td>$dob</td></tr>";
    echo "</table>";
}
?>

</body>
</html>

