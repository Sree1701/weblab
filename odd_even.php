<!DOCTYPE html>
<html>
<head>
    <title>Odd or Even Checker</title>
</head>
<body>
    <h2>Check Odd or Even Number</h2>

    <form method="get" action="">
        Enter a number: 
        <input type="number" name="num" required>
        <input type="submit" value="Check">
    </form>

    <?php
    if (isset($_GET['num'])) {
        $number = $_GET['num'];

        if ($number % 2 == 0) {
            echo "The number $number is Even.";
        } else {
            echo "The number $number is Odd.";
        }
    }
    ?>
</body>
</html>

