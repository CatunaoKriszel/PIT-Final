<?php 

include "config.php";

// Handle update request
if (isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $user_id = $_POST['user_id'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `users` SET `firstname`='$firstname', `lastname`='$lastname', `email`='$email', `password`='$password', `gender`='$gender' WHERE `id`='$user_id'";
   
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "<div class='success-message'>Record updated successfully.</div>";
    } else {
        echo "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Fetch user data for update
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $first_name = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            $gender = $row['gender'];
            $id = $row['id'];
        }
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Update Form</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    color: #333;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    max-width: 600px;
                    margin: 50px auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 8px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }
                h2 {
                    text-align: center;
                    color: #555;
                }
                form {
                    margin-top: 20px;
                }
                fieldset {
                    border: none;
                }
                label {
                    font-weight: bold;
                    display: block;
                    margin-bottom: 5px;
                }
                input[type="text"], input[type="email"], input[type="password"] {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 15px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }
                input[type="radio"] {
                    margin-right: 10px;
                }
                .button-container {
                    display: flex;
                    justify-content: space-between;
                }
                .btn {
                    padding: 10px 20px;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 5px;
                    text-align: center;
                }
                .btn-primary {
                    background-color: #007bff;
                }
                .btn-secondary {
                    background-color: #6c757d;
                }
                .btn:hover {
                    opacity: 0.9;
                }
                .success-message {
                    color: green;
                    margin-bottom: 20px;
                    text-align: center;
                }
                .error-message {
                    color: red;
                    margin-bottom: 20px;
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2>User Update Form</h2>
                <form action="" method="post">
                    <fieldset>
                        <legend>Personal Information:</legend>

                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname" value="<?php echo $first_name; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $id; ?>">

                        <label for="lastname">Last Name:</label>
                        <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>">

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo $email; ?>">

                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" value="<?php echo $password; ?>">

                        <label>Gender:</label>
                        <input type="radio" id="male" name="gender" value="Male" <?php if ($gender == 'Male') { echo "checked"; } ?>>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="Female" <?php if ($gender == 'Female') { echo "checked"; } ?>>
                        <label for="female">Female</label>
                    </fieldset>

                    <div class="button-container">
                        <input type="submit" value="Update" name="update" class="btn btn-primary">
                        <a href="view.php" class="btn btn-secondary">Back to View</a>
                    </div>
                </form>
            </div>
        </body>
        </html>

        <?php
    } else {
        header('Location: view.php');
    }
}
?>
