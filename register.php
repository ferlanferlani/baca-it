<?php
require 'admin-pages/functions.php';


////////////////// function registration /////////////////
function regisadmin($data) {
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  $level = mysqli_real_escape_string($conn, $data["level"]);


  $admin = mysqli_query($conn, "SELECT username FROM multi_user WHERE username = '$username' ");

  if( mysqli_fetch_assoc($admin) ) {

    echo "<script>
    setTimeout(function () {
      Swal.fire ({
        title: 'Ooops!',
        text: 'Username yang Anda pilih sudah digunakan, silahkan pilih username lain',
        icon: 'warning',
        timer: '3000'
    });
  },10);
  </script>
    ";

    return false;
  }

  // cek pasword
  if( $password !== $password2) {

    echo "<script>
          setTimeout(function () {
            Swal.fire ({
              title: 'Ooops!',
              text: 'Password dan konfirmasi password yang Anda masukan tidak sesuai',
              icon: 'warning',
              timer: '3000'
          });
        },10);
        </script>
          ";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // tambah user
  mysqli_query($conn, "INSERT INTO multi_user VALUES(NULL, '$username', '$password', '$level')");

  mysqli_query($conn, "INSERT admin VALUES(NULL, '$username', '$password')");

  return mysqli_affected_rows($conn);

}



if( isset($_POST["submit"]) ) {

  if( regisadmin($_POST) > 0 ) {

    echo "<script>
    setTimeout(function () {
      Swal.fire ({
        title: 'Success!',
        text: 'Selamat akun Anda berhasil dibuat, silahkan login',
        icon: 'success',
        timer: '3000'
    });
  },10);
  </script>
    ";
  } else {
    echo mysqli_error($conn);
  }

}


?>


<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>BacaIT - Register</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="admin-pages/css/style.css" rel="stylesheet">

     <!-- start link favicon -->
     <link
     rel="apple-touch-icon-precomposed"
     sizes="57x57"
     href="favicon/apple-touch-icon-57x57.png"
   />
   <link
     rel="apple-touch-icon-precomposed"
     sizes="114x114"
     href="favicon/apple-touch-icon-114x114.png"
   />
   <link
     rel="apple-touch-icon-precomposed"
     sizes="72x72"
     href="favicon/apple-touch-icon-72x72.png"
   />
   <link
     rel="apple-touch-icon-precomposed"
     sizes="144x144"
     href="favicon/apple-touch-icon-144x144.png"
   />
   <link
     rel="apple-touch-icon-precomposed"
     sizes="60x60"
     href="favicon/apple-touch-icon-60x60.png"
   />
   <link
     rel="apple-touch-icon-precomposed"
     sizes="120x120"
     href="favicon/apple-touch-icon-120x120.png"
   />
   <link
     rel="apple-touch-icon-precomposed"
     sizes="76x76"
     href="favicon/apple-touch-icon-76x76.png"
   />
   <link
     rel="apple-touch-icon-precomposed"
     sizes="152x152"
     href="favicon/apple-touch-icon-152x152.png"
   />
   <link
     rel="icon"
     type="image/png"
     href="favicon-196x196.png"
     sizes="196x196"
   />
   <link
     rel="icon"
     type="image/png"
     href="favicon/favicon-96x96.png"
     sizes="96x96"
   />
   <link
     rel="icon"
     type="image/png"
     href="favicon/favicon-32x32.png"
     sizes="32x32"
   />
   <link
     rel="icon"
     type="image/png"
     href="favicon/favicon-16x16.png"
     sizes="16x16"
   />
   <link
     rel="icon"
     type="image/png"
     href="favicon/favicon-128.png"
     sizes="128x128"
   />
   <meta name="application-name" content="&nbsp;" />
   <meta name="msapplication-TileColor" content="#FFFFFF" />
   <meta name="msapplication-TileImage" content="mstile-144x144.png" />
   <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
   <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
   <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
   <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
   <!-- end link favicon -->
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <div class="text-center">
                                    <img src="admin-pages/logo/bacait text.png" alt="BacaIT">
                                </div>
                                <form action="" method="post" class="mt-5 login-input">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="level"  placeholder="Level" value="admin">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username"  placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password" required>
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100" name="submit" >Register</button>
                                    <a href="login">login</a>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="admin-pages/plugins/common/common.min.js"></script>
    <script src="admin-pages/js/custom.min.js"></script>
    <script src="admin-pages/js/settings.js"></script>
    <script src="admin-pages/js/gleek.js"></script>
    <script src="admin-pages/js/styleSwitcher.js"></script>

     <!-- sweet alert -->
     <script src="admin-pages/plugins/sweetalert/js/sweetalert2.all.min.js"></script>
    <script src="admin-pages/plugins/sweetalert/js/jquery-3.6.0.min.js"></script>

</body>
</html>





