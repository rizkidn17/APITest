<?php

require_once __DIR__ . '/config.php';

class API{
    function ReadData(){
        $db = new Connect();
        $users = array();
        $data = $db->prepare('SELECT * FROM users ORDER BY id');
        $data->execute();

        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
            $users[$output['id']] = array(
                'id' => $output['id'],
                'name' => $output['name'],
                'age' => $output['age']

            );
        }
        return json_encode($users);
    }
}

$API = new API;
header('Content-Type: application/json');
echo $API->ReadData();

?>