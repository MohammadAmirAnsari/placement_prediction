<!-- predict.php -->
<?php
$iq = $_POST['iq'];
$cgpa = $_POST['cgpa'];

$command = escapeshellcmd("python3 predict2.py $iq $cgpa");
$output = shell_exec($command);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Placement Prediction Result</title>
    <style>
        body {
            background: #f4f4f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin: 10px 0;
        }

        .result {
            color: <?php echo trim($output) === 'Placed' ? '#28a745' : '#dc3545'; ?>;
            font-weight: bold;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>🎓 Placement Prediction</h2>
        <p><strong>CGPA:</strong> <?php echo htmlspecialchars($cgpa); ?></p>
        <p><strong>IQ:</strong> <?php echo htmlspecialchars($iq); ?></p>
        <p class="result"><strong>Prediction:</strong> <?php echo trim($output); ?></p>
        <a href="index.php">🔙 Go Back</a>
    </div>
</body>

</html>