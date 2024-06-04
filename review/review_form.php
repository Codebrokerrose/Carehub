<?php
// config.php
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "carehub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Page</title>
    <style>
        /* Form Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f8ff; /* Light blue background for the body */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #e0f7fa; /* Light blue background for the form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #007bff; /* Primary color for the heading */
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333; /* Dark color for labels */
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1rem;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff; /* Primary color for the submit button */
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }
    </style>
</head>
<body>
    <form action="review_form.php" method="post">
        <h2>Leave a Review</h2>
        <label for="username">Name:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $user = $_POST['username'];
        $comment = $_POST['comment'];

        // Create table if not exists
        $createTableSQL = "CREATE TABLE IF NOT EXISTS reviews (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            comment VARCHAR(255) UNIQUE NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        if (!$conn->query($createTableSQL)) {
            die("Error creating table: " . $conn->error);
        }

        // Prepare and execute SQL statement to insert review into database
        $stmt = $conn->prepare("INSERT INTO reviews (username, comment) VALUES (?, ?)");
        $stmt->bind_param("ss", $user, $comment);

        if ($stmt->execute()) {
            // Redirect back to review page after successful submission
            header("Location: review_page.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
    ?>
</body>
</html>
