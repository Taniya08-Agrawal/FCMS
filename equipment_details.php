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
}

tr {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #e7e7e7;
  color: white;
  
}
tr:hover {background-color: #f5f5f5;}

.container3 {
  border-radius: 5px;
  background-color:  #c2f0c2;
  padding:  50px 220px 220px 150px;
}
.submitbtn{
  
  align-items: center;
  padding: 10px 20px;
  font-size: 15px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
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
    <title>DASHBOARD</title>
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
      //update
    if(isset($_POST['update'])){
      $eid=$_POST['eid'];
      $qty=$_POST['qty'];
      $cat=$_POST['cat'];
      $cost=$_POST['cost'];
      $mcost=$_POST['mcost'];
      $sql="UPDATE equipment SET quantity='$qty', category='$cat', cost='$cost', maintenance_cost='$mcost' WHERE equipment_id='$eid'";
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
    //delete
    if(isset($_POST['delete'])){
      $eid=$_POST['eid'];
      $sql="DELETE FROM Equipment WHERE equipment_id='$eid'";
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
<form action="" method="POST">
    <!-- Options for centre -->
    <label for="centre">
      <b style="font-size: 20px; font-family: cursive; color:#004d00;"> Select the centre:</b>
    </label>
    <select name="centre">
      <option value="all"><b style="font-size: 20px; font-family: cursive; color:#004d00;"> All centres</b></option>
<?php
    $sql = "SELECT * FROM centre";
      $run=mysqli_query($db, $sql);
      $arr=mysqli_fetch_array($run);
      if($arr){
        while($arr){
?>
        <option value="<?php echo $arr['centre_id']; ?>"> <?php echo $arr['location']; ?> </option>
<?php
          $arr=mysqli_fetch_array($run);
        } 
      }
?>
    </select>
    <button type="submit"  onclick="typeWriter()" class="submitbtn" name="search">Search</button> 
  </form>
<?php
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['search'])) {
?>
    <table>
    <tr>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Equipment ID</td>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Centre ID</td>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Quantity</td>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Category</td>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Cost</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Maintenance Cost</td>
        <td></td>
        <td></td>
    </tr>
<?php
    // Search
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(isset($_POST['search'])){
        $c=$_POST['centre'];
        //all centres
        if($c=='all'){
          $sql = "SELECT * FROM Equipment";
            $run=mysqli_query($db, $sql);
            $arr=mysqli_fetch_array($run);
            if($arr){
                while($arr){
?>
                <tr>
                  <form action="" method="POST">
                    <input type="hidden" name="eid" value="<?php echo $arr['equipment_id']; ?>">
                    <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['equipment_id']; ?></td>
                      <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['centre_id']; ?></td>
                      <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="qty" value="<?php echo $arr['quantity']; ?>"></td>
                      <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="cat" value="<?php echo $arr['category']; ?>"></td>
                      <td style=" padding:15px 10px 15px 10px; color: black;"><input type="number" name="cost" value="<?php echo $arr['cost']; ?>"></td>
                      <td style=" padding:15px 10px 15px 10px; color: black;"><input type="number" name="mcost" value="<?php echo $arr['maintenance_cost']; ?>"></td>
                      <td style=" padding:15px 10px 15px 10px; color: black;"><button type="submit" onclick="typeWriter()" class="submitbtn" name="update">Update</button></td>
                      <td><button type="submit" onclick="typeWriter()" class="submitbtn" name="delete">Delete</button></td>
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
        }
        //specific centre
        else{
          $sql = "SELECT * FROM Equipment WHERE centre_id='$c'";
            $run=mysqli_query($db, $sql);
            $arr=mysqli_fetch_array($run);
            if($arr){
                while($arr){
?>
                <tr>
                  <form action="" method="POST">
                    <input type="hidden" name="eid" value="<?php echo $arr['equipment_id']; ?>">
                    <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['equipment_id']; ?></td>
                      <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['centre_id']; ?></td>
                      <td  style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="qty" value="<?php echo $arr['quantity']; ?>"></td>
                      <td  style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="cat" value="<?php echo $arr['category']; ?>"></td>
                      <td  style=" padding:15px 10px 15px 10px; color: black;"><input type="number" name="cost" value="<?php echo $arr['cost']; ?>"></td>
                        <td  style=" padding:15px 10px 15px 10px; color: black;"><input type="number" name="mcost" value="<?php echo $arr['maintenance_cost']; ?>"></td>
                        <td style=" padding:15px 10px 15px 10px; color: black;"><button type="submit" onclick="typeWriter()" class="submitbtn" name="update">Update</button></td>
                        <td><button type="submit" onclick="typeWriter()" class="submitbtn" name="delete">Delete</button></td>
                     
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
                  echo "No records found!!";
?>
                </p>
<?php
            }
        }
      }
    }
?>
</table>
<?php
    }
  }
?>
          <!-- END -->
        </div>
      </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
  </body>
</html>
