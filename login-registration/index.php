<html>

<!---https://fontawesome.com/download-->
<!-- Downaload boot strap 5-->
<!-- Download jquery latest version-->
<!--https://mdbootstrap.com/docs/standard/extended/registration/-->
<!--https://mdbootstrap.com/docs/standard/getting-started/installation/ -->
<!--jquery download https://jquery.com/download/ -->
<!---https://phppot.com/php/user-registration-in-php-with-login-form-with-mysql-and-code-download/#screenshot-of-user-registration-and-login-form -->
<!--https://www.w3schools.com/php/php_mysql_prepared_statements.asp   Mysql prepared Statement -->
<?php 

use  Ankur\Member;
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if(!empty($_POST['but-submit'])){
  //var_dump($_POST);
  require_once __DIR__.'/Model/Member.php';
  $member = new Member();
  $register = $member->saveMember();

  if(!empty($register)){
    var_dump($register);
  }
}

// require_once __DIR__.'/include/Config.php';
// $a = new Config();
// var_dump($a->getConnection());
?>
<head>
<link rel="stylesheet" href="./src/css/bootstrap.min.css"  crossorigin="anonymous">
<link rel="stylesheet" href="./src/css/all.min.css">
<link rel="stylesheet" href="./src/css/mdb.min.css">
<script src="./src/js/jquery-3.6.1.min.js" . crossorigin="anonymous"></script>
<script src="./src/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                <form autocomplete="off" class="mx-1 mx-md-4" action="" method="post">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" name="username" class="form-control" autocomplete="off" required/>
                      <label class="form-label" for="form3Example1c">Your Name</label>
                      <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 71.2px;"></div><div class="form-notch-trailing"></div></div>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="email" id="email" name="email" autocomplete="off" class="form-control" required />
                      <label class="form-label" for="form3Example3c">Your Email</label>
                      <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 71.2px;"></div><div class="form-notch-trailing"></div></div>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="signup-password" autocomplete="off" />
                      <label class="form-label" for="form3Example4c">Password</label>
                      <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 71.2px;"></div><div class="form-notch-trailing"></div></div>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" name="confirm-password"  class="form-control" />
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 71.2px;"></div><div class="form-notch-trailing"></div></div>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" autocomplete="off"/>
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" class="btn btn-primary btn-lg" name="but-submit" value="Register" />
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img class="img-fluid" alt="Sample image" src="https://via.placeholder.com/1621x912.png" />
                <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image"> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>