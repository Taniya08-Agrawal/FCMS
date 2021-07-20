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
      body
      {
        background-color: #ccccff;
      }
      .button {
        position: relative;
        background-color: #aa1748;
        border: none;
        font-size: 28px;
        color: #FFFFFF;
        padding: 40px;
        width: 300px;
        height: 138px;
        text-align: center;
        transition-duration: 0.4s;
        text-decoration: none;
        overflow: hidden;
        cursor: pointer;
      }
      
      .button:after {
        content: "";
        background: #f1f1f1;
        display: block;
        position: absolute;
        padding-top: 300%;
        padding-left: 350%;
        margin-left: -20px !important;
        margin-top: -120%;
        opacity: 0;
        transition: all 0.8s
      }
      
      .button:active:after {
        padding: 0;
        margin: 0;
        opacity: 1;
        transition: 0s
      }
      .button1 {
        position: relative;
        background-color: hsl(41, 85%, 52%);
        border: none;
        font-size: 28px;
        color: #FFFFFF;
        padding: 40px;
        width: 300px;
        height: 138px;
        text-align: center;
        transition-duration: 0.4s;
        text-decoration: none;
        overflow: hidden;
        cursor: pointer;
        float:left;
        
      }
      
      .button1:after {
        content: "";
        background: #f1f1f1;
        display: block;
        position: absolute;
        padding-top: 300%;
        padding-left: 350%;
        margin-left: -20px !important;
        margin-top: -120%;
        opacity: 0;
        transition: all 0.8s
      }
      
      .button1:active:after {
        padding: 0;
        margin: 0;
        opacity: 1;
        transition: 0s
      }
      .button2 {
        position: relative;
        background-color: hsl(106, 63%, 69%);
        border: none;
        font-size: 28px;
        color: #FFFFFF;
        padding: 40px;
        width: 300px;
        height: 138px;
        text-align: center;
        transition-duration: 0.4s;
        text-decoration: none;
        overflow: hidden;
        cursor: pointer;
        float:left;
        
      }
      
      .button2:after {
        content: "";
        background: #f1f1f1;
        display: block;
        position: absolute;
        padding-top: 300%;
        padding-left: 350%;
        margin-left: -20px !important;
        margin-top: -120%;
        opacity: 0;
        transition: all 0.8s
      }
      
      .button2:active:after {
        padding: 0;
        margin: 0;
        opacity: 1;
        transition: 0s
      }
      .button3 {
        position: relative;
        background-color: hsl(17, 95%, 30%);
        border: none;
        font-size: 28px;
        color: #FFFFFF;
        padding: 40px;
        width: 300px;
        height: 138px;
        text-align: center;
        transition-duration: 0.4s;
        text-decoration: none;
        overflow: hidden;
        cursor: pointer;
        float:left;
        
      }
      
      .button3:after {
        content: "";
        background: #f1f1f1;
        display: block;
        position: absolute;
        padding-top: 300%;
        padding-left: 350%;
        margin-left: -20px !important;
        margin-top: -120%;
        opacity: 0;
        transition: all 0.8s
      }
      
      .button3:active:after {
        padding: 0;
        margin: 0;
        opacity: 1;
        transition: 0s
      }
      .button4 {
        position: relative;
        background-color: hsl(180, 46%, 59%);
        border: none;
        font-size: 28px;
        color: #FFFFFF;
        padding: 40px;
        width: 300px;
        height: 138px;
        text-align: center;
        transition-duration: 0.4s;
        text-decoration: none;
        overflow: hidden;
        cursor: pointer;
        float:left;
        
      }
      
      .button4:after {
        content: "";
        background: #f1f1f1;
        display: block;
        position: absolute;
        padding-top: 300%;
        padding-left: 350%;
        margin-left: -20px !important;
        margin-top: -120%;
        opacity: 0;
        transition: all 0.8s
      }
      
      .button4:active:after {
        padding: 0;
        margin: 0;
        opacity: 1;
        transition: 0s
      }
      .button5 {
        position: relative;
        background-color: hsl(355, 85%, 62%);
        border: none;
        font-size: 28px;
        color: #FFFFFF;
        padding: 40px;
        width: 300px;
        height: 138px;
        text-align: center;
        transition-duration: 0.4s;
        text-decoration: none;
        overflow: hidden;
        cursor: pointer;
        float:left;
        
      }
      
      .button5:after {
        content: "";
        background: #f1f1f1;
        display: block;
        position: absolute;
        padding-top: 300%;
        padding-left: 350%;
        margin-left: -20px !important;
        margin-top: -120%;
        opacity: 0;
        transition: all 0.8s
      }
      
      .button5:active:after {
        padding: 0;
        margin: 0;
        opacity: 1;
        transition: 0s
      }
      .button6 {
        position: relative;
        background-color: hsl(0, 93%, 45%);
        border: none;
        font-size: 28px;
        color: #FFFFFF;
        padding: 40px;
        width: 300px;
        height: 138px;
        text-align: center;
        transition-duration: 0.4s;
        text-decoration: none;
        overflow: hidden;
        cursor: pointer;
        float:left;
        
      }
      
      .button6:after {
        content: "";
        background: #f1f1f1;
        display: block;
        position: absolute;
        padding-top: 300%;
        padding-left: 350%;
        margin-left: -20px !important;
        margin-top: -120%;
        opacity: 0;
        transition: all 0.8s
      }
      
      .button6:active:after {
        padding: 0;
        margin: 0;
        opacity: 1;
        transition: 0s
      }
      .button7 {
        position: relative;
        background-color: hsl(236, 58%, 44%);
        border: none;
        font-size: 28px;
        color: #FFFFFF;
        padding: 40px;
        width: 300px;
        height: 138px;
        text-align: center;
        transition-duration: 0.4s;
        text-decoration: none;
        overflow: hidden;
        cursor: pointer;
        float:left;
        
      }
      
      .button7:after {
        content: "";
        background: #f1f1f1;
        display: block;
        position: absolute;
        padding-top: 300%;
        padding-left: 350%;
        margin-left: -20px !important;
        margin-top: -120%;
        opacity: 0;
        transition: all 0.8s
      }
      
      .button7:active:after {
        padding: 0;
        margin: 0;
        opacity: 1;
        transition: 0s
      }
      .button8 {
        position: relative;
        background-color: hsl(125, 67%, 42%);
        border: none;
        font-size: 28px;
        color: #FFFFFF;
        padding: 40px;
        width: 300px;
        height: 138px;
        text-align: center;
        transition-duration: 0.4s;
        text-decoration: none;
        overflow: hidden;
        cursor: pointer;
        float:left;
        
      }
      
      .button8:after {
        content: "";
        background: #f1f1f1;
        display: block;
        position: absolute;
        padding-top: 300%;
        padding-left: 350%;
        margin-left: -20px !important;
        margin-top: -120%;
        opacity: 0;
        transition: all 0.8s
      }
      
      .button8:active:after {
        padding: 0;
        margin: 0;
        opacity: 1;
        transition: 0s
      }
      .column {
  float: left;
  width: 33.33%;
  padding-top: 40px;
  
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.column2 {
  float: left;
  width: 33.33%;
  padding-top: 70px;
 
}

/* Clear floats after the columns */
.row2:after {
  content: "";
  display: table;
  clear: both;
}
.column3 {
  float: left;
  width: 33.33%;
  padding-top: 70px;
 
}

/* Clear floats after the columns */
.row4:after {
  content: "";
  display: table;
  clear: both;
}
.column4 {
  float: left;
  width: 33.33%;
  padding-top: 40px;
 
}

/* Clear floats after the columns */
.row3:after {
  content: "";
  display: table;
  clear: both;
}
    </style>
    <title>CSS GRID DASHBOARD</title>
  </head>
  <body id="body" >
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
        <div class='container3' >
          <h1 align="center" style="font-size:35px; font-family: cursive; color:rgb(192, 0, 0);">Add Details for....</h1>
          <div class="row">
            <div class="column" >
              <form action="add_centre.php" method="POST">
                <button style="font-family: cursive; align:center;" class="button" type="submit">Centre</button>
              </form>
             </div>
            <div class="column"> <form action="add_membership.php" method="POST">
              <button  class="button1" style="font-family: cursive;" type="submit">Membership</button>
            </form></div>
            <div class="column"><form form action="add_customer.php" method="POST">
              <button  class="button2">Customer</button>
            </form></div>
          </div>
          <div class="row2">
            <div class="column2"><form action="add_batches.php" method="POST">
              <button  class="button3" style="font-family: cursive;" type="submit">Batches</button>
            </form></div>
            <div class="column2"><form action="add_equipment.php" method="POST">
              <button  class="button4" style="font-family: cursive;" type="submit">Equipments</button>
            </form></div>
            <div class="column2"><form form action="add_manager.php" method="POST">
              <button  class="button5" style="font-family: cursive">Manager</button>
            </form></div>
          </div>
          <div class="row3">
            <div class="column3"><form action="add_receptionist.php" method="POST">
              <button  class="button6" style="font-family: cursive;" type="submit">Receptionist</button>
            </form></div>
            <div class="column3"> <form form action="add_trainer.php" method="POST">
              <button  class="button7"style="font-family: cursive" >Trainer</button>
            </form></div>
            <div class="column3"><form form action="add_deitcian.php" method="POST">
              <button  class="button8" style="font-family: cursive">Dietician</button>
            </form></div>
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
          <div class="sidebar__link">
            <i class="fa fa-chart-line"></i>
            <a href="Admin.php">Dashboard</a>
          </div>
         
  
          <div class="sidebar__link active_menu_link">
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
