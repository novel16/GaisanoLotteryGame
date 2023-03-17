<?php include('includes/session.php'); ?>
    <?php
    include('../connect.php');

    if(isset($_SESSION['admin']))
    {
        $admin = $_SESSION['admin'];

        $sql = "SELECT * FROM user WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(':username', $admin);
        $stmt->execute();

        $admin_fetch = $stmt->fetch(PDO:: FETCH_ASSOC);
    }

    if(isset($_POST['update_admin']))
    {
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];

        $sql ="UPDATE `user` SET `fullname`= :fullname WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(':fullname', $fullname);
        $stmt->bindparam(':username', $username);
        $stmt->execute();

        if($stmt)
        {
            header('location: profile.php');
        }
        else
        {

        }

    }

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottery Game | Website</title>
    <!-- <link rel="stylesheet" href="../css/datatable.css"> -->
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
</head>
<body>
    
    <?php include('includes/sidebar.php'); ?>


    <!-- main -->
    <section id="interface">
       
    <?php include('includes/navbar.php'); ?>

        <h3 class="i-name">
            Profile Setting
        </h3>


        <div class="table-container" id="table-container">
            <div class="profile-setting">
                <div class="profile-logo">
                    <h2>Profile</h2>
                    <img  src="../images/gaisano.png" alt="">
                    <span><?php echo $admin_fetch['fullname']; ?></span>
                    <p><i class="fa-solid fa-circle"></i><?php echo $admin_fetch['username']; ?></p>
                </div>
                <div class="admin-profile">
                    <h2>Admin Information</h2>
                    <form action="" method ="POST">
                        <div class="user-profile">
                            <span>Username</span>
                            <input type="text" name = "username" value = "<?php echo $admin_fetch['username']; ?>" readonly>
                        </div>
                        <div class="user-profile">
                            <span>fullname</span>
                            <input type="text" name = "fullname" value = "<?php echo $admin_fetch['fullname']; ?>" >
                        </div>
                        <div class="admin-buttons">
                            <a class="btn-admin" href="#">Reset Password</a>
                            <button class="btn-admin" type = "submit" name ="update_admin">Save Changes</button>
                        </div>
                    </form>
                </div>
                
            </div>
            
        </div>
        


    </section>

     <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>                   
     <script type="text/javascript">
            $(document).ready(function() {
            $('#mydatatable').DataTable();
            });
     </script>

    <!-- <?php include('includes/script.php'); ?> -->
</body>
</html>