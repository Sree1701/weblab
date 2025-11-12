<?php
// Database connection
$servername = "localhost";
$username = "root"; // change if needed
$password = "";     // change if needed
$dbname = "company";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

// Insert employee if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    $stmt = $conn->prepare("INSERT INTO employees (name, designation, department, salary) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd", $name, $designation, $department, $salary);

    if ($stmt->execute()) {
        $message = "<p style='color:green;'>Employee added successfully.</p>";
    } else {
        $message = "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
    <style>
        body { font-family: Arial; margin: 50px; }
        form { width: 400px; margin-bottom: 30px; }
        input { width: 100%; padding: 8px; margin: 5px 0; }
        input[type="submit"] { background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
        table { border-collapse: collapse; width: 80%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .message { margin-bottom: 20px; }
    </style>
</head>
<body>

<h2>Employee Details Form</h2>
<div class="message"><?php echo $message; ?></div>

<form method="POST" action="">
    <label>Name:</label><br>
    <input type="text" name="name" required><br>

    <label>Designation:</label><br>
    <input type="text" name="designation"><br>

    <label>Department:</label><br>
    <input type="text" name="department"><br>

    <label>Salary:</label><br>
    <input type="number" step="0.01" name="salary"><br>

    <input type="submit" name="submit" value="Add Employee">
</form>

<h2>Employee Records</h2>

<?php
// Display all employees
$result = $conn->query("SELECT * FROM employees");

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Salary</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['emp_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['designation']}</td>
                <td>{$row['department']}</td>
                <td>{$row['salary']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No employee records found.</p>";
}
?>

</body>
</html>

