<?php

include('../connect.php');


if(isset($_POST['save']))
{
    $allocation_day = $_POST['day'];


    $sql = "INSERT INTO `second_prize_allocation`(`day`) VALUES (:day)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':day', $allocation_day);
    $stmt->execute();

    if($stmt)
    {
        header('location: second_allocation.php');
        $_SESSION['success'] = "Allocation day successfully added !";
    }
}


//grand allocation update function
if(isset($_POST['update']))
{
    $update_id = $_POST['id'];
    $day = $_POST['modal_day'];

    $sql = "UPDATE `second_prize_allocation` SET `day`='$day' WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $update_id);
    $stmt->execute();

    if($stmt)
    {
        
        header('location: second_allocation.php');
        $_SESSION['success'] = "Allocation day successfully updated !";
        
    }
}


//grand allocation delete function
if(isset($_POST['delete']))
{
    $delete_id = $_POST['id'];
    

    $sql = "DELETE FROM second_prize_allocation WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $delete_id);
    $stmt->execute();

    if($stmt)
    {
        
        header('location: second_allocation.php');
        $_SESSION['success'] = "Allocation day successfully updated !";
        
    }
}






















?>