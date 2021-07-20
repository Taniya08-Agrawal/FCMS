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

.search_categories{
  font-size: 13px;
  padding: 10px 8px 10px 14px;
  background: #fff;
  border: 1px solid #f2f2f2;
  border-radius: 6px;
  position: relative;
}

input[type=text1]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background-color: #f2f2f2;
}

input[type=text1]:focus {
  background-color: #f2f2f2;
  outline: none;
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
    <title>Receptionist Details</title>
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
  //update
    if(isset($_POST['update'])){
      $receptionist_id=$_POST['rid'];
      $rep_name=$_POST['rname'];
      $contact_no=$_POST['contact_no'];
      $address=$_POST['address'];
      $DOB=$_POST['DOB'];
      $gender=$_POST['gender'];
      $salary=$_POST['salary'];
      $joining_date=$_POST['joining_date'];
      $sql="UPDATE receptionist SET rep_name='$rep_name', Contact_no='$contact_no', address='$address', DOB='$DOB', gender='$gender', salary='$salary', joining_date='$joining_date' WHERE receptionist_id='$receptionist_id'";
      $run=mysqli_query($db, $sql);
      if($run){
?>
        <p style="font-size: 18px; font-family: cursive; color:#004d00;">
          <?php echo "Record updated successfully!!";?>
        </p>
<?php 
      }
      else{
?>
        <p style="font-size: 18px; font-family: cursive; color:#004d00;">
          <?php echo "Cannot update record. Please try again later";?>
        </p>
<?php
        }
    }
  //delete
    if(isset($_POST['delete'])){
      $receptionist_id=$_POST['rid'];
      $sql="DELETE FROM receptionist WHERE receptionist_id='$receptionist_id'";
      $run=mysqli_query($db, $sql);
      if($run){
?>
        <p style="font-size: 18px; font-family: cursive; color:#004d00;">
          <?php echo "Record deleted!!";?>
        </p>
<?php 
      }
      else{
?>
        <p style="font-size: 18px; font-family: cursive; color:#004d00;">
          <?php echo "Cannot delete record. Please try again later";?>
        </p>
<?php
        }
    }
}
?>
  <!-- Filter -->
  <form action="" method="POST">
    <label for="centre">
      <b style="font-size: 20px; font-family: cursive; color:#004d00;">Select the centre:</b>
    </label>
    <select name="centre">
      <option value="all"><b style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">All centres</b></option>
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
      <b style="font-size: 20px; font-family: cursive; color:#004d00;">Choose filter*:</b>
    </label>
    <select name="condition" required>
      <option style="font-size: 20px; font-family: cursive; color:#004d00; value="none">None</option>
      <option style="font-size: 20px; font-family: cursive; color: #004d00; value="salary_greater">Salary (greater than)</option>
    </select>
    <input type="text1" name="filter_value" placeholder="Enter value">
   
    <button type="submit"  onclick="typeWriter()" class="submitbtn" name="search">Search</button>
  </form>
