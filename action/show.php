<?php

foreach ($Display as $key => $value) {

  $id = $value["id"];//id
  $Project = $value["project"];//類型
  $Weight = $value["weight"];//收件人
  $Status = ($value["status"] == "出貨")? "<td style='color:red;font-weight:bold;'>".$value['status']."</td>": "<td style='color:blue'>".$value['status']."</td>";//如果狀態等於出貨,字體顯示紅色並顯示粗體
  $Datetime = $value["datetime"];//日期


  echo "
  <tr data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo' onclick='edit(\"$id\",\"$Project\",\"$Weight\")'>
    <td></td>
    <td>$Project</td>
    <td>$Weight</td>
    $Status
    <td>$Datetime</td>
  </tr>
  ";

  }//foreach
  if ($project == $_GET["project"]) {
    $in = "SELECT SUM(weight) as weight FROM `recycle` WHERE `project`='".$project."' AND `status`='進貨'";
    $out = "SELECT SUM(weight) as weight FROM `recycle` WHERE `project`='".$project."' AND `status`='出貨'";

    $inq = $db->query($in)->fetchAll();
    $outq = $db->query($out)->fetchAll();
    $sum = $inq["0"]["weight"] - $outq["0"]["weight"];
    echo "
    <tr>
      <td></td>
      <td colspan='2' style='color:red'>總重量：$sum</td>
      <td></td>
      <td></td>
    </tr>
    ";
  }
 ?>
<script type="text/javascript">

  function edit(id, project, weight){
    document.getElementById("id").value = id;
    document.getElementById("project").value = project;
    document.getElementById("weight").value = weight;
  }
</script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="exampleModalLabel">更新資料</h4>
      </div>
      <form role="form" action="action/update.php" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="control-label">品項:</label>
            <input type="hidden" name="id" id=id>
            <input type="text" class="form-control" id="project" name="project">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">重量:</label>
            <input type="text" class="form-control" id="weight" name="weight">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="Up" class="btn btn-primary">送出</button>
          <button type="submit" name="De" class="btn btn-danger pull-left">刪除</button>
        </div>
      </form>
    </div>
  </div>
</div>
