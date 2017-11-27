<?php
$pageTitle = 'Portfolio';
include('assets/includes/backend/include.php');
include('assets/includes/layout/header.php');

// Function for getting specific type of portfolio items
function portfolioItems($type) {
    global $conn, $sql;
    $sql = "SELECT * FROM portfolio WHERE type = '$type' ORDER BY id";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '
            <div class="col-md-4">
                <div class="portfolioItem">
                    <a href="'.$row['link'].'" target="_blank">
                        <img src="'.$row['image'].'" alt="item" draggable="false">
                        <div class="portfolioItemCaption">
                            <p>'.$row['name'].'</p>
                            <p>'.$row['description'].'</p>
                        </div>
                    </a>
                </div>
            </div>';
        }
    }
}
?>
        
        <div id="portfolio">
            <div class="container">
                <ul class="nav nav-pills nav-justified">
                    <li><a data-toggle="tab" href="#3d">3D</a></li>
                    <li><a data-toggle="tab" href="#artwork">Artwork</a></li>
                    <li><a data-toggle="tab" href="#graphics">Graphics</a></li>
                    <li><a data-toggle="tab" href="#builds">Builds</a></li>
                    <li><a data-toggle="tab" href="#terra">Terraforming</a></li>
                    <li><a data-toggle="tab" href="#development">Plugins</a></li>
                    <li><a data-toggle="tab" href="#webdev">Websites</a></li>
                    <li><a data-toggle="tab" href="#webtheme">Themes</a></li>
                </ul>
                <div class="tab-content">
                    <div id="3d" class="tab-pane fade in active">
                        <p class="portfolioTitle">3D Models</p>
                        <div class="row"><?php portfolioItems('3d'); ?></div>
                    </div>
                    <div id="artwork" class="tab-pane fade">
                        <p class="portfolioTitle">Hand Drawn Artwork</p>
                        <div class="row"><?php portfolioItems('artwork'); ?></div>
                    </div>
                    <div id="graphics" class="tab-pane fade">
                        <p class="portfolioTitle">Graphics</p>
                        <div class="row"><?php portfolioItems('graphic'); ?></div>
                    </div>
                    <div id="builds" class="tab-pane fade">
                        <p class="portfolioTitle">Builds</p>
                        <div class="row"><?php portfolioItems('build'); ?></div>
                    </div>
                    <div id="terra" class="tab-pane fade">
                        <p class="portfolioTitle">Terraforming</p>
                        <div class="row"><?php portfolioItems('terra'); ?></div>
                    </div>
                    <div id="development" class="tab-pane fade">
                        <p class="portfolioTitle">Plugin Development</p>
                        <div class="row"><?php portfolioItems('development'); ?></div>
                    </div>
                    <div id="webdev" class="tab-pane fade">
                        <p class="portfolioTitle">Web Design &amp; Development</p>
                        <div class="row"><?php portfolioItems('webdev'); ?></div>
                    </div>
                    <div id="webtheme" class="tab-pane fade">
                        <p class="portfolioTitle">Web Software Themes</p>
                        <div class="row"><?php portfolioItems('webtheme'); ?></div>
                    </div>
                    <div id="setups" class="tab-pane fade">
                        <p class="portfolioTitle">Setups</p>
                        <div class="row"><?php portfolioItems('setup'); ?></div>
                    </div>
	
                </div>
            </div>
        </div>
        
<?php
include('assets/includes/layout/footer.php');
?>