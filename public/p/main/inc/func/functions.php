<?php
function getTitle(){
	global $pagetitle;
	if (isset($pagetitle)){
		echo $pagetitle;
	}else {
		echo lang('PAGE_TTL');
	}
}
function search_db($column,$table,$condition = NULL,$sort = 'ORDER BY `id` DESC') {
    global $con;
    if ($condition === NULL){
        $condition = 'WHERE `id` >= 0';
    }
    $q  =   $con->prepare("SELECT $column FROM $table $condition $sort");
    $q->execute();
    if($q->rowcount() > 0){
        $fd =   $q->fetch(PDO::FETCH_OBJ);
        return $fd;
    }else{
        return FALSE;
    }
}
function stamp($table,$length = 10){
    $x  =   '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $stamp  = substr(str_shuffle(str_repeat($x, $length)),0,$length);
    $unique =   search_db('stamp', $table, "WHERE `stamp` = '$stamp'");
    if($unique === FALSE){
        return $stamp;
    } else {
        stamp($table);
    }
}
function login_v($user,$pass){
    /*
    global $user_regex;
    global $pass_regex;
    */
    global $err;
    $passq  =   search_db("pass","users","WHERE `user` = '$user'");
    if($passq !== FALSE){
        $sqlpass    =   $passq['pass'];
        if (password_verify($pass, $sqlpass) === TRUE) {
            return TRUE;
        }else{
            $err[]  =  'wrong pass';
            return FALSE;
        }
    }else{
        $err[]  =   'User doesn\'t exist';
        return FALSE;
    }
    /*
    if (preg_match($user_regex, $user) === true){
        if(preg_match($pass_regex, $pass) === true){
                
        } else {
            $err[]  =   lang('FORM_V_PASS_REGEX');
        }
    }else {
        $err[]  =   lang('FORM_V_USER_REGEX');
    }
    */
    if (isset($err)){
        return $err;
    }
}
function recaptcha(){
    global $post_recaptcha;
    $curl   = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER  =>  1,
        CURLOPT_URL =>  'https://www.google.com/recaptcha/api/siteverify',
        CURLOPT_POST    =>  1,
        CURLOPT_POSTFIELDS  =>  [
            'secret'    =>  '6LerhxkUAAAAAFYWh_XV_3lPAurUstukxWp2SRnr', // Type your own reCAPTCHA API secret key
            'response'  =>  $post_recaptcha,
            'remoteip'  =>  ''
        ]
    ]);
    $response   = json_decode(curl_exec($curl));
    if($response->success){
        return TRUE;
    }else{
        return FALSE;
    }
}
function createFile($filename,$data){
        $filecreation   = fopen($filename, 'w+');
        if($filecreation){
            $write  = fwrite($filecreation,$data);
            if($write){
                return TRUE;
            }else{
                return FALSE;
            }
            fclose($filecreation);
        }else {
            return FALSE;
        }
    }
function insert_paste ($stamp,$filename,$data,$title,$userId) {
    global $con;
    global $date;
    global $time;
    global $err;
    //if(recaptcha() == TRUE){
        if (createFile($filename,$data) === TRUE){
            $stmt   =   $con->prepare("INSERT INTO `pastes` "
                    . "(`title`, `date`, `time`, `stamp`,`userId`,`url`)"
                    . "VALUES (?,?,?,?,?,?)");
            $stmt->execute([
                $title,$date,$time,$stamp,$userId,$filename
            ]);
            if($stmt->rowcount() == 1){
                return TRUE;
            }else {
                $err[] =   lang('DB_ERR');
            }
        }else {
            $err[] =   lang('PUB_ADD_ERR_FILE1');
        }
    /*}else{
        $err[]  =   lang('FORM_V_RECAPTCHA');
    }*/
    if (isset($err)){
        return $err;
    }
}