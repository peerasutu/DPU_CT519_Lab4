<?php
if(isset($_GET['movie_id'])) {
     $id  = $_GET['movie_id'];
   } else {
     $id = null;
   }

$servername = "10.1.1.22";
$username = "peer";
$password = "abCd@1234";
$dbname = "CT519_Movie";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if($id>0) {
 $sql = "SELECT * FROM Movie_Name Left Join Movie_Type on Movie_Type.Type=Movie_Name.Type where id=".$id;
} else {
 $sql = "SELECT * FROM Movie_Name Left Join Movie_Type on Movie_Type.Type=Movie_Name.Type";
}
 $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo'<!DOCTYPE html><html lang="en-US"><head><title>CT519 Lab2</title></head><body>';
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo 'Title: '.$row['Title'].'<br>';
    echo 'Director: '.$row['Director'].'<br>';
    echo 'Type: '.$row['Detail'].'<br>';
    echo 'Tailer: <a href="'.$row['Tailer'].'"
    target="_bank">'.$row['Tailer'].'</a><br><br>';
  }

  echo '</body></html>';
} else {
  echo "0 results";
}

//Free result set
mysqli_free_result($result);
mysqli_close($conn);
?>
