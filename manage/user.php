<!DOCTYPE html>
<html>
<head>
<?php require("include/head.html");?>
<style>
p.inline {
    display: inline;
}
</style>
</head>
<body>
<div class="container">
<?php require("include/menu.php");?>
  <div class="modal fade" id="adduserModal" tabindex="-1" role="dialog" aria-labelledby="adduserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="adduserModalLabel">新增一筆新的資料</h4>
        </div>
        <div class="modal-body">
          <form id="add" name="add" method="post" action="" autocomplete="off">
            <div class="form-group">
              姓名
              <input id="nameadd" type="text" class="form-control" name="nameadd" title="請輸入姓名" required>
            </div>
            <div class="form-group">
              學號
              <input id="sidadd" type="tel" class="form-control" name="sidadd" pattern="[0-9]{8,9}" title="請輸入正確的學號" required>
            </div>
            <div class="form-group">
              卡號(請嗶卡)
              <input id="cardadd" type="tel" class="form-control" name="cardadd" pattern="[0-9]{10}" title="請輸入正確的卡號" required>
            </div>
            <div class="form-group">
              教的學校
              <div class="checkbox">
                <label><input type="checkbox" name="schooladd[]" value="平靜">平靜</label>
                <label><input type="checkbox" name="schooladd[]" value="合作">合作</label>
                <label><input type="checkbox" name="schooladd[]" value="永光">永光</label>
                <label><input type="checkbox" name="schooladd[]" value="魚池禮拜堂">魚池禮拜堂</label>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定新增">
            </div>
          </form>
        </div><!--End of modal-body-->
      </div><!--End of modal-content-->
    </div><!--End of modal-dialog-->
  </div><!--End of adduserModal-->

  <div class="modal fade" id="edituserModal" tabindex="-1" role="dialog" aria-labelledby="edituserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="edituserModalLabel">編輯<p id="who" class="inline"></p>的資料</h4>
        </div>
        <div class="modal-body">
          <form id="edit" name="edit" method="post" action="" autocomplete="off">
            <div class="form-group">
              姓名
              <input id="nameedit" type="text" class="form-control" name="nameedit" title="請輸入姓名" required>
            </div>
            <div class="form-group">
              學號
              <input id="sidedit" type="tel" class="form-control" name="sidedit" pattern="[0-9]{8,9}" title="請輸入正確的學號" required>
            </div>
            <div class="form-group">
              卡號(請嗶卡)
              <input id="cardedit" type="tel" class="form-control" name="cardedit" pattern="[0-9]{10}" title="請輸入正確的卡號" required>
            </div>
            <div class="form-group">
              教的學校
              <div class="checkbox">
                <label><input type="checkbox" name="schooledit[]" value="平靜">平靜</label>
                <label><input type="checkbox" name="schooledit[]" value="合作">合作</label>
                <label><input type="checkbox" name="schooledit[]" value="永光">永光</label>
                <label><input type="checkbox" name="schooledit[]" value="魚池禮拜堂">魚池禮拜堂</label>
              </div>
            </div>
            <div class="modal-footer">
              <input id="oricard" name="oricard" style="display:none" readonly=readonly>
              <input type="submit" class="btn btn-primary" value="確定修改">
            </div>
          </form>
        </div><!--End of modal-body-->
      </div><!--End of modal-content-->
    </div><!--End of modal-dialog-->
  </div><!--End of edituserModal-->

  <table class="table table-hover" id="onlinetable">
    <thead><tr>
      <th>姓名&nbsp;
        <input type="button" class="btn-link btn-xs" id="openadd" value="新增" data-toggle="modal" data-target="#adduserModal">
      </th>
      <th>學號</th>
      <th>系級</th>
      <th>卡號</th>
      <th>所教學校</th>
      <th>狀態</th>
      <th>上課簽到次數(不含活動)</th>
    </tr></thead>
    <tbody>

    </tbody>
    <tfoot><tr>
      <th>姓名</th>
      <th>學號</th>
      <th>系級</th>
      <th>卡號</th>
      <th>所教學校</th>
      <th>狀態</th>
      <th>上課簽到次數(不含活動)</th>
    </tr></tfoot>
  </table>
</div><!-- End of container -->

