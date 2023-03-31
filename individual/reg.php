<?php
if (!isset($file_access)) die("Direct File Access Denied");
?>
<?php



?>

<div class="content">



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Book Bus Tickets From The Schedules Listed  </b></h3>
                </div>
                <div class="card-body">

                    <table id="example1" style="align-items: stretch;"
                        class="table table-hover w-100 table-bordered table-striped<?php //
                                                                                                                                    ?>">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Bus</th>
                                <th>Route</th>
                                <th>Status</th>
                                <th>Date/Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $row = querySchedule('future');
                            if ($row->num_rows < 1) echo "<div class='alert alert-danger' role='alert'>
                            Sorry, There are no schedules at the moment! Please visit after some time.
                          </div>";
                            $sn = 0;
                            while ($fetch = $row->fetch_assoc()) {
                                //Check if the current date is same with Database scheduled date
                                $db_date = $fetch['date'];
                                if ($db_date == date('d-m-Y')) {
                                    //Oh yes, so what should happen?
                                    //Check for the time. If there is still about an hour left, proceed else, skip this data
                                    $db_time = $fetch['time'];
                                    $current_time = date('H:i');
                                    if ($current_time >= $db_time) {
                                        continue;
                                    }
                                }
                                $id = $fetch['id']; ?><tr>
                                <td><?php echo ++$sn; ?></td>
                                <td><?php echo getTrainName($fetch['bus_id']);
                                        ?></td>
                                <td><?php echo $fullname =  getRoutePath($fetch['route_id']);
                                        ?></td>
                                <td><?php $array = getTotalBookByType($id);
                                        echo ($max_first = ($array['first'] - $array['first_booked'])), " Seat(s) Available for Window Seat" . "<hr/>" . ($max_second = ($array['second'] - $array['second_booked'])) . " Seat(s) Available for Second Seat";
                                        ?></td>
                                <td><?php echo $fetch['date'], " / ", formatTime($fetch['time']); ?></td>

                                <td>
                                    <button id="bb" type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#book<?php echo $id ?>">
                                        Book
                                    </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="book<?php echo $id ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Book For <?php echo $fullname;


                                                                                    ?> </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                       
                                                    <html>
                                            <head>
<style>
.seatcontain {
  box-sizing: border-box;
  margin: 20px auto;
  width: 100%;
  max-width: 350px;
  border-radius: 5px;
  background-color: #fff;
  padding: 20px 10px;
  box-shadow: 0px 0px 17px -4px #000;
}
.screen-side {
  text-align: center;
}
.screen-side .screen {
  height: 25px;
  margin: 0 20px;
  border-radius: 50%;
  box-shadow: 0px -3px 0px 1px #ccc;
  color: #ccc;
}
.screen-side .select-text {
  color: #969696;
}
.exit {
  position: relative;
  height: 50px;
}
.exit:before {
  content: "EXIT";
  font-size: 14px;
  line-height: 18px;
  padding: 0px 5px;
  font-family: "Arial Narrow", Arial, sans-serif;
  display: block;
  position: absolute;
  background: #81c784;
  color: white;
  top: 50%;
  transform: translate(0, -50%);
}
.exit:before {
  left: 0;
}
ol {
  list-style: none;
  /* padding: -1; */
  margin: 0;
  width: 100%;
}
.seats {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  justify-content: flex-start;
}
.seat {
  display: flex;
  flex: 0 0 14.28571%;
  padding: 5px;
  position: relative;
}
.seat:nth-child(3) {
  margin-right: 14.28571%;
}
.seat input[type="checkbox"] {
  position: absolute;
  opacity: 0;
}
.seat input[type="checkbox"]:checked + label {
  background: #bada55;
  -webkit-animation-name: rubberBand;
  animation-name: rubberBand;
  animation-duration: 300ms;
  animation-fill-mode: both;
}
.seat input[type="checkbox"]:disabled + label {
  background: #ddd;
  text-indent: -9999px;
  overflow: hidden;
}
.seat input[type="checkbox"]:disabled + label:after {
  content: "X";
  text-indent: 0;
  position: absolute;
  top: 4px;
  left: 50%;
  transform: translate(-50%, 0%);
}
.seat input[type="checkbox"]:disabled + label:hover {
  box-shadow: none;
  cursor: not-allowed;
}
.seat label {
  display: block;
  position: relative;
  width: 100%;
  text-align: center;
  font-size: 14px;
  font-weight: bold;
  line-height: 1.5rem;
  padding: 4px 0;
  color: #fff;
  background: #26a69a;
  border-radius: 2px;
  animation-duration: 300ms;
  animation-fill-mode: both;
  transition-duration: 300ms;
}
.seat label:hover {
  cursor: pointer;
  box-shadow: 0px 0 7px 3px #ccc;
}

.rubberBand {
  -webkit-animation-name: rubberBand;
  animation-name: rubberBand;
}

@-webkit-keyframes rubberBand {
  0% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }
  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }
  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }
  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }
  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
