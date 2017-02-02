<?php session_start();
      require_once('../../../Main/conf.php');
      $text_id=3;
      $selq    = "SELECT `title` , `text` FROM `members_text` WHERE `id` = '$text_id'";
      $selq    = mysqli_query($db,$selq);
      $res     = mysqli_fetch_assoc($selq);
      $title   = $res['title'];
      $text    = $res['text'];
      require_once('../../../Base/html/view/container.php');
      dbc();
      