<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="styles.css" />
    <style>
     
     td{
  padding: 15px;
  text-align: left;
  border: 1px solid #004d00;
  padding: 8px;
}
table {
  border-collapse: collapse;
  padding-top :50px;
  padding-left: 0%;
}

tr {
  padding-top: 12px;
  padding-bottom: 10px;
  text-align: left;
  background-color: #e7e7e7;
  color: white;
  
}
tr:hover {background-color: #f5f5f5;}

.container3 {
  border-radius: 5px;
  background-color:  #c2f0c2;
  padding:  50px 220px 220px 10px;
}
.submitbtn{
  
  align-items: center;
  padding: 15px 25px;
  font-size: 15px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px
  box-shadow: 0 9px #999;

}
.submitbtn:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.submitbtn:hover {
  opacity:1;
  background-color: #3e8e41
}
      </style>
    <title>Membership Details</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="#">Admin</a>
        </div>
        <div class="navbar__right">
          <a href="#">
            <i class="fa fa-search" aria-hidden="true"></i>
          </a>
          <a href="#">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
          </a>
          <a href="#">
            <img width="30" src="assets/avatar.svg" alt="" />
            <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
          </a>
        </div>
      </nav>

      <main>
        <div class="container3">
          <!-- MAIN TITLE STARTS HERE -->
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'fitness_centre_management_system');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['update'])){
    $mid=$_POST['membership_id'];
    $mname=$_POST['mname'];
    $durn=$_POST['durn'];
    $amt=$_POST['amt'];
    $mstatus=$_POST['mstatus'];
    $sql="UPDATE membership SET membership_name='$mname', duration_in_month='$durn', amount='$amt', membership_status='$mstatus' WHERE membership_id='$mid'";
    $run=mysqli_query($db, $sql);
    if($run){
?>
      <p style="font-size: 18px; font-family: cursive; color:#004d00;"><?php echo "Data updated succesfully!!";?></p>
<?php
    }
    else{
?>
      <p style="font-size: 18px; font-family: cursive; color:#004d00;"><?php echo "Unable to update data. Please try again later!!";?></p>
<?php
    }
  }
  if(isset($_POST['delete'])){
    $mid=$_POST['membership_id'];
    $sql="DELETE FROM membership WHERE membership_id='$mid'";
    $run=mysqli_query($db, $sql);
    if($run){
?>
      <p style="font-size: 18px; font-family: cursive; color:#004d00;"><?php echo "Data deleted succesfully!!";?></p>
<?php
    }
    else{
?>
      <p style="font-size: 18px; font-family: cursive; color:#004d00;"><?php echo "Unable to delete data. Please try again later!!";?></p>
<?php
    }
  }
}
?>

<table>
  <tr>
    <td style="font-size: 18px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Membership ID</td>
    <td style="font-size: 18px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Membership Name</td>
    <td style="font-size: 18px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Duration(in month)</td>
    <td style="font-size: 18px; font-family: cursive; color:#004d00; padding:15px 10px 15px 15px;">Amount</td>
    <td style="font-size: 18px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Membership Status</td>
    <td style="font-size: 18px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;"></td>
  </tr>
<?php
    $sql = "SELECT * FROM membership";
    $run=mysqli_query($db, $sql);
    $arr=mysqli_fetch_array($run);
    if($arr){
        while($arr){
?>
          <tr>
            <form action="" method="POST">
              <input type="hidden" name="membership_id" value="<?php echo $arr['membership_id']; ?>">
              <td style=" padding:15px 15px 15px 15px; color: black;"><?php echo $arr['membership_id']; ?></td>
                <td style=" padding:15px 15px 15px 15px; color: black;"><input type="text" name="mname" value="<?php echo $arr['membership_name']; ?>"></td>
                <td style=" padding:15px 15px 15px 15px; color: black;"><input type="text" name="durn" value="<?php echo $arr['duration_in_month']; ?>"></td>
                <td style=" padding:15px 1px 15px 15px; color: black;"><input type="text" name="amt" value="<?php echo $arr['amount']; ?>"></td>
                <td style=" padding:15px 7px 15px 15px; color: black;"><input type="text" name="mstatus" value="<?php echo $arr['membership_status']; ?>"></td>
                <td ><button type="submit" name="update" onclick="typeWriter()" class="submitbtn" >Update</button>
                  <br>
                  <br>
                  <button type="submit" name="delete" onclick="typeWriter()" class="submitbtn" >Delete</button></td>
                  
              
            </form>
            </tr>
<?php
            $arr=mysqli_fetch_array($run);
        }
        $count = @mysqli_num_rows($run);
?>
    <p style="font-size: 18px; font-family: cursive; color:#004d00;">
<?php
      echo $count. " records found!!";
?>
    </p>
<?php
    }
    else{
?>
        <p style="font-size: 18px; font-family: cursive; color:#004d00;">
<?php
          echo "No record found!!";
?>
        </p>
<?php
    }
?>
</table>

          <!-- END -->
        </div>
      </main>

      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="assets/h.png" alt="h" />
            <h1>FITNESS PACK</h1>
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>

        <div class="sidebar__menu">
          <div class="sidebar__link active_menu_link">
            <i class="fa fa-chart-line"></i>
            <a href="Admin.php">Dashboard</a>
          </div>
         
  
          <div class="sidebar__link">
            <i class="fa fa-user-circle"></i>
            <a href="Add_details.php">Add Details</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-comments"></i>
           <a href="Fetch_details.php">Fetch Details</a>
          </div>
         
          <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="index.php">Log out</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
  </body>
</html>
