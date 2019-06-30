
<!DOCTYPE html>
<html>
<head>
	<title>Weather</title>
	<!-- bs4 css -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.js"></script>
	<link href="https://fonts.googleapis.com/css?family=B612+Mono&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="font.css">
	<style>
		.heroImage {
			background-image: url(bg_dark.png);
			height: 100vh;			
 			margin-bottom: 0px;
 			background-size: cover;
		}
		.alert{
			display: none;
		}
	</style>
</head>
<body>

		
	<div class="jumbotron heroImage text-center">
		<div class="container">
			<h1 class="display-4 text-light mt-5">Weather</h1>
			<div class="lead text-light">Please input the <strong class="text-warning">CITY NAME</strong></div>
			
			<form action="">
				<div class="form-group col-md-7 mx-auto">
					<input id="city" type="text" name="city" class="form-control" placeholder="Ex.Paris,Taipei...">
				</div>
				<input type="submit" id="find_weather" name="submit" value="search" class="btn btn-dark btn-lg"/>
			</form>
			
			<div class="col-8 mx-auto mt-3">
				<div id="success" name="success" class="alert alert-success">Search success!</div>
				<div id="fail" name="fail" class="alert alert-danger">We can't find the city, please try again.</div>
				<div id="no_city" name="no_city" class="alert alert-danger">Please input a city name.</div>
			</div>
		</div>
	</div>

	<script>
		//按鈕先停止發送(請求)動作  因要判斷！
		//function(event)：用event事件 所以放這參數
		$("#find_weather").click(function(event){
			event.preventDefault();
			//先把之前(結果)內容清空  指向alert 先把alert隱藏 
			//再顯示答案
			$(".alert").hide();

			if ($("#city").val() != "") {
		//從server取得data. 放到callback function
		//function(data)：server將結果 透過data return給我們 就知道server獲得什麼data
				$.get("scraper.php?city="+$("#city").val(), function(data){
					if (data == "") {
						$("#fail").fadeIn();
					} else {
						$("#success").html(data).fadeIn();
					}
				});
			} else {
				$("#no_city").fadeIn();
			}

		});
	</script>

	   


  </body>
</html>





















