<?php 
require_once 'logincheck.php';


?>

<!DOCTYPE html>
<html>
<head>
  <title>Services List</title>
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

  <style>
    .errorWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #dd3d36;
      color:#fff;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
      box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
    .succWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #5cb85c;
      color:#fff;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
      box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
  </style>
</head>
<body>
<?php include('./includes/header.php'); ?>
  <div class="ts-main-content">
    <?php include('./includes/leftbar.php'); ?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h2 class="page-title">All Active Services</h2>
            <div class="panel panel-default">
              <div class="panel-heading">List of Services</div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Date Added</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $conn = new mysqli("localhost", "root", "", "carehub") or die(mysqli_error());
                      $query = $conn->query("SELECT * FROM `category` ORDER BY `price` DESC") or die(mysqli_error());
                      $count = 1;
                      while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                          <td><?php echo $count++; ?></td>
                          <td><img src="../../../carehub-vendor/public_html/uploads/<?php echo $row['img']; ?>" width="100" height="100" alt="<?php echo $row['img']; ?>"></td>
                          <td><?php echo $row['title']; ?></td>
                          <td style="text-transform:capitalize;"><?php echo $row['description']; ?></td>
                          <td ><?php echo $row['price']; ?></td>
                          <td><?php echo $row['date_added']; ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
