<?php
    include 'header.php';
    

?>

<div>
<?php
    if (isset($_POST['submit_search'])){
        $search = mysqli_real_escape_String($conn, $_POST['search']);
        $sql = "SELECT * FROM audio WHERE Title LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
        
        
        if ($queryResult >0 ){
            while ($row = mysqli_fetch_assoc($result)){
                $count = 0;
                $count++;
                echo $count;
                echo "<img src='cover/".$row['picture']."' width='50' height='50'  >";
                echo '<a href="play.php?id='.$row['id'].'" >'.$row['Title'].' </a>';
                echo '<br/>';
              }
        }else{
            echo"No data existed";
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