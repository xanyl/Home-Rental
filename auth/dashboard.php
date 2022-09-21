<?php
	require '../config/config.php';
	if(empty($_SESSION['username']))
		header('Location: login.php');

	if($_SESSION['role'] == 'admin'){
		$stmt = $connect->prepare('SELECT count(*) as register_user FROM users');
		$stmt->execute();
		$count = $stmt->fetch(PDO::FETCH_ASSOC);


		$stmt = $connect->prepare('SELECT count(*) as total_rent FROM room_rental_registrations');
		$stmt->execute();
		$total_rent = $stmt->fetch(PDO::FETCH_ASSOC);

		$stmt = $connect->prepare('SELECT count(*) as total_rent_apartment FROM room_rental_registrations_apartment');
		$stmt->execute();
		$total_rent_apartment = $stmt->fetch(PDO::FETCH_ASSOC);
	}

	$stmt = $connect->prepare('SELECT count(*) as total_auth_user_rent FROM room_rental_registrations WHERE user_id = :user_id');
	$stmt->execute(array(
		':user_id' => $_SESSION['id']
		));
	$total_auth_user_rent = $stmt->fetch(PDO::FETCH_ASSOC);

	$stmt = $connect->prepare('SELECT count(*) as total_auth_user_rent_ap FROM room_rental_registrations_apartment WHERE user_id = :user_id');
	$stmt->execute(array(
		':user_id' => $_SESSION['id']
		));
	$total_auth_user_rent_ap = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php
	if(empty($_SESSION['username']))
		header('Location: login.php');	

		try {
			$stmt = $connect->prepare('SELECT * FROM users');
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			$errMsg = $e->getMessage();
		}	
		// print_r($data);	
?>

<?php 
include '../include/side-nav.php';?>

	<!-- Header nav -->	
<<<<<<< HEAD
	
	<section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
					<div class="box box1">
					<i class="uil uil-home"></i>
                        <span class="text">
=======
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#212529;" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../index.php">Rentals</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo $_SESSION['fullname']; ?> <?php if($_SESSION['role'] == 'admin'){ echo "(Admin)"; } ?></a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	<!-- end header nav -->	
<?php include '../include/side-nav.php';?>
	<section class="wrapper" style="margin-left: 16%;margin-top: -11%;">
		<!-- <div class="container"> -->
			<!-- <div class="row"> -->
				<div class="col-md-12">
					<h1>Dashboard</h1>
					<div class="row">						
						<?php 
							if($_SESSION['role'] == 'admin'){ 
								echo '<div class="col-md-3">';
								echo '<a href="../app/users.php"><div class="alert alert-warning" role="alert">';
								echo '<b>Registered Users: <span class="badge badge-pill badge-success">'.$count['register_user'].'</span></b>';
								echo '</div></a>';
								echo '</div>';
							} 
						?>	
						<?php 
							if($_SESSION['role'] == 'admin'){ 
								echo '<div class="col-md-3">';
								echo '<a href="../app/list.php"><div class="alert alert-warning" role="alert">';
								echo '<b>Rooms for Rent: <span class="badge badge-pill badge-success">'.(intval($total_rent['total_rent'])+intval($total_rent_apartment['total_rent_apartment'])).'</span></b>';
								echo '</div></a>';
								echo '</div>';
							} 
						?>
>>>>>>> bidhata
						<?php 
							if($_SESSION['role'] == 'user'){ 
								echo '<div class="col-md-3">';
								echo '<a href="../app/list.php"><div class="alert alert-warning" role="alert">';
								echo 'Registered Rooms:';
								
								echo '</div></a>';
						
								echo '  <span class="number">
								&nbsp; &nbsp; &nbsp &nbsp;
								<span class="badge badge-pill badge-success">'.$total_auth_user_rent['total_auth_user_rent'].'</span>
								</span>';
								echo '</div>';
							} 
							else{
								echo 'Registered Rooms:';
								echo '<br>';
								echo '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;';
								echo '  <span class="number">
							
										<span class="badge badge-pill badge-success">'.$total_auth_user_rent['total_auth_user_rent'].'</span>
										</span>';
							}
						?>
						</span>
                        <span class="number"></span>
                    </div>


					<?php 
                          if($_SESSION['role'] == 'admin'){ 
                   			 echo'<div class="box box2">';
								echo'<i class="uil uil-user-check"></i>';
                       			echo'<span class="text">';
						
                              echo '<div class="col-md-3">';
                              echo '<a href="../app/users.php"><div class="alert alert-warning" role="alert">';
                            //   echo '<a href="../app/users.php"><img src="..\assets\img\users.jpg" width="100" height="100"></a>';
                              echo '<b>Registered Users: <span class="badge badge-pill badge-success"></span></b>';
                              echo '</div></a>';
                              echo '</div>';
							  echo '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ';
							  echo '<span class="number">';
						  	 	echo ' <span class="badge badge-pill badge-success">'.$count['register_user'].'</span>';
							  
							  echo '</span>';
                          }
                      	?>
						</span>
                       
                    </div>


                  
					<?php 
						if($_SESSION['role'] == 'admin'){
                   			  echo'<div class="box box3">';
							  echo'<i class="uil uil-server-alt"></i>';
                      		  echo'<span class="text"> ';
                              echo '<div class="col-md-3">';
                              echo '<a href="../app/list.php"><div class="alert alert-warning" role="alert">';
                              echo '<b>Rooms for Rent: <span class="badge badge-pill badge-success">'.'</span></b>';
                              echo '</div></a>';
                              echo '</div>';
							  echo '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;';
							  echo '<span class="number">';
							  echo (intval($total_rent['total_rent'])+intval($total_rent_apartment['total_rent_apartment'])).'</span></b>';
							  echo '</span>';
                          }
						  
					?>
                      	</span> 
                    </div>
                </div>
            </div>
					<?php 
                        if($_SESSION['role'] == 'admin'){		
							include '../app/table.php';
						}?>
                    

   
        </div>
    </section>


	




