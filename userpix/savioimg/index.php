<?php
  // This simple script displays a specific user picture.
  // By default it is not linked anywhere on the site.  If you want to
  // make it available you should link it in yourself from somewhere.

require('../../config.php');

$username = optional_param('username', 'guest', PARAM_USERNAME);
$hash = optional_param('hash', null ,PARAM_TEXT);

$PAGE->set_url('/userpix/savioimg/index.php', array('username' => $username, 'hash' => $hash));

//Check app hash using SAVIO_img app
$json = file_get_contents('http://localhost:8080/apps/hash/'.$hash); // http request
$data = json_decode($json);

if($data == "true"){
    $user = $DB->get_record('user', array('username'=>$username));
    if ($user) {
        $userpic = new user_picture($user);

        $userpic->size = 100; // size of image
        $userpic->link = false; // make image clickable - the link leads to user profile

        echo $OUTPUT->render($userpic);
    } else {
        echo json_encode("El usuario no existe");
    }

}else{
    echo json_encode("Acceso no permitido");
}
