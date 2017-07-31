<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>品項輸入</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- 自行輸入 -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <!-- 自行輸入 -->

<!-- (Optional) Latest compiled and minified JavaScript translation files -->


    <!-- <script type="text/javascript" src="js/verification.js"></script> -->
    <?php
      include 'connect/connect.php';
      $SePro = "SELECT `project` FROM `project` GROUP BY `id` ASC";//下拉選項
      $DPro = $db->query($SePro)->fetchAll();
      ?>

  </head>
  <body style="background:black; color:white">
    <div class="container" >
      <div class="row">
        <div class="col-md-12">

          <form class="form-horizontal" role="form" action="action/insert.php" method="post">

            <!-- project項目 -->
            <div class="form-group">
              <div class="col-sm-3 col-xs-2"></div>
              <label for="project" class="col-sm-2 col-xs-2 control-label">項目</label>
              <div class="col-sm-3 col-xs-7">
                <select class="selectpicker" name="project" id="project">
                  <optgroup label="品項">
                    <?php foreach ($DPro as $key => $value){ ?>
                      <option value="<?php echo $value['project'];?>"><?php echo $value['project'];?></option>
                    <?php }; ?>
                  </optgroup>
                </select>
              </div>
            </div>
            <!-- 品項 -->

            <!-- weight重量 -->
            <div class="form-group">
              <div class="col-sm-3 col-xs-2"></div>
              <label for="weight" class="col-sm-2 col-xs-2 control-label">重量</label>
              <div class="col-sm-3 col-xs-7">
                <input type="number" class="form-control" name="weight" id="weight" placeholder="請輸入重量,以kg為單位">
              </div>
            </div>
            <!-- weight重量 -->

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="purchase" name="purchase" class="btn btn-primary">進貨</button>
                <a href="show.php">
                  <button type="button" class="btn btn-success">搜尋</button>
                </a>
                <button type="submit" name="shipments" id="shipments" class="btn btn-danger">出貨</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
