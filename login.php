<?php
    include ("db_connection.php");
    $error = '';
     if(isset($_POST['login_btn'])){
         $u_name = $_POST['u_name'];
         $password = $_POST['password'];

         $query = "SELECT count(id) FROM `user` WHERE user_name = '{$u_name}' and password = '{$password}' ";
         $query = mysqli_query($conn, $query);
         $query_fetch_count = mysqli_fetch_assoc($query);

         $query = "SELECT * FROM `user` WHERE user_name = '{$u_name}' and password = '{$password}' ";
         $query = mysqli_query($conn, $query);
         $query_fetch = mysqli_fetch_assoc($query);

         if($query_fetch_count['count(id)'] == 1){
             $_SESSION['user_name'] = $query_fetch['user_name'];
             $_SESSION['f_name'] = $query_fetch['f_name'];
             $_SESSION['l_name'] = $query_fetch['l_name'];
             $_SESSION['email'] = $query_fetch['email'];
             $_SESSION['city'] = $query_fetch['city'];
             $_SESSION['phone'] = $query_fetch['phone'];

             header("location: index.php");

         }else{
             if(@$query_fetch['user_name'] != $u_name AND  @$query_fetch['password'] == $password){
                 $error = '<div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                        <strong>Sorry ! </strong> Your username/email is incorrect.
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                    </div>';
             }elseif(@$query_fetch['user_name'] == $u_name AND  @$query_fetch['password'] != $password){
                 $error = '<div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                        <strong>Sorry ! </strong> Your password is incorrect.
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                    </div>';
             }else{
                 $error = '<div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                        <strong>Sorry ! </strong> Your username/email and password are incorrect.
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                    </div>';
             }
         }
     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>Login</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>
<body class="dark-only">
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7 order-1"><img class="bg-img-cover bg-center" src="assets/images/login/1.jpg" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card">
                    <form method="post" class="theme-form login-form needs-validation" novalidate="">
                        <h4>Login</h4>
                        <h6>Welcome back! Log in to your account.</h6>
                        <?php echo $error; ?>
                        <div class="form-group">
                            <label>Email Address / User Name</label>
                            <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                                <input class="form-control" type="text" name="u_name" required="" placeholder="Test@gmail.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                <div class="show-hide"><span class="show">                         </span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <input id="checkbox1" type="checkbox">
                                <label class="text-muted" for="checkbox1">Remember password</label>
                            </div><a class="link" href="forget-password.html">Forgot password?</a>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" name="login_btn" type="submit">Sign in</button>
                        </div>
                        <div class="login-social-title">
                            <h5>Sign in with</h5>
                        </div>
                        <div class="form-group">
                            <ul class="login-social">
                                <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="linkedin"></i></a></li>
                                <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/login" target="_blank"><i data-feather="instagram">                  </i></a></li>
                            </ul>
                        </div>
                        <p>Don't have account?<a class="ms-2" href="sign-up.html">Create Account</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page-wrapper end-->

<!-- latest jquery-->
<script src="assets/js/jquery-3.5.1.min.js"></script>
<!-- feather icon js-->
<script src="assets/js/icons/feather-icon/feather.min.js"></script>
<script src="assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="assets/js/sidebar-menu.js"></script>
<script src="assets/js/config.js"></script>
<!-- Bootstrap js-->
<script src="assets/js/bootstrap/popper.min.js"></script>
<script src="assets/js/bootstrap/bootstrap.min.js"></script>
<!-- Plugins JS start-->
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="assets/js/script.js"></script>
<!-- login js-->
<!-- Plugin used-->
</body>
</html>