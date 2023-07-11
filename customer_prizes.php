<?php
include('connect.php');

// get the invoice value from the AJAX request
$invoice = $_POST['invoice'];


$sql = "SELECT * FROM vwlottery_result WHERE c_invoice = :invoice ORDER BY id DESC";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':invoice', $invoice);
$stmt->execute();


if($stmt->rowCount() > 0)
{
  ?>
    <thead>
        <tr>
            <th>Placed No.</th>
            <th>Result</th>
            <th>Prize</th>
        </tr>
    </thead>

    <tbody>

    <?php
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
    ?>
        <tr>
            <td><?php echo $row['placed_no'] ?></td>
            <td><?php echo $row['result'] ?></td>
            <td><?php echo $row['prize'] ?></td>
        </tr>


    <?php } ?>

    </tbody>

    <?php }else{ ?>

        <tr>
            <!-- <td colspan="3" class="text-center ">No Record Found</td> -->
            <th width = "50">Placed No.</th>
            <th>Result</th>
            <th>Prize</th>
        </tr>

    <?php } ?>
    
<?php












