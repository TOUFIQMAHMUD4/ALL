<!-- filepath: c:\xampp\htdocs\PHP\class24(CRUD-1)\EV4.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Factorial Calculator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Factorial Calculator</h2>
    <form method="POST">
        <div class="form-group">
            <label>Enter a Number:</label>
            <input type="number" name="number" class="form-control" placeholder="Enter a number" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-3">Calculate</button>
    </form>
    <?php
    function factorial($n) {
        if ($n == 0 || $n == 1) {
            return 1; // ০ বা ১ এর ফ্যাক্টোরিয়াল ১
        }
        return $n * factorial($n - 1); // রিকার্সিভ কল
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $number = intval($_POST['number']);
        if ($number < 0) {
            echo '<div class="result text-center text-danger">Factorial is not defined for negative numbers.</div>';
        } else {
            $result = factorial($number);
            echo '<div class="result text-center text-success">Factorial of ' . $number . ' is ' . $result . '.</div>';
        }
    }
    ?>
</div>
</body>
</html>