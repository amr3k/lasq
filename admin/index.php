<?php
$pagetitle  =   'Index';
require_once 'init.php';
if(isset($sId)){
    echo '<meta http-equiv="refresh" content="0; URL= \'dashboard.php\'"/>';
}
if($get_do === 'login'){
    if(empty($post_user) || empty($post_pass)){
        echo '<meta http-equiv="refresh" content="3; URL= \'index.php\'"/> ';
        echo '<div class="alert alert-success">'.lang('FORM_V_INPUT_ALL_REQ');
    }else{
        if(login_v($post_user,$post_pass) === TRUE){
            echo '<meta http-equiv="refresh" content="2; URL= \'dashboard.php\'"/> '.'</div>';
            $fd  =   search_db('id', 'users',"WHERE `user` = '$post_user'");
            $user_id    =   $fd['id'];
            setcookie('lasq',"", time()-2592000);
            setcookie('lasq',$user_id, time()+2592000,'/');
            session_unset();
            $_SESSION['userName']   =   $post_user;
            $_SESSION['userId']     =   $user_id;
            echo '<div class="container"><div class="alert alert-success h2 text-center">'.lang('FORM_MSG_SCS').'</div></div>';
        }else {
            echo '<meta http-equiv="refresh" content="5; URL= \'index.php\'"/> ';
            foreach ($err as $error) {
                echo '<div class="container"><div class="alert alert-danger h2 text-center">' . $error . '</div></div>';
            }
        }
    }
}
elseif($get_do == NULL) {
?>
<div class="container">
    <div class="alert alert-warning h1 text-center"><?php echo lang('ADMIN_INDEX_REG_OFF');?></div>
    <h1 class="text-center"><?php echo lang('ADMIN_INDEX_HDR1');?></h1>
    <h3 class="text-center"><?php echo lang('ADMIN_INDEX_HDR2');?></h3>
    <form action="?do=login" method="POST" class="form-horizontal login text-center">
        <div class="form-group form-group-lg">
            <label for="user" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php echo lang('FORM_USER_NAME');?></label>
            <div class="col-lg-3 col-md-3 col-sm-0 col-xs-0"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <input type="text" class="form-control" id="user" name="user" autocomplete="off" autofocus="" required=""/>
            </div>
        </div>
        <div class="form-group form-group-lg">
            <label for="pass" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php echo lang('FORM_USER_PASS');?></label>
            <div class="col-lg-3 col-md-3 col-sm-0 col-xs-0"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <input type="password" class="form-control" id="pass" name="pass" autocomplete="off" required="" />
            </div>
        </div>
        <div class="form-group form-group-lg">
            <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php echo lang('FORM_RECAPTCHA_LBL');?></label>
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-1"></div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 text-center g-recaptcha" data-sitekey="6LerhxkUAAAAAN2V5BeAIybULX1QL6g_WEOwOIdA"></div>
        </div>
        <div class="form-group form-group-lg">
            <div class="col-xs-2 col-sm-3 col-md-4 col-lg-5"></div>
            <div class="col-xs-8 col-sm-6 col-md-4 col-lg-2">
                <input class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="<?php echo lang('FORM_LOGIN_BTN')?>">
            </div>
        </div>
    </form>
</div>
<?php
}
else{
    //header('location:index.php');
}
require_once tmp . 'footer.php';
ob_flush();
?>