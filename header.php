<?php 
session_start();
include 'config.php'
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<body>


    <nav>
        <div Class = "header">
        <h2 class="logo">Music Streaming</h1>
            
                <div class="header-right">
                <a href = "home.php">Home</a></li>
                <?php
                if(isset($_SESSION["username"])){
                    echo '<a href = "profile.php">'.$_SESSION["username"].'</a>';
                    echo '<a href = "logout.php">Logout</a>';
                    echo '<a href = "upload.php">Upload</a>';
                }
                else{
                    echo '<a href = "signup.php">Sign Up</a>';
                    echo '<a href = "signin.php">Login</a>';
                    echo '<a href = "signin.php" onclick="">Upload</a>';
                    
                }
                ?>
                
                <a href = "search.php">Search</a>
            
        </div>
        </div>
    </nav>

</body>
</html>



<style> 

.header {
  overflow: hidden;
  background-image: url('images/header_pict.png');
  background-size: 100% 100%;
  width: auto;
  height: auto;
  padding: 20px 10px;
}

/* Style the header links */
.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 6px;
  text-decoration: none;
  font-size: 15px;
  line-height: 12px;
  border-radius: 2px;
}

/* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
.header h2.logo {
  font-size: 20px;
  font-weight: bold;
}

/* Change the background color on mouse-over */
.header a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the active/current link*/
.header a.active {
  background-color: dodgerblue;
  color: white;
}

/* Float the link section to the right */
.header-right {
  float: right;
}

/* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
}

</style>