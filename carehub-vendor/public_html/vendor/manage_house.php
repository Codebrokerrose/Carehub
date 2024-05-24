<?php
require_once 'logincheck.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>HOME SERVICES</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
  <link rel="shortcut icon" href="../uploads/cicon.png" />   
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style3.css">  
  <link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Federo" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="../css/style6.css">
  <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
</head>
<body>
  <?php include('includes/header.php'); ?>
  <div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3>ACTIVE Tasks:</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table id="table" class="display" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>HOME ID.</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Task</th>
                    <th><center>Action</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $conn = new mysqli("localhost", "root", "", "carehub");
                  if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }
                  $query = $conn->query("SELECT * FROM `checkout` ORDER BY `id` DESC");
                  while ($fetch = $query->fetch_assoc()) {
                    $id = $fetch['id'];
                    $q = $conn->query("SELECT COUNT(*) as total FROM `home_tasks` WHERE `id` = '$id'");
                    $f = $q->fetch_assoc();
                    $tk = $conn->query("SELECT * FROM `checkout_products` WHERE `checkout_id`='$id'");
                    $task = $tk->fetch_assoc();
                  ?>
                    <tr>
                      <td><?php echo $fetch['id']; ?></td>
                      <td><?php echo $fetch['fullname']; ?></td>
                      <td><?php echo $fetch['address']; ?></td>
                      <td><?php echo $task['product_title']; ?></td>
                      <td>
                        <center>
                          <a href="process.php?id=<?php echo $fetch['id']; ?>&fullname=<?php echo $fetch['fullname']; ?>" class="btn btn-sm btn-info">Process <span class="badge"><?php echo $f['total']; ?></span></a>
                          <a href="process.php?id=<?php echo $fetch['id']; ?>&fullname=<?php echo $fetch['fullname']; ?>" class="btn btn-sm btn-warning" name="update">
    <span class="glyphicon glyphicon-pencil"></span> Update
</a>

                          <?php
                       
if (isset($_GET['id']) && isset($_GET['fullname'])) {
  $home_id = $_GET['id'];
  $fullname = $_GET['fullname'];


  // Fetch the task details
  $taskQuery = $conn->query("SELECT * FROM `checkout_products` WHERE `checkout_id`='$home_id'");
  $task = $taskQuery->fetch_assoc();
  $activity = $task['product_title'];

  // Get the current date and time
  $tdate = date('Y-m-d');
  $dtime = date('H:i:s');

  // Insert data into home_tasks table
  $insertQuery = "INSERT INTO `home_tasks` (`home_id`, `id`, `fullname`, `activity`, `tdate`, `dtime`, `status`)
                  VALUES ('$home_id', '$home_id', '$fullname', '$activity', '$tdate', '$dtime', '1')";
  
  if ($conn->query($insertQuery) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error: " . $insertQuery . "<br>" . $conn->error;
  }

  // Close the connection
  $conn->close();
} 
                          ?>
                        </center>
                      </td>
                    </tr>
                  <?php
                  }
                  $conn->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php require 'script.php'; ?>
  </div>
</body>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/fileinput.js"></script>
<script src="../js/chartData.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    setTimeout(function() {
      $('.succWrap').slideUp("slow");
    }, 3000);
  });
</script>
<script src="../assets/js/util.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../js/main1.js"></script>
</html>