<script>
  $(document).ready(function() {
    var funny = "";
    $('a[href="user.php"]').attr('disabled', true);

    $(window).keydown(function(event) {
      funny += event.keyCode;
      if(funny.length == "20" && funny == "38384040373739396665") {
        alertify.alert("這是個不知所云的彩蛋XDDD</br>不過這裡以後應該是說明書");
        funny = "";
      }
      //if(funny.length > 20) {
        //funny = "";
      //}
    });
    setInterval(function() { 
      funny = "";
    }, 5000);

    online = $('#onlinetable').dataTable( {
      "ajax": {
        "url": "ajax/getteacher.php"
      },
      "language": {
        "url": "ajax/zh-tw.json"
      },
      "columnDefs": [ 
        { 
          "className": "text-center", 
          "targets": -1
        },
        { "targets": [ -2 ],
          "render": function ( data ) {
            if(data == "1") {
              return '<input type="checkbox" data-size="mini" name="toggle" checked>';
            } else {
              return '<input type="checkbox" data-size="mini" name="toggle">';
            }
          } 
        }
      ],
      "ordering": false,
      "lengthChange": false,
      "pageLength": 20,
      "dom": '<"onlinetool">Tfrtip',
      "tableTools": {
        "sSwfPath": "//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf"
      },
      "drawCallback": function( settings ) {
        $("input[name='toggle']").bootstrapSwitch();
        $('input[name="toggle"]').on('switchChange.bootstrapSwitch', function(event, state) {
          $.ajax({
            //url: "ajax/toggleuse.php",
            data: "&uid="+this.alt+"&state="+state+"&permis="+this.placeholder,
            type: "POST",
            success:function(msg){
              msg = msg.replace(/\s*$/, "");
              if(msg == "success") {
                //table.api().ajax.reload(null, false);
              }else if(msg == "error") {
                alertify.alert('沒有權限做這種事喔！');
                table.api().ajax.reload(null, false);
              }
            },
          });
        });
      },
    } );

    setInterval( function () {
      online.api().ajax.reload(null, false);
    }, 600000 );

    alertify.set({ 
      labels: {
        ok     : "確定",
        cancel : "取消"
      } 
    });
    
  } );//end of document.ready

  $('#onlinetable tbody').on('click', 'tr', function () {
    $(this).toggleClass('active');
  } );

  $('#onlinetable tbody').on('dblclick', 'tr', function () {
    $(this).addClass("editrow");
    $.each(online.api().rows('.editrow').data(), function(key, value) {
      $("input[name='schooledit[]']").each(function(){ 
        $(this).prop("checked", false);
      });
      $("#nameedit").val(value[0]);
      $("#who").text(" "+value[0]+" ");
      $("#sidedit").val(value[1]);
      $("#cardedit").val(value[3]);
      $("#oricard").val(value[3]);
      $.each(value[4].split(","), function(key1, value1) {
        $("input[name='schooledit[]'][value='"+value1+"']").prop("checked", true);
      });
    });
    $('#edituserModal').modal('show');
    $(this).removeClass("editrow");
  } );

  $("#edit").bind("submit", function(e) {
    e.preventDefault();
    $.ajax({
      url: "ajax/user_edit.php",
      data: $(this).serialize(),
      type: "POST",
      success:function(msg){
        msg = msg.replace(/\s*$/, "");
        if(msg == "success")
          alertify.log('修改成功！', 'success', '3000');
        else
          alertify.log('錯誤！請洽系統管理員', 'error', '3000');
      },
      error:function(xhr){
        alertify.log('Ajax request 發生錯誤', 'error', '3000');
      },
      complete:function(){
        online.api().ajax.reload(null, false);
        $("#edituserModal").modal("hide");
      },
    });
  });

  $(document).on("click", '#tohistory', function() {
    if(online.api().rows('.active').data().length > 0) {
      alertify.confirm("是否將所選大學伴移至歷史？", function (e) {
        if (e) {
          // user clicked "ok"
          var move = "";
          $.each(online.api().rows('.active').data(), function(key, value) {
            move += value[3]+",";
          });
          $.ajax({
            url: "ajax/tohistory.php",
            data: "tohistory="+move,
            type: "POST",
            success:function(msg){
              msg = msg.replace(/\s*$/, "");
              if(msg == "done")
                alertify.log('移過去了！', 'success', '3000');
              else
                alertify.log('錯誤！請洽系統管理員', 'error', '3000');
            },
            error:function(xhr){
              alertify.log('Ajax request 發生錯誤', 'error', '3000');
            },
            complete:function(){
              move = "";
              online.api().ajax.reload(null, false);
              historyt.api().ajax.reload(null, false);
            },
          });
        } else {
          // user clicked "cancel"
          alertify.log('取消了', 'error', '3000');
        }    
      });
    } else {
      alertify.alert("請至少選一筆資料");
    }
  });

  $(document).on("click", '#toonline', function() {
    if(historyt.api().rows('.active').data().length > 0) {
      alertify.confirm("是否將所選大學伴移回線上？", function (e) {
        if (e) {
          // user clicked "ok"
          var move = "";
          $.each(historyt.api().rows('.active').data(), function(key, value) {
             move += value[3]+",";
          });
          $.ajax({
            url: "ajax/toonline.php",
            data: "toonline="+move,
            type: "POST",
            success:function(msg){
              msg = msg.replace(/\s*$/, "");
              if(msg == "done")
                alertify.log('移過去了！', 'success', '3000');
              else
                alertify.log('錯誤！請洽系統管理員', 'error', '3000');
            },
            error:function(xhr){
              alertify.log('Ajax request 發生錯誤', 'error', '3000');
            },
            complete:function(){
              move = "";
              online.api().ajax.reload(null, false);
              historyt.api().ajax.reload(null, false);
            },
          });
        } else {
          // user clicked "cancel"
          alertify.log('取消了', 'error', '3000');
        }
      });
    } else {
      alertify.alert("請至少選一筆資料");
    }
  });
  
  $("#openadd").click(function() {
    $("#nameadd").val("");
    $("#cardadd").val("");
    $("#sidadd").val("");
    $("input[name='schooladd[]']").each(function() {
      $(this).prop("checked", false);
    });
  });
  
  $("#adduserModal").on("shown.bs.modal", function () {
    $("#nameadd").focus()
  });
  
  $("#add").bind("submit", function(e) {
    e.preventDefault();
    $.ajax({
      url: "ajax/user_add.php",
      data: $(this).serialize(),
      type: "POST",
      success:function(msg){
        msg = msg.replace(/\s*$/, "");
        if(msg == "success")
          alertify.log('新增成功！', 'success', '3000');
        else
          alertify.log('錯誤！請洽系統管理員', 'error', '3000');
      },
      error:function(xhr){
        alertify.log('Ajax request 發生錯誤', 'error', '3000');
      },
      complete:function(){
        online.api().ajax.reload(null, false);
        $("#adduserModal").modal("hide");
      },
    });
  });
</script>
<?php require("include/footer.html"); ?>
</body>
</html>
