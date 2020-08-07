<?php
/*  guest Home page containg details of all the events posted by different organisers.
    Note- events marked for review or deleted  will be hidden to users.
*/  
include('server.php');

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	
  }


$running=0;
$future=0;
$past=0;
$registered=0;

//to findout number of running events
   //only count those events which aren't marked/deleted.
$sql = "select * from EVENTS 
where END_DATE_TIME >= cast((now()) as date) and BEGIN_DATE_TIME <= cast((now()) as date) AND REVIEW = 0;";
$result = mysqli_query($db,$sql);
if($result)
{
    while($r=mysqli_fetch_assoc($result))
   { 
       $running=$running+1;
       
   }
}
	else
  	   echo("Error description: " . mysqli_error($db));
  	   
//to findout number of past events
//only count those events which aren't marked/deleted.  	   
$sql = "select * from EVENTS 
where END_DATE_TIME < cast((now()) as date) AND REVIEW = 0;";
$result = mysqli_query($db,$sql);
if($result)
{
     while($r=mysqli_fetch_assoc($result))
     { 
         $past=$past+1;
         
     }
}
	else
  	   echo("Error description: " . mysqli_error($db));
  	   
//to findout number of future events
//only count those events which aren't marked/deleted.  	   
$sql = "select * from EVENTS 
where BEGIN_DATE_TIME >= cast((now()) as date) AND REVIEW = 0;";
$result = mysqli_query($db,$sql);
if($result)
{
    while($r=mysqli_fetch_assoc($result))
    {
        $future=$future+1;
        
    }
}
	else
  	   echo("Error description: " . mysqli_error($db));

?>
<!DOCTYPE HTML>
<!--
  Site developed by Tushar Jain (github:tusharjain0022) IIITR and 
                    Rishav Mazumdar (github:RishavMz) IIITR
-->
<html>
	<head>
		<title>Home Page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
           <style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 33.333333%;
  padding: 10px;
  height: 100px; /* Should be removed. Only for demonstration */
 text-align: center;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
</style>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<div class="logo"> by Team Insomniac<span></span></div>
				<a href="#menu">MENU</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="login.php">Sign in</a></li>
					<li><a href="register.php">Sign up</a></li>
				
				</ul>
			</nav>

		<!-- Banner -->
			<section class="banner full">
				<article>
					<img src="images/code.jpg" alt="" />
					<div class="inner">
						<header >
						    <p style="font-size:3vw;"> All types of coding events at one place. </p>
							
							<h1 style="font-size:8vw;"> Coding Events </h1>
						</header>
					</div>
				</article>
				<article>
					<img src="images/art.jpg" alt="" />
					<div class="inner">
						<header>
							<p style="font-size:3vw;">Try your skills here </p>
							<h3 style="font-size:8vw;">Art Events </h3>
						</header>
					</div>
				</article>
				<article>
					<img src="images/sports.jpg"  alt="" />
					<div class="inner">
						<header>
							<p style="font-size:3vw;">Get details of all sporting events around you!!</p>
							<h3 style="font-size:8vw;">Sports Events</h3>
						</header>
					</div>
				</article>
				<!--<article>
					<img src="images/slide04.jpg"  alt="" />
                    <div class="inner">
						<header>
							<p>Get details of all sporting events around you!!</p>
							<h2>Sports Events</h2>
						</header>
					</div> -->

				</article>-->
				<article>
					<img src="images/slide05.jpg"  alt="" />
					<div class="inner">
						<header>
								<p style="font-size:2vw;">Host your event here . Get registered with us as organiser.</p>
							<h3 style="font-size:4vw;">And many more types of events.<br> Stay Connected</h3>
							
						</header>
					</div>
				</article>
			</section>
			<br>
			<br>
			<!-- Two -->
			<section id="two" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Participate in events of your interests to test your skills.</p>
						<h2>Events Details</h2>
					</header>
                                                                        <div class="row">
  <div class="column" style="background-color:#aaa;">
    <h2>Running Events</h2>
    <h2> <?php echo $running ;?> </h2>
    
  </div>
  <div class="column" style="background-color:#bbb;">
   
    <h2>Future Events</h2>
    <h2> <?php echo $future ;?> </h2>

  </div>
  <div class="column" style="background-color:#aaa;">
    <h2>Past Events</h2>
    <h2> <?php echo $past ;?></h2>
  </div>
  
</div>
				</div>
			</section>
			
			
			<!-- One -->
			<section id="one" class="wrapper style2">
				<div class="inner">
					<div class="grid-style">
					    <div>
							<div class="box">
								<div class="image fit">
								</div>
								<div class="content">
									<header class="align-center">
										<p></p>
										<h2>USER</h2>
										<p>Sign in as USER.</p>
									</header>
									<br>
									<footer class="align-center">
										<a href="user_homepage.php"class="button alt">Click Here</a>
									</footer>
								</div>
							</div>
						</div>
						 <div>
							<div class="box">
								<div class="image fit">
								</div>
								<div class="content">
									<header class="align-center">
										<p></p>
										<h2>ORGANISER</h2>
										<p>Sign in as ORGANISER.</p>
									</header>
									<br>
									<footer class="align-center">
										<a href="organiser_homepage.php"class="button alt">Click Here</a>
									</footer>
								</div>
							</div>
						</div>
							</div>
				</div>
			</section>

				<header class="align-center">
						<p class="special"><br><br><br>Connect with us to host your event with us.</p>
						<h2>EVENTS LIST</h2>
					</header>
					
	
