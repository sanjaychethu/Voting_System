<?php
session_start();
include('connect.php');

$votes = $_POST['gvotes'];
$total_votes = $votes + 1;
$gid = $_POST['gid'];
$uid = $_SESSION['id'];

// Update the vote count for the group
$update_votes = mysqli_query($connect, "UPDATE user SET votes='$total_votes' WHERE id='$gid'");

// Update the user's status to 'voted'
$update_user_status = mysqli_query($connect, "UPDATE user SET status=1 WHERE id='$uid'");

if ($update_votes and $update_user_status) {
    // Refresh group data
    $groups = mysqli_query($connect, "SELECT * FROM user WHERE role=2");
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);
    $_SESSION['groupsdata'] = $groupsdata;
    
    // Refresh user data
    $userdata_query = mysqli_query($connect, "SELECT * FROM user WHERE id='$uid'");
    $_SESSION['userdata'] = mysqli_fetch_array($userdata_query);


    echo '
        <script>
            alert("Voting successful!");
            window.location = "../routes/dashboard.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Some error occurred during voting!");
            window.location = "../routes/dashboard.php";
        </script>
    ';
}
?>
