<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1>Contact Form</h1>

    <form action="process.php" method="POST" onsubmit="return validateForm()">
        <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required><br>

        <label for="age">Age:</label>
            <input type="number" id="age" name="age" required><br>

        <label for="contact">Contact:</label>
            <input type="number" id="contact" name="contact" required><br>

        <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br>

            <input type="submit" value="Submit">
    </form>
    </div>
    <script src="script.js">
</script>
</body>
</html>

<style>
    body {
        font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        background-color: #008080;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .contact-form {
        background-color: #789;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(192,192,192);
        width: 400px;
    }

    .contact-form h1 {
        text-align: center;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 10px 0 5px;
        font-weight: bold;
    }

    .form-group input[type="text"], input[type="number"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

    .btn {
        width: 100%;
        padding: 10px;
        background-color: #808080;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover {
        background-color:antiquewhite;
    }

    .error-message {
        color: red;
        font-size: 14px;
    }
</style>

<script>
    function validation(){
        let is Valid = true;

        // Clear previous error messages
        document.getElementById("first_name_error").innerHTML = "";
        document.getElementById("last_name_error").innerHTML = "";
        document.getElementById("age_error").innerHTML = "";
        document.getElementById("contact_error").innerHTML = "";
        document.getElementById("address_error").innerHTML = "";

        // Validate First Name
        const firstName = document.getElementById("first_name").value;
        if (firstName === "") {
            document.getElementById("last_name_error").innerHTML = "Last name is required.";
            isValid = false;
        }

        // Validate Age
        const age = document.getElementById("age").value;
        if (age === "" || isNaN(age) || age <= 0) {
            document.getElementById("age error").innerHTML = "Please enter a valid age.";
            isValid = false;
        }

        // Validate Contact Number
        const contact = document.getElementById("contact").value;
        if (contact === ""){
            document.getElementById("contact_error").innerHTML = "Contact number is required.";
            isValid = false;
        }

        // Validate Address
        const address = document.getElementById("address").value;
        if (address === "") {
            document.getElementById("address_error").innerHTML = "Address is required.";
            isValid = false;
        }

        return isValid;
    }
</script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $firstName = htmlspecialchars(trim($_POST['first_name']));
    $lastName = htmlspecialchars(trim($_POST['last_name']));
    $age = htmlspecialchars(trim($_POST['age']));
    $contact = htmlspecialchars(trim($_POST['contact']));
    $address = htmlspecialchars(trim($_POST['address']));

    // Basic validation in PHP
    $errors = [];

    if (empty($firstName)) {
        $errors[] = "First name is required.";
    }
    if (empty($lastName)) {
        $errors[] = "Last name is required.";
    }
    if (empty($age) || !is_numeric($age) || $age <= 0) {
        $errors[] = "Please enter a valid age.";
    }
    if (empty($contact)) {
        $errors[] = "Contact number is required.";
    }
    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    // If there are no errors, proceed to process the data
    if (empty($errors)) {
        echo "<h2>Form Submitted Successfully</h2>";
        echo "<p><strong>First Name:</strong> $firstName</p>";
        echo "<p><strong>Last Name:</strong> $lastName</p>";
        echo "<p><strong>Age:</strong> $age</p>";
        echo "<p><strong>Contact:</strong> $contact</p>";
        echo "<p><strong>Address:</strong> $address</p>";
    } else {
        // Display errors
        echo "<h2>Form Submission Failed</h2>";
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        echo "<a href='contact_form.html'>Go back to the form</a>";
    }
}
?>