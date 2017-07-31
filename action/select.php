<?php

  include 'connect/connect.php';
  date_default_timezone_set('Asia/Taipei');//設定時間為台北

  if (isset($_GET["project"])) {//如果有選擇日期$datetime就等於選擇的值,下拉會用到
    if ($_GET["project"] == "all") {
      $project = "1";
    }else {      
      $project = "`project`= '".$_GET["project"]."'";
    }
  }else {
    $project = "1";
  }

  //以品項當條件,取得全部資料
  $Select = "SELECT * FROM `recycle` WHERE $project";
  $Query = $db->query($Select);
  $Display = $Query->fetchAll();
  //以品項當條件,取得全部資料

  //下拉顯示品項,Group by品項有重複值只會顯示一筆
  $SeProject = "SELECT `project` FROM `recycle` GROUP BY project";
  $QuProject = $db->query($SeProject);
  $DisProject = $QuProject->fetchAll();
  //下拉顯示品項,Group by品項有重複值只會顯示一筆

 ?>