<?php

$sql = "select * from EVENTS 
where END_DATE_TIME >= cast((now()) as date) AND REVIEW = 0
;";
$result = mysqli_query($db,$sql);
if($result)
{echo'	<!-- One -->
			<section id="one" class="wrapper style2">
				<div class="inner">
					<div class="grid-style">
';  

while($r=mysqli_fetch_assoc($result))
{ 
  $event_name=$r['EVENT_NAME'];
  $begin=$r['BEGIN_DATE_TIME'];
  $end=$r['END_DATE_TIME'];
  $prizes=$r['PRIZES'];
  $description=$r['DESCRIPTION'];
  $id=$r['EVENT_ID'];
  $path="images/".$id.".jpeg";
  echo ('<div>
							<div class="box">
								<div class="image fit">');
								
						    require_once "pdo.php";
						    $loc = 'images/def.jpg';
						$sql123 = "SELECT * FROM IMAGES  WHERE EVENT_ID = :Data123";
					$stmt123 = $pdo -> prepare($sql123);
					$stmt123 -> execute(array(':Data123' => $id));
					$row123 = $stmt123->fetchAll(PDO::FETCH_ASSOC);
					foreach($row123 as $re)
					{$loc = $re['IMAGES'];
					break;}
						   echo '
								<img src="'.$loc.'"  style=" max-width:100%; max-height:350px;" />
								</div>
								<div class="content">
									<header class="align-center">
										<p>Event</p>
										<h2>'.$event_name.'</h2>
									</header>
									<p>Start Date:'.$begin.'<br>End Date:'.$end.'<br>Prizes:'.$prizes.'</p>
									<footer class="align-center">
										<a href="guest_event.php?EVENT_ID='.$id.'"class="button alt">Learn More</a>
									</footer>
								</div>
							</div>
						</div>
						';
}
echo'
					</div>
				</div>
			</section>';
}
else
  	   echo("Error description: " . mysqli_error($db));
?>

<!-- PAST EVENTS-->

	<header class="align-center">
						<p class="special"><br><br><br>Connect with us to host your event with us.</p>
						<h2>PAST EVENTS</h2>
					</header>
<?php

$sql = "select * from EVENTS 
where END_DATE_TIME <= cast((now()) as date) AND REVIEW = 0
;";
$result = mysqli_query($db,$sql);
$count=0;
if($result)
{echo'	<!-- One -->
			<section id="one" class="wrapper style2">
				<div class="inner">
					<div class="grid-style">
';

while($r=mysqli_fetch_assoc($result))
{ $count+=1;
  $event_name=$r['EVENT_NAME'];
  $begin=$r['BEGIN_DATE_TIME'];
  $end=$r['END_DATE_TIME'];
  $prizes=$r['PRIZES'];
  $description=$r['DESCRIPTION'];
  $id=$r['EVENT_ID'];
  $path="images/".$id.".jpeg";
  echo ('<div>
							<div class="box">
								<div class="image fit">');
								
						    require_once "pdo.php";
						    $loc = 'images/def.jpg';
						$sql123 = "SELECT * FROM IMAGES  WHERE EVENT_ID = :Data123";
					$stmt123 = $pdo -> prepare($sql123);
					$stmt123 -> execute(array(':Data123' => $id));
					$row123 = $stmt123->fetchAll(PDO::FETCH_ASSOC);
					foreach($row123 as $re)
					{$loc = $re['IMAGES'];
					break;}
						   echo '
								<img src="'.$loc.'"  style=" max-width:100%; max-height:350px;" />
								</div>
								<div class="content">
									<header class="align-center">
										<p>Event</p>
										<h2>'.$event_name.'</h2>
									</header>
									<p>Start Date:'.$begin.'<br>End Date:'.$end.'<br>Prizes:'.$prizes.'</p>
									<footer class="align-center">
										<a href="guest_event.php?EVENT_ID='.$id.'"class="button alt">Learn More</a>
									</footer>
								</div>
							</div>
						</div>
						';
}
echo'
					</div>
				</div>
			</section>';
if ($count==0)
echo '	
						<header class="align-center">
						<p class="special"></p>
						<h2>No past events details available!<br><br><br></h2>
					</header>
						
					';
}
else
  	   echo("Error description: " . mysqli_error($db));
?>

		
		
		<!-- Three -->
			<section id="three" class="wrapper style2">
				<div class="inner">
					<header class="align-center">
						<p class="special">Connect with us to host your event with us.</p>
						<h2>OUR PARTNERS</h2>
					</header>
					<div class="gallery">
						<div>
							<div class="image fit">
								<a href="#"><img src="images/partner1.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="images/partner2.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="images/partner3.jpeg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="images/partner4.png" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="images/partner5.jpeg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="images/partner6.jpeg" alt="" /></a>
							</div>
						</div>
					</div>
				</div>
			</section>


		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
				</div>
				<div class="copyright">
					&copy; TEAM INSOMNIAC. All rights reserved.<br>
					
				</div>
				<!-- hitwebcounter Code START -->
				 <div class="text-center" >
                   <b> Unique Visitor Counter: </b> <br>  
                <img src="https://hitwebcounter.com/counter/counter.php?page=7348838&style=0010&nbdigits=5&type=page&initCount=0" title="Web Counter" Alt="counter free"   border="0" >
                 </div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

<!--
                                 Authors
        Rishav Mazumdar            				Tushar Jain 
-->        
