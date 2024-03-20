<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $financial_goal = $_POST['financial_goal'];
    $best_instrument = $_POST['best_instrument'];

    // Connect to the database (replace hostname, username, password, dbname)
    $conn = new mysqli("localhost", "root", "", "details");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO user_submissions (name, email, financial_goal, best_instrument) VALUES (?, ?, ?, ?)");

    // Bind parameters and execute the statement
    $stmt->bind_param("ssss", $name, $email, $financial_goal, $best_instrument);
    $stmt->execute();

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect to a success page or display a success message
    echo "Submission successful!";
} else {
    // If the form is not submitted, redirect to the homepage or display an error message
    echo "Error: Form not submitted.";
}
?>
