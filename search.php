<?php
include 'config.php';
include 'header.php';

?>
<!DOCTYPE html>

<form action="sub_search.php" method="POST" >

<input type="text" name="search" placeholder="Search Music">

<input type="submit" name="submit_search" value="Search">
</form>

<div class="music">
  <?php
  $sql = "SELECT * FROM audio";
  $result = mysqli_query($conn,$sql);
  $queryResult = mysqli_num_rows($result);

  if ($queryResult > 0){
    while ($row = mysqli_fetch_assoc($result)){
      echo "<img src='cover/".$row['picture']."' width='50' height='50'  >";
      echo '<a href="play.php?id='.$row['id'].'" >'.$row['Title'].' </a>';
      echo '<br/>';
    }
  }
  ?>
</div>

<style>
div {
  padding-top: 50px;
  padding-right: 30px;
  padding-bottom: 50px;
  padding-left: 80px;
}

</style>
