<?php
$pageTitle = 'Control Panel';
include('../assets/includes/backend/include.php');

if ($user->is_logged_in()) {
    include('../assets/includes/layout/header.php');

    // Function for getting different portfolio items on dash page
    function portfolioTable($type) {
        global $conn, $sql;
        $sql = "SELECT * FROM portfolio WHERE type = '$type' ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '
                    <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['description'].'</td>
                        <td>'.$row['link'].'</td>
                        <td>'.$row['image'].'</td>
                        <td><a class="btn btn-success" href="portfolioRecords?id='.$row['id'].'"><i class="fa fa-pencil"></i></a>&nbsp;<a class="btn btn-danger" href="portfolioDelete?id='.$row['id'].'"><i class="fa fa-times"></i></a></td>
                    <tr>';
            }
        }
    }
    ?>

    <style type="text/css">
    .portfolioTitle {
        text-align: left;
    }
    .table {
        text-align: left;
    }
    .btn-primary {
        border: none;
        border-radius: 0;
        padding: 25px 0;
        background-color: #29CEE0;
        font-size: 16px;
        font-weight: 200;
        text-transform: uppercase;
    }
    .btn-primary:hover,
    .btn-primary:focus {
        background-color: #1282B1;
    }
    </style>

    <div id="panelHome" class="section">
        <div class="container">
            <div class="portfolioLinks">
                <div class="row">
                    <div class="col-md-6">
                        <a href="portfolioRecords" class="btn btn-primary btn-block"><i class="fa fa-plus"></i>&nbsp;Add New Portfolio Item</a>
                    </div>
                    <div class="col-md-6">
                        <a href="logout" class="btn btn-primary btn-block"><i class="fa fa-power-off"></i>&nbsp;Logout</a>
                    </div>
                </div>
            </div>
            <div class="portfolioType">
                <p class="portfolioTitle">Builds</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Link</th>
                            <th>Image Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody><?php portfolioTable('build'); ?></tbody>
                </table>
            </div>
            <div class="portfolioType">
                <p class="portfolioTitle">Setups</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Link</th>
                            <th>Image Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody><?php portfolioTable('setup'); ?></tbody>
                </table>
            </div>
            <div class="portfolioType">
                <p class="portfolioTitle">Development</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Link</th>
                            <th>Image Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody><?php portfolioTable('development'); ?></tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    include('../assets/includes/layout/footer.php');
}
else {
    header ('Location: login');
}
?>