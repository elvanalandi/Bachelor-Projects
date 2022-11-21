<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
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

	body{
		font-size: calc(8px + 1vw);
		line-height: calc(1.1em + 0.5vw);
	}

	h1{
		font-size: calc(20px + 2vw);
		line-height: calc(1.1em + 0.5vw);
	}

	.title {
		text-align: center;
		font-size: calc(24px + 1vw);
		margin-top : 20px;
	}

	.flex-container {
		display: flex;
		flex-wrap: wrap;
		text-align: center;
		flex-direction: row;
		justify-content: center;
		align-items: center;
		display : none;
		margin : 10px;
	}

	.container {
		display: flex;
		flex-wrap: wrap;
		text-align: center;
		justify-content: center;
		align-items: center;
	}

	.winlose{
		vertical-align: middle;
		text-align: center;
		width:33%;
		height: 15%;
	}

	.tie{
		vertical-align: middle;
		text-align: center;
		width:33%;
		height: 15%;
	}

	.images{
		vertical-align: middle;
		width:50%;
		height: 25%;
	}

	.player-image{
		width : 210px;
		height : 210px;
		border : solid 1px black;
		margin-right: auto;
		margin-left: auto;
	}

	.bot-image{
		width : 210px;
		height : 210px;
		border : solid 1px black;
		margin-right: auto;
		margin-left: auto;
	}

	img {
		width : 208px;
		height : 208px;
	}

	#highscore_form{
		display: none;
	}

	#stop{
		display: none;
	}

	/* Big tablet to 1200px */
	@media only screen and (max-width: 1200px) and (min-width: 1024px) {
		img {
			width : 168px;
			height : 168px;
		}

		.player-image{
			width : 170px;
			height : 170px;
		}

		.bot-image{
			width : 170px;
			height : 170px;
		}
	}
	/* Small tablet to big tablet: from 768px to 1023px */
	@media only screen and (max-width: 1023px) and (min-width: 768px) {
		img {
			width : 148px;
			height : 148px;
		}

		.player-image{
			width : 150px;
			height : 150px;
		}

		.bot-image{
			width : 150px;
			height : 150px;
		}
	}
	/* Small phones to small tablets: from 481px to 767px */
	@media only screen and (max-width: 767px) and (min-width: 481px) {
		img {
			width : 118px;
			height : 118px;
		}

		.player-image{
			width : 120px;
			height : 120px;
		}

		.bot-image{
			width : 120px;
			height : 120px;
		}
	}
	/* Small phones: from 0 to 480px */
	@media only screen and (max-width: 480px) and (min-width: 0px) {
		img {
			width : 78px;
			height : 78px;
		}

		.player-image{
			width : 80px;
			height : 80px;
		}

		.bot-image{
			width : 80px;
			height : 80px;
		}
	}
</style>
</head>

