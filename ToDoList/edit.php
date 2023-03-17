<?php
session_start();

include 'C:\xampp\htdocs\nti\ToDoList\dbhelper.php' ;

if($_SERVER['REQUEST_METHOD'] =="POST" && !empty($_POST)) {
    header('location:todo.php');
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="form-row">
            <div class="justify-content-center align-items-center container">
                <form action="" method="post" class="border border-success p-5 mx-5">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="col-12 text-center text-success"><br>
                            <h3>Edit The Task</h3><br>
                        </div>

                        <div class="form-group">
                            <label for="task">Your Task</label><br>
                            <input type="text" name="task" id="task" value="<?php echo $_SESSION['task']; ?>" class="form-control"><br>

                        </div>
                        <button type="submit" class="btn btn-success ">Edit</button><br><br><br><br>
                        <?php
                        if($_POST){
                            $dphelper = new DBHelper();
                            $dphelper -> editTask($_SESSION['id'],$_POST['task']);

                        }
                        ?>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>