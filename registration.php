<?php include "./includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include("./admin/functions.php"); ?>



<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);
 
    $error = [
 
        'username' => '',
        'email' => '',
        'password' => ''
 
    ];
    if (strlen($username) < 4) {
        $error['username'] = 'username should be longer.';
    }
    if ($username == '') {
        $error['username'] = 'username should not be empty.';
    }
    if (username_exists($username)) {                 //username function call
        $error['username'] = 'User Exist.';
    }
    if ($email == '') {
        $error['email'] = 'Email should not be empty';
    }
    if (email_exists($email)) {                           //email function call
        $error['email'] = 'Email Exist  <a href="index.php">Please Login</a>';
    }
    if ($password == '') {
        $error['password'] = 'Password should not be empty. ';
    }
 
    foreach ($error as $key => $value) {
        if (empty($value)) {
            unset($error[$key]);
 
            // login_user($username,$password); 
        }
    }
    if (empty($error)) {
        register_user($username, $email, $password);
        login_user($username, $password);
    }
}
 
?>
 
<!-- Navigation -->
 
<?php include "./includes/navigation.php"; ?>
 
<!-- Page Content -->
<div class="container">
 
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1><strong>Register</strong></h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <!-- <h6 class="text-center"><?php // echo $msg; 
                                                            ?></h6> -->
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" autocomplete="on" value="<?php echo isset($username) ? $username : '' ?>">
                                <p><?php echo isset($error['username']) ? $error['username'] : '' ?> </p>
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on" value="<?php echo isset($email) ? $email : '' ?> ">
                                <p><?php echo isset($error['email']) ? $error['email'] : '' ?> </p>
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                <p> <?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                            </div>
 
                            <input type="submit" name="register" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Register">
                        </form>
 
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
 
    <hr>

    <?php include "includes/footer.php"; ?>
