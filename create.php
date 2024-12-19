<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container input, .form-container textarea, .form-container select {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-container input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #555;
        }
        .notification {
            text-align: center;
            font-size: 14px;
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Book Information Form</h2>
        <?php 
        include "config.php";

        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $genre = $_POST['genre'];
            $publication_year = $_POST['publication_year'];
            $description = $_POST['description'];

            $sql = "INSERT INTO `books`(`title`, `author`, `genre`, `publication_year`, `description`) 
                    VALUES ('$title', '$author', '$genre', '$publication_uyear', '$description')";

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
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
