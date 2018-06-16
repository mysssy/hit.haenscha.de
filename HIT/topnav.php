	
<?php
// if (!ISSET($_SESSION['userid'])) {session_start(); } 

require_once ("connect.php");


if (!ISSET($_SESSION['userid']) ) {	$showLOGIN = true; }
else {	$showLOGIN = false; }


// define variables and set to empty values
$uname = $psw = $remember = $comment = $website = "";
$pswErr = $nameErr = $error = $errorMessage= $logged_in="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//wenn Logoutbutton gedrückt
	if (!empty($_POST["unset"])) {
		session_unset();
		$showLOGIN = true;
	}
	
	
	// wenn Login Button gedrückt und Formular abgeschickt
	if (empty($_POST["uname"])) {    $nameErr = "Name is required"; $error = TRUE;  } 
		else {    $uname = test_input($_POST["uname"]);
				// check if name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z ]*$/",$uname)) {
				  $nameErr = "Only letters and white space allowed";
				}
		}	
  
	if (empty($_POST["psw"])) {    $pswErr = "Password is required";   $error = TRUE;} 
		else {    $psw = md5(test_input($_POST["psw"]));  }
  
	if (empty($_POST["remember"])) {      } 
		else {  $remember = test_input($_POST["remember"]);  }


	
	if (ISSET($uname) AND ISSET($psw) AND !$error )   
	{ 	
		$error = $nameErr.$pswErr;
		
		$query_login = 'SELECT uid, uname, psw FROM users WHERE uname LIKE "'.$uname.'" ';
		$result_login = mysqli_query($connect_hit, $query_login); 
		$user = mysqli_fetch_assoc($result_login);
		
		//Überprüfung des Passworts
		if ($user !== false && $psw == $user['psw']) {
			$_SESSION['userid'] = $user['uid'];
			$_SESSION['username'] = $user['uname'];
			
		} else {
			$errorMessage = "Name oder Passwort war ungültig<br>";
		}
	}
}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}	

?>

		<ul >
			<li><a href="./" title="test">Was ist HIT</a></li>
			<li><a href="./recommendations.php" title="test">Allg. Empfehlungen</a></li>
			<li><a href="./list.php" title="test">Gesamtliste</a></li>
			<li><a href="./med.php" title="test">Medikamente</a></li>
			<li><a href="./mylist.php" title="test">Meine persönliche Liste</a></li>

<?php 
if (ISSET($_SESSION['userid'])) {?>
		<li style="background-color:#89846d;"><a href="./bearbeiten.php" title="test">Bearbeiten</a> </li> 
		<li style="background-color:#89846d;border-left: 1px solid black; "><a href="./neu_eintragen.php" title="test">Neu</a> </li> 
<?php 	}	 ?>	
			
<?php  if ($showLOGIN AND !ISSET($_SESSION['userid'])  )	{ 	?>	
			<li style="float:right;">
				<button class="login_logout_button" onclick="document.getElementById('id01').style.display='block'">Login</button>

				<!-- The Modal -->
				<div id="id01" class="modal">
				  <span onclick="document.getElementById('id01').style.display='none'"
				class="close" title="Close Modal">&times;</span>

				  <!-- Modal Content -->
				  <form id="loginform" class="modal-content animate" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
					

					<div class="container">
					  <label for="uname"><b>Username</b></label>
					  <input type="text" placeholder="Enter Username" name="uname" value="<?php echo $uname;?>" required>

					  <label for="psw"><b>Password</b></label>
					  <input type="password" placeholder="Enter Password" name="psw" required>

					  <button type="submit">Login</button>
					  <label>
						<input type="checkbox" checked="checked" name="remember"> Remember me
					  </label>
					</div>

					<div class="container" style="background-color:#dedbcc">
					  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
					</div>
				  </form>
				</div> 
			</li>
<?php } 

if (ISSET($_SESSION['userid'])) {?>
		<li style="float:right;">
		
			<form style="border: none !important;" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
				<input type="hidden" name="unset" value="true">
				<button class="login_logout_button" type="submit" >Logout "<?php  echo $_SESSION['username'];  ?>" </button>
			</form>
			</li>
	
<?php 	}	 ?>	
		
		  
			
		</ul>
		
	