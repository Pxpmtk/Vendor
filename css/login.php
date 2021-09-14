<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Form Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" type="text/css" href="css/style5.css">
	<link rel="shortcut icon" href="./images/favicon-s.ico" />
	<link rel="icon" href="images/favicon-s.ico" type="image/x-icon">
</head>
<body>
      <form name="frmlogin"  method="post" action="chklogin.php">
	  <img src="./images/SKYICT.png" width="200" height="80">
		 <br /><br />
        <p></p>
        <b><label>Username</label></b>
          <input type="text"   id="Username" required name="Username" placeholder="Username">
        </p>
        <b><label>Password</label></b>
          <input type="password"   id="Password"required name="Password" placeholder="Password">
        <p>
          <button type="submit">Login</button>
        <br>
        </p>
      </form>
</body>
</html>
     </form>
</body>
</html>