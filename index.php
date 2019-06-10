<?php
    define('TITLE', '#WooliesWaterChallenge');
    include("includes/header.php");
?>

<?php 

    //? PHP handling post requests when the user buys water
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["sparkling"]) ) {
            readStatus();
            if ($GLOBALS["net_worth"] >= 50) {
                $GLOBALS["net_worth"] -= 50;
                $GLOBALS["water_level"] += 75;
            }
            writeStatus();
        } elseif (isset($_POST["still"])) {
            readStatus();
            if ($GLOBALS["net_worth"] >= 25) {
                $GLOBALS["net_worth"] -= 25; 
                $GLOBALS["water_level"] += 50;
            }
            writeStatus();
        }

        if ($GLOBALS["net_worth"] < 0) {
            $GLOBALS["net_worth"] = 0;
        } elseif ($GLOBALS["water_level"] > $GLOBALS["max_water"]) {
            $GLOBALS["water_level"] = $GLOBALS["max_water"];
        }
    }

?>

<div class="container-fluid"> <!-- This holds all of the content on the page. -->

    <div class="row justify-content-center">

        <!-- Column for content -->
        <div class="col-lg-6 col-md-6 col-sm-8 content-column">
            <div class="container">
                <div class="row">
                    <div class="col-10 offset-1">
                        <?php 
                            include("includes/post.php");
                        ?>
                    </div>
                </div>
                <div style="width:100%; height: 2vh;"></div>
                <div class="row pre-scrollable">
                    <div class="col-10 offset-1">
                        <?php 
                            //? Looping through all messages retrieved from the csv file and displaying them 
                            foreach (array_reverse($all_messages) as $message) {
                                if ($message->hasContent()) {
                                    //? Printing each message into the message board (only if they have content to not print blanks)
                                    include ("includes/message.php");
                                }
                            }  
                        ?> 
                    </div>
                </div>
            </div>
        
        </div>

        <!-- Column for ads -->
        <div class="col-lg-3 col-md-4 col-sm-12 offset-lg-1 offset-md-0 advert-column text-light">
            <div class="container-fluid">
                <div class="row align-content-center py-5">
                    <div class="col-12 align-self-center">
                        <div class="card w-100 shadow-2-dark bg-dark" style="border-radius:0; height:25vh">
                            <div class="card-body">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                    <h6 class="card-title">Woolworths Still Water [+50 &#10052;]</h6>
                                    <button class="btn btn-block btn-success scale-animation-2" name="still" type="submit">Buy (25 &#9924;)</button>

                                    <h6 class="card-title">Woolworths Sparkling Water [+75 &#10052;]</h6>
                                    <button class="btn btn-block btn-success scale-animation-2" name="sparkling" type="submit">Buy (50 &#9924;)</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>    
                <div class="w-100"></div>
                <div class="row align-content-center py-5">
                    <div class="col-12 align-self-center">
                    <div class="card w-100 shadow-2-dark bg-dark" style="border-radius:0; height:18vh">
                            <div class="card-body">
                                <strong><?php echo $GLOBALS["net_worth"] ?> Followers (&#9924;)<!--Snowman Icon--></strong>
                                <div class="progress my-1">
                                <!-- In the PHP below, I am printing percentages to the width value as a percentage to display it in a scale across the screen-->
                                    <div class="progress-bar bg-primary text-dark" style="width: <?php echo ( ($GLOBALS["net_worth"]) / $GLOBALS["max_likes"] * 100)  ?>%" 
                                        role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <strong><?php echo $GLOBALS["water_level"] ?>ml (&#10052;)<!--Snowflake Icon--></strong>
                                <div class="progress my-1">
                                    <div class="progress-bar bg-dark text-white" style="width: <?php echo ($GLOBALS["water_level"] / $GLOBALS["max_water"] * 100) ?>%" 
                                        role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="w-100 d-block"></div>
                <div class="row align-content-end py-5" >
                    <div class="col-12 align-self-baseline">
                    <div class="card w-100 shadow-2-dark bg-dark" style="border-radius:0;">
                            <div class="card-body">
                                <h5 class="card-title text-center" id="ad-bottom">#WooliesWaterChallenge</h5>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    
</div>



<?php
    include("includes/footer.php");
?>