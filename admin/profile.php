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

    
    //store function

       $sql1 = "SELECT * FROM store";
       $stmt1 = $conn->prepare($sql1);
       $stmt1->execute();
       
       $fetch_branch = $stmt1->fetch(PDO::FETCH_ASSOC);

   if(isset($_POST['store_save']))
   {
       $branch = $_POST['branch'];
       $contact = $_POST['contact'];
       $address = $_POST['address'];

       
           //update
       $sql = "UPDATE `store` SET `branch`=:branch,`contact`=:contact,`address`=:address";
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(':branch', $branch);
       $stmt->bindParam(':contact', $contact);
       $stmt->bindParam(':address', $address);
       $stmt->execute();

           
           

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
                            <input type="text" class="form-control" name = "username" value = "<?php echo $admin_fetch['username']; ?>" readonly>
                        </div>
                        <div class="user-profile">
                            <span>fullname</span>
                            <input type="text" class="form-control" name = "fullname" value = "<?php echo $admin_fetch['fullname']; ?>" >
                        </div>
                        <div class="admin-buttons">
                            <a class="btn-admin" href="#">Reset Password</a>
                            <button class="btn-admin" type = "submit" name ="update_admin">Save Changes</button>
                        </div>
                    </form>
                </div>

                <!-- store -->

                <div class="admin-profile">
                    <h2>Store Information</h2>
                    <form action="profile.php" method ="POST">
                        <div class="user-profile">
                            <span>Store Name</span>
                            <input type="text" class="form-control" name = "branch" value = "<?php echo $fetch_branch['branch']; ?>" >
                        </div>
                        
                        <div class="user-profile">
                            <span>Contact no.</span>
                            <input type="text" class="form-control" name = "contact" value = "<?php echo $fetch_branch['contact']; ?>" >
                        </div>
                        <div class="user-profile">
                            <span>Address</span>
                            <textarea name="address" class="form-control" id="" cols="30" rows="4"><?php echo $fetch_branch['address']; ?></textarea>
                        </div>
                        <div class="admin-buttons">
                            <!-- <a class="btn-admin" href="#">Reset Password</a> -->
                            <button class="btn-admin" type = "submit" name ="store_save">Save</button>
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