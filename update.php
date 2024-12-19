<?php
include "config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE id=$id";
    $result = $conn->query($sql);
    $book = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    $sql = "UPDATE books SET title='$title', author='$author', genre='$genre', year='$year', description='$description' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
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
            background-color: #ffffff;
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
        .form-container input, .form-container textarea {
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
        .form-container a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #c0392b; /* Dark red for links */
            text-decoration: none;
        }
        .form-container a:hover {
            text-decoration: underline;
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
        <h2>Edit Book</h2>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
            <input type="text" name="title" value="<?php echo $book['title']; ?>" placeholder="Book Title" required>
            <input type="text" name="author" value="<?php echo $book['author']; ?>" placeholder="Author" required>
            <input type="text" name="genre" value="<?php echo $book['genre']; ?>" placeholder="Genre" required>
            <input type="number" name="year" value="<?php echo $book['year']; ?>" placeholder="Publication Year" required>
            <textarea name="description" placeholder="Description" rows="4" required><?php echo $book['description']; ?></textarea>
            <input type="submit" name="update" value="Update Book">
        </form>
        <a href="view.php">Back to View</a>
    </div>
</body>
</html>
