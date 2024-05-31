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
    $query1->execute() ;
    
    if ( $query->execute()) {
        $msg = "User deleted successfully";
    } else {
        $error = "Error deleting user: " . $conn->error;
    }
}

// Handle move data action
if (isset($_POST['move_data'])) {
    $name = $_POST['name'];

    // Retrieve data from ad_newservice table based on unique ID
    $sql_select = "SELECT * FROM `ad_newservice` WHERE `name` = ?";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bind_param('s', $name);
    $stmt_select->execute();
    $result = $stmt_select->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Insert data into products table only if the description is unique
        $name = $row['name'];
        $price = $row['price'];
        $details = $row['details'];
        $rrp = 0.0; // Assuming default rating is 0
        $quantity = 1;
        $img = $row['image'];
        $date = date("Y-m-d H:i:s");

        // Check if description already exists
        $sql_check = "SELECT * FROM `category` WHERE `description` = ?";
        $stmt_check = $conn1->prepare($sql_check);
        $stmt_check->bind_param('s', $details);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows == 0) {
            $sql_insert = "INSERT INTO `category` (`id`, `title`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`) 
                           VALUES ('', ?, ?, ?, ?, ?, ?, ?)";
            $stmt_insert = $conn1->prepare($sql_insert);
            $stmt_insert->bind_param('ssddiss', $name, $details, $price, $rrp, $quantity, $img, $date);

            if ($stmt_insert->execute()) {
                $msg = "Data moved successfully";

                // Update status in ad_newservice table
                $update = "UPDATE ad_newservice SET status = 'active' WHERE `name` = ?";
                $stmt_update = $conn->prepare($update);
                $stmt_update->bind_param('s', $name);
                if ($stmt_update->execute()) {
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
        $error = "No data found with name: $name";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>NEWSERVICE-LIST</title>
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
                                            $count = 0;
                                            while ($row = $query->fetch_assoc()) {
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><img src="../../../carehub-vendor/public_html/uploads/<?php echo htmlspecialchars($row["image"]); ?>" style="width:50px; border-radius:50%;"/></td>
                                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['price']); ?></td>
                                                    <td style="text-transform:capitalize;"><?php echo htmlspecialchars($row['details']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                                                    <td style="text-align:center;">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="name" value="<?php echo htmlspecialchars($row['name']); ?>">
                                                            <button type="submit" name="move_data" style="border: none; background-color: transparent;">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <a href="newservice.php?delete=<?php echo htmlspecialchars($row['name']); ?>" onclick="return confirm('Are you sure you want to delete this item?');">
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
