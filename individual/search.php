<?php

$source = 'train';
$me = "?page=$source";
?>

<div class="content">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                Search</h3>
                            <div class='float-right'>
                                <button type="button" id="sb" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#add">
                                    New Search
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <?php
                            if (isset($_POST['submit'])) {
                                $ticket = $_POST['ticket'];
                                $conn = connect();
                                //Check if train exists
                                $check = $conn->query("SELECT * FROM booked WHERE code = '$ticket' ");
                                if ($check->num_rows != 1) {
                                    alert("Invalid Ticket Number Provided");
                                } else {
                                    $id = $check->fetch_assoc()['id'];
                                    $row = $conn->query("SELECT schedule.id as schedule_id, register.fname as fullname,register.email as email, register.phone as phone, register.loc as loc, payment.amount as amount, payment.ref as ref, payment.date as payment_date, schedule.bus_id as bus_id, booked.code as code, booked.no as no, booked.class as class, booked.seat as seat, schedule.date as date, schedule.time as time FROM booked INNER JOIN schedule on booked.schedule_id = schedule.id INNER JOIN payment ON payment.id = booked.payment_id INNER JOIN register ON register.loginid = booked.user_id WHERE booked.id = '$id'")->fetch_assoc();
                                    echo '<table id="example1" style="align-items: stretch;" class="table table-hover w-100 table-bordered table-striped">';
                                    echo "
        <tr><th>Full Name</th><td>$row[fullname]</td></tr>
        <tr><th>Email</th><td>$row[email]</td></tr>
        <tr><th>Phone</th><td>$row[phone]</td></tr>
        <tr><th>Ticket Code</th><td>$row[code]</td></tr>
        <tr><th>Class</th><td>$row[class]</td></tr>
        <tr><th>Seat</th><td>$row[seat]</td></tr>
        <tr><th>Trip Date/TIme</th><td>" . date("D d, M Y", strtotime($row['date'])) . " / $row[time]</td></tr>
        <tr><th>Amount Paid</th><td>₹ $row[amount]</td></tr>
        <tr><th>Payment Date</th><td>$row[payment_date]</td></tr>
        <tr><th>Route</th><td>" . getRouteFromSchedule($row['schedule_id']) . "</td></tr>
        <tr><th>Bus</th><td>" . getTrainName($row['bus_id']) . "</td></tr>
        </table>";
                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>
</div>
</section>
</div>

<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" align="center">
            <div class="modal-header">
                <h4 class="modal-title">Search With Ticket ID
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <table class="table table-bordered">
                        <tr>
                            <th>Enter Ticket Id Number</th>
                            <td><input type="text" class="form-control" id="tkt" name="ticket" required minlength="3" id=""></td>
                        </tr>
                        <td colspan="2">

                            <input class="btn btn-info" type="submit" value="Search" name='submit'>
                        </td>
                        </tr>
                    </table>
                </form>



            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>