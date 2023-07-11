<?php include('corp_session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCAP SLOTS - Grand Allocation</title>
    <link rel="icon" href="../images/gaisano.png" type="image/x-icon">
    
    <link rel="stylesheet" href="corp.css">
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
        .form-select{
            font-size: 1.5rem;
            font-weight: 300;
        }
        .modal h4{
            font-size: 2.1rem;
            font-weight: 500;
        }
        .modal .modal-body label{
            font-size: 1.5rem;
            font-weight: 500;
        }
        .modal .modal-body input,select{
            font-size: 1.5rem;
            font-weight: 300;
        }
        .modal-btn-primary{
            outline: none;
            border: none;
            padding: .5rem 1.5rem;
            background: #525FE1;
            color: #fff;
            font-size: 1.3rem;
            font-weight: 400;
            transition: background .3s;
        }
        .modal-btn-primary:hover{
            background: blue;
        }
        .modal-btn-danger{
            outline: none;
            border: none;
            padding: .5rem 1.5rem;
            background: #E74646;
            color: #fff;
            font-size: 1.3rem;
            font-weight: 400;
            transition: background .3s;
        }
        .modal-btn-danger:hover{
            background: #FF6666;
        }
        .modal-btn-cancel{
            outline: none;
            border: none;
            padding: .5rem 1.5rem;
            background: #ccc;
            color: #000;
            font-size: 1.3rem;
            font-weight: 400;
            transition: background .3s;
        }

    </style>
    
</head>
<body>
    
    <?php include('corp_sidebar.php'); ?>


    <!-- main -->
    <section id="interface">
       
    <?php include('corp_navbar.php'); ?>

        <h3 class="i-name">
        Grand Allocation
            <div class="home-gauge">
                <span><i class="fa-solid fa-gauge"></i>Home</span>
                <span>></span>
                <span>Grand Allocation</span>
            </div>
        </h3>


        <div class="container px-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="header-title">Allocation</h3>
                            </div>

                            <div class="card-body">

                                <form action="grand_allocation_func.php" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="day">Day</label>
                                        <select name="day" id="day" class="form-select" required>
                                            <option value="">- Select Day -</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                        </select>
                                    </div>

                                    <button type="submit" name="save" onclick="return confirm('Are you sure? You want to add this amount?')" class="btn btn-primary btn-block">Submit</button>

                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        
                        <?php
                            if(isset($_SESSION['success']))
                            {
                                ?>
                                    <h6 class="alert alert-success"> <?php echo $_SESSION['success']; ?></h6>
                                <?php
                            }
                            unset($_SESSION['success']);
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="header-title">Allocation List</h3>
                            </div>

                            <div class="card-body">

                                <table class="table table-striped table-borderless" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Day</th>
                                            <th>Date Created</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php

                                            $query = "SELECT * FROM allocation ORDER BY id DESC";
                                            $stmt_query = $conn->prepare($query);
                                            $stmt_query->execute();

                                            while($row = $stmt_query->fetch(PDO::FETCH_ASSOC))
                                            {
                                            
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['day'] ?></td>
                                            <td><?php echo $row['date'] ?></td>
                                            <td>
                                                <a href="" class="btnEdit text-success" data-bs-toggle="modal" data-bs-target =""><i class="fa-sharp fa-solid fa-pen-to-square me-2"></i></a>
                                                <a href="" class="btnDelete text-danger" data-bs-toggle="modal" data-bs-target =""><i class="fa-sharp fa-solid fa-trash"></i></a>
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

        

    </section>


    <?php include('grand_allocation_modal.php'); ?>
    
    
    <script src="../js/jquery/jquery-3.6.3.js"></script>
    <script>
        $(document).ready(function(){
            //grand allocation update
            $('.btnEdit').on('click',function(){

                $("#grandUpdate").modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                return $(this).text();
                }).get();

                console.log(data);
                // alert(data);

                $('#id').val(data[0]);
                $('#modal_day_val').val(data[1]).html(data[1]);
                
            
            });

        });

        $(document).ready(function(){

        //grand allocation delete
        $('.btnDelete').on('click',function(){

                $("#grandDelete").modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                return $(this).text();
                }).get();

                console.log(data);
                // alert(data);

                $('#delete_id').val(data[0]);
                $('#modal_day_delete').html(data[1]);
                

            });

        });
    </script>
    <script src="../js/datatable.js"></script>

    <script>

        $(document).ready(function () {

            $('#datatable').DataTable({

                order: [[0, 'desc']],
               
            });
        });

    </script>

    

</body>
</html>