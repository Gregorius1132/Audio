<?php   

include'header.php';
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_media'])){

    $uploadDir = "./upload/";
    $uploadDir1 = "./cover/";

    if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){
        
        $filename = $_FILES['file']['name'];
        $filetype = $_FILES['file']['type'];
        $filesize = $_FILES['file']['size'];
        $path = basename($_FILES['file']['name']);

        
        $picture = $_FILES['picture']['name'];
        $picture = $_FILES['picture']['type'];
        $picture = $_FILES['picture']['size'];
        $path1 = basename($_FILES['picture']['name']);
        

        //$newfile = pathinfo($filename, PATHINFO_EXTENSION);
        if(file_exists($uploadDir . $path)){
            $note = $filename."Music already exist";
        echo "<script type='text/javascript'>alert('$note');</script>";
        }
        
        else{
            move_uploaded_file($_FILES['file']['tmp_name'],$uploadDir . $path );
            move_uploaded_file($_FILES['picture']['tmp_name'],$uploadDir1 . $path1 );
            save_Audio($path1,$path);

        }

        
    }
}

function save_Audio($picture, $filename)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dbaudio";

    $conn = new mysqli($servername,$username,$password,$database);

    if ($conn->connect_error){
        die("Connection failed:" . $conn->connect_error);
    }

    //$message = "Connection successfully";
    //echo "<script type='text/javascript'>alert('$message');</script>";
    //echo "Connection successfully";

    $query = "insert into audio(picture,Title)values('{$picture}','{$filename}')";
    //$query1 = "insert into audio(picture)values('{$picture}')";
    
    mysqli_query($conn,$query);
    //mysqli_query($conn,$query1);
    if(mysqli_affected_rows($conn)>0){
        $note = $filename."saved in database";
        echo "<script type='text/javascript'>alert('$note');</script>";
        //echo"audio file saved in database.";
    }

    mysqli_close($conn);
}


?>

<!DOCTYPE html>

<h3> Upload music </h3>
<form action= "index.php" method="POST" enctype="multipart/form-data">
    <h2> Picture file </h2>
<input type="file" name='picture'/>
<br>
    <h2> Music file </h2>
<input type="file" name='file'/>


<button type="submit" name="save_media"> Save Media </button>


</html> 

<style>
    


</style>