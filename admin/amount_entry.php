<?php include('includes/session.php'); ?>

<?php

    include('../connect.php');

    if(isset($_POST['save']))
    {
        $amount_entry = $_POST['amount_entry'];
        $status = 'Active';

        
            $update_sql = "UPDATE `entries` SET `status` = 'Inactive' WHERE `status` = 'Active'";
            $stmt_update = $conn->prepare($update_sql);
            $stmt_update->execute();
        

        $sql = "INSERT INTO `entries`(`amount`, `status`) VALUES (:amount , :status)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':amount', $amount_entry);
        $stmt->bindParam(':status', $status);
        $stmt->execute();

        if($stmt)
        {
            header('location: amount_entry.php');
        }

       
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCAP SLOTS - Entries</title>
    <link rel="icon" href="../images/gaisano.png" type="image/x-icon">
    
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap//js/bootstrap.bundle.min.js"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="../fontawesome/all.min.css" />
     <script src="../fontawesome/6fc1f0eac0.js"></script>

     <!-- datatable -->
     <link rel="stylesheet" href="../css/datatable.css">

     <style>

        html{
            font-size: 62%;
        }

        .container{
            font-size: 1.5rem;
        }
        .container .card-body input{
            font-size: 1.5rem;
        }
        .btn{
            font-size: 1.5rem;
            display: block;
            width: 100%;
        }
        .container .card-body td,th{
            font-size: 1.4rem;
        }

     </style>
     

    
</head>
<body>
    
    <?php include('includes/sidebar.php'); ?>


    <!-- main -->
    <section id="interface">
       
        <?php include('includes/navbar.php'); ?>

            <h3 class="i-name">
                Entries
                <div class="home-gauge">
                    <span><i class="fa-solid fa-gauge"></i>Home</span>
                    <span>></span>
                    <span>Entries</span>
                </div>
            </h3>


            <div class="container px-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="header-title">Add Entry</h3>
                            </div>

                            <div class="card-body">

                                <form action="" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="Amount / Entry">Amount / Entry</label>
                                        <input type="text" name="amount_entry" class="form-control">
                                    </div>

                                    <button type="submit" name="save" onclick="return confirm('Are you sure? You want to add this amount?')" class="btn btn-primary btn-block">Submit</button>

                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="header-title">Entry List</h3>
                            </div>

                            <div class="card-body">

                                <table class="table table-striped table-borderless" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date Created</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php

                                            $query = "SELECT * FROM entries ORDER BY id DESC";
                                            $stmt_query = $conn->prepare($query);
                                            $stmt_query->execute();

                                            while($row = $stmt_query->fetch(PDO::FETCH_ASSOC))
                                            {
                                            
                                            $entry_status = '';

                                            if($row['status'] === 'Active')
                                            {
                                                $entry_status = '<b class = "text-success">Active</b>';
                                            }
                                            else
                                            {
                                                $entry_status = '<b class = "text-danger">Inactive</b>';
                                            }
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['amount'] ?></td>
                                            <td><?php echo $entry_status?></td>
                                            <td><?php echo $row['date_created'] ?></td>
                                            
                                        </tr>

                                        <?php } ?>

                                        
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>




    </section>

    <script src="../js/jquery/jquery-3.6.3.js"></script>
    <script src="../js/datatable.js"></script>

    <script>

        $(document).ready(function () {

            $('#datatable').DataTable({
               
            });
        });

    </script>

</body>
</html>
