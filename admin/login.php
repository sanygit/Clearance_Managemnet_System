
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Clearance System</title>
        <meta content=" " name="keywords" />
        <meta content="" name="description" />
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="./dist/css/AdminLTE.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="./dist/css/skins/skin-blue.min.css">
        <link rel="stylesheet" href="./dist/css/shCore.css">
        <link rel="stylesheet" href="./dist/css/shThemeDefault.css">
        <link rel="stylesheet" href="./dist/css/style.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
<body>

    <div class="container">
        <div class="row">

                <div class="menue">

            </div>
            &nbsp;&nbsp;&nbsp;
            <div class="col-md-4 col-md-offset-4">

                <div class="login-panel"><!-- has form in it-->


                    <div class="form-panel">
                        <form role="form" id="login-form"  class="index-form">
                            <div class="form-heading">
                            <center>Student Login</center>
                            </div>
<input type="hidden" name="action" value="login">

                                <div class="form-field">
									<label for = "username">Username: </label><br/>
										<input class="form-control" placeholder="Enter Username" name="username" id="username" type="text" required = "required" autofocus>
                                </div>

                                <div class="form-field">
									<label for = "username" >Password: </label>
										<input class="form-control" placeholder="Enter Password" name="password" id="password" type="password" required = "required">
                                </div>
                             <br/>
                                <center><button class="btn btn-lg btn-success btn-block " name = "login" style= " margin-bottom:0px;" width="50">Login</button>
                                &nbsp;
                            <!--<a  href="register/index.php"><button type="button" class="btn btn-lg btn-success btn-block" data-dismiss="modal" style= " margin-bottom:0px;">Register</button></a>-->

                                &nbsp;



                        </form>
                        <div id="login-bottom"> </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
          <?php include './includes/footer.php'; ?>

</body>

</html>
