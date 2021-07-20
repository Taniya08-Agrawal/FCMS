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
  padding: 15px 25px;
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
    <title>Trainer Details</title>
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
if ($_SERVER['REQUEST_METHOD']=='POST') {
  if (isset($_POST['update'])) {
    $trainer_id=$_POST['trainer_id'];
    $trainer_name=$_POST['trainer_name'];
    $Contact_no=$_POST['Contact_no'];
    $address=$_POST['address'];
    $DOB=$_POST['DOB'];
    $Gender=$_POST['Gender'];
    $sql="UPDATE trainer SET trainer_name='$trainer_name', Contact_no='$Contact_no', address='$address', DOB='$DOB', Gender='$Gender' WHERE trainer_id='$trainer_id'";
    $run=mysqli_query($db, $sql);
      if ($run) {
?>
      <p style="font-size: 18px; font-family: cursive; color:#004d00;">
        <?php echo "Data updated successfully!!"; ?>
      </p>
<?php
      }
      else{
?>
      <p style="font-size: 18px; font-family: cursive; color:#004d00;">
        <?php echo "Cannot update data!!"; ?>
      </p>
<?php
      }

  }
  if (isset($_POST['delete'])) {
    $trainer_id=$_POST['trainer_id'];
    $sql="DELETE FROM trainer WHERE trainer_id='$trainer_id'";
    $run=mysqli_query($db, $sql);
      if ($run) {
?>
      <p style="font-size: 18px; font-family: cursive; color:#004d00;">
        <?php echo "Data deleted successfully!!"; ?>
      </p>
<?php
      }
      else{
?>
      <p style="font-size: 18px; font-family: cursive; color:#004d00;">
        <?php echo "Cannot delete data!!"; ?>
      </p>
<?php
      }
  }
}
?>
  <!-- SORT BY-->
  <form action="" method="POST">
    <label for="centre">
      <b style="font-size: 20px; font-family: cursive; color:#004d00;">Select the centre:</b>
    </label>
    </label>
    <select name="centre">
      <option value="all"><b style="font-size: 18px; font-family: cursive; color:#004d00;">All centres</b></option>
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
    <label for="condition">
      <b style="font-size: 18px; font-family: cursive; color:#004d00;">Sort by:</b>
    </label>
    <select name="condition" required>
      <option value="trainer_name"><b style="font-size: 18px; font-family: cursive; color:#004d00;">Name</b></option>
      <option value="salary"><b style="font-size: 18px; font-family: cursive; color:#004d00;">Salary</b></option>
      <option value="DOB"><b style="font-size: 18px; font-family: cursive; color:#004d00;">DOB</b></option>
      <option value="Gender"><b style="font-size: 18px; font-family: cursive; color:#004d00;">Gender</b></option>
    </select>
    <button type="submit"  onclick="typeWriter()" class="submitbtn" name="sort_data">Search</button>  </form>
  <!-- Search -->
  --- OR ---
  <br>
  <b style="font-size: 20px; font-family: cursive; color:#004d00;">View and update details for:</b>
  <form action="" method="POST">
    <label for="C_ID">
      <b style="font-size: 20px; font-family: cursive; color:#004d00;"> Enter Trainer ID:</b>
    </label>
    <input type="text" name="trainer_id">
    <button type="submit"  onclick="typeWriter()" class="submitbtn" name="view">View</button>
  </form>
  <!--DISPLAY RESULTS-->
