<?php
	if(empty($_SESSION['role']))
		header('Location: login.php');

?>
<!-- <section> --><br>
	<nav class="navbar navbar-expand-sm navbar-default sidebar" style="background-color:#727272;" id="mainNav">
      <div class="container">
      	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" 
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <i class="fa fa-bars"></i>
        Menu
        </button>
        
        <div class="collapse navbar-collapse" id="navbarResponsive1">
          <ul class="navbar-nav text-center" style="    flex-direction: column;">  
          <div class="mb-5">
          <a class="nav-link" href="#" ><?php echo $_SESSION['fullname']; ?> <?php if($_SESSION['role'] == 'admin'){ echo "(Admin)"; } ?></a>
        </div>    
            <li class="nav-item">
              <a class="nav-link" href="../auth/dashboard.php">Home</a>
            </li>
            <li class="nav-item">
            	<?php if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'user'){ 
	        		echo '<a href="../app/register.php" class="nav-link"> Register </a>';
	      	 	} ?>             
            </li>
            <li class="nav-item">
	        	<a href="../app/list.php" class="nav-link">Details/Update</a>
            </li>

            <li class="nav-item">
              <?php if($_SESSION['role'] == 'admin'){ 
                echo '<a href="../app/sms.php" class="nav-link">Send SMS</a>';
              } ?>
            </li>

            <li class="nav-item">
              <?php if($_SESSION['role'] == 'admin'){ 
                echo '<a href="../app/cmplist.php" class="nav-link">Complaint List</a>';
              } ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<!-- </section> -->