<?php
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['search'])) {
?>
  <table>
    <tr>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Receptionist ID</td>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Centre ID</td>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Name</td>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Contact no.</td>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Address</td>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">DOB</td>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Gender</td>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Salary</td>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;">Joining Date</td>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;"></td>
      <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 15px 15px 15px;"></td>
    </tr>
<?php
      $centre=$_POST['centre'];
      $condition=$_POST['condition'];
      $filter_value=$_POST['filter_value'];
      //all centres
      if($centre=="all"){
        if($condition=="none"){
          $sql="SELECT * FROM receptionist";
          $run=mysqli_query($db, $sql);
            $arr=mysqli_fetch_array($run);
            //check query run
            if($arr){
              while ($arr) {
?>
            <tr>
              <form action="" method="POST">
                <input type="hidden" name="rid" value="<?php echo $arr['receptionist_id']; ?>">
                <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['receptionist_id']; ?></td>
                <td style=" padding:10px 10px 10px 10px; color: black;"><?php echo $arr['centre_id']; ?></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="rname" value="<?php echo $arr['rep_name']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="contact_no" value="<?php echo $arr['Contact_no']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="address" value="<?php echo $arr['address']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="DOB" value="<?php echo $arr['DOB']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="gender" value="<?php echo $arr['Gender']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="salary" value="<?php echo $arr['salary']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="joining_date" value="<?php echo $arr['joining_date']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><button type="submit" onclick="typeWriter()" class="submitbtn" name="update">Update</button></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><button type="submit" onclick="typeWriter()" class="submitbtn" name="delete">Delete</button></td>
              </form>
            </tr>
<?php
                $arr=mysqli_fetch_array($run);
              }
              $count = @mysqli_num_rows($run);
?>
            <p style="font-size: 18px; font-family: cursive; color:#004d00;">
              <?php echo $count. " records found!!";?>
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
          //salary greater
          else{
            $sql="SELECT * FROM Receptionist WHERE salary>'$filter_value' ORDER BY salary";
          $run=mysqli_query($db, $sql);
            $arr=mysqli_fetch_array($run);
            //check query run
            if($arr){
              while ($arr) {
?>  
            <tr>
              <form action="" method="POST">
                <input type="hidden" name="rid" value="<?php echo $arr['receptionist_id']; ?>">
                <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['receptionist_id']; ?></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['centre_id']; ?></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="rname" value="<?php echo $arr['rep_name']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="contact_no" value="<?php echo $arr['Contact_no']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="address" value="<?php echo $arr['address']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="DOB" value="<?php echo $arr['DOB']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="gender" value="<?php echo $arr['Gender']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="salary" value="<?php echo $arr['salary']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="joining_date" value="<?php echo $arr['joining_date']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><button type="submit" onclick="typeWriter()" class="submitbtn" name="update">Update</button></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><button type="submit" onclick="typeWriter()" class="submitbtn" name="delete">Delete</button></td>
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
<?php
            }
          }
        }
        //some specific centre
        else{
          if($condition=="none"){
          $sql="SELECT * FROM receptionist WHERE centre_id='$centre'";
          $run=mysqli_query($db, $sql);
            $arr=mysqli_fetch_array($run);
            //check query run
            if($arr){
              while ($arr) {
?>
            <tr>
              <form action="" method="POST">
                <input type="hidden" name="rid" value="<?php echo $arr['receptionist_id']; ?>">
                <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['receptionist_id']; ?></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['centre_id']; ?></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="rname" value="<?php echo $arr['rep_name']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="contact_no" value="<?php echo $arr['Contact_no']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="address" value="<?php echo $arr['address']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="DOB" value="<?php echo $arr['DOB']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="gender" value="<?php echo $arr['Gender']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="salary" value="<?php echo $arr['salary']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="joining_date" value="<?php echo $arr['joining_date']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><button type="submit" onclick="typeWriter()" class="submitbtn" name="update">Update</button></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><button type="submit" onclick="typeWriter()" class="submitbtn" name="delete">Delete</button></td>
              </form>
            </tr>
<?php
                $arr=mysqli_fetch_array($run);
              }
              $count = @mysqli_num_rows($run);
?>
            <p style="font-size: 18px; font-family: cursive; color:#004d00;">
              <?php echo $count. " records found!!";?>
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
          //salary greater
          else{
            $sql="SELECT * FROM Receptionist WHERE salary>'$filter_value' AND centre_id='$centre' ORDER BY salary";
          $run=mysqli_query($db, $sql);
            $arr=mysqli_fetch_array($run);
            //check query run
            if($arr){
              while ($arr) {
?>  
            <tr>
              <form action="" method="POST">
                <input type="hidden" name="rid" value="<?php echo $arr['receptionist_id']; ?>">
                <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['receptionist_id']; ?></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><?php echo $arr['centre_id']; ?></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="rname" value="<?php echo $arr['rep_name']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="contact_no" value="<?php echo $arr['Contact_no']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="address" value="<?php echo $arr['address']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="DOB" value="<?php echo $arr['DOB']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="gender" value="<?php echo $arr['Gender']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="salary" value="<?php echo $arr['salary']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><input type="text" name="joining_date" value="<?php echo $arr['joining_date']; ?>"></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><button type="submit" onclick="typeWriter()" class="submitbtn" name="update">Update</button></td>
                <td style=" padding:15px 10px 15px 10px; color: black;"><button type="submit" onclick="typeWriter()" class="submitbtn" name="delete">Delete</button></td>
              </form>
            </tr>
<?php
                $arr=mysqli_fetch_array($run);
              }
              $count = @mysqli_num_rows($run);
?>
            <p style="font-size: 18px; font-family: cursive; color:#004d00;">
              <?php echo $count. " records found!!";?>
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