@keyframes rubberBand {
  0% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }
  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }
  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }
  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }
  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
</style>
</head>
                                        <div class="modal-body">


                                            <form action="<?php echo $_SERVER['PHP_SELF'] . "?loc=$id" ?>"
                                                method="post">
                                                <input type="hidden" class="form-control" name="id"
                                                    value="<?php echo $id ?>" required id="">
                                                    <div class="seatcontain">
  <div class="screen-side">
    <div class="screen"></div>
    <h3 class="select-text">Please select a seat</h3>
  </div>
  
  <div style="display:flex;justify-content:center;align-item:center;">
     <ol class="cabin">
    <li class="row row--1">
      <ol class="seats" type="A">
        <li class="seat">
          <input value="first"   type="checkbox" id="1A" name="class"/>
          <label for="1A">1</label>
        </li>
        <li class="seat">
          <input value="second"   type="checkbox" id="1B" name="class" />
          <label for="1B">2</label>
        </li>
       
        <li class="seat">
        
        </li>
        <li class="seat">
          
          <input value="second"  type="checkbox" id="1C" name="1A[]" />
          <label for="1C">3</label>
        </li>
        <li class="seat">
          <input value="first"  type="checkbox" id="1D" name="1A[]" />
          <label for="1D">4</label>
        </li>
      </ol>
    </li>
    <li class="row row--2">
      <ol class="seats" type="A">
        <li class="seat">
         
        </li>
        <li class="seat">
         
        </li>
       
        <li class="seat">
         
        </li>
        <li class="seat">
          <input value="second"  type="checkbox" id="2C" name="1A[]" />
          <label for="2C">7</label>
        </li>
        <li class="seat">
          <input  value="first"   type="checkbox" id="2D" name="1A[]" />
          <label for="2D">8</label>
        </li>
      </ol>
    </li>
    <li class="row row--3">
      <ol class="seats" type="A">
        <li class="seat">
          <input  value="first"   type="checkbox" id="3A" name="1A[]" />
          <label for="3A">9</label>
        </li>
        <li class="seat">
          <input value="second"  type="checkbox" id="3B" name="1A[]" />
          <label for="3B">10</label>
        </li>
      
        <li class="seat">
          
        </li>
        <li class="seat">
          <input value="second"  type="checkbox" id="3C" name="1A[]" />
          <label for="3C">11</label>
        </li>
        <li class="seat">
          <input  value="first"   type="checkbox" id="3D" name="1A[]" />
          <label for="3D">12</label>
        </li>
      </ol>
    </li>
    <li class="row row--4">
      <ol class="seats" type="A">
        <li class="seat">
          <input  value="first"   type="checkbox" id="4A" name="1A[]" />
          <label for="4A">13</label>
        </li>
        <li class="seat">
          <input value="second"  type="checkbox" id="4B" name="1A[]" />
          <label for="4B">14</label>
        </li>
       
        <li class="seat">
       
        </li>
        <li class="seat">
          <input value="second"  type="checkbox" id="4C" name="1A[]" />
          <label for="4C">15</label>
        </li>
        <li class="seat">
          <input  value="first"   type="checkbox" id="4D" name="1A[]" />
          <label for="4D">16</label>
        </li>
      </ol>
    </li>
    <li class="row row--5">
      <ol class="seats" type="A">
        <li class="seat">
          <input  value="first"   type="checkbox" id="5A" name="1A[]"/>
          <label for="5A">17</label>
        </li>
        <li class="seat">
          <input value="second" type="checkbox" id="5B" name="1A[]"/>
          <label for="5B">18</label>
        </li>
     
        <li class="seat">
         
        </li>
        <li class="seat">
          <input value="second"  type="checkbox" id="5C"name="1A[]"/>
          <label for="5C">19</label>
        </li>
        <li class="seat">
          <input  value="first"   type="checkbox" id="5D" name="1A[]"/>
          <label for="5D">20</label>
        </li>
      </ol>
    </li>
    <li class="row row--6">
      <ol class="seats" type="A">
        <li class="seat">
          <input  value="first"   type="checkbox" id="6A" name="1A[]"/>
          <label for="6A">21</label>
        </li>
        <li class="seat">
          <input value="second"  type="checkbox" id="6B" name="1A[]"/>
          <label for="6B">22</label>
        </li>
      
        <li class="seat">
         
        </li>
        <li class="seat">
          <input value="second"  type="checkbox" id="6C" name="1A[]"/>
          <label for="6C">23</label>
        </li>
        <li class="seat">
          <input  value="first"   type="checkbox" id="6D" name="1A[]"/>
          <label for="6D">24</label>
        </li>
      </ol>
    </li>
    <li class="row row--7">
      <ol class="seats" type="A">
        <li class="seat">
          <input  value="first"   type="checkbox" id="7A" name="1A[]"/>
          <label for="7A">25</label>
        </li>
        <li class="seat">
          <input value="second"  type="checkbox" id="7B" name="1A[]"/>
          <label for="7B">26</label>
        </li>
        
       
        <li class="seat">
  </div>
        </li>
        <li class="seat">
        <input value="second" type="checkbox" id="7C" name="1A[]"/>
          <label for="7C">27</label>
        </li>
        <li class="seat">
          <input  value="first"   type="checkbox" id="7D" name="1A[]"/>
          <label for="7D">28</label>
        </li>
      </ol>
    </li>
    <li class="row row--8">
      <ol class="seats" type="A">
        <li class="seat">
        <div class="exit exit--front"></div>
 
        </li>
        <li class="seat">
         
        </li>
    
        <li class="seat">
          
        </li>
        <li class="seat">
          <input value="second"  type="checkbox" id="8C" name="1A[]"/>
          <label for="8C">31</label>
        </li>
        <li class="seat">
          <input  value="first"   type="checkbox" id="8D" name="1A[]"/>
          <label for="8D">32</label>
        </li>
      </ol>
    </li>
    <li class="row row--9">
      <ol class="seats" type="A">
        <li class="seat">
          <input  value="first"   type="checkbox" id="9A" name="1A[]"/>
          <label for="9A">33</label>
        </li>
        <li class="seat">
          <input value="second"  type="checkbox" id="9B" name="1A[]"/>
          <label for="9B">34</label>
        </li>
     
        <li class="seat">
          
        </li>
        <li class="seat">
          <input value="second" type="checkbox" id="9C" name="1A[]"/>
          <label for="9C">35</label>
        </li>
        <li class="seat">
          <input  value="first"   type="checkbox" id="9D" name="1A[]"/>
          <label for="9D">36</label>
        </li>
      </ol>
    </li>
    <li class="row row--10">
      <ol class="seats" type="A">
        <li class="seat">
          <input  value="first"   type="checkbox" id="10A" name="1A[]"/>
          <label for="10A">37</label>
        </li>
        <li class="seat">
          <input value="second" type="checkbox" id="10B" name="1A[]"/>
          <label for="10B">38</label>
        </li>
        <li class="seat">
         
        <li class="seat">
          <input value="second"  type="checkbox" id="10C" name="class"/>
          <label for="10C">40</label>
        </li>
        <li class="seat">
          <input  value="first"   type="checkbox" id="10D" name="class"/>
          <label for="10D">41</label>
        </li>
     
      </ol>
    </li>
  </ol>
  </div>
 
  
</div>

                                                <p>Enter Number of Passengers (If you are the only one, leave as it is) :
                                                    <input type="number" min='1' value="0"
                                                        max='<?php echo $max_first >= $max_second ? $max_first : $max_second ?>'
                                                        name="number" class="form-control" id="">
                                                </p>
                                                <!-- <p>
                                                    Seat: <select name="class" required class="form-control" id="">
                                                        <option value="">-- Select Seat --</option>
                                                        <option value="first">Window Seat (₹
                                                            <?php echo ($fetch['first_fee']); ?>)</option>
                                                        <option value="second">Second Seat (₹
                                                            <?php echo ($fetch['second_fee']); ?>)</option>
                                                    </select>
                                                </p> -->
                                                <input type="submit" name="submit" class="btn btn-success"
                                                    value="Proceed">

                                            </form>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                <?php
                            }
                                ?>

                        </tbody>
                        
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>

    </form>

</div>