<body onload="load()">
	<?php
		include 'navbar.php';
	?>
	<h1 class="title">ROCK PAPER SCISSORS</h1>
	<div class="container" id="nickname_form">
		<input type="text" id="nick" placeholder="nickname">
		<button id="submit">Submit nickname</button>
	</div>
	<div class="flex-container">
		<div class="row">
			<div class="winlose">
				<h1>WIN</h1>
				<h1 id="win-score">0</h1>
			</div>
			<div class="winlose">
				<h1>LOSE</h1>
				<h1 id="lose-score">0</h1>
			</div>
			<div class="tie">
				<h1>TIES</h1>
				<h1 id="tie-score">0</h1>
			</div>
			<div class="images">
				<div class="player-image"></div>
			</div>
			<div class="images">
				<div class="bot-image"></div>
			</div>
			<div id="image-btn" class="col-12 col-md-12" style="margin-top:20px;">
				<button name="paper" id="paper"><img style="width: 50px; height: 50px;" src="/src/images/paper-btn.png"></button>
				<button name="rock" id="rock"><img style="width: 50px; height: 50px;" src="/src/images/rock-btn.png"></button>
				<button name="scissor" id="scissor"><img style="width: 50px; height: 50px;" src="/src/images/scissor-btn.png"></button>

		<div class="container" id="highscore_form">
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
		<div class="col-lg-12" style="text-align: center;margin : 10px">
			<button type="button" class="btn btn-primary" id="stop">Stop Playing</button>
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
		}

		function resetScore() {
		    high = [{"nick": "-", "score": "0"},
			    {"nick": "-", "score": "0"},
			    {"nick": "-", "score": "0"},
			    {"nick": "-", "score": "0"},
			    {"nick": "-", "score": "0"}];
		    var items = JSON.stringify(high);
		    localStorage.setItem("high", items);
		    displayScores();
		    //console.log(items);
		  }

		function calculateScores(){
			var nick = $("#nick").val();
			var score =  parseInt($('#win-score').text());
			high.push({"nick":nick, "score":score});
		    //high.sort(function(o1,o2){return o1.score-o2.score}); //low to high
		    high.sort(function(o1,o2){return o2.score-o1.score}); //high to low
		    //high.shift(); //removes lowest at left, for low to high
		    high.pop(); //removes lowest at right, for high to low
		    var items = JSON.stringify(high);
		    localStorage.setItem("high", items);
		    displayScores();
		}

		function random() {
			var rand = Math.floor(Math.random()*3)+1;
			return rand;
		}

		function check(player,bot){
			if(player == 1 && bot == 2 || player == 2 && bot == 3 || player == 3 && bot == 1){
				var win = parseInt($('#win-score').text()) + 1;
				$('#win-score').html(win);
			}
			else if(player == bot){
				var tie = parseInt($('#tie-score').text()) + 1;
				$('#tie-score').html(tie);
			}
			else{
				var lose = parseInt($('#lose-score').text()) + 1;
				$('#lose-score').html(lose);
			}
		}

		$("#paper").on("click", function() {
			var rand = random();
			$('.player-image').empty().append($('<img />', { src: "/src/images/paper.png" }));
			if(rand == 1){
				$('.bot-image').empty().append($('<img />', { src: "/src/images/paper.png" }));
			}
			else if(rand == 2){
				$('.bot-image').empty().append($('<img />', { src: "/src/images/rock.png" }));
			}
			else if(rand == 3){
				$('.bot-image').empty().append($('<img />', { src: "/src/images/scissor.png" }));
			}
			check(1,rand);
		});

		$("#rock").on("click", function() {
			var rand = random();
			$('.player-image').empty().append($('<img />', { src: "/src/images/rock.png" }));
			if(rand == 1){
				$('.bot-image').empty().append($('<img />', { src: "/src/images/paper.png" }));
			}
			else if(rand == 2){
				$('.bot-image').empty().append($('<img />', { src: "/src/images/rock.png" }));
			}
			else if(rand == 3){
				$('.bot-image').empty().append($('<img />', { src: "/src/images/scissor.png" }));
			}
			check(2,rand);
		});

		$("#scissor").on("click", function() {
			var rand = random()
			$('.player-image').empty().append($('<img />', { src: "/src/images/scissor.png" }));
			if(rand == 1){
				$('.bot-image').empty().append($('<img />', { src: "/src/images/paper.png" }));
			}
			else if(rand == 2){
				$('.bot-image').empty().append($('<img />', { src: "/src/images/rock.png" }));
			}
			else if(rand == 3){
				$('.bot-image').empty().append($('<img />', { src: "/src/images/scissor.png" }));
			}
			check(3,rand);
		});

		$("#submit").on("click",function() {
			if($("#nick").val() == ""){
				alert("PLEASE INSERT A NAME");
			}else{
				var nick = $("#nick").val();
				$('.flex-container').css('display','flex');
				$('#stop').css('display','inline');
				localStorage.setItem("nickname",nick);
			}
		})

		$("#stop").on("click",function() {
			var score =  parseInt($('#win-score').text());
			localStorage.setItem("score",score);
			$(location).attr('href','highscore.php');
			/*
			$('.flex-container').css('display','none');
			$('#nickname_form').css('display','none');
			$('#highscore_form').css('display','inline');
			$(this).css('display','none');
			load();
			*/
		})
	</script>

</body>
</html>