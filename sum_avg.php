<!DOCTYPE html>
<html>
<body>
<h2>Sum and Average Calculator</h2>
<form method="get">
  Enter numbers separated by commas: 
  <input type="text" name="numbers" placeholder="e.g. 2,5,8" required>
  <input type="submit" value="Calculate">
</form>

<?php
if (isset($_GET['numbers'])) {
    $nums = explode(",", $_GET['numbers']); // Convert input string to array
    $nums = array_map('trim', $nums); // Remove spaces
    $nums = array_map('floatval', $nums); // Convert to numbers

    $sum = array_sum($nums);
    $count = count($nums);
    $average = $count ? $sum / $count : 0;

    echo "Sum: $sum<br>";
    echo "Average: $average";
}
?>
</body>
</html>

