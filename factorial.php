<!DOCTYPE html>
<html>
<body>
<h2>Factorial Calculator</h2>
<form method="get">
  Enter a number: <input type="number" name="num" min="0" required>
  <input type="submit" value="Calculate">
</form>

<?php
if (isset($_GET['num'])) {
    $n = $_GET['num'];
    $factorial = 1;

    for ($i = 1; $i <= $n; $i++) {
        $factorial *= $i;
    }

    echo "Factorial of $n is $factorial.";
}
?>
</body>
</html>

