<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
		<title>Vendor List</title>
		<link rel="shortcut icon" href="./images/favicon-s.ico" />
		<link rel="icon" href="images/favicon-s.ico" type="image/x-icon">
        <!-- Bootstrap core CSS -->
        <link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="./css/theme.css" rel="stylesheet">
        <link href="./css/validator.css" rel="stylesheet">
		
		<link rel="stylesheet" href="./fully-responsive-css3-menu/css/style.css">
        <script src="./js/jquery.min.js"></script>
        <script src="./bootstrap/js/bootstrap.min.js"></script>
        <script src="./js/jquery.form.validator.min.js"></script>
        <script src="./js/security.js"></script>
        <script src="./js/file.js"></script>
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114285958-2"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-114285958-2');
		</script>

        <script>
            function uploadFile(target) {
    document.getElementById("file-name").innerHTML = target.files[0].name;
}
        </script>

    <script>
    function hiddenn(pvar) {
        if(pvar==0){
            document.getElementById("comment").style.display = 'none';
        }else{
        document.getElementById("comment").style.display = '';
        }
        
    }
    </script>
    </head>  
	<style>
		.menu-content {
		  padding: 0 0 0 0;
		}

		.collapsible-menu {
		  background: #207bd6;
		  padding: 8px 8px;
		  cursor: pointer;
		}
		
		.collapsible-menu ul {
		  list-style-type: none;
		  padding: 0;
		  
		}
		
		.collapsible-menu a {
		  color: white;
		  display: block;
		  padding: 10px 10px ;
		  text-decoration: none;
		  background-position: 10%;
		}
		
		
		
		.collapsible-menu label {
		  
		  font-size: 16px;
		  display: block;
		  cursor: pointer;
		  background:url('fully-responsive-css3-menu/images/menu.svg') no-repeat left center;
		  background-position: 5%;
		  padding: 10px 0 10px 42px;
		  background-size: 21px /*เปลี่ยนไซส์ขนาดของเมนู*/
		}
		
		input#menu {
		  display: none;
		}
		
		input:checked + label {
		  background-image: url('fully-responsive-css3-menu/images/delete.svg');
		  background-size: 20px;
		  background-position: 5%;
		}
		
		.menu-content {
		  max-height: 0;
		  overflow: hidden;
		   
		  padding: 0 0 0 0;
		}
		
		/* Toggle Effect */
		input:checked ~ label {
		  background-image: url('fully-responsive-css3-menu/images/delete.svg') ;
		  background-position: 5%;
		}
		
		input:checked ~ .menu-content {
		  max-height: 100%;
		}
		
	</style>

<style>
		a:hover{
			 text-decoration: underline;
		}
		</style>

<style type="text/css">
    .box {
    
      position: absolute;
      top: 55%;
      left: 50%;
      
      margin-top: -100px;
      margin-left: -100px;
      
          box-align:"center";
          width: 425px;
          height: 350px;
          
      }
      .textboxclass {
          height:80px;
          width:405px;
      }
      
</style>
<style>
        .table {
          border-collapse: collapse;
          
          width: 100%;
        }
        
        .th, .td {
          text-align: left;
          padding: 8px;
          color: black;
        }
        
        .tr:nth-child(even){background-color: #f2f2f2}
        
        .th {
          background-color: #0A85CB;
          color: white;
        }
        
</style>

<div class="container">
            <div class="header" img src="images/skybg.jpg">
				<nav class="menu" tabindex="0">
					<div class="smartphone-menu-trigger"></div>
					<header class="avatar">
						<img src="images/female.PNG"/>
						<h2>Name user</h2>
					</header><br>
                    <ul>
					<a href="General.php"><li tabindex="0" class="icon-text-document"><span>Information</span></li></a>
					<a href="logout.php?action=logout"><li tabindex="0" class="icon-logout"><span>Sign out</span></li></a>	
					</ul>
                </nav>
                <h2 class="text-muted"><img src="./images/SKYICT.png" width="135" height="50"/></h2>
            </div>