<?php

if (!isset($_SESSION)) {
    session_start();
}

include('./adminIncludeFile/header.php');
include_once('../dbConnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLoginEmail'];
} else {
    echo "<script>location.href = '../index.php';</script>";
}

?>


<div class=" col-sm-9 courses mt-5 mx-3">
    <form action="" class="mt-3 form-inline d-print-none">
        <div class="form-group mr-3">
            <label class="form-label font-weight-bold" for="checkID">Enter Course ID:</label>
            <input type="text" class="form-control ml-3" name="checkID" id="checkID">
        </div>
        <button type="submit" class="btn btn-danger">Search</button>
    </form>
    <?php

    $sql = "SELECT course_id FROM course";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        if (isset($_REQUEST['checkID']) && $_REQUEST['checkID'] == $row['course_id']) {
            $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkID']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if (($row['course_id']) == ($_REQUEST['checkID'])) {
                $_SESSION['course_id'] = $row['course_id'];
                $_SESSION['course_name'] = $row['course_name'];
    ?>
                <h3 class="bg-dark text-white p-2 mt-4">Course ID: <?php if (isset($row['course_id'])) {
                                                                        echo $_SESSION['course_id'];
                                                                    } ?>
                    Course Name: <?php if (isset($row['course_name'])) {
                                        echo $_SESSION['course_name'];
                                    } ?></h3>
                <?php

                $sql = "SELECT * FROM lesson WHERE course_id = {$_REQUEST['checkID']}";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Lesson ID</th>
                                <th scope="col">Lesson Name</th>
                                <th scope="col">Lesson Link</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {

                                echo '<tr>';
                                echo '<th scope="row">' . $row['lesson_id'] . '</th>';
                                echo '<td>' . $row['lesson_name'] . '</td>';
                                echo '<td>' . $row['lesson_link'] . '</td>';
                                echo '<td>
                    <form action="editlesson.php" method="POST" class="d-inline">
                    <input type="hidden" name="id" value=' . $row["lesson_id"] . '>
                    <button type="submit" class="btn btn-info mr-3" name="edit" value="Edit">
                        <i class="fas fa-pen"></i>
                    </button>
                    </form>
                    <form action="" method="POST" class="d-inline">
                    <input type="hidden" name="id" value=' . $row["lesson_id"] . '>
                    <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    </form>
                </td>';
                                echo '</tr>';
                            } ?>
                        </tbody>
                    </table>
    <?php } else {
                    echo '<div class = "alert alert-dark mt-4" role="alert">Videos not Found !</div>';
                }
            }
        }
    }

    ?>
</div>

<!-- code for delete button -->
<?php
if (isset($_REQUEST['delete'])) {
    $sql = "DELETE FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
    if ($conn->query($sql) == TRUE) {
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    } else {
        echo "Unable to Delete Data";
    }
}
?>

<!-- plus button sign  -->
<?php
if (isset($_SESSION['course_id'])) {
    echo '<div>
    <a class="btn btn-danger box" href="./addLessons.php">
    <i class="fas fa-plus fa-2x"></i></a>
</div>';
}
?>


<?php
include('./adminIncludeFile/footer.php');
?>