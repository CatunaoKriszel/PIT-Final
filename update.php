<?php 

include "config.php";

// Handle update request
if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $book_id = $_POST['book_id'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $publication_year = $_POST['publication_year'];
    $description = $_POST['description'];

    $sql = "UPDATE `books` SET `title`='$title', `author`='$author', `genre`='$genre', `publication_year`='$publication_year', `description`='$description' WHERE `id`='$book_id'";
   
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "<div class='success-message'>Record updated successfully.</div>";
    } else {
        echo "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Fetch book data for update
if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $sql = "SELECT * FROM `books` WHERE `id`='$book_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $author = $row['author'];
            $genre = $row['genre'];
            $publication_year = $row['publication_year'];
            $description = $row['description'];
            $id = $row['id'];
        }
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Book Update Form</title>
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
                input[type="text"], input[type="number"], textarea {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 15px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }
                textarea {
                    resize: vertical;
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
                <h2>Book Update Form</h2>
                <form action="" method="post">
                    <fieldset>
                        <legend>Book Information:</legend>

                        <label for="title">Book Title:</label>
                        <input type="text" id="title" name="title" value="<?php echo $title; ?>">
                        <input type="hidden" name="book_id" value="<?php echo $id; ?>">

                        <label for="author">Author:</label>
                        <input type="text" id="author" name="author" value="<?php echo $author; ?>">

                        <label for="genre">Genre:</label>
                        <input type="text" id="genre" name="genre" value="<?php echo $genre; ?>">

                        <label for="publication_year">Publication Year:</label>
                        <input type="number" id="publication_year" name="publication_year" value="<?php echo $publication_year; ?>">

                        <label for="description">Description:</label>
                        <textarea id="description" name="description"><?php echo $description; ?></textarea>
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
