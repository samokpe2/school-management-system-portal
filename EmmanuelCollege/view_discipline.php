<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('connect.php');

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>student disciplinary cases</title>
        <link rel="stylesheet" href="css/bootstrap.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
         
        <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;     
        }
</script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php');?>   
          <!-----End Top bar>-->
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

<!-- ========== LEFT SIDEBAR ========== -->
<?php include('includes/leftbar.php');?>                   
 <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">view your disciplinary case logs</h2>
                                </div>
    <ul class="nav navbar-right top-nav">                        
    <div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" >
    <?php 
if(strlen($_SESSION['alogin'])=="")
    { 
    echo "<script type='text/javascript'>
                    alert( 'You must Log in to use the system');
                    </script>";
             echo "<script>
                    window.location = 'index.php'
                  </script>";
    }
    else{
        echo   " ".$_SESSION['firstname']. "&nbsp;".$_SESSION['lastname']. " ";
        $Student=$_SESSION['username'];
        ?>
        <span class="caret"></span></button>
  <ul class="dropdown-menu">
      <li><a href="view_profile.php"><i class="fa fa-users fa-lg"></i>&nbsp;View your profile</a></li>
      <!--<li><a href="change-password.php"><i class="fa fa-users fa-lg"></i>&nbsp;change password</a></li>-->
      <li class="divider"></li>
      <li><a href="session_logout.php"><i class="fa fa-fw fa-power-off"></i>&nbsp;Log Out</a></li>
  </ul>
</div>
  </ul>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        
                                        <li class="active">discipline cases</li>
                                    </ul>
                                </div>
                               
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             
<div id="printablediv">
                              

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5><strong> DISCIPLINARY CASES</strong></h5>
                                                </div>
                                            </div>
                                            <div id="page-wrapper">
            <div class="container-fluid">

          <nav> 
            <div class="panel-title">
                                                    <h6><strong><font color="chocolate">&nbsp;&nbsp;&nbsp;&nbsp;Emmanuel College</font></strong></h6>
                                                </div>
  
                
                <!-- Page Heading -->
             
                <div style="width:100%; background-color:#00FFFF; text-align:center; font-size:20px;"><label>Individual Students disciplinary case logs: <?php echo $id; ?>;&nbsp;&nbsp;&nbsp; <!--student name:<?php echo $firstname; ?>$['year']?>,&nbsp;&nbsp;<?php echo $_GET['term']   ?>--> </label></div>



                <?php
                    $id = $_SESSION['admission_number'];
  
                    $sql ="SELECT  * from studentstable where admission_number='$id' ";
                    $user_query=mysqli_query($db,$sql) or die("error getting data");
                    while($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)){
                    //$idx = $row['admission_number'];
                    //$feepayable = $row['feepayable'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $sirname = $row['sirname'];
                    $class_id= $row['course_id'];
                    $reg_date=$row['reg_date'];
                    $email=$row['email'];
                    $idno=$row['idno'];
                    $gender= $row['gender'];
                    }
                    ?>
                    
                    <?php
                    //for for that class
                    $id = $_SESSION['admission_number'];  
                    $sql ="SELECT  * from course where course_id=
                                    (SELECT course_id FROM studentstable 
                                    WHERE admission_number='$id') ";
                    $user_query=mysqli_query($db,$sql) or die("error getting data");
                    while($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)){
                    //$feepayable = $row['feepayable'];
                    $coursename= $row['coursename'];
                    }
                    ?>


                              

                        <!-- block -->                      
                        <div id="block_bg" class="block">   
                            <div class="navbar navbar-inner block-header">
                           
              
                           <form method="get" action="view_discipline.php">
                           <table>
                           <tr><td>
                           <input type="hidden" name="payment" value="<?php echo $id ?>" ></td>
                                                                   
                            </form>
                           </tr></table>


                            <strong>&nbsp;&nbsp;&nbsp;Student's Name:&nbsp;<font color="green"><?php echo $sirname ?>&nbsp;<?php echo $firstname ?>&nbsp; <?php echo $lastname ?></font>&nbsp;&nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;Admission Number:&nbsp;&nbsp;&nbsp;<font color="blue"><?php echo $id; ?></font>&nbsp;<br>&nbsp;&nbsp;&nbsp;Admission date:&nbsp;&nbsp;&nbsp;<font color="blue"><?php echo $reg_date; ?></font><br>&nbsp;&nbsp;&nbsp;Class/Course&nbsp;&nbsp;&nbsp;<font color="blue"><?php echo $coursename; ?></font><br> &nbsp;&nbsp;&nbsp;Course Code: &nbsp;&nbsp;&nbsp; [<font color="blue"><?php  echo $class_id ?> </font>]<br>&nbsp;&nbsp;&nbsp;Email address:&nbsp;&nbsp;&nbsp;<font color="blue"><?php echo $email; ?></font><br>&nbsp;&nbsp;&nbsp;Student ID:&nbsp;&nbsp;&nbsp;<font color="blue"><?php echo $idno; ?></font><br>&nbsp;&nbsp;&nbsp;Student Gender:&nbsp;&nbsp;&nbsp;<font color="blue"><?php echo $gender; ?></font></strong>
                                          <br><br>          
                            <div class="block-content collapse in">
                                <div class="span12">
    
                            <form method="post" action="view_discipline.php">
                                    <div class="table-responsive">
                                    <table cellpadding="" cellspacing="0" border="1" class="table" id="example">
                                    
                                        <thead>
                                          <tr>
                                                <th></th>
                                                <th><center><font color="orange"> Disciplinary case number</font></center></th>
                                                <th><center><font color="orange">Your Disciplinary case description</font></center></th>
                                                <th><center><font color="orange"> Date Case was Recorded</font></center></th>
                                                

                                                
                                                <script src="assets/js/jquery.dataTables.min.js"></script>
                                                <script src="assets/js/DT_bootstrap.js"></script>
                                                
                                           </tr>
                                        </thead>
                                        <tbody>
                        <?php 
                    
                    $id = $_SESSION['admission_number'];
                    $sql ="SELECT  * from displinary_case where admission_number='$id' ";
                    $user_query=mysqli_query($db,$sql) or die("error getting data");
                    while($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)){
                    $msg= "Please you are advised to report to your department office as soon as possible"
                    //else(){
                    //    echo "congratulations $firstname ,You have no disciplinary log cases for now";
                    //}
                  
                        ?>
                                                <tr>
                                                <td width="30">
                                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                </td>
                                                <td><center><?php echo $row['displine_id']; ?></center></td>
                                                <td><center><?php echo $row['displine_case']; ?></center></td>
                                                <td><center><?php echo $row['date_c']; ?></center></td>
                                                
                                            
                                                

                                                </tr>


                                                <?php } ?>
                                        </tbody>

                                    </table>
                                    <br>

                                    <div style="width:100%;  text-align:center; font-size:15px;"><label><font color="#cc0000"><i>*Incase of irregularities or disciplinary case[s], please, you are advised to report to your respective department soon with a printed disciplinary case form: </i></font></label>
                                    </div>




                                    <td><center><input type="button" value="Print case log" onclick="javascript:printDiv('printablediv')" class="btn btn-success" style="float: right;"></center></td>
                                </form>
                                

            </div>
                            </div>
                        </div>
                    </div>




                                    </table>




                                </form>
                            </div><br>
                                                    
                                                </form>

                                              
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-8 col-md-offset-2 -->
                                </div>
                                <!-- /.row -->

                               
                               

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>



        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php  } ?>
