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
    <link rel="stylesheet" href="/PBL6/public/css/style_loginsignup.css">
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
  </head>
  <body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                {!! Form::open(['url' => 'user/register', 'class' => 'sign-in-form', 'method' => 'POST']) !!}
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" id= "username" name="username"/>
                        @error('username')
                          <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" id="email" name="email" />
                        @error('email')
                          <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
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
                        <input type="password" id="password_confirmation" placeholder="ConfirmPassword" name="password_confirmation" />
                        <span onclick="togglePasswordVisibility_confirm()">
                          <i id="toggleIcon_cf" class="fas fa-eye"></i>
                        </span>
                        @error('password_confirmation')
                          <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <input type="submit" class="btn" value="Sign up" />
                {!! Form::close() !!}
            </div>
          </div>
    
          <div class="panels-container">
            <div class="panel left-panel">
              
                <div class="content">
                  {!! Form::open(['url' => 'user/signup', 'method' => 'POST']) !!}
                            <h3>One of us ?</h3>
                        <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                        laboriosam ad deleniti.
                        </p>
                    {!! Form::submit('Sign In', ['name' => 'sign-up-btn', 'class' => 'btn transparent']) !!}
                  {!! Form::close() !!}
                </div>
                <img src="/PBL6/public/img/register.svg" class="image" alt="" />
                
            </div>
          </div>
    </div>
  </body>
</html>
