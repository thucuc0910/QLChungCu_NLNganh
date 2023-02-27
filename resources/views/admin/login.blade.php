<!DOCTYPE html>
<html lang="en">

<head>
  @include('store.head')
</head>

<body class="login-page" style="min-height: 500px ; background-image:url(/template/admin/dist/img/background5.webp);" >
  
  <div class="login-box " >
    <div class="card  card-outline card-primary">
      <div class=" card-header text-center">
        <a href="#" class="h1"><b>Đăng Nhập</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="card-body">
        <div class="card-body login-card-body">
          <!-- <p class="login-box-msg">Sign in to start your session</p> -->
          @include('store.alert')
          <form action="/admin/house" method="post" >
            <div class="input-group mb-3" >
              <input type="email" name="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text"  style="background-color: rgb(207, 201, 201)">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text"  style="background-color: rgb(207, 201, 201)">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>

            <div class="d-flex mb-2 align-items-center">
                <div class="icheck-primary">
                  <input type="checkbox" name="remember" id="remember">
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>

              
            </div>

            <input type="submit" value="Đăng Nhập" class="btn btn-pill text-white btn-block btn-primary">
           







            <p class="text-center">Chưa có tài khoản? <a  href="register">Đăng kí</a></p>
            <!-- <span class="d-block text-center my-4 text-muted"> or sign in with</span> -->

            <!-- <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a> -->


            <div class="social-login justify-content-center row">
              <a  href="#" class="fab fa-facebook-f d-flex align-items-center justify-content-center mr-2" style="background: #3b5998; text-decoration: none; position: relative; text-align: center; color: #fff; mmargin-bottom: 10px; width: 40px; height: 40px; border-radius: 50%; display: inline-block;">
                <span class="icon-facebook "></span>
              </a>
              <a href="#" class="twitter">
                <span class="fab fa-twitter d-flex align-items-center justify-content-center mr-2" style="background: #1da1f2; text-decoration: none; position: relative; text-align: center; color: #fff; mmargin-bottom: 10px; width: 40px; height: 40px; border-radius: 50%; display: inline-block;"></span>
              </a>
              <a href="{{asset('/auth/google/redirect')}}" class="google">
                <span class="fab fa-google d-flex align-items-center justify-content-center mr-2" style="background: #ea4335; text-decoration: none; position: relative; text-align: center; color: #fff; mmargin-bottom: 10px; width: 40px; height: 40px; border-radius: 50%; display: inline-block;"></span>
              </a>
            </div>
            @csrf
          </form>
        </div>
      </div>
    </div>


  </div>
  <!-- /.login-box -->

</body>

</html>