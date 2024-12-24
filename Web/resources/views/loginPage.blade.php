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
      function togglePasswordVisibility() {
        const passwordField = document.getElementById("passwordField");
        const toggleIcon = document.getElementById("toggleIcon");
    
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
    @if (session('status_reg'))
      <script>
        // Hiển thị alert
        alert('{{ session('status_reg') }}');

        // Tự động tắt alert sau 5 giây (nếu cần)
        setTimeout(function() {
            window.close(); // Lưu ý: alert sẽ tự tắt khi người dùng nhấn "OK", không cần tự động tắt
        }, 5000);
      </script>
    @endif

    <div class="container">
      <div class="forms-container">
        
        <div class="signin-signup">
          {!! Form::open(['url' => 'user/login', 'class' => 'sign-in-form', 'method' => 'POST']) !!}
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" id= "username" name="username" />
              @error('username')
                    <small class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="passwordField" placeholder="Password" name="passwordField"/>
              
              
              <span onclick="togglePasswordVisibility()">
                <i id="toggleIcon" class="fas fa-eye"></i>
              </span>
              @error('passwordField')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <input type="submit" value="Login" class="btn solid" />
            @if(session('status'))
            <div class="alert alert-success" style="color: red">
                {{session('status')}}
            </div>
        @endif
            {!! Form::close() !!}
        </div>
        
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
              {!! Form::open(['url' => 'user/signin', 'method' => 'POST']) !!}
              <h3>New here ?</h3>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                ex ratione. Aliquid!
              </p>
                {!! Form::submit('Sign up', ['name' => 'sign-up-btn', 'class' => 'btn transparent']) !!}
              {!! Form::close() !!}
            </div>
            <img src="/PBL6/public/img/log.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    
  </body>
</html>
