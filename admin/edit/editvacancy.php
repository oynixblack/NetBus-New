<?php      
    include 'connection.php';
    $jobid=$_GET['jid'];
    $sql="select * from `tbljob` where jobid='$jobid'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
      $cname=$row['cid'];
      $sname=$row['subid'];
      $req_emp=$row['req_num_emp'];
      $salary=$row['salary'];
      $duration=$row['duration'];
      $workexp=$row['workexp'];
      $qualifi=$row['qualifi'];
      $location=$row['location'];
      $jobdis=$row['jobdiscription'];
      
      $date=$row['dateofpost'];
        
        
    
   ?>



<!doctype html>
 <html lang="en" class="no-focus"> 
    <head>
 <title>Admin Panel</title>
<link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">

</head>
    <body>
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">
     

   

          
            <main id="main-container">
            
                <div class="content">
                
                  
                    <h2 class="content-heading">UPDATE CATEGORY</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Bootstrap Register -->
                            <div class="block block-themed">
                                <div class="block-header bg-gd-emerald">
                                    <h3 class="block-title">Update Category</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>


<form action="edtaction.php" method="POST">
                                     <?php
                      $sel=mysqli_query($con,"select * from category where cstatus=1"); 
                      $sel1=mysqli_query($con,"select * from category"); 
                      ?>
                                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <div class="form-check" style="margin-left: 0px;">
                        <label for="exampleInputName1">Category Name</label>

                        <select class="form-control"name="cat" id="cat" required onchange="change_country();">
                            
                              <?php
                              while($r=mysqli_fetch_array($sel))
                              {
                                ?>
                          <option value="<?php echo $r['cid']; ?>"><?php echo $r['cname']; ?></option>
                         <?php  } ?>
                        </select>
                      </div>

                  </div>
                                        
                          
                                      
                        <div class="form-check" style="margin-left: 0px;">
                        <label for="exampleInputName1">Sub category name</label>
                
                                            <select id="spec" class="form-control custom-select" name="spec" required>
                                                <option value="">Open this select menu</option>
                                            </select>
                      </div>



                    <script>
                                            function change_country() {
                                                var country = $("#cat").val();

                                                $.ajax({
                                                    type: "POST",
                                                    url: "spec.php",
                                                    data: "country=" + country,
                                                    cache: false,
                                                    success: function(response) {
                                                        //alert(response);return false;
                                                        $("#spec").html(response);
                                                    }
                                                });

                                            }
                                        </script>



                                            <div class="form-group row">
                                            <label class="col-12" for="register1-password">req_num_emp</label>
                                            <div class="col-12">
                                                 <input type="text" class="form-control" name="req_emp" id="req_emp"  onfocusout="f1()" value="<?php echo $row['req_num_emp'];?>"required onchange="Validate8();">
                                            </div>

                                            <span id="msg8" style="color:red;"></span>
                       <script>    
function Validate8() 
{
    var val = document.getElementById('req_emp').value;

    if (!val.match(/[0-9]/)) 
    {
        document.getElementById('msg8').innerHTML=" Only Numbers are allowed";
                document.getElementById('req_emp').value = "";
        return false;
    }
document.getElementById('msg8').innerHTML=" ";
    return true;
}
</script>
                                        </div>



                                            <div class="form-group row">
                                            <label class="col-12" for="register1-password">Salary</label>
                                            <div class="col-12">
                                                 <input type="text" class="form-control" name="salary" id="Salary"  onfocusout="f1()" value="<?php echo $row['salary'];?>"required onchange="Validate001();">
                                                 <span id="msg001" style="color:red;"></span>
                                            </div>
                                            
                                            <script>    
function Validate001() 
{
    var val = document.getElementById('salary').value;

    if (!val.match(/[0-9]/)) 
    {
        document.getElementById('msg001').innerHTML=" Only Numbers are allowed";
                document.getElementById('salary').value = "";
        return false;
    }
document.getElementById('msg001').innerHTML=" ";
    return true;
}
</script>
                                        </div>



                                            <div class="form-group row">
                                            <label class="col-12" for="register1-password">Job Duration</label>
                                            <div class="col-12">
                                                 <input type="date" class="form-control" name="duration" id="duration"  onfocusout="f1()" value="<?php echo $row['duration'];?>"required onchange="Validate00();">
                                            
                                        
                                    </div>
                                </div>


                                            <div class="form-group row">
                                            <label class="col-12" for="register1-password">Work Experience :</label>
                                            <div class="col-12">
                                                 <input type="text" class="form-control" name="workexp" id="workexp"  onfocusout="f1()" value="<?php echo $row['workexp'];?>"required onchange="Validate10();">
                                            </div>

</div>

                                            <?php
                      $sell=mysqli_query($con,"select * from tbl_qualification"); 
                       
                      ?>


                                      <div class=" form-group row">
                                            <label class="col-12" for="register1-password">Job Qualifications :</label>
                                            <select class="form-control"name="qualifi" id="qualifi" required ><?php
                              while($r2=mysqli_fetch_array($sell))
                              {
                                ?>
                          <option value="<?php echo $r2['qname']; ?>"><?php echo $r2['qname']; ?></option>
                         <?php  } ?>

                        </select>
                    </div>



                                        
                                             <?php
                      $sell=mysqli_query($con,"select * from tbl_location"); 
                       
                      ?>


                                      <div class=" form-group row">
                                            <label class="col-12" for="register1-password">Job Locations :</label>
                                            <select class="form-control"name="location" id="location" required ><?php
                              while($r2=mysqli_fetch_array($sell))
                              {
                                ?>
                          <option value="<?php echo $r2['lname']; ?>"><?php echo $r2['lname']; ?></option>
                         <?php  } ?>

                        </select>
                    </div>

                                            <div class="form-group row">
                                            <label class="col-12" for="register1-password">Job Discription</label>
                                            <div class="col-12">
                                                 <input type="text" class="form-control" name="jobdis" id="jobdis"  onfocusout="f1()" value="<?php echo $row['jobdiscription'];?>"required onchange="Validate1();">
                                            </div>
                                        </div>

    
                                    
                      
            <input type="hidden" name="joid" class="form-control" value="<?php echo $jobid; ?>">
                                      
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-alt-success" name="s">
                                                    <i class=""></i> Update
                                                </button>
                                                <button type="submit" class="btn btn-alt-success" >
                                                    <a href="../viewvacancy.php"><i class=""></i> Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- END Bootstrap Register -->
                        </div>
                        
                       </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

          
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="assets/js/core/jquery.appear.min.js"></script>
        <script src="assets/js/core/jquery.countTo.min.js"></script>
        <script src="assets/js/core/js.cookie.min.js"></script>
        <script src="assets/js/codebase.js"></script>
    </body>
</html>

    




