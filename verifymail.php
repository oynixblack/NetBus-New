<?php
    include 'connection.php';


if(isset($_GET['email']) && isset($_GET['code']))
{
    $e=$_GET['email'];
    $c=$_GET['code'];
    $query="SELECT * from login where username='$e' AND code='$c'";
    $res=mysqli_query($conn, $query);
    echo mysqli_num_rows($res);
    if($res)
    {
        if(mysqli_num_rows($res)==1)
        {
            
            $res_fetch=mysqli_fetch_assoc($res);
            if($res_fetch['verified']==0)
            {
                $update="UPDATE `login` SET verified='1'  where username='$res_fetch[username]'";
                if(mysqli_query($conn, $update))
                {
                    echo "<script> alert('Email verfication successful'); 
                    window.location.href=' login.php';
                    </script>";
                }
            }
            else{
                echo "<script> alert('Email already registered'); 
              window.location.href=' login.php';
            </script>";
            }
        }
    }
    else
    {
        echo "<script> alert('Cannot'); 
              window.location.href=' login.php';
            </script>";

    }
}
?>