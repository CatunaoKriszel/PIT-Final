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
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 400px;
            transition: transform 0.2s;
        }
        .form-container:hover {
            transform: scale(1.02);
        }
        .form-container h2 {
            text-align: center;
            color: #c0392b; /* Dark red for the title */
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .form-container input,
        .form-container textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
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
            color: green; /* Green for success messages */
            margin-top: 10px;
        }
        .error {
            color: red; /* Red for error messages */
        }
        .buttm
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Book</h2>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $book['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="<?php echo $book['author']; ?>" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" value="<?php echo $book['genre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" class="form-control" id="year" name="year" value="<?php echo $book['year']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $book['description']; ?></textarea>
            </div>
            <div class="button-container">
                <input type="submit" value="update" name="update" class="btn btn-primary">
                <a href="view.php" class="btn btn-secondary">Back to View</a>
            </div>
            
        </form>
    </div>
</body>
</html>



