<?php


$url = "https://randomuser.me/api/?results=2";

//header("Content-Type: application/json; charset=utf-8");
$o = getUsers(3);

echo $o['results'][0]['name']['first'] . ' ' . $o['results'][0]['name']['last'];
echo '<pre>'; print_r($o); echo '</pre>';

function getUsers(int $num)
{   
    $defaults = array(
        CURLOPT_URL => 'https://randomuser.me/api/?results=' . $num,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_TIMEOUT => 4,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => 0
    );
   
    $ch = curl_init();

    curl_setopt_array($ch, $defaults);
    
    if( ! $result = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    }
    
    curl_close($ch);
    
    return json_decode($result, 1);
}
