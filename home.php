

<?php
include 'header.php';
include 'config.php';
?>

<div>
<?php
$count =1;

$query = "SELECT * FROM audio";
$data = mysqli_query($conn,$query);

while($row= mysqli_fetch_array($data))
{
    echo $count++;
    
    echo "<img src='cover/".$row['picture']."' width='50' height='50'  >";
    echo '<a href="play.php?id='.$row['id'].'" >'.$row['Title'].' </a>';
    echo '<br/>';
    //"<img src='pict=cover/".$row['picture']."' width='50' height='50'  >";  
    //echo $row['id'];
    //$id = $row['id'];
    //echo '<a href="play.php?music=upload/'.$row['Title'].'&cover=cover/'.$row['picture'].'&name='.$row['Title'].'" >'.$row['Title'].' </a>';
    //echo '<a href="play.php?name='.$conn.'">'.$row['Title'].' </a>';
    //echo '<a href="play.php?name=upload/'.$row['Title'].'" >'.$row['Title'].' </a>';
    
    
}
mysqli_close($conn)




?>
</div>

<style>
div {
  padding-top: 10px;
  padding-right: 30px;
  padding-bottom: 50px;
  padding-left: 80px;
}

</style>
