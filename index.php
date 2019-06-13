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
	</style>
</head>
<body>
	<div class="container">
		<form class="form-group" method="POST">
			<select name="command" id="command" class="form-control form-control-lg">
			  <option value="START">Power On</option>
			  <option value="STOP">Power Off</option>
			  <option value="SUSPEND">Suspend</option>
			</select>
			<br>
			<button type="submit" id="submit" class="btn btn-primary mb-2">Submit</button>
		</form>
	</div>

	<?php 
	if(isset($_POST['command'])){ 
		exec("VIx.exe ".$_POST['command'],$output,$return);
		if(!$return){
			echo "Success ".$_POST['command'];
		}
		else{
			echo "Failed ".$_POST['command'];
		}
	}
	?>
</body>
</html>