<?php 

include ('includes/database.php');

$user_logged_in = TRUE;
$current_user = 'Subject #32';

$max_water = 250;
$max_likes = 1000;
readStatus();

function SetActiveUser ($username, $password) {
    $search_result = array_search($username, $usernames);
    if ($search_result == FALSE) {
        return "User Not Found.";
    } else {
        $user = $users[$search_result];
        $user_logged_in = TRUE;
        $current_user = $user;
    }
}

function readStatus () {
    $status = fopen('assets/data/status.csv', 'r');
            $line = fgetcsv($status);
            $GLOBALS["water_level"] = $line[0];
            $GLOBALS["net_worth"] = $line[1];
    fclose($status);
}

function writeStatus () {
    $status = fopen("assets/data/status.csv", "w") or die ("Unable to open file!");
        $fields = array (
            strval($GLOBALS["water_level"]),
            strval($GLOBALS["net_worth"])
        );
        fputcsv($status, $fields);
    fclose($status);
}

function PostMessage ($message, $user, $level) {
    $allMessagesFile = fopen('assets/data/messages.csv', 'a');

    $at = strftime("%T");

    $new_message = array ('\n' + $GLOBALS["water_level"], $user, $message, (string)$at, $level);

    fputcsv($allMessagesFile, $new_message);

    fclose($allMessagesFile);
}

?>

