<?php require_once 'logincheck.php'; ?>
<?php include './includes/config.php';

if (isset($_REQUEST['unconfirm'])) {
    $aeid = intval($_GET['unconfirm']);
    $status = 1;
    $sql = "UPDATE `vendor-register` SET status=:status WHERE user_no=:aeid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
    $query->execute();
    $msg = "Changes Successfully";
}

if (isset($_REQUEST['confirm'])) {
    $aeid = intval($_GET['confirm']);
    $status = 0;
    $sql = "UPDATE `vendor-register` SET status=:status WHERE user_no=:aeid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
    $query->execute();
    $msg = "Changes Successfully";
}
if (isset($_REQUEST['delete'])) {
    $user_no = $_GET['delete']; // Assuming user_no is unique
    
    // Delete user from register table
    $sql = "DELETE FROM `vendor-register` WHERE `user_no` = :user_no";
    $query = $dbh->prepare($sql);
    $query->bindParam(':user_no', $user_no, PDO::PARAM_STR);
    
    if ($query->execute()) {
        $msg = "User deleted successfully";
    } else {
        $error = "Error deleting user: " . $query->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>USERLIST</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <link rel = "shortcut icon" href = "../uploads/cicon.png" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style3.css">  
    <link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="///fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="///fonts.googleapis.com/css?family=Federo" rel="stylesheet">
    <link href="///fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
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
.succWrap{
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
                        <h2 class="page-title">Manage Vendors</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">List Vendors</div>
                            <div class="panel-body">
                                <?php if ($error) { ?>
                                    <div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div>
                                <?php } else if ($msg) { ?>
                                    <div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div>
                                <?php } ?>
                                <div class="table-responsive">
                                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Account</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $conn = new mysqli("localhost", "root", "", "carehub") or die(mysqli_error());
                                            $query = $conn->query("SELECT * FROM `vendor-register` ORDER BY `user_no` DESC") or die(mysqli_error());
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['user_no']; ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['mobile']; ?></td>
                                                    <td><?php echo $row['address']; ?></td>
                                                    <td>
                                                        <label style="font-size: 15px;" class="label label-primary">
                                                            <?php if ($row['status'] == 1) { ?>
                                                                <a href="vendorlist.php?confirm=<?php echo $row['user_no']; ?>" onclick="return confirm('Do you really want to Un-Confirm the Account')"> <font color="white"> Confirmed <i class="fa fa-check-circle"></i> </font></a>
                                                            <?php } else { ?>
                                                                <a href="vendorlist.php?unconfirm=<?php echo $row['user_no']; ?>" onclick="return confirm('Do you really want to Confirm the Account')"> <font color="white"> Un-Confirmed <i class="fa fa-times-circle"></i> </font></a>
                                                            <?php } ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <a href="#" disabled="disabled">&nbsp;<i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                                        <a href="vendorlist.php?delete=<?php echo $row['user_no']; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
                                                    </td>
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
