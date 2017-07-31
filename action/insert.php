<?php
  include '../connect/connect.php';

  //值存入指定變數
  $Project = $_POST["project"];//項目
  $Weight = trim($_POST["weight"]);//重量
  $Purchase = isset($_POST["purchase"])? True:False;//進貨
  $Shipments = isset($_POST["shipments"])? True: False;//出貨

  date_default_timezone_set('Asia/Taipei');//設定時間為台北
  $datetime = date("Y-m-d H:i:s");;//時間


  //確認是否都有值or都不為空
  $true = isset($Project) && !empty($Project)&&
          isset($Weight) && !empty($Weight);
  //確認是否都有值or都不為空

  if ($Purchase == true) {//進貨
    $status = "進貨";
    status($db, $true, $Project, $Weight, $status, $datetime);

  }else if($Shipments == true){//出貨
    $status = "出貨";
    status($db, $true, $Project, $Weight, $status, $datetime);
  }

  function status($db, $true, $Project, $Weight, $status, $datetime){
    if ($true == true) {

      $SqlInsert = "
                    INSERT INTO `recycle`(
                      `project`, `weight`, `status`, `datetime`
                      ) VALUES (
                        '".$Project."', '".$Weight."', '".$status."', '".$datetime."'
                        )
                    ";
      $TrueQu = $db->query($SqlInsert);

      if ($TrueQu) {
        echo "
              <script>
                alert('$status'+'成功');
                document.location.href='../index.php';
              </script>
              ";
      }
    }else {
      echo "
            <script>
              alert('賣亂');
              document.location.href='../index.php';
            </script>
            ";
    }
  }


  $db = null;
 ?>
