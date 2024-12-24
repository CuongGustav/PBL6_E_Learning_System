<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Sign in & Sign up Form</title>
    <link rel="stylesheet" href="/PBL6/public/css/style_info.css">
    <script defer>
      function togglePasswordVisibility_signup() {
        const passwordField = document.getElementById("password");
        const toggleIcon = document.getElementById("toggleIcon_reg");
    
        if (passwordField.type === "password") {
          passwordField.type = "text";
          toggleIcon.classList.remove("fa-eye");
          toggleIcon.classList.add("fa-eye-slash");
        } else {
          passwordField.type = "password";
          toggleIcon.classList.remove("fa-eye-slash");
          toggleIcon.classList.add("fa-eye");
        }
      }

      function togglePasswordVisibility_confirm() {
        const passwordField = document.getElementById("password_confirmation");
        const toggleIcon = document.getElementById("toggleIcon_cf");
    
        if (passwordField.type === "password") {
          passwordField.type = "text";
          toggleIcon.classList.remove("fa-eye");
          toggleIcon.classList.add("fa-eye-slash");
        } else {
          passwordField.type = "password";
          toggleIcon.classList.remove("fa-eye-slash");
          toggleIcon.classList.add("fa-eye");
        }
      }
    </script>
    <script>
          setTimeout(function() {
              document.getElementById('status').style.display = 'none';
          }, 3000);
    </script>
  </head>
  <body>
    @if(session('status'))
    <div class="alert alert-success" id="status" style="background-color: #007BFF; color: white;">
        {{ session('status') }}
    </div>
@endif


    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                {!! Form::open(['url' => 'user/info/updatepassword', 'class' => 'sign-in-form', 'method' => 'POST']) !!}
                    <h2 class="title">ĐỔI MẬT KHẨU</h2>
                    <input type="hidden" name="id_user" id="id_user" value="{{$user->id}}">
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" placeholder="Password" name="password" />
                        <span onclick="togglePasswordVisibility_signup()">
                          <i id="toggleIcon_reg" class="fas fa-eye"></i>
                        </span>
                        @error('password')
                          <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" />
                        <span onclick="togglePasswordVisibility_confirm()">
                          <i id="toggleIcon_cf" class="fas fa-eye"></i>
                        </span>
                        @error('password_confirmation')
                          <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <input type="submit" class="btn" value="OK" />
                {!! Form::close() !!}
            </div>
          </div>
    
          <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                  {!! Form::open(['url' => 'user/info/update', 'method' => 'POST']) !!}
                  <h2 class="title">THÔNG TIN CÁ NHÂN</h2>
                  <input type="hidden" name="id_user" id="id_user" value="{{$user->id}}">
                  <div class="input-field">
                      <i class="fas fa-user"></i>
                      <input type="text" placeholder="Username" id= "username" name="username" value="{{$user->name}}" readonly/>
                      @error('username')
                        <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                  </div>
                  <div class="input-field">
                      <i class="fas fa-envelope"></i>
                      <input type="email" placeholder="Email" id="email" name="email" value="{{$user->email}}" readonly/>
                      @error('email')
                        <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                  </div>
                  <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Name" id="fullname" name="fullname" value="{{ $infoUser->fullname ?? '' }}" />
                    @error('fullname')
                      <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                  </div>
                  <input type="submit" class="btn" value="OK" />
                  {!! Form::close() !!}
                </div>
              
                
            </div>
          </div>
    </div>
  </body>
</html>
