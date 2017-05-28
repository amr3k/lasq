<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo $public . 'index.php';?>"><?php echo lang('NAV_BRAND');?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav">
            <?php if(isset($sId)){ ?>
          <li><a href="<?php echo admin . 'dashboard.php';?>"><?php echo lang('NAV_DASH');?></a></li>
          <li><a href="<?php echo admin . 'dashboard.php?do=members';?>"><?php echo lang('NAV_MMBR');?></a></li>
          <li><a href="<?php echo admin . 'dashboard.php?do=pastes';?>"><?php echo lang('NAV_PASTES');?></a></li>
          <?php } ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo $public . 'add.php';?>"><?php echo lang('NAV_ADD');?></a></li>
            <li><a href="<?php echo $public . 'explore.php';?>"><?php echo lang('NAV_EXPLORE');?></a></li>
<!-- Language #################################################################################-->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <?php echo lang('NAV_LANG');?>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="lang.php?lang=ar"><?php echo lang('NAV_AR');?></a></li>
                  <li><a href="lang.php?lang=en"><?php echo lang('NAV_EN');?></a></li>
                </ul>
            </li>
<!-- Right navigation items #################################################################################-->
        <?php ?>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <?php if(isset($sId) && $sId != NULL){echo $sUser;}else{echo lang('NAV_GUEST');}?>
              <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
                <?php if (isset($sId)){ ?>
            <li><a href="<?php echo admin . 'dashboard.php?do=settings';?>"><?php echo lang('NAV_SETTINGS');?></a></li>
            <li><a href="<?php echo admin . 'logout.php';?>"><?php echo lang('NAV_LOGOUT');?></a></li>
                <?php }else{ ?>
            <li><a href="<?php echo admin . 'index.php';?>"><?php echo lang('NAV_LOGIN');?></a></li>
                <?php } ?>
          </ul>
        </li>
        <?php ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
