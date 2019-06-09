

<div class="py-3 mt-3 container-fluid author" id="message-board">
    <div class="container-fluid bg-faded">
        <a href="profile.php" class="row align-items-center">
            <div class="col-lg-1 col-md-2">
                <img class="img-thumbnail float-left profile-icon" src="assets/images/icons/avatar.png" alt="Icon">
            </div>
            <div class="col-lg-10 col-md-9">
                <h3 class="text-muted profile-name" style="font-size:3vh;"><?php echo $current_user; ?></h3>
            </div>
        </a>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group" style="margin-top: 2vh; margin-bottom: 6vh;">
                <textarea class="form-control" name="user-message-input" rows="5" placeholder="Type your message here..."></textarea>
                <button class="btn btn-primary scale-animation-3" type="submit" style="float:right; min-width: 15%; margin-top:2vh;">Post</button>
            </div>
        </form>
    </div>            
</div>

<?php 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $message = test_input($_REQUEST['user-message-input']);
        //htmlspecialchars converts all html symbols such as < and > into their hex code equivalents to avoid XSS
        if (empty($message)) {
            return;
        } else {

            $message = Translate($message);
            $level = 0;
            if ($GLOBALS["water_level"] == 0) {
                $level = -1;
            } elseif ($GLOBALS["water_level"] > 100) {
                $level = 1;
            } 
            PostMessage($message, $current_user, $level);

            writeStatus();
            
            $package = new Message($current_user, $message, strftime("%T"), $level);
            array_push($GLOBALS['all_messages'], $package);
        }
    }

    function test_input($data) { 
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function Translate ($original) {

        if ($GLOBALS["water_level"] == 0) {
            $original = strtolower($original);
            $original = str_replace(array(".", ","), "", $original);

            $points = 0;
            foreach ($GLOBALS["sms_dictionary"] as $search) {
                $before = $original;
                $original = str_replace($search[0], $search[1], $original);
                if ($before != $original) {
                    $points++;
                }
            }
            $GLOBALS["net_worth"] -= $points;

        } else if ($GLOBALS["water_level"] > 100) {

            $original = strtolower($original);
            
            $points = 0;
            foreach ($GLOBALS["posh_dictionary"] as $search) {
                $before = $original;
                $original = str_replace($search[0], $search[1], $original);
                if ($before != $original) {
                    $GLOBALS["water_level"] -= 10;
                    $points++;
                }
            }     
            $GLOBALS["net_worth"] += 2 * $points;
            $words = str_word_count($original);
            $GLOBALS["net_worth"] += $words;

            
            $original = ucfirst($original);

        } else {
            $words = str_word_count($original);
            $GLOBALS["net_worth"] += $words;
            $GLOBALS["water_level"] -= $words;
        }

        if ($GLOBALS["net_worth"] < 0) {
            $GLOBALS["net_worth"] = 0;
        }

        return $original;
    }
?>