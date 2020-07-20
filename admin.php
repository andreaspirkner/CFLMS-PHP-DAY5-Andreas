<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}
if(isset($_SESSION["user"])){
	header("Location: home.php");
	exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
//$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);


//$resCar = mysqli_query($conn, "SELECT * FROM cars WHERE availability = 'yes'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles1.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <title>Welcome Admin</title>
</head>
<body>
    
<div class="container-fluid">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <!--<a class="navbar-brand" href="#">Andreas Pirkner</a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="create.php">Create</a>
        </li>
         <li class="nav item">
            <a class="nav-link" href="admin.php">Admin</a>
         </li>
        </ul>
    </div>
    <a class="btn btn-danger border border-white" href="logout.php?logout">Logout</a>
    </nav><!--END NAV-->
    
   
    
    
    <div class="parallax_section1 parallax_image">
    </div><!--END PARALLAX-->
        

    
<div class="parallax_section2 parallax_image">
  <div class="row">
            <!--CREATE-->
        <div class="card border-dark">
           <h3>Hi <?php echo $userRow['userName' ]; ?></h3><hr>

           <a href="create.php"><button class='btn btn-success border border-dark' type='button'>Create</button></a><hr>
           
           <a  href="logout.php?logout"><button class='btn btn-danger border border-dark' type='button'>Sign Out</button></a><br><hr>

           <!--<?php
           if($resCar->num_rows == 0 ){
			echo "No result";
		}elseif($resCar->num_rows == 1){
			$row = $resCar->fetch_assoc();
			echo $row["model"]. " ". $row["location"]." ".$row["price"]. " ".$row["availability"];
		}else {
			$rows = $resCar->fetch_all(MYSQLI_ASSOC);
			foreach ($rows as $value) {
				echo $value["car_id"]. " ----- " .$value["model"]. " ". $value["location"]." ".$value["price"]. " ".$value["availability"]."<br>";
			}
		}

 		?>-->
		
       		

 
      </div><!--END ADMIN-->
    </div><!--END ROW-->
</div><!--END PARALLAX 2-->


  
  

<div class="parallax_section1 parallax_image">
</div><!--END PARALLAX-->

<div class="parallax_section2 parallax_image">
  <div class="row">
            <!--CARS-->
            <?php
                    $sql = "SELECT * FROM cars WHERE active = 0";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                      echo
            "<div class='card border-dark'>
                <div class='card-body'>
                   <img class='card-img-top border border-dark' src=".$row['picture']." alt='Card image cap'>
                                <hr>
                                <h6 class='card-text'>Brand:</h6><p>" .$row['brand']." ".$row['model' ]."</p>
                                <h6 class='card-text'>Location:</h6><p>" .$row['location']."</p>
                                <h6 class='card-text'>Availability:</h6><p>" .$row['availability']."</p>
                                <h6 class='card-text'>Price:</h6><p><span>€ </span>" .$row['price']."</p>
                                <hr>
                                
                                <a href='update.php?id=" .$row['id']."'><button class='btn btn-dark border border-dark' type='button'>Edit</button></a><hr>
                                <td><a href='delete.php?id=" .$row['id']."'><button class='btn btn-danger border border-dark' type='button'>Delete</button></a>
                </div><!--END BODY-->
            </div><!--END CARS-->";
            }
                     } else  {
                    echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
                    }
                    ?>
    </div><!--END ROW-->
</div><!--END PARALLAX 2-->

<div class="parallax_section1 parallax_image">
</div><!--END PARALLAX-->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <!--<a class="navbar-brand" href="#">Andreas Pirkner</a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="home.php">Home</a><span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="create.php">Create</a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="admin.php">Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="mailto:andreas.pirkner@gmx.net" >Andreas Pirkner 2020</a>
        </li> 
        </ul>
    </div>
    </nav><!--END FOOTER-->
    
    
</div><!--END CONTAINER-->

    
   </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>