<?php include('includes/session.php'); ?>
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
    <script src="../bootstrap//js/bootstrap.bundle.min.js"></script>

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
            Lottery Result
        </h3>

        <!-- <div class="dash-home">
        <i class="fa-solid fa-gauge"></i><a href="#">Home</a>
            <span>></span>
            <span>Lottery result</span>
        </div> -->
        
        <div class="table-container" id="table-container">
            <form action="" method = "GET">
                <div class="date-picker">
                    <div class="date-box">
                        <input type="search" id="search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"  placeholder = "Search">
                        <button type = "submit" name = "btn_search"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    </form>
                    <div class="date-box">
                    <form action="" method = "GET">
                        <input type="date" id="from" name="from" value="<?php echo isset($_GET['from']) ? $_GET['from'] : ''; ?>">
                    </div>
                    <span>-</span>
                    <div class="date-box">
                        <input type="date" id="to" name="to" value="<?php echo isset($_GET['to']) ? $_GET['to'] : ''; ?>">
                    </div>
                    <button class="btn-date" type= "submit" name = "submit" >Apply</button>
                </div>
            </form>
            
            <!-- <a href="#" class= "btn btn-success"><i class="fa-solid fa-circle-plus me-1"></i>New</a> -->
            <hr>
            <table class = "table table-bordered table-striped" id = "mydatatable">
                <thead>
                    <tr>
                        <th>Lottery #</th>
                        <th>Invoice</th>
                        <th>Name</th>
                        <th>Placed no.</th>
                        <th>Result</th>
                        <th>Status</th>
                        <th>Prize</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../connect.php');

                    if(isset($_GET['from']) && isset($_GET['to'])){
                    
                    $from = $_GET['from'];
                    $to = $_GET['to'];

                    $sql = "SELECT l.id , l.c_invoice , c.fullname, l.lottery_a , l.lottery_b , l.lottery_c , l.result_a , l.result_b , l.result_c , l.status , l.prize, l.date FROM lottery AS l INNER JOIN customer AS c ON l.c_invoice = c.invoice WHERE l.date BETWEEN :from AND :to ORDER BY date DESC";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindparam(':from', $from);
                    $stmt->bindparam(':to', $to);
                    $stmt->execute();

                    if($stmt->rowCount()>0)
                    {
                        while($row = $stmt->fetch(PDO:: FETCH_ASSOC)){
                            ?>
        
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['c_invoice']; ?></td>
                                    <td><?php echo $row['fullname']; ?></td>
                                    <td><?php echo $row['lottery_a']; ?><?php echo $row['lottery_b']; ?><?php echo $row['lottery_c']; ?></td>
                                    <td><?php echo $row['result_a']; ?><?php echo $row['result_b']; ?><?php echo $row['result_c']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['prize']; ?></td>
                                    <td><?php echo date('F j, Y', strtotime($row['date'])); ?></td>
                                </tr>
        
                            <?php
                             }
                    }
                    else
                    {
                        echo '<div class ="no-record">No record found</div>';
                    }
                    }


                    if(isset($_GET['search']))
                    {
                        $search = $_GET['search'];

                        if($search != "")
                        {
                            $sql = "SELECT l.id , l.c_invoice , c.fullname, l.lottery_a , l.lottery_b , l.lottery_c , l.result_a , l.result_b , l.result_c , l.status , l.prize, l.date FROM lottery AS l INNER JOIN customer AS c ON l.c_invoice = c.invoice WHERE CONCAT(c.fullname, l.c_invoice) LIKE '%$search%'";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
        
                            if($stmt->rowCount()>0)
                            {
                                while($row = $stmt->fetch(PDO:: FETCH_ASSOC)){
                                    ?>
                
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['c_invoice']; ?></td>
                                            <td><?php echo $row['fullname']; ?></td>
                                            <td><?php echo $row['lottery_a']; ?><?php echo $row['lottery_b']; ?><?php echo $row['lottery_c']; ?></td>
                                            <td><?php echo $row['result_a']; ?><?php echo $row['result_b']; ?><?php echo $row['result_c']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><?php echo $row['prize']; ?></td>
                                            <td><?php echo date('F j, Y', strtotime($row['date'])); ?></td>
                                        </tr>
                
                                    <?php
                                     }
                            }
                            else
                            {
                                echo '<div class ="no-record">No record found</div>';
                            }
                        }
                    }
                    else
                    {

                    }


                    if(isset($_GET['consolation-1']))
                    {
                        //$from = $_GET['from'];
                       // $to = $_GET['to'];
    
                        $sql = "SELECT l.id , l.c_invoice , c.fullname, l.lottery_a , l.lottery_b , l.lottery_c , l.result_a , l.result_b , l.result_c , l.status , l.prize, l.date FROM lottery AS l INNER JOIN customer AS c ON l.c_invoice = c.invoice WHERE prize = 'Consolation-1' ORDER BY date DESC";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
    
                        if($stmt->rowCount()>0)
                        {
                            while($row = $stmt->fetch(PDO:: FETCH_ASSOC)){
                                ?>
            
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['c_invoice']; ?></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['lottery_a']; ?><?php echo $row['lottery_b']; ?><?php echo $row['lottery_c']; ?></td>
                                        <td><?php echo $row['result_a']; ?><?php echo $row['result_b']; ?><?php echo $row['result_c']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['prize']; ?></td>
                                        <td><?php echo date('F j, Y', strtotime($row['date'])); ?></td>
                                    </tr>
            
                                <?php
                                 }
                        }
                        else
                        {
                            echo '<div class ="no-record">No record found</div>';
                        }
                    }
                    if(isset($_GET['consolation-2']))
                    {
                        //$from = $_GET['from'];
                       // $to = $_GET['to'];
    
                        $sql = "SELECT l.id , l.c_invoice , c.fullname, l.lottery_a , l.lottery_b , l.lottery_c , l.result_a , l.result_b , l.result_c , l.status , l.prize, l.date FROM lottery AS l INNER JOIN customer AS c ON l.c_invoice = c.invoice WHERE prize = 'Consolation-2' ORDER BY date DESC";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
    
                        if($stmt->rowCount()>0)
                        {
                            while($row = $stmt->fetch(PDO:: FETCH_ASSOC)){
                                ?>
            
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['c_invoice']; ?></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['lottery_a']; ?><?php echo $row['lottery_b']; ?><?php echo $row['lottery_c']; ?></td>
                                        <td><?php echo $row['result_a']; ?><?php echo $row['result_b']; ?><?php echo $row['result_c']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['prize']; ?></td>
                                        <td><?php echo date('F j, Y', strtotime($row['date'])); ?></td>
                                    </tr>
            
                                <?php
                                 }
                        }
                        else
                        {
                            echo '<div class ="no-record">No record found</div>';
                        }
                    }
                    if(isset($_GET['grand prize']))
                    {
                        //$from = $_GET['from'];
                       // $to = $_GET['to'];
    
                        $sql = "SELECT l.id , l.c_invoice , c.fullname, l.lottery_a , l.lottery_b , l.lottery_c , l.result_a , l.result_b , l.result_c , l.status , l.prize, l.date FROM lottery AS l INNER JOIN customer AS c ON l.c_invoice = c.invoice WHERE prize = 'Grand Prize' ORDER BY date DESC";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
    
                        if($stmt->rowCount()>0)
                        {
                            while($row = $stmt->fetch(PDO:: FETCH_ASSOC)){
                                ?>
            
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['c_invoice']; ?></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['lottery_a']; ?><?php echo $row['lottery_b']; ?><?php echo $row['lottery_c']; ?></td>
                                        <td><?php echo $row['result_a']; ?><?php echo $row['result_b']; ?><?php echo $row['result_c']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['prize']; ?></td>
                                        <td><?php echo date('F j, Y', strtotime($row['date'])); ?></td>
                                    </tr>
            
                                <?php
                                 }
                        }
                        else
                        {
                            echo '<div class ="no-record">No record found</div>';
                        }
                    }
                    else
                    {
                        
                    }
                    
                    ?>
                </tbody>
            </table>
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