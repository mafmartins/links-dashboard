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
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Moshi Moshi Staff - Cadastro</title>

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
        
            <?php echo form_open('login/new_user_registration', 'class="login-form"'); ?> 
            <div class="login-wrap">
            <?php echo validation_errors(); ?>
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon">Nick:</span>
              <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
          </div>
          <div class="input-group">
            <div class='error_msg'><?php if (isset($message_display)) { echo $message_display;} ?></div>
            <span class="input-group-addon">Password:</span>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="input-group">
            <span class="input-group-addon">Email:</span>
            <input type="text" name="email_value" class="form-control" placeholder="Email">
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit" value="Sign Up">Sign Up</button>
        
        <a href="<?php echo base_url() ?> ">Login</a>
    </div>
    <?php echo form_close(); ?>

</div>


</body>
</html>