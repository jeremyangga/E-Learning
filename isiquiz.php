<?php
	echo '
'
?>
	<html>
	<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<title></title>
	<script>
		function add(type) {
			var element = document.createElement("input");

			element.setAttribute("type", type);
			element.setAttribute("value", type);
			element.setAttribute("name", type);

			var foo = document.getElementById("fooBar");

			foo.appendChild(element);
		}
	</script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  			<img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    			<a class="navbar-brand" href="#">-Learn</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>

  			<div class="collapse navbar-collapse" id="navbarSupportedContent">
    			<ul class="navbar-nav mr-auto">
	      			<li class="nav-item active">
	        			<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      			</li>
	      			<li class="nav-item">
	        			<a class="nav-link" href="#">Link</a>
	      			</li>
      				<li class="nav-item dropdown">
	        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          			Dropdown
	        			</a>
        				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          		<a class="dropdown-item" href="#">Action</a>
			          		<a class="dropdown-item" href="#">Another action</a>
			        		<div class="dropdown-divider"></div>
			        		<a class="dropdown-item" href="#">Something else here</a>
			        	</div>
      				</li>
			    	<li class="nav-item">
			    	  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
			    	</li>
    			</ul>
    			<!-- <form class="form-inline my-2 my-lg-0">
      				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    			</form> -->
  			</div>
		</nav>
		<div class="jumbotron jumbotron-fluid">
  			<div class="container">
    			<h1 class="display-4">Quiz Setup</h1>
    			<form>
    			<center>
  					<div class="form-row align-items-center">
    					<div class="col-auto my-1">
    						<div class="form-group">
							    <label for="quizname">Quiz Name</label>
							    <input type="text" class="form-control" id="quizname" aria-describedby="emailHelp">
							    <small id="emailHelp" class="form-text text-muted">Please input name of the Quiz</small>
							</div>
							<form>
								<select name="element">
									<option value="text">TextBox</option>
								</select>
									<input type="button" value="Add" onclick="add(document.forms[0].element.value)"/>
									<span id="fooBar">&nbsp;</span>
								</form>
						</div>
  					</div>
  				</center>
				</form>
  			</div>
		</div>
		

	</body>
	</html>