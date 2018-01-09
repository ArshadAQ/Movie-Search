
<!DOCTYPE HTML>
	<head>
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous"> -->
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		 <link href="/public/assets/css/selectize.default.css" rel="stylesheet"/>


        <link href="/public/assets/less/selectize.default.less" rel="stylesheet/less" type="text/css" />
        <script src="/public/assets/js/jquery-1.11.3.min.js"></script>
        <script src="/public/assets/js/selectize.min.js"></script>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <title>Creative - Bootstrap Portfolio Theme by Bootstrapious.com</title> -->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap-->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <!-- Google fonts - Open Sans-->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,700,400italic"> -->
    <!-- Font Awesome CSS-->
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
    <!-- owl carousel-->
    <!-- <link rel="stylesheet" href="css/owl.carousel.css"> -->
    <!-- <link rel="stylesheet" href="css/owl.theme.css"> -->
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <!-- <link rel="stylesheet" href="css/custom.css"> -->
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">

    <!-- Javascript files-->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <!-- <script src="js/bootstrap.min.js"> </script> -->
    <!-- <script src="js/jquery.cookie.js"> </script> -->
    <!-- <script src="js/ekko-lightbox.js"></script> -->
    <script src="/public/assets/js/jquery.scrollTo.min.js"></script>
    <script src="/public/assets/js/masonry.pkgd.min.js"></script>
    <script src="/public/assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- <script src="js/owl.carousel.min.js"></script> -->
    <!-- <script src="js/front.js"></script> -->

	<script src = "assets/js/search.js"></script>
		<style>
			.row{
				padding:20px;
			}
			.col {
			    display:table-cell;
			    vertical-align:middle;
			    padding:30px 0;
			    height:100%;
			}
			.movie{
				border: 1px solid #778899;
    			border-radius: 5px;
    			background-color:white;
			}
			ul{
				margin-left:-20px;
				padding-top:10px;
			}

</style>
	</head>
	<body id = "b" style = "font-family:Lato; background:url(assets/img/background.jpeg)">
		<center style = "margin-top:30px">
		<form action = "fetch" method = "POST">
			<div class="container">
				<div class="row">
					<h2 style = "background-color: whitesmoke;/* border-radius: 25px; */width: 50%;">Movie Search</h2>
			           <div id="custom-search-input" style = "margin-top:200px">
	                        <div class="input-group col-md-6">
	                        	<select id="select-movie" class="movies selectized" placeholder="Find a movie..." tabindex="-1" style="display: none;"></select>
	                            <!-- <input type="text" class="search-query form-control" placeholder="Search" style = "border-radius:0px;z-index:1";/> -->
	                            <input type = "text" name = "movie1" style = "display:none" value = "">
	                            <span class="input-group-btn">
	                                <button type="submit" class="btn btn-danger" style = "border-radius:3px; margin-top:-5px">
	                                    <span class=" glyphicon glyphicon-search"></span>
	                                </button>
	                            </span>
	                        </div>
	                    </div>
				</div>
			</div>
		</form>
		