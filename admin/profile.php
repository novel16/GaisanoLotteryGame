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

        
    }

    
    //store function

       $sql1 = "SELECT * FROM store";
       $stmt1 = $conn->prepare($sql1);
       $stmt1->execute();
       
       $fetch_branch = $stmt1->fetch(PDO::FETCH_ASSOC);

   if(isset($_POST['store_save']))
   {
       $store_id = $_POST['store_id'];
       $branch = $_POST['branch'];
       $contact = $_POST['contact'];
       $address = $_POST['address'];

       
           //update
       $sql = "UPDATE `store` SET `branch`=:branch,`contact`=:contact,`address`=:address WHERE store_id = :store_id";
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(':store_id', $store_id);
       $stmt->bindParam(':branch', $branch);
       $stmt->bindParam(':contact', $contact);
       $stmt->bindParam(':address', $address);
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
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- fontawesome -->
    <link rel="stylesheet" href="../fontawesome/all.min.css" />
     <script src="../fontawesome/6fc1f0eac0.js"></script>

    
</head>
<body>
    
    <?php include('includes/sidebar.php'); ?>


    <!-- main -->
    <section id="interface">
       
    <?php include('includes/navbar.php'); ?>

        <h3 class="i-name">
             Settings
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
                    <h2>Branch Information</h2>
                    <form action="profile.php" method ="POST">
                        <div class="user-profile">
                            <span>Branch Name</span>
                            <input type="text" hidden class="form-control" name = "store_id" value = "<?php echo $fetch_branch['store_id']; ?>" >
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


</body>
</html>