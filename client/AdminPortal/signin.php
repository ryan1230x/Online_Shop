<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta charset="utf-8">
      <style media="screen">
        body{background-color: #e0e0e0;}
        #loginForm{position:absolute; top: 50%; left: 50%; transform:translate(-50%, -80%);}
      </style>
    </head>
    <body>
      <main>
        <div class="row" id="loginForm">
          <h4 class="center-align">AdminPortal</h4>
          <form class="col s12" action="included/login.inc.php" method="post">
            <div class="row">
              <div class="input-field col s12">
                <input type="text" name="username" class="validate" id="uname" value="Admin" required>
                <label for="uname">Username</label>
              </div>
            </div>
              <div class="input-field s12">
                <input type="password" name="password" class="validate" id="pwd" required value="admin">
                <label for="pwd">Password</label>
              </div>
              <button type="submit" name="login_btn" class="btn" style="width:100%; margin-top:20px;">Login</button>
          </form>
        </div>

      </main>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>
