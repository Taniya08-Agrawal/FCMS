
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
    <title>Adding Membership</title>
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
  <?php
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', 'root');
      define('DB_PASSWORD', '');
      define('DB_DATABASE', 'fitness_centre_management_system');
      $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
      if($_SERVER["REQUEST_METHOD"] == "POST") {
         if(isset($_POST['insert'])==true){
          $membership_id =  mysqli_real_escape_string($db,$_POST['membership_id']);         
          $membership_name =  mysqli_real_escape_string($db,$_POST['membership_name']);
          $duration_in_month = mysqli_real_escape_string($db,$_POST['duration_in_month']);
          $amount = mysqli_real_escape_string($db,$_POST['amount']);

          $sql="INSERT INTO membership(membership_id,membership_name,duration_in_month,amount) values('$membership_id','$membership_name','$duration_in_month','$amount')";
          $run=mysqli_query($db, $sql);       
          if($run){
?>
            <p style="font-size: 18px; font-family: cursive; color:#004d00;">
              <?php echo'Registration  done'; ?>
            </p>
<?php
            }
            else{
?>
              <p style="font-size: 18px; font-family: cursive; color:#004d00;">
              <?php echo'Registration is not done';  ?> 
              </p>  
<?php      
            }
          }
      }
?>
  
   <form action="" method='POST'>
      <h1 align="center" style="font-size:35px; font-family: cursive; color:rgb(173, 3, 3);">Membership Details</h1>
        <p>Please fill in this form to create a new membership.</p>
        <hr>
        <label for="membership_id">
          <b style="font-size: 20px; font-family: cursive; color:#004d00;">Membership id</b>
          <input type="number" placeholder="Enter membership id" name="membership_id" required>
        </label>
        <label for="membership_name">
          <b style="font-size: 20px; font-family: cursive; color:#004d00;">Membership name</b>
          <input type="text" placeholder="Enter membership name" name="membership_name" required>
        </label>
        <label for="duration_in_month">
          <b style="font-size: 20px; font-family: cursive; color:#004d00;">Duration in month</b>
          <input type="number" placeholder="Enter duration in terms of month" name="duration_in_month" required>
        </label>
        <label for="amount">
          <b style="font-size: 20px; font-family: cursive; color:#004d00;">Amount</b>
          <input type="number" placeholder="Enter amount" name="amount" required>
        </label>
        <div class="submit">
          <button type="submit" onclick="typeWriter()" class="submitbtn" name="insert">Add Membership</button>
          <p id="demo"></p>
        </div>
    </form>
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
