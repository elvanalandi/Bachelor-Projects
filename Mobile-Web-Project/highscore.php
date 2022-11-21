<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proyek Mobweb</title>
	<link rel="stylesheet" href="/bootstrap/bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="/bootstrap/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>

	 <!-- NAVBAR DEPENDACIES  -->
	<link rel="stylesheet" href="/src/css/styles.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="/src/js/script.js"></script>

	<!--PWA DEPENDANCIES -->
	<link rel="js" type="/sw.js" href="">
	<link rel="manifest" href="/manifest.json">
	<script src="/src/js/app.js"></script>

	<style>
	</style>
</head>
<body onload="load()">
	<?php
		include 'navbar.php';
	?>
	<div class="container">
		<h2 class="col-lg-12" style="text-align: center">High Score</h2>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Rank</th>
					<th>Nickname</th>
					<th>Score</th>
				</tr>
			</thead>
			<tbody id="highfive">
			</tbody>
		</table>
	</div>
	<script>
	  if ('serviceWorker' in navigator) {
	    console.log("Will the service worker register?");
	    navigator.serviceWorker.register('sw.js')
	      .then(function(reg){
	        console.log("Yes, it did.");
	      }).catch(function(err) {
	        console.log("No it didn't. This happened: ", err)
	      });
	  }
	</script>
	
	<script type="text/javascript">
		var high=[];

		function load(){
			if (localStorage.getItem("high")) {
				high = JSON.parse(localStorage.getItem("high"));
				calculateScores();
			}
			else{
				resetScore();
			}
		}

		function displayScores() {
			$("#highfive").html("<tr><td>1</td><td>"+high[0].nick+"</td><td>"+high[0].score+"</td></tr>"+
				"<tr><td>2</td><td>"+high[1].nick+"</td><td>"+high[1].score+"</td></tr>"+
				"<tr><td>3</td><td>"+high[2].nick+"</td><td>"+high[2].score+"</td></tr>"+
				"<tr><td>4</td><td>"+high[3].nick+"</td><td>"+high[3].score+"</td></tr>"+
				"<tr><td>5</td><td>"+high[4].nick+"</td><td>"+high[4].score+"</td></tr>");
			localStorage.removeItem("nickname");
			localStorage.removeItem("score");
		}

		function calculateScores(){
			var nick = localStorage["nickname"];
			var score =  localStorage["score"];
			high.push({"nick":nick, "score":score});
		    //high.sort(function(o1,o2){return o1.score-o2.score}); //low to high
		    high.sort(function(o1,o2){return o2.score-o1.score}); //high to low
		    //high.shift(); //removes lowest at left, for low to high
		    high.pop(); //removes lowest at right, for high to low
		    var items = JSON.stringify(high);
		    localStorage.setItem("high", items);
		    displayScores();
		}
	</script>
</body>
</html>