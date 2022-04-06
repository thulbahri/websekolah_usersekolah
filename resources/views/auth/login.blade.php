<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/template/vali-template/css/main.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Login | Admin Sekolah</title>
</head>
<body>
  <section class="material-half-bg">
    <div class="cover" style='background: #fcfbfb; background-size: cover; height: 50vh;'></div>
  </section>
  <section class="login-content" style="display: flex; flex-direction: column; padding: 2em;">
    <div class="login-box">
      <form action="<?=url('/')?>/post_login" method="post" class="login-form">
        {{ csrf_field() }}
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>MASUK</h3>
        <div class="form-group">
          <label class="control-label">USERNAME</label>
          <input type="text" class="form-control" placeholder="Username" name="username" required>
        </div>
        <div class="form-group">
          <label class="control-label">PASSWORD</label>
          <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block" style="background: #009b44; border: none; padding: 0.6em;"><i class="fa fa-sign-in fa-lg fa-fw"></i>Masuk</button>
        </div>
      </form>
    </div>
  </section>
</body>
<!-- Essential javascripts for application to work-->
<script src="<?=url('/')?>/public/template/vali-template/js/jquery-3.3.1.min.js"></script>
<script src="<?=url('/')?>/public/template/vali-template/js/popper.min.js"></script>
<script src="<?=url('/')?>/public/template/vali-template/js/bootstrap.min.js"></script>
<script src="<?=url('/')?>/public/template/vali-template/js/main.js"></script>
<script src="<?=url('/')?>/public/template/vali-template/js/plugins/pace.min.js"></script>
<script type="text/javascript">
  $('.login-content [data-toggle="flip"]').click(function() {
    $('.login-box').toggleClass('flipped');
    return false;
  });


</script>
</html>


