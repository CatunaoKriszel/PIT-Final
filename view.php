<?php 
include "config.php";

// Fetch all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Check for a success message from delete
$message = isset($_GET['message']) ? $_GET['message'] : "";
?>

<!DOCTYPE html>
<html>
<head>    
    <title>View Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Georgia', serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h2 {
            font-size: 2em;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .alert {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f8f8;
            color: #555;
        }

        td a {
            margin-right: 10px;
        }

        .book-btns {
            display: flex;
            justify-content: space-between;
        }

        .book-btns a {
            padding: 10px 20px;
            background-color: #2d87f0;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .book-btns a:hover {
            background-color: #1a6fd3;
        }
    </style>
</head>
<body>    
    <div class="container">        
        <h2>Users List - Book View</h2>

        <?php if ($message) : ?>
            <div class="alert alert-success">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <div class="book-btns">
            <!-- Link to the Book Information Form (this page will handle adding a user) -->
            <a href="create.php" class="btn btn-primary">Add New User</a>
        </div>

        <table class="table">    
            <thead>        
                <tr>        
                    <th>ID</th>        
                    <th>First Name</th>        
                    <th>Last Name</th>        
                    <th>Email</th>        
                    <th>Gender</th>        
                    <th>Action</th>   
                </tr>    
            </thead>    
            <tbody>         
                <?php            
                if ($result->num_rows > 0) {                
                    while ($row = $result->fetch_assoc()) {        
                ?>                    

                <tr>                   
                    <td><?php echo $row['id']; ?></td>                    
                    <td><?php echo $row['firstname']; ?></td>                    
                    <td><?php echo $row['lastname']; ?></td>                    
                    <td><?php echo $row['email']; ?></td>                    
                    <td><?php echo $row['gender']; ?></td>                    
                    <td>
                        <a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;
                        <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>&redirect=view.php">Delete</a>
                    </td>                    
                </tr> 

                <?php  }            
                }        
                ?>                    
            </tbody>
        </table>    
    </div> 
</body>
</html>
