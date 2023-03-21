<?php
	session_start();
	
	//Seja poteče po 30 minutah - avtomatsko odjavi neaktivnega uporabnika
	if(isset($_SESSION['LAST_ACTIVITY']) && time() - $_SESSION['LAST_ACTIVITY'] < 1800){
		session_regenerate_id(true);
	}
	$_SESSION['LAST_ACTIVITY'] = time();
	
	//Poveži se z bazo
	$conn = new mysqli('localhost', 'root', '', 'todolist');
	//Nastavi kodiranje znakov, ki se uporablja pri komunikaciji z bazo
	$conn->set_charset("UTF8");
?>
<html>
<head>
    <link rel="stylesheet" href="public/css/style.css">
	<title>TO-DO app</title>
</head>
<body>
	<nav class="navigationBar">
    <h1 id="todoTitle">TO-DO LIST</h1>
		<ul>
			<li><a href="index.php">DOMOV</a></li>
			<?php
			if(isset($_SESSION["USER_ID"])){
				?>
				<li><a href="publish.php"></a></li>
				<li><a href="user/logout.php">ODJAVA</a></li>
				<?php
			} else{
				?>
				<li><a href="login.php">PRIJAVA</a></li>
				<li><a href="register.php">REGISTRACIJA</a></li>
				<?php
			}
			?>
		</ul>
	</nav>