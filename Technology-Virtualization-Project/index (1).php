<html>
<head>
	<title>Proyek Tekvir</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<style>
		.container{
			display : flex;
			justify-content: center;
			text-align: center;
		}
		body{
			background-image: url('images/bg-01.jpg');
        	background-size: cover;
        	font-family: "Comic Sans MS", cursive, sans-serif;
		}
	</style>
</head>
<body onload="load()">
	<div class="container">
		<form class="form-group" method="POST">
			<select name="command" id="command" class="form-control form-control-lg" style="margin-top: 40px;">
			  <option value="START">Power On</option>
			  <option value="STOP">Power Off</option>
			  <option value="SUSPEND">Suspend</option>
			  <option value="LCLONE">Linked Clone</option>
			  <option value="FCLONE">Full Clone</option>
			  <option value="DELETE">Delete</option>
			  <option value="HTOG">Send File</option>
			  <option value="GTOH">Retrieve File</option>
			  <option value="SCRIPT">Run Script</option>
			  <option value="SNAPSHOT">Snapshot</option>
			  <option value="REVERT">Revert</option>
			  <option value="SCREENSHOT">Screenshot</option>
			</select>
			<br>
			<div id="path" style="width: 5px;"><b>Path </b><input type="text" name="path"></div>
			<div id="filename" style="width: 5px;"><b>Filename</b> <input type="text" name="filename"></div> 	<!-- KHUSUS GUEST TO HOST -->
			<div id="ssname"style="width: 5px;"><b>Name</b> <input type="text" name="ssname"></div>			<!-- KHUSUS SNAPSHOT -->
			<div id="ssdesc"style="width: 5px;"><b>Description</b> <input type="text" name="ssdesc"></div>	<!-- KHUSUS SnAPSHOT -->
			<input type="file" id="file" name="file" style="margin-top: 20px;">
			<button type="submit" id="submit" class="btn btn-primary mb-2" style="margin-top: 20px;"><b>Submit</b></button>
		</form>
	</div>
		<iframe src="http://192.168.159.131:6080/vnc.html?autoconnect=true&host=192.168.159.131&port=6080&password=tekvir" height="100%" width="100%"></iframe>

	<?php 
	if(isset($_POST['command'])){
		$interpreter = "";
		$ssname = "";
		$ssdesc = "";
		if($_POST['command'] == 'SCRIPT'){
			$file = $_POST['file'];
			if($file[strlen($file)-2] == 'p' && $file[strlen($file)-1] == 'y'){
				$interpreter = "python";
			}
			else if($file[strlen($file)-2] == 's' && $file[strlen($file)-1] == 'h'){
				$interpreter = "bash";
			}
			else if($file[strlen($file)-2] == 'p' && $file[strlen($file)-1] == 'l'){
				$interpreter = "perl";
			}
		}
		if($_POST['command'] == 'GTOH'){
			$filename = $_POST['filename'];
		}
		if($_POST['command'] == 'SNAPSHOT'){
			$ssname = $_POST['ssname'];
			$ssdesc = $_POST['ssdesc'];
		}		

		exec("VIx.exe ".$_POST['command']." ".$_POST['path']." ".$_POST['file']." ".$interpreter." ".$filename." ".$ssname." ".$ssdesc,$output,$return);

		/*if(!$return){
			echo "Success ".$_POST['command']." ".$_POST['path']." ".$_POST['file'];
			echo $interpreter;
		}
		else{
			echo "Failed ".$_POST['command']." ".$_POST['path']." ".$_POST['file'];
			echo $interpreter;
		}*/
	}
	?>

	<script>
		function load(){
			$("#path").hide();
			$("#filename").hide();
			$("#file").hide();
			$("#ssname").hide();
			$("#ssdesc").hide();
		}

		$("#command").change(function(){
			var command = $("#command").val();
			if(command == "LCLONE" || command == "FCLONE" || command == "DELETE"){
				$("#path").show();
				$("#filename").hide();
				$("#file").hide();
				$("#ssname").hide();
				$("#ssdesc").hide();
			}
			else if(command == "HTOG" || command == "SCRIPT"){
				$("#path").show();
				$("#filename").hide();
				$("#file").show();
				$("#ssname").hide();
				$("#ssdesc").hide();
			}
			else if(command == "GTOH"){
				$("#path").show();
				$("#filename").show();
				$("#file").hide();
				$("#ssname").hide();
				$("#ssdesc").hide();
			}
			else if(command == "SNAPSHOT"){
				$("#path").hide();
				$("#filename").hide();
				$("#file").hide();
				$("#ssname").show();
				$("#ssdesc").show();
			}
			else{
				$("#path").hide();
				$("#filename").hide();
				$("#file").hide();
				$("#ssname").hide();
				$("#ssdesc").hide();
			}
		});
	</script>
</body>
</html>