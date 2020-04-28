<?php
	session_start();
	if(!isset($_SESSION['adminSession'])){
		header("Location: index.php?loginrequired");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- <style>
	/* Dropdown Button */
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}
	</style> -->
	<style>
		tr{
			cursor: pointer;
		}
	</style>
  <link rel="stylesheet" href="style\dashboard.css">
  <link rel="stylesheet" href="style\bootstrap.css">
  <title>Users</title>
</head>
<body>

		<!-- heading starts -->

		<div class="jumbotron jumbotron-fluid" style="margin-bottom:0">
	    <div class="container">
	      <h1 class="display-4">Online Railway Reservation System</h1>
	      <p class="lead">Administrative Portal</p>
	    </div>
	  </div>

		<!-- heading end -->


		<!-- navigation bar starts -->

		<nav class="navbar navbar-expand-sm  navbar-dark bg-dark" style="padding-left:10vh; padding-right:10vh;">
			<a class="navbar-brand" href="dashboard.php"><button class="nav_btn" >About</button></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">


						<li class="nav-item">
							<a class="nav-link" href="users.php"><button class="nav_btn" id="dropdownMenu1"  style="background-color:#c1c1c1;">Users</button></a>
						</li>



						<!-- dummy navs starts-->

						<li class="nav-item">
							<a class="nav-link" href="users.php"><button class="nav_btn" id="dropdownMenu1">dummy</button></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="users.php"><button class="nav_btn" id="dropdownMenu1">dummy</button></a>
						</li>


						<!-- dummy navs ends-->

			    </ul>
			      <a class="btn btn-outline-danger my-2 my-sm-0" type="button" name="logout" id="logoutbtn" href="includes/admin_logout_inc.php">Logout</a>
			  </div>
		</nav>

		<!-- navigation bar ends -->




		<!-- list of all users (table starts) -->

		<div class="container">
			<div class="row justify-content-center">
				<table class="table table-hover text-center" style="margin-top:10vh;" id="myTable">
					<thead class="thead-dark" >
						<tr>
							<th>User Name</th>
							<th>Email</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Phone</th>
						</tr>
					</thead>
					<tbody  id="response">

					</tbody>

				</table>
			</div>
		</div>



		<!-- list of all users (table ends) -->


		<!-- modal start -->

		<div id="userModal" class="modal fade" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-md modal-dialog-centered" role="document"  >
					<div class="modal-content  text-center" style="padding:5vh 2vh">
						<div class="modal-header">
		        	<h5 class="modal-title">
										<input id="uname" disabled style="background-color:white; border:none;"></h5>


		      	</div>


						<form class="form">
							<div class="form-group ">
								<div class="row align-items-start ">
									<div class="col-4 justify-content-start">
										<label for="phone">Phone Number</label>
									</div>
									<div class="col-4">
										<input id="phone" class="form-control"><br>
									</div>
								</div>
								<div class="row align-items-start">
									<div class="col-4 justify-content-start">
										<label for="password"> Change Password</label>
									</div>
									<div class="col-4">
										<input id="password" type="password" placeholder="Enter New Password" class="form-control md-6"><br>
									</div>
								</div>
								<div class="row align-items-start">
									<div class="col-4 justify-content-start">
										<label for="password"> Confirm Password</label>
									</div>
									<div class="col-4">
										<input id="password" type="password" placeholder="Re-Enter New Password" class="form-control md-6"><br>
									</div>
								</div>
							</div>
							<div class="row row-cols-3">
								<div class="col-4">
									<button class="btn btn-primary">Update Profile</button>
								</div>
								<div class="col-4">
									<button class="btn btn-danger">Delete Profile</button>
								</div>
								<div class="col-4">
									<button class="btn btn-secondary"> History</button>
								</div>
							</div>


						</form>
					</div>
				</div>
			</div>




</body>
<script type="text/javascript" src="js/jquery-3.5.0.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/users.js"></script>
</html>