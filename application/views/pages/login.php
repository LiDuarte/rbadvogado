<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>RB ADVOGADOS - LOGIN</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link href="<?= base_url('assets/css/bootstrap.css'); ?>" type="text/css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="<?= base_url('assets/css/style_login.css'); ?>">
  <script  src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
</head>

<body>
  
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
<h2>RB ADVOGADOS</h2>

</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Click Me</div>
  </div>
  <div class="form">
    <h2>Acesso Administrador</h2>
      <?php if($validation_errors): ?>
          <div class='col-xs-12'>
            <div class='col-offset-1'>
              
              <span class='text-danger'><?php echo $validation_errors;  ?> </span> 
              
            </div>
          </div>
      <?php endif; ?>
      <?php if($log_error): ?>
          <div class='col-xs-12'>
            <div class='col-offset-1'>
              <div class='panel'>
              <span class='alert text-danger'><?php echo $log_error;  ?> </span> 
              </div>
            </div>
          </div>
      <?php endif; ?>
    <form  action='<?= base_url('login/autentica'); ?>' method='post'>
      <input type="usarname" name='username' placeholder="Username"/>
      <input type="password" name='password' placeholder="Password"/>
      <input id='login' name='Login' class='button' type='submit' value='Login'>
        <div class='col-xs-12'>
            <center><img src="<?php echo base_url("assets/images/loading.gif"); ?>" id="loading"  width="100" alt="" style="visibility: hidden;"></center>
        </div>
    </form>
  </div>
  <div class="form">
    <h2>Create an account</h2>
    <form>
      <input type="text" placeholder="Username"/>
      <input type="password" placeholder="Password"/>
      <input type="email" placeholder="Email Address"/>
      <input type="tel" placeholder="Phone Number"/>
      <button>Register</button>
    </form>
  </div>
  <div class="cta"><a href="http://andytran.me">Esqueceu a senha?</a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script>
  (function() {
  var button, buttonStyles, materialIcons;

  materialIcons = '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';

  buttonStyles = '<link href="https://codepen.io/andytran/pen/vLmRVp.css" rel="stylesheet">';

  button = '<a href="<?= base_url(''); ?>" class="at-button"><i class="material-icons">link</i></a>';

  document.body.innerHTML += materialIcons + buttonStyles + button;

}).call(this);
</script>

    <script  src="<?= base_url('assets/js/index.js'); ?>"></script>


    <script> 

  $(function(){
    $("#login").click(function(){
      $("#loading").css("visibility","visible");
    });
  });
 
    
    </script>

    <style>
    body{
      background: #555;
    }
    </style>
</body>
</html>
