<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S A P | Login</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/coba2.png" />

</head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img src="assets/img/alee.png" alt="" width="200" />
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Silakan Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login_proses.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="username" name="username" type="text" autofocus required oninvalid="this.setCustomValidity('Username Wajib diisi!')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="password" name="password" type="password" required oninvalid="this.setCustomValidity('Password Wajib diisi!')" oninput="setCustomValidity('')">
                                </div>

                                <div class="checkbox">
                                    <label>
                                         <input type="checkbox" onclick="myFunction()">Tampilkan
                                        <script>
                                            function myFunction() 
                                            {
                                                var x = document.getElementById("password");
                                                if (x.type === "password") 
                                                {
                                                    x.type = "text";
                                                } 
                                                else 
                                                {
                                                    x.type = "password";
                                                }
                                            }
                                        </script>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                 <button class="btn btn-lg btn-success btn-block" type="submit" name="login">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
