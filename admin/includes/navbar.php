<?php
    session_start();
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


?>

<div class="navigation">
            <div class="n1">
            
                <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search">
                </div>
            </div>
            <i class="fa-solid fa-bars" id = "menu-btn"></i>
            <div class="profile" >
                <i class="fa-solid fa-bell"></i>
                <img src="../images/gaisano.png" id="profile">
            </div>

            <div class="profile-menu" id = "profile-menu">
                <div class="profile-box">
                    <div class="profile-content">
                        <img src="../images/gaisano.png">
                        <span><?php echo $admin_fetch['fullname']; ?></span>
                        <p style = "text-transform: capitalize;"><?php echo $admin_fetch['username']; ?></p>
                        <p>Created since: <?php echo date('F  Y', strtotime($admin_fetch['date_created'])); ?></p>
                    </div>
                </div>
                <div class="profile-btn">
                    <a href="profile.php">Profile</a>
                    <!-- <a href="#">New Admin</a> -->
                </div>
            </div>
        </div>


<script src="../js/script.js"></script>
