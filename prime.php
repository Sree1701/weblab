<!DOCTYPE html>
<html>
<body>
<h2>Prime Numbers Generator</h2>
<form method="get">
  Enter a number: <input type="number" name="num" min="2" required>
  <input type="submit" value="Generate">
</form>

<?php
if (isset($_GET['num'])) {
    $n = $_GET['num'];
    for ($i = 2; $i <= $n; $i++) {
        $prime = true;
        for ($j = 2; $j <= sqrt($i); $j++) {
            if ($i % $j == 0) { $prime = false; break; }
        }
        if ($prime) echo $i . " ";
    }
}
?>
</body>
</html>

