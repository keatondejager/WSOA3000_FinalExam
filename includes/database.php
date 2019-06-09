<?php
    
    date_default_timezone_set("Africa/Harare");


    $messagesFile = fopen('assets/data/messages.csv', 'r');
    $firstMessage = new Message('Message Board Bot', 'This is the start of the message board');
    $all_messages = array ( $firstMessage );

    while (!feof($messagesFile)) {
            $line = fgetcsv($messagesFile);
            
            if (sizeof($line) > 0) {
                $item = new Message($line[1], $line[2], $line[3], $line[4]);
                array_push($all_messages, $item);
            }
    }

    fclose($messagesFile);
    
    $admin = new User ('admin', '1234', 'Keaton', 'de Jager');
    
    //$admin->PostMessage("Hello, World!");
    

    $users = array (
        $admin
    );

    
    //Many of the SMS phrases are from memory or made up. If they aren't as you recall them, sorry.
    $sms_dictionary = array (
            array (array ("what are you doing", "what you doing", "would"), "wud"),
            array (array ("what do you want to talk about", "what you want to talk about", "what you wanna talk about"), "wuwta"),
            array ("though", "tho"),
            array (array ("through", "threw"), "thru"),
            array ("yeah", "ye"),
            array (array("you", "thou"), "u"),
            array ("night", "nite"),
            array ("that", "tht"),
            array ("what", "wat"),
            array ("why", "y"),
            array ("doing", "doin"),
            array ("love", "luv"),
            array ("hate", "h8"),
            array ("wait", "w8"),
            array ("intelligent", "smart"),
            array ("good", "gud"),
            array (array("one", "won"), "1"),
            array (array("two", "too", "to"), "2"),
            array ("three", "3"),
            array (array("four", "for", "fore"), "4"),
            array ("five", "5"),
            array ("six", "6"),
            array ("seven", "7"),
            array (array("ate", "eight"), "8"),
            array ("nine", "9"),
            array ("ten", "10"),
            array ("eleven", "11"),
            array ("twelve", "12"),
            array ("thirteen", "3teen"),
            array ("fifteen", "5teen"),
            array ("twenty", "20"),
            array (array ("on my way", "oh my word"), "omw"),
            array ("great", "gr8"),
            array (array("fun ", "enjoyable ", "entertaining ", "well-done "), "lit "),
            array (array("family", "bro"), "fam"),
            array (" do ", " "),
            array ("above", "^^"), 
            array ("2 much information", "tmi"),
            array ("address", "adr"),
            array ("because", "cuz"),
            array ("come on", "cmon"),
            array ("the ", "da "),
            array ("easy", "ez"),
            array (array("have", "hath"), "hv"),
            array (" had ", " hd"),
            array ("could", "cud"),
            array ("level", "lvl"),
            array ("friend", "fnd"),
            array (" be ", " b "),
            array ("ready", "rdy"),
            array ("know ", "no ")
    );
    // Many of the posh phrases are from https://mentalfloss.com/article/53529/56-delightful-victorian-slang-terms-you-should-be-using
    $posh_dictionary = array (
        array ("i love you", "I have immense levels of infatuation for thou'n existence."),
        array ("you need me", "thou doth require from me immediate"),
        array ("you need", "thou doth require immediate"),
        array ("your body", "the vessel in which you exist'th"),
        array ("want", "desire"),
        array (array("put it together", "put together", "join"), "amalgamate"),
        array (array(" you ", " u "), " thou "),
        array (array("you ", "thou ")),
        array ("wins", "takes the egg"),
        array (array("suggest", "prompt"), "suggestionize"),
        array ("win ", "take the egg "),
        array ("haven't", "have not"),
        array ("have", "hath"),
        array ("need", "require"),
        array ("could", "be capable of"),
        array (" sun", " entity driving the process of photosynthesis"),
        array ("does", "doth"),
        array ("curtains", "drapes"),
        array ("words", "diction and articulation"),
        array ("smart", "afternoonified"),
        array (array ("perfect", "complete", "unapproachable"), "bang up to the elephant"),
        array (array ("extravagance", "fancy", "over the top"), "butter upon bacon"),
        array ("lie to", "sell the dog to"),
        array ("tight pants", "gas-pipes"),
        array ("pants", "pantelounes"),
        array ("excited", "mad as hops"),
        array ("policeman", "mutton shunter"),
        array ("speak", "articulate"),
        array ("repeated", "recursive"),
        array ("tv ", "television "),
        array ("cud", "could"),
        array ("lvl", "level"),
        array ("fnd", "friend"),
        array ("friend", "chuckaboo"),
        array ("mouth", "sauce-box"),
        array ("figth", "shake a flannin"),
        array (" b ", " be "),
        array ("rdy", "ready"),
        array ("umbrella", "rain napper"),
        array ("fail ", "shoot into the brown "),
        array (array ("unwell", "not well"), "not up to dick"),
        array (array("secret", "shady", "doubtful"), "skilamalink"),
        array ("hand", "daddle"),
        array ("we ", "as ourselves "),
        array ("fun ", "nanty narking"),
        array ("thing", "phenomenon"),
        array ("talk", "communicate"),
        array ("change", "adjust"),
        array (" me ", " the being that is I, "),
        array ("show", "display"),
        array ("being", "continuous existence"),
        array ("smiling face", "gigglemug"),
        array ("lorem ipsum", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non odio quis leo consectetur iaculis. Aenean cursus ligula eget nibh dignissim congue. Maecenas iaculis augue justo, vel malesuada ligula sodales eget. Aliquam commodo felis lacus, at pulvinar odio mollis non. Suspendisse ante odio, molestie in nibh sit amet, aliquet blandit enim. Aliquam vestibulum risus erat, id venenatis orci finibus non. Donec faucibus vestibulum tortor. Fusce tincidunt, mauris in convallis varius, elit felis convallis tortor, ac placerat turpis augue id turpis. Pellentesque sit amet elit id dolor mollis commodo at viverra lorem. Mauris sed sagittis nibh, ac pharetra purus. Fusce tempor tempor volutpat."),
        array ("i ", "I ")
    );


    class User {
        private $username, $password, $firstname, $surname;

        private $messages = array();

        public function __construct ($username, $password, $firstname, $surname) {
                $this->username = $username;
                $this->password = $password;
                $this->firstname = $firstname;
                $this->surname = $surname;
                
                // array_push($GLOBALS['usernames'], $username);
        }

        public function GetUsername () {
                return $this->username;
        }

        public function SetUsername ($newUsername) {
                $this->username = $newUsername;
        }

        public function SetPassword ($newPassword, $again) {
                if ($newPassword != $again) {
                        return FALSE;
                } else {
                        $this->password = $newPassword;
                        return TRUE;
                }
        }

        public function PostMessage ($content) {
                $message = new Message ($this->username, $content);
                
                array_push($this->messages,$message);
                
                array_push($GLOBALS['all_messages'], $message);
                
        }


    }

    class Message {
        private $posted_by, $message_content, $posted_at;
        public $level = 0;
        
        public function __construct ($author, $content, $at = '0', $level = 0) {
                if ($at == '0') {
                        $at = strftime("%T");
                }
                $this->posted_by = $author;
                $this->message_content = $content;
                $this->posted_at = $at;
                $this->level = $level;
        }

        public function GetMessage () {
                return $this->message_content;
        }

        public function GetAuthor () {
                return $this->posted_by;
        }

        public function GetTime() {
                return $this->posted_at;
        }

        public function GetLevel () {
                return (int)$this->level;
        }

        public function hasContent () {
                return sizeof($this->posted_by) > 0;
        }
    }

?> 

