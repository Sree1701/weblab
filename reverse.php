<!DOCTYPE html>
<html>
<body>
<h2>Reverse a Number</h2>
<form method="get">
  Enter a number: <input type="number" name="num" required>
  <input type="submit" value="Reverse">
</form>

<?php
if (isset($_GET['num'])) {
    $number = $_GET['num'];
    $reversed = strrev($number); // reverses the number as a string
    echo "Reversed number: $reversed";
}
?>
</body>
</html>

