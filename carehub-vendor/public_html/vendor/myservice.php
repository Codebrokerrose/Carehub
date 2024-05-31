<?php
require_once 'logincheck.php';
include './includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])) {
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

    $sql = "INSERT INTO `ad_newservice` (`image`, `name`, `price`, `details`, `contact_no`, `status`) VALUES (:image, :name, :price, :details, :contact, :status)";
    $query = $dbh->prepare($sql);
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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_name'])) {
    $edit_name = $_POST['edit_name'];
    $edit_price = $_POST['edit_price'];
    $edit_detail = $_POST['edit_detail'];
    $edit_contact = $_POST['edit_contact'];
    $existing_image = $_POST['existing_image'];

    // Handle file upload for edit
    if (isset($_FILES['edit_file']['name']) && $_FILES['edit_file']['name'] != '') {
        $file_name = time() . '_' . $_FILES['edit_file']['name'];
        $target = "../uploads/" . $file_name;
        move_uploaded_file($_FILES['edit_file']['tmp_name'], $target);
    } else {
        $file_name = $existing_image;
    }

    $sql = "UPDATE `ad_newservice` SET `image` = :image, `price` = :price, `details` = :details, `contact_no` = :contact WHERE `name` = :name";
    $query = $dbh->prepare($sql);
    $query->bindParam(':image', $file_name, PDO::PARAM_STR);
    $query->bindParam(':name', $edit_name, PDO::PARAM_STR);
    $query->bindParam(':price', $edit_price, PDO::PARAM_STR);
    $query->bindParam(':details', $edit_detail, PDO::PARAM_STR);
    $query->bindParam(':contact', $edit_contact, PDO::PARAM_STR);

    if ($query->execute()) {
        $sql2 = "UPDATE `category` SET `price` = :price, `description` = :details, `date_added` = CURDATE() WHERE `title` = :name";
        $query2 = $dbh->prepare($sql2);
        $query2->bindParam(':price', $edit_price, PDO::PARAM_STR);
        $query2->bindParam(':details', $edit_detail, PDO::PARAM_STR);
        $query2->bindParam(':name', $edit_name, PDO::PARAM_STR);

        if ($query2->execute()) {
            $msg = "Service updated successfully";
        } else {
            $error = "Error updating service in category: " . $query2->errorInfo()[2];
        }
    } else {
        $error = "Error updating service: " . $query->errorInfo()[2];
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
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../css/style6.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
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
            border:black;
        }
        .form-control:hover, .form-control:focus {
            box-shadow: none;  
            /* border-color: black; */
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
        .file-caption-name{
            display:none;
        }
        #preview img {
            max-width: 100%;
            height: 150px;
            margin-bottom:20px;
        }
        /* file upload button */
        input[type="file"]::file-selector-button {
            border-radius: 4px;
            padding: 0 16px;
            height: 40px;
            cursor: pointer;
            background-color: white;
            border: 1px solid rgba(0, 0, 0, 0.16);
            box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.05);
            margin-right: 16px;
            transition: background-color 200ms;
        }

        /* file upload button hover state */
        input[type="file"]::file-selector-button:hover {
            background-color: #f3f4f6;
        }

        /* file upload button active state */
        input[type="file"]::file-selector-button:active {
            background-color: #e5e7eb;
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
                                            <input type="text" name="name" class="name form-control" placeholder="Name of product" required/>
                                            <div id="preview"></div>
                                            <input type="file" name="file" class="file-control file"  id="upload_file" onchange="getImagePreview(event)" required>
                                            
                                            <input type="text" name="price" class="price form-control" placeholder="Enter price of service" required/>
                                            <input type="text" name="contact" class="contact form-control" placeholder="Enter contact information" required/>
                                            <textarea name="detail" class="detail form-control" placeholder="Enter some detail about services" required rows="4" cols="50"></textarea>
                                            <input type="hidden" name="status" value="pending" class="status form-control"/>
                                            <input class="btn login" type="submit" value="Add" /> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="editModal"  class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button data-dismiss="modal" class="close">&times;</button>
                                        <h4>Edit Service</h4>
                                        <form method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="existing_image" id="existing_image">
                                            <input type="text" name="edit_name" id="edit_name" class="name form-control" placeholder="Name of product" required/>
                                            <input type="file" name="edit_file" class="file">
                                            <input type="text" name="edit_price" id="edit_price" class="price form-control" placeholder="Enter price of service" required/>
                                            <input type="text" name="edit_contact" id="edit_contact" class="contact form-control" placeholder="Enter contact information" required/>
                                            <textarea name="edit_detail" id="edit_detail" class="detail form-control" placeholder="Enter some detail about services" required rows="4" cols="50"></textarea>
                                            <input class="btn login" type="submit" value="Update" /> 
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
                                                <th>Status</th>
                                                <th>Edit</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $conn = new mysqli("localhost", "root", "", "carehub") or die(mysqli_error());
                                            $query = $conn->query("SELECT * FROM `ad_newservice`") or die(mysqli_error());
                                            $count = 0;
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo ++$count; ?></td>
                                                    <td><img src="../uploads/<?php echo $row["image"]; ?>" style="width:50px; border-radius:50%;"/></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td style="text-transform:capitalize;"><?php echo $row['details']; ?></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    <td>
                                                        <a href="#" class="editService" data-name="<?php echo $row['name']; ?>" data-price="<?php echo $row['price']; ?>" data-detail="<?php echo $row['details']; ?>" data-contact="<?php echo $row['contact_no']; ?>" data-image="<?php echo $row['image']; ?>">Edit</a>
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
<script type="text/javascript">
   $(document).ready(function () {
    $('#zctb').DataTable();

    setTimeout(function() {
        $('.succWrap').slideUp("slow");
    }, 3000);

    $(document).on('click', '.editService', function() {
        var name = $(this).data('name');
        var price = $(this).data('price');
        var detail = $(this).data('detail');
        var contact = $(this).data('contact');
        var image = $(this).data('image');

        // Populate the edit form fields with data from the clicked row
        $('#editModal').find('#edit_name').val(name);
        $('#editModal').find('#edit_price').val(price);
        $('#editModal').find('#edit_detail').val(detail);
        $('#editModal').find('#edit_contact').val(contact);
        $('#editModal').find('#existing_image').val(image);

        $('#editModal').modal('show'); // Show the edit modal
    });
});

</script>
<script src="../assets/js/util.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../js/main1.js"></script>
<script>
        function getImagePreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imagediv = document.getElementById('preview');
            var newimg = document.createElement('img');
            imagediv.innerHTML = '';
            newimg.src = image;
            newimg.width = 300; // Correctly set the width as an integer
            imagediv.appendChild(newimg);
        }
    </script>
</html>
