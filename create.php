<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Information Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8d7da; /* Light red background */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            transition: transform 0.2s;
        }
        .form-container:hover {
            transform: scale(1.02);
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #c0392b; /* Dark red for the title */
            font-size: 24px;
            font-weight: bold;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-container input, .form-container textarea, .form-container select {
            margin-bottom: 15px;
            padding: 12px;
            width: 100%;
            border: 1px solid #e74c3c; /* Red border */
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        .form-container input:focus, .form-container textarea:focus {
            border-color: #c0392b; /* Darker red on focus */
            outline: none;
        }
        .form-container input[type="submit"] {
            background-color: #c0392b; /* Dark red button */
            color: #ffffff;
            border: none;
            cursor: pointer;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }
        .form-container input[type="submit"]:hover {
            background-color: #a93226; /* Darker red on hover */
            transform: translateY(-2px);
        }
        .notification {
            text-align: center;
            font-size: 14px;
            color: #28a745; /* Green for success messages */
            margin-top: 10px;
        }
        .error {
            color: #c0392b; /* Dark red for error messages */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add a New Book</h2>
        <?php 
        include "config.php";

        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $genre = $_POST['genre'];
            $year = $_POST['year'];
            $description = $_POST['description'];

            $sql = "INSERT INTO books (title, author, genre, year, description) 
                    VALUES ('$title', '$author', '$genre', '$year', '$description')";

            $result = $conn->query($sql);

            if ($result === TRUE) {
                echo '<p class="notification">Book added successfully.</p>';
            } else {
                echo '<p class="notification error">Error: ' . $sql . '<br>' . $conn->error . '</p>';
            }
            $conn->close();
        }
        ?>
        <form action="" method="POST">
            <input type="text" name="title" placeholder="Book Title" required>
            <input type="text" name="author" placeholder="Author" required>
            <input type="text" name="genre" placeholder="Genre" required>
            <input type="number" name="year" placeholder="Publication Year" required>
            <textarea name="description" placeholder="Description" rows="4" required></textarea>
            <input type="submit" name="submit" value="Add Book">
        </form>
    </div>
</body>
</html>
