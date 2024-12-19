<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
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

        .form-container input,
        .form-container textarea,
        .form-container select {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-container textarea {
            resize: none;
        }

        .form-container input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .notification {
            text-align: center;
            font-size: 14px;
            color: green;
            margin-bottom: 20px;
        }

        .error {
            color: red;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }

            .form-container h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add New Book</h2>

        <?php 
        include "config.php";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $author = trim($_POST['author']);
            $genre = trim($_POST['genre']);
            $year = intval($_POST['year']);
            $description = trim($_POST['description']);

            $sql = "INSERT INTO `books`(`title`, `author`, `genre`, `year`, `description`) 
                    VALUES (?, ?, ?, ?, ?);";

            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sssds", $title, $author, $genre, $year, $description);

                if ($stmt->execute()) {
                    echo '<p class="notification">Book added successfully!</p>';
                } else {
                    echo '<p class="notification error">Error: ' . $stmt->error . '</p>';
                }
                $stmt->close();
            } else {
                echo '<p class="notification error">Error: ' . $conn->error . '</p>';
            }

            $conn->close();
        }
        ?>

        <form action="" method="POST">
            <input type="text" name="title" placeholder="Book Title" required>
            <input type="text" name="author" placeholder="Author" required>
            <input type="text" name="genre" placeholder="Genre" required>
            <input type="number" name="year" placeholder="Publication Year" min="1000" max="9999" required>
            <textarea name="description" placeholder="Description" rows="4" required></textarea>
            <input type="submit" value="Add Book">
        </form>
    </div>
</body>
</html>
