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
    <title>Customer Details</title>
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
<!-- START -->
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'fitness_centre_management_system');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if ($_SERVER['REQUEST_METHOD']=='POST') {
  if (isset($_POST['update'])) {
    $customer_id=$_POST['customer_id'];
    $customer_name=$_POST['customer_name'];
    $contact_number=$_POST['contact_number'];
    $address=$_POST['address'];
    $DOB=$_POST['DOB'];
    $sex=$_POST['sex'];
    $batch_name=$_POST['batch_name'];
    $trainer_id=$_POST['trainer_id'];
    $deitcian_id=$_POST['deitcian_id'];
    $amount_paid=$_POST['amount_paid'];
    $sql="UPDATE customer SET customer_name='$customer_name', contact_number='$contact_number', address='$address', DOB='$DOB', sex='$sex', batch_name='$batch_name', trainer_id='$trainer_id', deitcian_id='$deitcian_id', amount_paid='$amount_paid' WHERE customer_id='$customer_id'";
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
    $customer_id=$_POST['customer_id'];
    $sql="DELETE FROM customer WHERE customer_id='$customer_id'";
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
      <option value="customer_name"><b style="font-size: 18px; font-family: cursive; color:#004d00;">Name</b></option>
      <option value="batch_name"><b style="font-size: 18px; font-family: cursive; color:#004d00;">Batch_name</b></option>
      <option value="membership_id"><b style="font-size: 18px; font-family: cursive; color:#004d00;">Membership id</b></option>
      <option value="DOB"><b style="font-size: 18px; font-family: cursive; color:#004d00;">DOB</b></option>
      <option value="sex"><b style="font-size: 18px; font-family: cursive; color:#004d00;">Gender</b></option>
    </select>
    <button type="submit"  onclick="typeWriter()" class="submitbtn" name="sort_data">Search</button>  
  </form>
  <!-- Search -->
  --- OR ---
  <br>
  <b style="font-size: 20px; font-family: cursive; color:#004d00;">View and update details for:</b>
  <form action="" method="POST">
    <label for="C_ID">
      <b style="font-size: 20px; font-family: cursive; color:#004d00;"> Enter Customer ID:</b>
    </label>
    <input type="text" name="customer_id">
    <button type="submit"  onclick="typeWriter()" class="submitbtn" name="view">View</button>
  </form>
  <!--DISPLAY RESULTS-->
<?php
  //display all results
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['sort_data'])) {
?>
      <table>
      <tr>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Customer ID</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Centre ID</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Membership Name</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Name</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Contact no.</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Address</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">DOB</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Gender</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Batch Name</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Joining Date</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Trainer Name</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Deitician Name</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Amount paid</td>
        <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Amount due</td>
      </tr>
<?php
      $centre=$_POST['centre'];
      $sort=$_POST['condition'];
      //all centres
      if($centre=="all"){
        $sql="SELECT * FROM ((customer inner join membership on customer.membership_id=membership.membership_id) inner join trainer on customer.trainer_id=trainer.trainer_id) inner join deitcian on customer.deitcian_id=deitcian.deitcian_id ORDER BY '$sort'";
        $run=mysqli_query($db, $sql);
          $arr=mysqli_fetch_array($run);
          //check query run
          if($arr){
            while ($arr) {
?>
          <tr>
            <form action="" method="POST">
              <input type="hidden" name="cid" value="<?php echo $arr['customer_id']; ?>">
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['customer_id']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['centre_id']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['membership_name']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['customer_name']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['contact_number']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['address']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['DOB']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['sex']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['batch_name']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['date_of_joining']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['trainer_name']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['deitcian_name']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['amount_paid']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['amount_due']; ?></td>
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
        $sql="SELECT * FROM ((customer inner join membership on customer.membership_id=membership.membership_id) inner join trainer on customer.trainer_id=trainer.trainer_id) inner join deitcian on customer.deitcian_id=deitcian.deitcian_id WHERE customer.centre_id='$centre' ORDER BY '$sort'";
        $run=mysqli_query($db, $sql);
          $arr=mysqli_fetch_array($run);
          //check query run
          if($arr){
            while ($arr) {
?>
          <tr>
            <form action="" method="POST">
              <input type="hidden" name="cid" value="<?php echo $arr['customer_id']; ?>">
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['customer_id']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['centre_id']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['membership_name']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['customer_name']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['contact_number']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['address']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['DOB']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['sex']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['batch_name']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['date_of_joining']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['trainer_name']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['deitcian_name']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['amount_paid']; ?></td>
              <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['amount_due']; ?></td>
            </form>
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
      </table>
<?php
          }
      }
    }
  }
  //display by ID
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['view'])) {
      $customer_id=$_POST['customer_id'];
      $sql="SELECT * FROM (((customer inner join membership on customer.membership_id=membership.membership_id) inner join trainer on customer.trainer_id=trainer.trainer_id) inner join deitcian on customer.deitcian_id=deitcian.deitcian_id) inner join batches on customer.batch_name=batches.batch_name WHERE customer_id='$customer_id'";
      $run=mysqli_query($db, $sql);
        $arr=mysqli_fetch_array($run);
        if($arr){
?>
      <table>
        <form action="" method="POST">
          <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
          <tr>
            <td  style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Customer ID</td>
            <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['customer_id']; ?></td>
          </tr>
          <tr>
            <td  style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Centre ID</td>
            <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['centre_id']; ?></td>
          </tr>
          <tr>
            <td  style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Membership name</td>
            <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['membership_name']; ?></td>
          </tr>
          <tr>
            <td  style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Customer Name</td>
            <td   style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="customer_name" value="<?php echo $arr['customer_name']; ?>"></td>
          </tr>
          <tr>
            <td  style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Contact Number</td>
            <td  style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="contact_number" value="<?php echo $arr['contact_number']; ?>"></td>
          </tr>
          <tr>
            <td  style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Address</td>
            <td  style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="address" value="<?php echo $arr['address']; ?>"></td>
          </tr>
          <tr>
            <td  style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">DOB</td>
            <td  style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="DOB" value="<?php echo $arr['DOB']; ?>"></td>
          </tr>
          <tr>
            <td  style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Gender</td>
            <td  style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="sex" value="<?php echo $arr['sex']; ?>"></td>
          </tr>
          <tr>
            <!-- DROPDOWN-->
            <td  style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Batch Name</td>
            <td>
              <select name="batch_name">
                <option value="<?php echo $arr['batch_name']; ?>"> <?php echo $arr['batch_name'] . "-" . $arr['start_time'] . "-" . $arr['end_time']; ?> </option>
<?php
              $sqlb = "SELECT * FROM batches";
                $runb=mysqli_query($db, $sqlb);
                $arrb=mysqli_fetch_array($runb);
                if($arrb){
                  while($arrb){
?>
                  <option value="<?php echo $arrb['batch_name']; ?>"> <?php echo $arrb['batch_name'] . "-" . $arrb['start_time'] . "-" . $arrb['end_time']; ?> </option>
<?php
                    $arrb=mysqli_fetch_array($runtb);
                  } 
                }
?>
            </select>
            </td>
          </tr>
          <tr>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Date of Joining</td>
            <td><?php echo $arr['date_of_joining']; ?></td>
          </tr>
          <tr>
            <!-- DROPDOWN-->
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Trainer Name</td>
            <td>
            <select name="trainer_id">
              <option value="<?php echo $arr['trainer_id']; ?>"> <?php echo $arr['trainer_id'] . "-" . $arr['trainer_name']; ?> </option>
<?php
              $sqlt = "SELECT * FROM trainer WHERE centre_id={$arr['centre_id']}";
                $runt=mysqli_query($db, $sqlt);
                $arrt=mysqli_fetch_array($runt);
                if($arrt){
                  while($arrt){
?>
                  <option value="<?php echo $arrt['trainer_id']; ?>"> <?php echo $arrt['trainer_id'] . "-" . $arrt['trainer_name']; ?> </option>
<?php
                    $arrt=mysqli_fetch_array($runt);
                  } 
                }
?>
            </select>
            </td>
          </tr>
          <!-- DROPDOWN-->
          <tr>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Deitcian Name</td>
            <td>
              <select name="deitcian_id">
                <option value="<?php echo $arr['deitcian_id']; ?>"> <?php echo $arr['deitcian_id'] . "-" . $arr['deitcian_name']; ?> </option>
<?php
              $sqld = "SELECT * FROM deitcian WHERE centre_id={$arr['centre_id']}";
                $rund=mysqli_query($db, $sqld);
                $arrd=mysqli_fetch_array($rund);
                if($arrd){
                  while($arrd){
?>
                  <option value="<?php echo $arrd['deitcian_id']; ?>"> <?php echo $arrd['deitcian_id'] . "-" . $arrd['deitcian_name']; ?> </option>
<?php
                    $arrd=mysqli_fetch_array($rund);
                  } 
                }
?>
              </select>
            </td>
          </tr>
          <tr>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Amount Paid</td>
            <td  style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="amount_paid" value="<?php echo $arr['amount_paid']; ?>"></td>
          </tr>
          <tr>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Amount Due</td>
            <td  style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['amount_due']; ?></td>
          </tr>
          <br>
          <td  style=" padding:15px 10px 15px 10px; color: black;"></td>
          <td style=" padding:15px 10px 15px 10px; color: black;"><button type="submit" onclick="typeWriter()" class="submitbtn" name="update">Update</button>
            <button type="submit" onclick="typeWriter()" class="submitbtn" name="delete">Delete</button></td>
        </form>
      </table>
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
<!-- END -->
        </div>
      </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
  </body>
</html>
