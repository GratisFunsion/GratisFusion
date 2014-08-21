<?php 
session_start();
// include all our classes / creators .

	require_once 'Core/Main_Parts_Creator.php';
	require_once 'Core/Off_Parts_Creator.php';
	
// include done.


// make simple website "framework" here.
?>
<html>

	<head>
		<title>GratisFusion V1.0</title>
		<style>
			body { background-color:#000; font-family:Arial; font-size:11px; color:#fff; }
			a { text-decoration:none; color:#fff; }
		</style>
	</head>

	<body>
	<?php if (!isset($_GET['id'])){ ?>
		<p>GratisFusion V1.0</p>
		<hr />
		<p>Select option from the menu</p>
		<p><a href = "index.php?id=MPC">Main Parts Creator</a></p>
		<p><a href = "index.php?id=OPC">Off Parts Creator</a></p>
	<?php } else { 
		
		switch(isset($_GET['id'])) {
		
		case $_GET['id'] == "MPC" :
			$MPC = new MPC();
		Break;
		
		case $_GET['id'] == "OPC" :
			$OPC = new OPC();
		Break;
		
		Default:
		Break;
		
		}
	}
	?>
	</body>
</html>