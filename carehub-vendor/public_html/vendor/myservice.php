<?php require_once 'logincheck.php'; ?>
<?php include './includes/config.php'; ?>

<?php
// if (isset($_REQUEST['unconfirm'])) {
//     $aeid = intval($_GET['unconfirm']);
//     $status = 1;
//     $sql = "UPDATE users SET status=:status WHERE user_no=:aeid";
//     $query = $dbh->prepare($sql);
//     $query->bindParam(':status', $status, PDO::PARAM_INT);
//     $query->bindParam(':aeid', $aeid, PDO::PARAM_INT);
//     $query->execute();
//     $msg = "Changes Successfully";
// }

// if (isset($_REQUEST['confirm'])) {
//     $aeid = intval($_GET['confirm']);
//     $status = 0;
//     $sql = "UPDATE users SET status=:status WHERE user_no=:aeid";
//     $query = $dbh->prepare($sql);
//     $query->bindParam(':status', $status, PDO::PARAM_INT);
//     $query->bindParam(':aeid', $aeid, PDO::PARAM_INT);
//     $query->execute();
//     $msg = "Changes Successfully";
// }

if (isset($_REQUEST['delete'])) {
    $user_no = intval($_GET['delete']); // Assuming user_no is unique
    
    // Delete user from register table
    $sql = "DELETE FROM `users` WHERE `user_no` = :user_no";
    $query = $dbh->prepare($sql);
    $query->bindParam(':user_no', $user_no, PDO::PARAM_INT);
    
    if ($query->execute()) {
        $msg = "User deleted successfully";
    } else {
        $error = "Error deleting user: " . $query->errorInfo()[2];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $contact = $_POST['contact'];
    $status = 'pending';

    // Handle file upload
    if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
        $file_name = time() . '_' . $_FILES['file']['name'];
        $target = "../uploads/" . $file_name;
        move_uploaded_file($_FILES['file']['tmp_name'], $target);
    } else {
        $file_name = '';
    }

    $sql = "INSERT INTO `ad_newservice` ( `image`, `name`, `price`, `details`, `contact_no`, `unique-id`,`status`) VALUES ( :image, :name, :price, :details, :contact,:username, :status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':image', $file_name, PDO::PARAM_STR);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':price', $price, PDO::PARAM_STR);
    $query->bindParam(':details', $detail, PDO::PARAM_STR);
    $query->bindParam(':contact', $contact, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    
    if ($query->execute()) {
        $msg = "Service added successfully";
    } else {
        $error = "Error adding service: " . $query->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>USERLIST</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <link rel="shortcut icon" href="../uploads/cicon.png" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style3.css">  
    <link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../css/style6.css">
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>

    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #dd3d36;
            color: #fff;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #5cb85c;
            color: #fff;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }

        .login-trigger {
            font-weight: bold;
            color: #fff;
            background: linear-gradient(to bottom right, lightblue, skyblue);
            padding: 15px 30px;
            border-radius: 5px;
            position: absolute;
            top: 2%;
            left: 82%;
        }
        #login {
            text-align: center;
        }
        .login-trigger:hover {
            color: black;
        }
        h4 {
            font-weight: bold;
            color: #fff;
        }
        .close {
            color: #fff;
            transform: scale(1.2)
        }
        .modal-content {
            font-weight: bold;
            background: gray;
        }
        .form-control {
            margin: 1em 0;
        }
        .form-control:hover, .form-control:focus {
            box-shadow: none;  
            border-color: #fff;
        }
        .username, .name, .price, .detail, .contact, .status {
            border: none;
            border-radius: 0;
            box-shadow: none;
            border-bottom: 2px solid #eee;
            padding-left: 0;
            font-weight: normal;
            background: transparent;  
        }
        .form-control::-webkit-input-placeholder {
            color: #eee;  
        }
        .form-control:focus::-webkit-input-placeholder {
            font-weight: bold;
            color: #fff;
        }
        .login {
            padding: 6px 20px;
            border-radius: 20px;
            background: none;
            border: 2px solid white;
            color: white;
            font-weight: bold;
            transition: all .5s;
            margin-top: 1em;
        }
        .login:hover {
            background: #eee;
            color: black;
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
                        <h2 class="page-title">My Services Status</h2>
                        <a class="login-trigger" href="#" data-target="#login" data-toggle="modal">Add-new Service</a>

                        <div id="login" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button data-dismiss="modal" class="close">&times;</button>
                                        <h4>Add Service</h4>
                                        <form method="post" enctype="multipart/form-data">
                                            <input type="text" name="username" class="username form-control" placeholder="Enter (unique) Username" required/>
                                            <input type="file" name="file" class="file" required>
                                            <input type="text" name="name" class="name form-control" placeholder="Name of product" required/>
                                            <input type="text" name="price" class="price form-control" placeholder="Enter price of service" required/>
                                            <input type="text" name="detail" class="detail form-control" placeholder="Enter some detail about services" required/>
                                            <input type="text" name="contact" class="contact form-control" placeholder="Enter contact information" required/>
                                            <input type="hidden" name="status" value="pending" class="status form-control"/>
                                            <input class="btn login" type="submit" value="Add" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">List Vendors</div>
                            <div class="panel-body">
                                <?php if (isset($error)) { ?>
                                    <div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?></div>
                                <?php } else if (isset($msg)) { ?>
                                    <div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?></div>
                                <?php } ?>
                                <div class="table-responsive">
                                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Details</th>
                                                <!-- <th>Contact</th> -->
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $conn = new mysqli("localhost", "root", "", "carehub") or die(mysqli_error());
                                            $query = $conn->query("SELECT * FROM `ad_newservice`") or die(mysqli_error());
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['unique-id']; ?></td>
                                                    <td><img src="../uploads/<?php echo $row["image"]; ?>" style="width:50px; border-radius:50%;"/></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td><?php echo $row['details']; ?></td>
                                                    <td>
                                                        <a href="#"><?php echo $row['status']; ?></a>
                                                        <a href="#" disabled="disabled">&nbsp;<i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                                        <a href="vendorlist.php?delete=<?php echo $row['unique-id']; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
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
