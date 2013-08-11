<?php 
include_once 'include/this_alot.php.inc'; 
include_once 'include/util.php.inc';

$config = read_config();

//Id is required
$id = NULL;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if ($id) {
    //Get a copy of the db
    $db = $config->mkdb();
    
    //Generate the url to this alot
    $alot_url = $config->alot_url($id);
    
    //must find alot    
    $row = $db->get_alot($id);
    if ($row === FALSE) {
        $config->error(404, 'alot not found');
    } else {
        show_alot($row);
    }
} else {
    echo 'Which alot!?!? THERE ARE SO MANY!';
}