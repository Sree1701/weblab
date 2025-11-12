<?php
// book_form.php

// Database connection details
$servername = "localhost";
$username = "root";     // Change if needed
$password = "";         // Change if needed
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_no = $_POST['book_no'];
    $title = $_POST['title'];
    $edition = $_POST['edition'];
    $publisher = $_POST['publisher'];

    // Prepare and execute SQL insert
    $stmt = $conn->prepare("INSERT INTO bookdetails (book_no, title, edition, publisher) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $book_no, $title, $edition, $publisher);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Book added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Information</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        form { margin-bottom: 30px; }
        input[type="text"], input[type="number"] { padding: 5px; width: 250px; }
        input[type="submit"] { padding: 8px 15px; }
        table { border-collapse: collapse; width: 80%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2>Enter Book Information</h2>
<form method="POST" action="">
    <label>Book No:</label><br>
    <input type="number" name="book_no" required><br><br>

    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Edition:</label><br>
    <input type="text" name="edition"><br><br>

    <label>Publisher:</label><br>
    <input type="text" name="publisher"><br><br>

    <input type="submit" value="Add Book">
</form>

<hr>

<h2>Book Details</h2>

<?php
// Display all book records
$sql = "SELECT * FROM bookdetails";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Book No</th><th>Title</th><th>Edition</th><th>Publisher</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['book_no']}</td>
                <td>{$row['title']}</td>
                <td>{$row['edition']}</td>
                <td>{$row['publisher']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No books found.</p>";
}

$conn->close();
?>

</body>
</html>

