
<div class="row justify-content-start py-2">

    <div class="col-lg-10 col-md-10 col-sm-12 offset-lg-1 offset-md-1">
        <div class="card shadow-2 border-0" style="border-radius: 0;">
            <div class="card-header <?php 
            if ($GLOBALS["current_user"] == $message->GetAuthor() ){
                echo "author";
            }
            ?>">
                <a href=<?php echo"\"#\"" ?> class="row align-items-center scale-animation-2">
                    <div class="col-lg-1 col-md-2">
                        <img class="img-thumbnail float-left profile-icon" src="assets/images/icons/avatar.png" alt="Icon">
                    </div>
                    <div class="col-lg-10 col-md-9">
                        <h3 class="text-muted profile-name" style="font-size:3vh;"><?php echo $message->GetAuthor(); ?></h3>
                        <p class="text-muted"><?php echo $message->GetTime(); ?></p>
                    </div>
                </a>
            </div>
            <div class="card-body">
                <div class="container">
                    <p id="message-content"><?php  echo($message->GetMessage());?></p>
                </div>
            </div>
            <div class="card-footer <?php            
            $class = "";
            switch ($message->GetLevel()) {
                case -1:
                    $class =  "bg-bad";
                    break;
                case 0:
                    $class =  "bg-normal";
                    break;
                case 1:
                    $class =  "bg-good";
                    break;
            }
            echo $class;
            ?>">
                <img src="assets/images/icons/like.png" style="max-height:3vh; max-width:3vh;" alt="Like" class="button-animation">
                <img src="assets/images/icons/dislike.png" style="max-height:3vh; max-width:3vh;" alt="Dislike" class="button-animation">
                <img src="assets/images/icons/share.png" style="max-height:3vh; max-width:3vh;" alt="Share" class="button-animation">
            </div>
        </div>
    </div>

</div>