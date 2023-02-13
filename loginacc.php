             <?php
                            include 'connection.php';
                            session_start();


                           
                                $myuser = $_POST['username'];
                                $mypass = $_POST['password'];


                                    $sql = "SELECT * FROM login WHERE username = '$myuser' and password = '$mypass' and type1='admin' and status='1'";
                                    $result = mysqli_query($conn, $sql);

                                    $COUNT = mysqli_num_rows($result);
                                    if ($COUNT > 0) {
                                         $id = mysqli_query($conn, $sql);
                                        $row=mysqli_fetch_assoc($id);
                                        // echo $row['loginid'];
                                        $_SESSION['id']=$row['loginid'];
                                         //$_SESSION['logged_in'] = true;
                                        header("location:admin.php");
                                    }
                                    $sqll = "SELECT * FROM login WHERE username = '$myuser' and password = '$mypass' and type1='user' and status='1' AND verified='1'";
                                    $result1 = mysqli_query($conn, $sqll);

                                    $COUNT1 = mysqli_num_rows($result1);
                                    if ($COUNT1 > 0) {
                                         $id = mysqli_query($conn, $sqll);
                                        $row=mysqli_fetch_assoc($id);
                                         //echo $row['loginid'];
                                        $_SESSION['id']=$row['loginid'];
                                         $_SESSION['logged_in'] = true;
                                       header("location:user/index.php");

                                    }
                            

   $q = "SELECT * FROM login WHERE username = '$myuser' and password = '$mypass' and type1='owner' and status='1'";
                                    $result2 = mysqli_query($conn, $q);

                                    $COUNT2 = mysqli_num_rows($result2);
                                    if ($COUNT2 > 0) {
                                         $id = mysqli_query($conn, $q);
                                        $row=mysqli_fetch_assoc($id);
                                         //echo $row['loginid'];
                                        $_SESSION['id']=$row['loginid'];
                                       //  $_SESSION['loggid_in'] = true;
                                       header("location:owner/index.php");

                                    }


                                    
                                        else {

                                        echo "<script> alert('incorrect password or email'); window.location.href='login.php';</script>";
                                        }

                            
                            ?>
