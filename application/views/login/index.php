<!DOCTYPE html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {

    header("location: ". base_url('/login/user_login_process'));
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Moshi Moshi Staff Login Page">
    <meta name="author" content="Kitamura">
    <meta name="keyword" content="Moshi Moshi, Staff, Login">
    <link rel="shortcut icon" href="<?php echo base_url('includes/theme/img/favicon.ico') ?>" title="Favicon">

    <title>Moshi Moshi Staff - Login</title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo base_url('includes/theme/ss/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url('includes/theme/css/bootstrap-theme.css') ?>" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url('includes/theme/css/elegant-icons-style.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('includes/theme/css/font-awesome.css') ?>" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo base_url('includes/theme/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('includes/theme/css/style-responsive.css') ?>" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-img3-body">

    <div class="container">

        <center><img src="<?php echo base_url("includes/theme/img/logo.png"); ?>" style="margin-top:100px;"></center>

        <?php
        if (isset($logout_message)) {
            echo "<div class='alert alert-info fade in'>";
            echo $logout_message;
            echo "</div>";
        }
        ?>
        <?php
        if (isset($message_display)) {
            echo "<div class='alert alert-info fade in'>";
            echo $message_display;
            echo "</div>";
        }
        ?>

        
            <?php echo form_open('login/user_login_process', 'class="login-form"'); ?>
            <div class="login-wrap">
            <?php
            echo "<div class='error_msg'>";
            if (isset($error_message)) {
                echo $error_message;
            }
            echo validation_errors();
            echo "</div>";
            ?>
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" name="username" class="form-control" placeholder="Username" autofocus required="">
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Password" required="">
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Login">Login</button>
        </div>
        <?php echo form_close(); ?>
    
    

</div>


</body>
</html>
