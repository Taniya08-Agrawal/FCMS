 
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
    <style type="text/css">
      .container3 {
  border-radius: 5px;
  background-color:  #c2f0c2;
  padding:  20px 220px 220px 220px;
}
.submitbtn{
  
  align-items: center;
  padding: 15px 25px;
  font-size: 24px;
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
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background-color:  #f2f2f2;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #f2f2f2;
  outline: none;
}
input[type=tel], input[type=tel] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background-color:  #f2f2f2;
}

input[type=tel]:focus, input[type=tel]:focus {
  background-color: #f2f2f2;
  outline: none;
}
input[type=number], input[type=number] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background-color:  #f2f2f2;
}

input[type=number]:focus, input[type=number]:focus {
  background-color: #f2f2f2;
  outline: none;
}
input[type=time], input[type=time] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background-color:  #f2f2f2;
}

input[type=time]:focus, input[type=time]:focus {
  background-color: #f2f2f2;
  outline: none;
}
input[type=date], input[type=date] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background-color:  #f2f2f2;
}

input[type=date]:focus, input[type=date]:focus {
  background-color: #f2f2f2;
  outline: none;
}
input[type=email], input[type=email] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background-color:  #f2f2f2;
}

input[type=email]:focus, input[type=email]:focus {
  background-color: #f2f2f2;
  outline: none;
}
.search_categories{
  font-size: 13px;
  padding: 10px 8px 10px 14px;
  background: #fff;
  border: 1px solid #f2f2f2;
  border-radius: 6px;
  position: relative;
}

input[type=text]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background-color: #f2f2f2;
}

input[type=text]:focus {
  background-color: #f2f2f2;
  outline: none;
}


  </style>
    <title>Enrolling Customer</title>
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
?>
<?php
      if($_SERVER["REQUEST_METHOD"] == "POST") {
          if(isset($_POST['insert'])==true){
          $centre_id = mysqli_real_escape_string($db,$_POST['centre_id']);
          $customer_name = mysqli_real_escape_string($db,$_POST['name']);
          $address = mysqli_real_escape_string($db,$_POST['address']);
          $contact_number = mysqli_real_escape_string($db,$_POST['contact_no']);
          $DOB = mysqli_real_escape_string($db,$_POST['DOB']);
          $sex = mysqli_real_escape_string($db,$_POST['gender']);
          $membership_id = mysqli_real_escape_string($db,$_POST['membership_id']);
          $trainer_id = mysqli_real_escape_string($db,$_POST['trainer_id']); 
          $deitcian_id = mysqli_real_escape_string($db,$_POST['deitcian_id']);
          $batch_name = mysqli_real_escape_string($db,$_POST['batch_name']);
          $amount_paid = mysqli_real_escape_string($db,$_POST['amount_paid']);
          $sql= "INSERT INTO customer(centre_id,customer_name,address,contact_number,DOB,sex,membership_id,trainer_id,deitcian_id,batch_name,amount_paid)
            VALUES('$centre_id','$customer_name','$address','$contact_number','$DOB','$sex','$membership_id','$trainer_id','$deitcian_id','$batch_name','$amount_paid')";
            $run=mysqli_query($db,$sql);
            if($run){
?>
            <p style="font-size: 18px; font-family: cursive; color:#004d00;">
              <?php echo('registration  done' ); ?>
            </p>
<?php
            }
            else{
?>
              <p style="font-size: 18px; font-family: cursive; color:#004d00;">
              <?php echo'registration is not done';  ?> 
              </p>  
<?php      
            }
          }
      }
?>
    <form action="" method="POST">
    <label for="centre_id">
      <b style="font-size: 20px; font-family: cursive; color:#004d00;">Select the centre:</b>
    </label>
    <select name="centre_id">
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
<button type="submit" onclick="typeWriter()" class="submitbtn"  name="add">Add details</button>
</form>  
<?php
  if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['add'])){
      $centre_id=$_POST['centre_id'];
?>
    <form action="" method='POST'>
      <input type="hidden" name="centre_id" value="<?php echo $centre_id;  ?>">
              <h1 align="center" style="font-size:35px; font-family: cursive; color:rgb(173, 3, 3);">Customer Details</h1>
                <p>Please fill in this form to create a customer account.</p>
                <hr>
                <label for="name">
                  <b style="font-size: 20px; font-family: cursive; color:#004d00;">Name</b>
                  <input type="text" placeholder="Enter your name" name="name" required title="Name should only contain alphabets" required>
                </label>
                <label for="gender">
                  <b style="font-size: 20px; font-family: cursive; color:#004d00;">Gender</b>
                </label>
                <select name="gender">
                   <option value="F">Female</option>
                   <option value="M">Male</option>
                   <option value="O">Other</option>
                </select>
                <br>
                <br>
                 <label for="DOB">
                   <b style="font-size: 20px; font-family: cursive; color:#004d00;">DOB</b>
                   <input type="date" placeholder="Enter DOB" name="DOB" required>
                 </label>
                 <label for="address">
                   <b style="font-size: 20px; font-family: cursive; color:#004d00;">Address</b>
                   <input type="text" placeholder="Enter address" name="address" required>
                 </label>
                <label for="contact_no">
                  <b style="font-size: 20px; font-family: cursive; color:#004d00;">Mobile Number</b>
                  <input type="tel" placeholder="Enter mobile number" name="contact_no" pattern="[0-9]{10}" required title="Mobile no. should be of 10 digits" required>
                </label>
                <label for="membership_id">
                  <b style="font-size: 20px; font-family: cursive; color:#004d00;">Membership Id</b>
                </label>
                <select name="membership_id">
<?php
          $sql = "SELECT * FROM membership";
            $run=mysqli_query($db, $sql);
            $arr=mysqli_fetch_array($run);
            if($arr){
              while($arr){
?>
              <option value="<?php echo $arr['membership_id']; ?>"> <?php echo $arr['membership_id'] . "-" . $arr['membership_name']; ?> </option>
<?php
            $arr=mysqli_fetch_array($run);
              } 
            }
?>
                </select>
                <br>
                <br>
                 <label for="trainer_id">
                   <b style="font-size: 20px; font-family: cursive; color:#004d00;">Trainer</b>
                 </label>
                 <select name="trainer_id">
<?php
          $sqlt = "SELECT * FROM trainer WHERE centre_id='$centre_id'";
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
        <br>
        <br>
                 <label for="deitcian_id">
                   <b style="font-size: 20px; font-family: cursive; color:#004d00;">Deitcian</b>
                 </label>
                 <select name="deitcian_id">
                
<?php
          $sqld = "SELECT * FROM deitcian WHERE centre_id='$centre_id'";
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
        <br>
        <br>
                 <label for="batch_name">
                   <b style="font-size: 20px; font-family: cursive; color:#004d00;">Batch Name</b>
                 </label>
                  <select name="batch_name">
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
            <br>
            <br>
                 <label for="amount_paid">
                   <b style="font-size: 20px; font-family: cursive; color:#004d00;">Amount paid</b>
                   <input type="number" placeholder="Enter Amount paid by customer" name="amount_paid" required>
                 </label>
                 <div class="submit">
                 <button type="submit" onclick="typeWriter()" class="submitbtn"  name="insert">Add Customer</button>
                 </div>
            </form>
<?php
    }
  }
?> 
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

