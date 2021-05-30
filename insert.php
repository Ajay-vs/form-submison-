<?php
$firstname=$lastname=$gender=$age=$email=$mob_number=$date_of_birth=$qualification=$password="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $mob_number=$_POST['mob_number']?? "";
    $date_of_birth=$_POST['date_of_birth']?? "";
    $qualification=$_POST['qualification']?? "";
    $password=$_POST['Password']?? "";

    $conn = mysqli_connect("localhost", "root", "", "register");
    if($conn->connect_error)
    {
        die("connection failed");
    }
    else
    {
        $sql="INSERT INTO reg  VALUES('$firstname','$lastname','$gender',$age,'$email',$mob_number,'$date_of_birth','$qualification','$password')";
        if(mysqli_query($conn, $sql))
        {
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
      
            echo nl2br("\n$firstname\n $lastname\n "
                . "$gender\n $email");
        }
         else
        {
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
              
    }
           
    mysqli_close($conn);
}
?>
