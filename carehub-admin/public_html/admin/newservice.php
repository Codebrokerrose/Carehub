<?php
require_once 'logincheck.php';

// Establish database connections
$conn = new mysqli("localhost", "root", "", "carehub");
$conn1 = new mysqli("localhost", "root", "", "carehub");

// Check connections
if ($conn->connect_error || $conn1->connect_error) {
    die("Connection failed: " . $conn->connect_error . " and " . $conn1->connect_error);
}

// Initialize error and success messages
$error = '';
$msg = '';

// Handle delete action
if (isset($_GET['delete'])) {
    $name = $_GET['delete']; // Assuming name is unique
    
    // Delete user from products table
    $sql = "DELETE FROM `category` WHERE `title` = ?";
    $query = $conn1->prepare($sql);
    $query->bind_param('s', $name);
    
    // Delete user from ad_newservice table
    $sql1 = "DELETE FROM `ad_newservice` WHERE `name` = ?";
    $query1 = $conn->prepare($sql1);
    $query1->bind_param('s', $name);
    
    if ($query->execute() && $query1->execute()) {
        $msg = "User deleted successfully";
    } else {
        $error = "Error deleting user: " . $conn->error;
    }
}

// Handle move data action
if (isset($_POST['move_data'])) {
    $unique_id = $_POST['unique_id'];

    // Retrieve data from ad_newservice table based on unique ID
    $sql_select = "SELECT * FROM `ad_newservice` WHERE `unique-id` = '$unique_id'";
    $result = mysqli_query($conn, $sql_select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Insert data into products table only if the description is unique
        $name = $row['name'];
        $price = $row['price'];
        $details = $row['details'];
        $rrp = 0.0; // Assuming default rating is 0
        $quantity = 1;
        $img = $row['image'];
        $date = date("Y-m-d H:i:s");

        // Check if description already exists
        $sql_check = "SELECT * FROM `category` WHERE `description` = '$details'";
        $result_check = mysqli_query($conn1, $sql_check);

        if (mysqli_num_rows($result_check) == 0) {
            $sql_insert = "INSERT INTO `category` (`id`,`title`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`) 
                           VALUES ('','$name', '$details', '$price', '$rrp', '$quantity', '$img', '$date')";
            $stmt_insert = mysqli_query($conn1, $sql_insert);

            if ($stmt_insert) {
                $msg = "Data moved successfully";

                // Update status in ad_newservice table
                $update = "UPDATE ad_newservice SET status = 'active' WHERE `unique-id` = '$unique_id'";
                $stmt_update = mysqli_query($conn, $update);
                if ($stmt_update) {
                    $msg = "Status updated successfully";
                } else {
                    $error = "Error updating status: " . $conn->error;
                }
            } else {
                $error = "Error: " . $conn1->error;
            }
        } else {
            $error = "Duplicate description: $details";
        }
    } else {
        $error = "No data found with ID: $unique_id";
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
                        <h2 class="page-title">Manage New-Services</h2> 
                        <div class="panel panel-default">
                            <div class="panel-heading">List Vendors</div>
                            <div class="panel-body">
                                <?php if ($error) { ?>
                                    <div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?></div>
                                <?php } else if ($msg) { ?>
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
                                                <th>Status</th>
                                                <th>Accept/Reject</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = $conn->query("SELECT * FROM `ad_newservice`") or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['unique-id']; ?></td>
                                                    <td><img src="../../../carehub/services/uploads/<?php echo $row["image"]; ?>" style="width:50px; border-radius:50%;"/></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td><?php echo $row['details']; ?></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="unique_id" value="<?php echo $row['unique-id']; ?>">
                                                            <button type="submit" name="move_data" style="border: none; background-color: transparent;">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a href="newservice.php?delete=<?php echo $row['name']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
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
    <script>
        $(document).ready(function() {
            $('#zctb').DataTable();
        });
    </script>
</body>
</html>