<?php
  //display by ID
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['view'])) {
      $trainer_id=$_POST['trainer_id'];
      $sql="SELECT * FROM trainer WHERE trainer_id='$trainer_id'";
      $run=mysqli_query($db, $sql);
        $arr=mysqli_fetch_array($run);
        if($arr){
?>
      <div><table>
        <form action="" method="POST">
          <input type="hidden" name="trainer_id" value="<?php echo $trainer_id; ?>">
          <tr>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">trainer ID</td>
            <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['trainer_id']; ?></td>
          </tr>
          <tr>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Centre ID</td>
            <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['centre_id']; ?></td>
          </tr>
          <tr>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">trainer Name</td>
            <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="trainer_name" value="<?php echo $arr['trainer_name']; ?>"></td>
          </tr>
          <tr>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Contact Number</td>
            <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="Contact_no" value="<?php echo $arr['Contact_no']; ?>"></td>
          </tr>
          <tr>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Address</td>
            <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="address" value="<?php echo $arr['address']; ?>"></td>
          </tr>
          <tr>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">DOB</td>
            <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="DOB" value="<?php echo $arr['DOB']; ?>"></td>
          </tr>
          <tr>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Gender</td>
            <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="Gender" value="<?php echo $arr['Gender']; ?>"></td>
          </tr>
          <tr>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Date of Joining</td>
            <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['joining_date']; ?></td>
          </tr>
          <br>
          <td style=" padding:15px 10px 15px 10px; color: black;"><button type="submit" onclick="typeWriter()" class="submitbtn" name="update">Update</button>
            <button type="submit" onclick="typeWriter()" class="submitbtn" name="delete">Delete</button></td>
        </form>
      </table></div>
      <p>
        <b style="font-size: 18px; font-family: cursive; color:#004d00;">Trains:</b>
      </p>
      <div><table>
        <tr>
          <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Customer ID</td>
          <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Customer Name</td>
          <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Batch name</td>
        </tr>
<?php 
        $sql1="SELECT * FROM customer inner join trainer  on trainer.trainer_id=customer.trainer_id WHERE customer.trainer_id='$trainer_id'";
        $run1=mysqli_query($db, $sql1);
          $arr1=mysqli_fetch_array($run1);
          if($run1){
            if($arr1){
              while($arr1){
?>
              <tr>
                <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr1['customer_id']; ?></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr1['customer_name']; ?></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr1['batch_name']; ?></td>
              </tr>
<?php
                $arr1=mysqli_fetch_array($run1);
              }
              $count = @mysqli_num_rows($run1);
?>
        <p style="font-size: 18px; font-family: cursive; color:#004d00;">
          <?php echo $count. " records found!!"; ?>
        </p>
<?php
            }
            else{
?>
          <p style="font-size: 18px; font-family: cursive; color:#004d00;">
            <?php echo "Could not fetch customer details now!!"; ?>
          </p>
<?php 
            }
          }
          else{
?>
          <p style="font-size: 18px; font-family: cursive; color:#004d00;">
            <?php echo "Could not fetch customer details now!!"; ?>
          </p>
<?php
          }
?>
      </table></div>

<?php
        }
        else{
?>
        <p style="font-size: 18px; font-family: cursive; color:#004d00;">
          <?php echo "No such record found!!"; ?>
        </p>
<?php
        }
    }
  }
?>
<?php
  //display all results
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['sort_data'])) {
?>
      <div><table>
      <tr>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Trainer ID</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Centre ID</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Name</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Contact no.</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Address</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">DOB</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Gender</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Joining Date</td>
      </tr>
<?php
      $centre=$_POST['centre'];
      $sort=$_POST['condition'];
      //all centres
      if($centre=="all"){
        $sql="SELECT * FROM trainer ORDER BY '$sort'";
        $run=mysqli_query($db, $sql);
          $arr=mysqli_fetch_array($run);
          //check query run
          if($arr){
            while ($arr) {
?>
          <tr>
            <form action="" method="POST">
              <input type="hidden" name="cid" value="<?php echo $arr['trainer_id']; ?>">
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['trainer_id']; ?></td>
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['centre_id']; ?></td>
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['trainer_name']; ?></td>
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['Contact_no']; ?></td>
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['address']; ?></td>
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['DOB']; ?></td>
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['Gender']; ?></td>
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['joining_date']; ?></td>
            </form>
          </tr>
<?php
              $arr=mysqli_fetch_array($run);
            }
            $count = @mysqli_num_rows($run);
?>
          <p style="font-size: 18px; font-family: cursive; color:#004d00;">
            <?php echo $count. " records found!!";  ?>
          </p>
<?php
          }
          else{
?>
          <p style="font-size: 18px; font-family: cursive; color:#004d00;">
            <?php echo "No record found!!";?>
          </p>
<?php
          }
      }
      //some particular centre
      else{
        $sql="SELECT * FROM trainer WHERE centre_id='$centre' ORDER BY '$sort'";
        $run=mysqli_query($db, $sql);
          $arr=mysqli_fetch_array($run);
          //check query run
          if($arr){
            while ($arr) {
?>
          <tr>
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['trainer_id']; ?></td>
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['centre_id']; ?></td>
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['trainer_name']; ?></td>
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['Contact_no']; ?></td>
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['address']; ?></td>
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['DOB']; ?></td>
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['Gender']; ?></td>
              <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['joining_date']; ?></td>
          </tr>
<?php
              $arr=mysqli_fetch_array($run);
            }
            $count = @mysqli_num_rows($run);
?>
        <p style="font-size: 18px; font-family: cursive; color:#004d00;">
          <?php echo $count. " records found!!"; ?>
        </p>
<?php
          }
          else{
?>
          <p style="font-size: 18px; font-family: cursive; color:#004d00;">
            <?php echo "No record found!!";?>
          </p>
      </table></div>
<?php
          }
      }
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
