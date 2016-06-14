<?php

if($_SERVER['REQUEST_METHOD'] == "GET")
{
  $json = file_get_contents('php://input');
  $obj = json_decode($json);
  //echo $json;
  //保存数据库
  $con = mysql_connect('localhost','root','') or die('Cannot connect to the DB');
  mysql_select_db('Test01',$con);
  mysql_query("INSERT INTO `TestA` (Username, Password)
  VALUES ('".$obj->{'Username'}."', '".$obj->{'Password'}."')");
  mysql_close($con);
  $posts = array(1);
  header('Content-type: application/json');
  echo json_encode(array('posts'=>$posts));
}

<?
//php获取ip的算法
if ($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"])
{
$ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
}
elseif ($HTTP_SERVER_VARS["HTTP_CLIENT_IP"])
{
$ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
}
elseif ($HTTP_SERVER_VARS["REMOTE_ADDR"])
{
$ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
}
elseif (getenv("HTTP_X_FORWARDED_FOR"))
{
$ip = getenv("HTTP_X_FORWARDED_FOR");
}
elseif (getenv("HTTP_CLIENT_IP"))
{ 
$ip = getenv("HTTP_CLIENT_IP");
}
elseif (getenv("REMOTE_ADDR"))
{
$ip = getenv("REMOTE_ADDR");
}
else
{
$ip = "Unknown";
}
echo "你的IP:".$ip ;
?>
/*
    function get_http_raw() {
     $raw = '';

     // (1) 请求行
     $raw .= $_SERVER['REQUEST_METHOD'].' '.$_SERVER['REQUEST_URI'].' '.$_SERVER['SERVER_PROTOCOL']."\r\n";

     // (2) 请求Headers
     foreach($_SERVER as $key => $value) {
        if(substr($key, 0, 5) === 'HTTP_') {
         $key = substr($key, 5);
         $key = str_replace('_', '-', $key);

         $raw .= $key.': '.$value."\r\n";
        }
     }

     // (3) 空行
     $raw .= "\r\n";

     // (4) 请求Body
     $raw .= file_get_contents('php://input');

     return $raw;
   }
   echo get_http_raw();
   */
   ?>
