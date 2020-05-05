<?php
    // session_name("Auth System");
    // session_start([
    //     'cookie_lifetime'=>240 //4 minit
    // ]);
    session_start();
    $error = false;

    if(isset($_POST['name']) && isset($_POST['password'])){
    
        if('root'==$_POST['name'] && '4528dbffb5178b439741373c80b2d01a06438bc1'==sha1($_POST['password'])){
            $_SESSION['loggedin']=true;

        }else{
            $error = true;
            $_SESSION['loggedin']=false;
        }
    }
    if(isset($_POST['logout'])){
        $_SESSION['loggedin']=false;
        session_destroy(); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Simple Auth System</title>
</head>
<body>

    <div class="row mt-3">
        <div class="col-md-6 offset-3">
            <h3 class="text-center mt-2 mb-3">Hello, This is Simple Auth System</h3>
            <div class="card">
                <div class="card-header bg-success text-center">
                    <?php
                        if(true == $_SESSION['loggedin']):
                            echo "Hello Admin !"; 
                        else:
                            echo "Please Login";
                        endif;        
                    ?>
                </div>
                <div class="card-body">
                    <?php 
                        if($error){
                    ?>
                       <div class="alert alert-danger" role="alert">
                           User name and Password incorrect! 
                        </div>
                    <?php
                        }
                        if(false == $_SESSION['loggedin']):
                    ?>
                        <form action='' method="post">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name (Admin)">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    <?php 
                        else:
                    ?>
                        <form  method="post">
                            <input type="hidden"  name="logout" value='1'>
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    <?php 
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>