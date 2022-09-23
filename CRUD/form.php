<?php 
    require 'C:\xampp\htdocs\nti\CRUD\dbhelper.php' ;
    $dbelper = new DBHelper();
    if(isset($_POST['submit'])){
        $result = $dbelper -> addCustomer($_POST['name'] ,$_POST['email'], $_POST['mobile'] , hash("md5", $_POST['pass']) );
        if($result)
          header('location:display.php');
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
        <form action="" method="post" class="p-5">
          <div class="col-sm-10 offset-sm-1">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control " required>
            </div>
            <div class="form-group">
              <label for="email">Email</label><br>
              <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="mobile">Mobile</label>
              <input type="text" name="mobile" id="mobile" placeholder="Enter Phone" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="pass">Password</label>
              <input type="password" name="pass" id="pass" placeholder="Enter Password" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button><br><br>
          </div>
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