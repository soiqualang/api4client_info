<?php
// header('Location: /', true, 303);
require('cross.php');
require('UserInfo.php');

function Get_Client_IP(){
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    // return $ipaddress;
    echo '{"ipaddress":"'.$ipaddress.'"}';
}

function client_info(){
    $log = array(
      'ip' => $_SERVER['REMOTE_ADDR'],
      'ipw' => UserInfo::get_ip(),
      'device' => UserInfo::get_device(),
      'os' => UserInfo::get_os(),
      'browser' => UserInfo::get_browser(),
      're' => $_SERVER['HTTP_REFERER'],
      'ag' => $_SERVER['HTTP_USER_AGENT'],
      'ts' => date("Y-m-d h:i:s",time())
    );
    
    echo json_encode($log);
}

//Get_Client_IP();
client_info();
?>