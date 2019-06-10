<?php 

include ('includes/database.php');

$user_logged_in = TRUE; //! Redundant for the current state of the project. Would have been used in the future for another plan for the website
$current_user = 'Subject #32';

$max_water = 250;
$max_likes = 1000;
readStatus();

//? Many of the User functions are not used. They were part of my original plan that I did not continue with.
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

//* This function reads the contents of status.csv to have the data persist between http requests. (And browser sessions)
function readStatus () {
    $status = fopen('assets/data/status.csv', 'r');
            $line = fgetcsv($status);
            $GLOBALS["water_level"] = $line[0];
            $GLOBALS["net_worth"] = $line[1];
    fclose($status);
}

//* This function saves the water and followers values to a csv to persist through the http requests. (And browser sessions)
function writeStatus () {
    $status = fopen("assets/data/status.csv", "w") or die ("Unable to open file!");
        $fields = array (
            strval($GLOBALS["water_level"]),
            strval($GLOBALS["net_worth"])
        );
        fputcsv($status, $fields);
    fclose($status);
}

//* This function adds a new message to the messages.csv file to have a database of all messages posted.
function PostMessage ($message, $user, $level) {
    $allMessagesFile = fopen('assets/data/messages.csv', 'a');

    $at = strftime("%T");

    $new_message = array ('\n' + $GLOBALS["water_level"], $user, $message, (string)$at, $level);

    fputcsv($allMessagesFile, $new_message);

    fclose($allMessagesFile);
}

?>

