
<!DOCTYPE html>
<html lang="en">

<head>  
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <!-- Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

  <!-- CSS -->
  <link rel="stylesheet" href="resource/css/login.css?version=<?php echo filemtime('resource/css/login.css'); ?>"/>

  <title>Login</title>
</head>



<body>
  
  <div class="container-fluid">
    <!-- <img src="image/Logo.PNG" width="1000px" height="1000px" style="margin:auto;margin-top: 150px; position: absolute"> -->
    <div class="card login-form" style=" border: 1px solid black ;" >
      <div class="card-text">
  
        <form method="POST" action="login_user.php">
          <h1 class="card-title text-center" style="font-family: Brush Script MT;">Login</h1>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><b>Email</b></label>
            <input type="email" placeholder="Email" class="form-control" id="exampleInputEmail1" class="in-em" aria-describedby="emailHelp" name="email" style="border-radius: 5px"/>
          </div>
          <div class="mb-3">
            <label for="password-field" class="form-label" ><b>Password</b></label>
            <div class="input-group mb-3">
              <input id="password-field" type="password" class="form-control" name="password" placeholder="Password"/>
              <div class="show">
                <!-- <button class="btn rounded-end" type="button">
                  <h6 toggle="#password-field" class="fa fa-eye fa-lg show-hide"></h6>
                </button> -->
              </div>
            </div>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success">Login</button>
          </div>
          <p class="para-2">Not have an account? <a href="Sign Up.php">Sign Up Here</a></p>
        </form>
      
      </div>
    </div>
  </div>
        
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script>
    $(".show-hide").click(function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  </script>
</body>

</html>
