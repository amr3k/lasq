<?php
if(isset($get_do)){
    $pagetitle  =   $get_do;
}else {
    $pagetitle  =   'Dashboard';
}
require_once 'init.php';
if(!isset($sId)){
    die('<meta http-equiv="refresh" content="0; url=\'index.php\'" />');
}
else{
    if($get_do === 'members'){
        echo '<br><h1 class="text-center">'.lang("SOON").'</h1>';
    }
    elseif($get_do === 'pastes') {
        if(!isset($get_page) || $get_page == 0 || $get_page == NULL){
                $get_page = 1;
            }
        $pc     =   search_db('COUNT("id")', 'pastes');
        $count  =   $pc['COUNT("id")'];
        if($count == 0){
            header('location: dashboard.php');
        }else {
            $pagecontent    =   10;
            $pages  = ceil($count/$pagecontent);
        if($get_page > $pages){
?>
<meta http-equiv="refresh" content="0; url='?do=pastes&page=<?php echo $pages;?>'" />
<?php
        }
?>
<div class="container">
    <div class="text-center btn-block">
        <a href="?do=pastes">
            <div class="text-center btn btn-success btn-lg"><?php echo lang('PASTES_HDR1');?></div>
        </a>
    </div>
    <h3 class="h3 text-center"><?php echo lang('OR');?></h3>
    <form class="form-group-lg" action="?do=pastes" method="GET">
        <input type="hidden" name="do" value="pastes" />
        <input type="hidden" name="page" value="1" />
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                <input type="text" name="search" class="form-control" 
                       placeholder="<?php echo lang('PASTES_PLCHLDR');?>">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                <input type="submit" class="btn btn-primary btn-lg" value="<?php echo lang('FORM_SEARCH_BTN'); ?>" />
            </div>
        </div>
    </form>
</div>
<?php
            }
        if(isset($get_search)){
            echo '<div class="container">';
            $pagetitle  =   'Search results';
            if($get_page == 0 || $get_page == NULL){
                $get_page = 1;
            }
            $pagecontent    =   10;
            $srq    =   search_db('COUNT("id")', 'pastes', "WHERE `title` LIKE '%$get_search%'");
            $count  =   $srq['COUNT("id")'];
            if($count == 0){
                echo '<div class="alert alert-danger text-center">' . lang("DB_NO_RESULT") . "</div>";
            }else {
            $pages  =   ceil($srq['COUNT("id")']/$pagecontent);
            $min    =   ($get_page  - 1) * $pagecontent;
            $max    =   $pagecontent;
            $dq     =   $con->query("SELECT * FROM `pastes` WHERE `title` LIKE '%$get_search%' ORDER BY `id` DESC LIMIT $min,$max");
            $fd     =   $dq->fetchAll();
            $i      =   $min+1;
            if($get_page > $pages){
?>
<meta http-equiv="refresh" content="0; url='?do=pastes&page=<?php echo $pages;?>'" />
<?php
        }
?>
<div class="container">
<div class="table-responsive">
        <table class="main-table text-center table table-bordered">
            <tr>
                <td><?php echo lang('PASTES_TBL_TOP_ROW1'); ?></td>
                <td><?php echo lang('PASTES_TBL_TOP_ROW2'); ?></td>
                <td><?php echo lang('PASTES_TBL_TOP_ROW3'); ?></td>
                <td><?php echo lang('PASTES_TBL_TOP_ROW4'); ?></td>
                <td><?php echo lang('PASTES_TBL_TOP_ROW5'); ?></td>
            </tr>
<?php 
	foreach ($fd as $user_data){
		$title		=	$user_data['title'];
		$date		=	$user_data['date'];
		$time		=	$user_data['time'];
		$userId         =	$user_data['userId'];
		$userd          =       search_db('user', 'users', "WHERE id = '$userId'");
                $usern          =       $userd['user'];
                $datetime       =       $date . ' ' . lang('AT') . ' ' . $time;
                $stamp          =       $user_data['stamp'];
                $url            =       $user_data['url'];
?>
<tr class='tbltr'>
	<td><?php echo $i;?></td>
	<td><?php echo "<a href='$url' target='_blank'>".$title."</a>";?></td>
	<td><?php echo $datetime;?></td>
	<td><?php echo $usern;?></td>
	<td>
            <a href="?do=delete&stamp=<?php echo $stamp; ?>"class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></i> <?php echo lang('DELETE');?></a>
	</td>
</tr>
<?php
		$i++;
	}
?>
        </table>
    </div>
    <nav class="text-center" aria-label="...">
      <ul class="pagination">
          <li>
              <?php if($get_page > 1){ ?>
              <a href="<?php echo '?do=pastes&page='.($get_page-1).'&search='. $get_search;?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
                  <?php }?>
          </li>
    <?php
          for($i=1;$i<=$pages;$i++){

    ?>
          <li class="<?php if($i==$get_page){echo 'active';}?>">
              <a href="<?php echo "?do=pastes&page=".$i.'&search='. $get_search;?>"><?php echo $i;?> 
                  <span class="sr-only"></span>
              </a>
          </li>
    <?php
          }
    ?>
    <li>
        <?php if($get_page < $pages){ ?>
        <a href="<?php echo '?do=pastes&page='.($get_page+1)?>.'&search='. $get_search" aria-label="Next" >
            <span aria-hidden="true">&raquo;</span>
        </a>
            <?php }?>
    </li>
      </ul>
    </nav>
</div>
<?php  
            }
            echo '</div>';
        }
    }
    elseif($get_do === 'delete' && isset ($get_stamp)){
        echo '<div class="container text-center">';
            if(search_db('`id`', '`pastes`',"WHERE `stamp` = '$get_stamp'") !== FALSE){
                $del    =   $con->prepare("DELETE FROM `pastes` WHERE `stamp` = '$get_stamp'");
                $del->execute();
                if ($del->rowcount() == 1){
                    $filedelete = unlink($public . 'p/' . $get_stamp . '.php');
                    $filetxtdelete  = unlink($public . 'p/' . $get_stamp . '.txt');
                    echo "<div class='alert alert-success'>" . lang('PASTES_DEL_SUCCESS') . '</div>';
                    echo '<meta http-equiv="refresh" content="2; url=\'dashboard.php?do=pastes\'" />';
                }else {
                    echo "<div class='alert alert-danger'>" . lang('ERROR') . '</div>';
                    echo '<meta http-equiv="refresh" content="3; url=\'dashboard.php?do=pastes\'" />';
                }
            }else{
                echo "<div class='alert alert-danger'>" . lang('DB_NO_RESULT') . '</div>';
                echo '<meta http-equiv="refresh" content="3; url=\'dashboard.php?do=pastes\'" />';
                echo $get_stamp;
            }
        echo '</div>';
    }
    elseif ($get_do === 'settings') {
        echo '<br><h1 class="text-center">'.lang("SOON").'</h1>';
    }
    elseif ($get_do == NULL) {
?>
<div class="container dashboard-stats">
    <h1 class="text-center"><?php echo lang('ADMIN_DASH_MAIN_HDR1');?></h1>
    <div class='row'>
        <div class="col-xs-0 col-sm-0 col-md-1 col-lg-2"></div>
        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
            <a href="dashboard.php?do=members">
            <div class="stat text-center">
                <?php echo lang('ADMIN_DASH_MAIN_STAT1'); ?>
                <span><?php echo search_db('COUNT("id")', 'users',NULL)['COUNT("id")'];?></span>
            </div>
        </a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
        <a href="dashboard.php?do=pastes">
            <div class="stat text-center">
                <?php echo lang('ADMIN_DASH_MAIN_STAT2'); ?>
                <span><?php echo search_db('COUNT("id")', 'pastes', NULL)['COUNT("id")'];?></span>
            </div>
        </a>
        </div>
        <div class="col-xs-0 col-sm-0 col-md-1 col-lg-2"></div>
    </div>
</div>
<?php   
    }
    else {
        header('location:dashboard.php');
    }
}
require_once tmp . 'footer.php';
ob_flush();
?>