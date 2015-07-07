<?php

require_once('./MoodleUsertool.php');

$utool = new MoodleUsertool('http://moodlehost.example.com', 'moodletoken');


// Tilmeld bruger til et hols, her hold med id = 2:
// $utool->enrolluser($utool->getTestenrollments($user->id, 2));

// Slet bruger:
// $res = $utool->deleteuser(array($user->id));


$testuser =  array(array('username' => 'minoko',
                   'password' => 'Password08!',
                   'firstname' => 'Mino',
                   'lastname' => 'Maximus',
                   'email' => 'maximus1234@example.com'));
$res = $utool->createuser($testuser);
print("Created: " . print_r($res, true));

$list = $utool->listuser('lastname', 'vladko');

if (is_object($list) && is_array($list->users)) {
    foreach ($list->users as $user) {
        print($user->id . ': ' . $user->email . "\n");
    }
} else {
    print("Some error..." . print_r($list, true));
}
