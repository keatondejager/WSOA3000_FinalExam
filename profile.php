<?php 
define('TITLE', 'Profile | #WooliesWaterChallenge');
include ("includes/header.php"); 
?>

    <div class="container">

        <div class="row my-1">
            <div class="col-lg-8 col-md-10 col-sm-12 ">
                <div class="card w-100 " style="border-radius:0">
                    <div class="card-header bg-info">
                        <h3 class="card-title">My Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                            <div class="col-4">
                                <img src="assets/images/icons/avatar.png" alt="Profile Icon" style="width: 15vh; height:15vh;">
                            </div>
                            <div class="col-8 py-2 align-self-center">
                                <h5 class="card-text float-left"><strong>Username: </strong><?php echo $current_user ?></h5> 
                            </div>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card w-100" style="border-radius:0">
                    <div class="card-header">
                        <h5 class="card-title">My Posts:</h5>
                    </div>
                    <div class="card-body bg-inverse">
                        <div class="row pre-scrollable">
                            <div class="col-12">
                                <?php 
                                    foreach (array_reverse($all_messages) as $current) {
                                        if ($current->GetAuthor() == $current_user and $current->hasContent()) {
                                            $message = $current;
                                            include ("includes/message.php");
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
    $about = FALSE;
    $profile = TRUE;
    include ("includes/footer.php");
?>