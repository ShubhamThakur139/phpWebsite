<?php

if(!isset($_SESSION)){
    session_start();
}

include('./adminIncludeFile/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLoginEmail'];
}else{
    echo "<script> location.href='../index.php';</script>";
}

?>

<div class="col-sm-9 mt-5">
    <p class="bg-dark text-white p-2">List of Courses</p>

    <?php
    $sql = "SELECT * FROM course";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    ?>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Course ID</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($row = $result->fetch_assoc()) {
    
            echo '<tr>';
            echo '<th scope="row">' .$row['course_id'].'</th>';
            echo '<td>'.$row['course_name']. '</td>';
            echo '<td>' .$row['course_author']. '</td>';
            echo '<td>
                    <form action="editcourse.php" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='.$row["course_id"].'>
                    <button type="submit" class="btn btn-info mr-3" name="edit" value="Edit">
                        <i class="fas fa-pen"></i>
                    </button>
                    </form>
                    <form action="" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='.$row["course_id"].'>
                    <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    </form>
                </td>';
            echo'</tr>';
            }?>
        </tbody>
    </table>

<?php } else{
    echo "0 result";
} ?>
</div>


<!-- code for delete button -->
<?php
if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM course WHERE course_id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    }else{
        echo "Unable to Delete Data";
    }
}
?>

<div>
    <a class="btn btn-danger box" href="./addCourse.php">
    <i class="fas fa-plus fa-2x"></i></a>
</div>
<?php
include('./adminIncludeFile/footer.php');
?>