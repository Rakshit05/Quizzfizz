<?php

    session_start();
    if(!isset($_SESSION['email'])){
      //  header('location:login.html');
      //  window.alert("Enter your name");
    }
    $con = mysqli_connect("localhost","root","","sessionpractical") or die(mysqli_errno($con));
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html">QuizzFizz.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="QuizHome.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="Addquiz.php" class="nav-link">Add Quiz</a></li>
            <li class="nav-item"><a href="Removequiz.php" class="nav-link">Remove Quiz</a></li>
            
            <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            <li class="nav-item cta"><a href="contact.html" class="nav-link"><span>Get in touch</span></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <div class="hero-wrap js-fullheight">
      <div class="overlay"></div>
      <div id="particles-js"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>QuizzFizz</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="letter-spacing :10px;">QuizzFizz</h1>
          </div>
        </div>
      </div>
    </div>
    
    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container bg-light">
        <div class="container">
            
            <?php
            
            session_start();
                    if('Quizhome.php') 
                        {
                        $result = "SELECT * FROM quiz_data"; 
                        $result_submit = mysqli_query($con,$result) or die(mysqli_error($con));
                        echo  '<div class="panel">
                            <div class="table-responsive" >
                            <table class="table table-striped title1" >
                            <tr  style="background:#EE76AD;color:white;text-align:center;">
                                <td><b>NO.</b></td>
                                <td><b>Subject</b></td>
                                <td><b>Total question</b></td>
                                <td><b>Total Marks</b></td>
                                <td></td>
                            </tr>';
                                                    

                        $c=1;
                        
                        while ($row = mysqli_fetch_array($result_submit))
                        {
                            $quiz_sub = $row['quiz_sub'];
                           // $quiz_marks = $row['quiz_marks'];
                            $quiz_question = $row['quiz_question'];
                            $check = "select * from quiz_history";
                           
                            $check_submit = mysqli_query($con, $check)or die(mysqli_error($con));
                            $check_submit_rowcount = mysqli_num_rows($check_submit)
                                    or die(mysqli_error($con));
                            if($check_submit_rowcount){
                                
                                echo '<tr style="text-align:center;"><td>'.$c++.'</td>'
                                        . '<td>'.$quiz_sub.'</td>'
                                        . '<td>'.$quiz_question.'</td>'
                                        . '<td></td>'
                                        . '<td><a href="QuizHome.php"'
                                        . 'class="pull-right btn sub1" style="margin:auto;background:#EE76AD;color:white;">'
                                        . '<span class="title1"><b>Start</b></span></a></td>';
                                
                            }
                            else{
                                echo '<tr><td>'.$c++.'</td>'
                                        . '<td>'.$quiz_sub.'</td>'
                                        . '<td>'.$quiz_question.'</td>'
                                        . '<td>'.$quiz_marks.'</td>'
                                        . '<td><a href="QuizHome.php"'
                                        . 'class="pull-right btn sub1" style="margin:auto;background:#EE76AD;color:white;">'
                                        . '<span class="title1"><b>Restart</b></span></a></td>';
                            }
                            
                        }
/*
                        while($row = mysqli_fetch_array($result)) 
                        {
                            $title = $row['title'];
                            $total = $row['total'];
                            $sahi = $row['sahi'];
                            $time = $row['time'];
                            $eid = $row['eid'];
                            $q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die(mysqli_error($con));
                            $rowcount=mysqli_num_rows($q12);	

                                if($rowcount == 0)
                                {
                                    echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
                                        <td><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" '
                                        . 'class="pull-right btn sub1" style="margin:0px;background:#99cc32">'
                                        . '<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;'
                                        . '<span class="title1"><b>Start</b></span></a></b></td></tr>';
                                }
                                else
                                {
                                    echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;'
                                            . '<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>'
                                            . '<td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
                                            <td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" '
                                            . 'class="pull-right btn sub1" style="margin:0px;background:red">'
                                            . '<span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;'
                                            . '<span class="title1"><b>Restart</b></span></a></b></td></tr>';
                                }
                        }*/
                        $c=0;
                        echo '</table></div></div>';
                            
                        }
                
            ?>
         <!--   <br><h1 class="text-center text-primary" style="font-size:60px;font-weight: bold;letter-spacing: 15px">QuizzFizz</h1><br>
            <br>
            <div class="col-lg-12 col-md-8 col-sm-8 m-auto d-block">
                <br>
                    <form action="QuizSubmit.php" method="post">
                        <?php /*
                            for($i=1 ; $i<=10 ; $i++){
                            $query = "select * from que_table where qid=$i";
                            $query_select = mysqli_query($con, $query);
                            while ($rows = mysqli_fetch_array($query_select)){
                                ?>
                        <div class="" style="border:none;">
                            <h4 class="card-header" style="background:#EE7BAE;color:white;"><?php echo "($i)"." ".$rows['question']?></h4>      
                                    <?php 
                                        $query = "select * from ans_table where ans_id=$i";
                                        $query_select = mysqli_query($con, $query);      
                                        while ($rows = mysqli_fetch_array($query_select)){
                                    ?>
                                    <div class="card-body">
                                        <input type="radio" name="anscheck[<?php echo $rows['ans_id'];?>]" 
                                               value="<?php echo $rows['aid']; ?>">
                                                    <?php echo $rows['answer']; ?>
                                    </div>
                            <?php
                                }
                            }
                            }
                            */?>
                                    <input type="submit" name="submit" value="SUBMIT" 
                                           class="btn btn-primary m-auto d-block">
                    </form>
                                </div>
            </div>    
                    <br><div class="m-auto d-block"><a href="logout.php" class="btn btn-primary">LOGOUT</a></div>
                    <br><div class="text-center ">&copy;2020 Chonga bois</div> -->
        </div>
      </div>
    </section>
    

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">QuizzFizz</h2>
              <p>A global education network that helps connect all learners with the people and resources needed to reach their full potential.</p>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-5">
              <h2 class="ftco-heading-2">Quick Links</h2>
              <ul class="list-unstyled">
                <li><a href="index.html" class="py-2 d-block">Home</a></li>
                <li><a href="about.html" class="py-2 d-block">About Us</a></li>
                <li><a href="#" class="py-2 d-block">Privacy</a></li>
                <li><a href="#" class="py-2 d-block">Terms of Service</a></li>
              </ul>
            </div>
          </div>
      
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Contact Information</h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>Made By Chonga Boisss</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/particles.min.js"></script>
  <script src="js/particle.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>



