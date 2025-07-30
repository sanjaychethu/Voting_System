<?php
session_start();
// Security: If user is not logged in, redirect to login page
if (!isset($_SESSION['id'])) {
    header("location: ../");
    exit(); // Stop script execution
}

// --- FIX 1: Correct the path to the connect.php file ---
// We need to go up one directory from 'routes' to find 'api'
include("../api/connect.php");

// Fetch user and group data from the database
$id = $_SESSION['id'];

// Get user's data from the session to avoid another database call
$userdata = $_SESSION['userdata'];
$role = $userdata['role']; // --- FIX 2: Get role from userdata array ---

// Get all groups' (candidates') data
$groupsdata_query = mysqli_query($connect, "SELECT * FROM user WHERE role=2");
if ($groupsdata_query) {
    $groupsdata = mysqli_fetch_all($groupsdata_query, MYSQLI_ASSOC);
} else {
    $groupsdata = []; // Initialize as empty array if query fails
}

// Store groups data in session
$_SESSION['groupsdata'] = $groupsdata;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Dashboard</title>
    <!-- Link to your CSS file -->
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<body>

<<<<<<< HEAD
    <div id="mainSection">
        <div id="headerSection">
            <a href="../"><button id="back-btn"> Back</button></a>
            <a href="../api/logout.php"><button id="logout-btn">Logout</button></a>
            <h1>Online Voting System</h1>
        </div>
        <hr>

        <div id="mainpanel">
            <!-- User Profile Section -->
            <div id="Profile">
                <h3>YOUR PROFILE</h3><br>
                <center><img src="../uploads/<?php echo $userdata['photo']; ?>" height="150" width="150"></center><br><br>
                <b>Name:</b> <?php echo $userdata['name']; ?><br><br>
                <b>Mobile:</b> <?php echo $userdata['mobile']; ?><br><br>
                <b>Address:</b> <?php echo $userdata['address']; ?><br><br>
                <b>Status:</b>
                <?php
                    if ($userdata['status'] == 0) {
                        echo '<b style="color: red;">Not Voted</b>';
                    } else {
                        echo '<b style="color: green;">Voted</b>';
                    }
                ?>
            </div>

            <!-- Groups / Candidates Section -->
            <div id="Group">
                <h3>CANDIDATES</h3><br>
                <?php
                if (!empty($groupsdata)) {
                    foreach ($groupsdata as $group) {
                ?>
                        <div>
                            <img style="float: right;" src="../uploads/<?php echo $group['photo']; ?>" height="100" width="100">
                            <b>Group Name:</b> <?php echo $group['name']; ?><br><br>
                            <b>Votes: </b> <?php echo $group['votes']; ?><br><br>

                            <?php
                            // Show vote button only if the user is a voter AND has not voted yet
                            if ($userdata['role'] == 1 && $userdata['status'] == 0) {
                            ?>
                                <form action="../api/vote.php" method="POST">
                                    <input type="hidden" name="gvotes" value="<?php echo $group['votes']; ?>">
                                    <input type="hidden" name="gid" value="<?php echo $group['id']; ?>">
                                    <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                        <hr>
                <?php
                    }
                } else {
                    echo "<div>No groups available to vote for.</div>";
                }
                ?>
=======
    <header class="header">
        <a href="#" id="back-btn" class="btn">Back</a>
        <h1> Voting System</h1>
        <a href="#" id="logout-btn" class="btn">Logout</a>
    </header>

    <main id="dashboard-container">

        <section id="profile-section" class="card">
            <img id="https://thumbs.dreamstime.com/b/illustration-teenage-boy-glasses-illustration-teenage-boy-glasses-388809862.jpg?w=768" alt="Profile Picture">
            <p><strong>Name:</strong> Raja</p>
            <p><strong>Mobile:</strong> 123456789</p>
            <p><strong>Address:</strong>Venkateshpuram, Bengaluru</p>
            <p><strong>Status:</strong> <span class="status-badge voted">Voted</span></p>
        </section>

        <section id="candidates-section" class="card">
            <h2>Groups</h2>

            <div class="candidate-card">
                <div class="candidate-details">
                    <p><strong>Group Name:</strong>TVK</p>
                    <p><strong>Votes:</strong> 7</p>
                    <div class="status-badge voted">Voted</div>
                </div>
                <div class="candidate-symbol">
                    <img src="https://www.pngfind.com/pngs/m/57-574601_black-and-white-cow-png-cow-logo-transparent.png" alt="Group Symbol">
                </div>
            </div>

            <div class="candidate-card">
                <div class="candidate-details">
                    <p><strong>Group Name:</strong>ABC</p>
                    <p><strong>Votes:</strong> 0</p>
                    <div class="status-badge voted">Voted</div>
                </div>
                <div class="candidate-symbol">
                     <img src="https://static.vecteezy.com/system/resources/previews/020/639/849/large_2x/hand-symbol-hand-gesture-linear-icon-hand-geometric-style-icon-hand-sign-language-icon-illustration-vector.jpg" alt="Group Symbol">
                </div>
>>>>>>> f91c51c03be1ec58ed66018dea77d64a3515d0f1
            </div>
        </div>
    </div>

</body>
</html>
