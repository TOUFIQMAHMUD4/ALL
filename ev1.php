<!-- filepath: c:\xampp\htdocs\PHP\class24(CRUD-1)\ev1.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Prime Number Checker</title>
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
    <h2 class="text-center">Prime Number Checker</h2>
    <form method="POST">
        <div class="form-group">
            <label>Enter a Number:</label>
            <input type="number" name="number" class="form-control" placeholder="Enter a number" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-3">Check</button>
    </form>
    <?php
    function isPrime($number) {
        if ($number <= 1) return false; // ১ বা তার কম হলে প্রাইম নয়
        for ($i = 2; $i < $number; $i++) { // ২ থেকে শুরু করে সংখ্যার আগ পর্যন্ত চেক করা
            if ($number % $i == 0) return false; // যদি কোনো সংখ্যা দিয়ে ভাগ হয়, প্রাইম নয়
        }
        return true; // প্রাইম হলে true রিটার্ন করবে
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $number = intval($_POST['number']); // ইনপুট থেকে সংখ্যা গ্রহণ করা
        echo '<div class="result text-center">';
        if (isPrime($number)) {
            echo "<span class='text-success'>$number is a prime number.</span>";
        } else {
            echo "<span class='text-danger'>$number is not a prime number.</span>";
        }
        echo '</div>';
    }
    ?>
</div>
</body>
</html>