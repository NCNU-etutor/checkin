<!DOCTYPE html>
<html>
<head>
<?php require("include/head.html");?>
<style>
.onlinetool, .historytool{
    float: left;
    text-align: center;
}
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

  <ul id="userTab" class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#online" role="tab" data-toggle="tab">線上</a></li>
    <li><a href="#history" role="tab" data-toggle="tab">歷史</a></li>
  </ul>

  <div id="userTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="online">
      <div class="onlinetool"></div>
      <table class="table table-hover" id="onlinetable">
        <thead><tr>
          <th>姓名&nbsp;
            <input type="button" class="btn-link btn-xs" id="openadd" value="新增" data-toggle="modal" data-target="#adduserModal">
          </th>
          <th>學號</th>
          <th>系級</th>
          <th>卡號</th>
          <th>所教學校</th>
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
          <th>上課簽到次數(不含活動)</th>
        </tr></tfoot>
      </table>
    </div><!--End of online-->

    <div class="tab-pane fade" id="history">
      <div class="historytool"></div>
      <table class="table table-hover" id="historytable">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>系級</th>
          <th>卡號</th>
        </tr></thead>
        <tbody>

        </tbody>
        <tfoot><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>系級</th>
          <th>卡號</th>
        </tr></tfoot>
      </table>
    </div><!--End of history-->
  </div><!--End of TabContent-->
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
        "url": "ajax/online_teacher.php"
      },
      "language": {
        "url": "ajax/zh-tw.json"
      },
      "columnDefs": [ 
        { 
          "className": "text-center", 
          "targets": -1
        } 
      ],
      "ordering": false,
      "lengthChange": false,
      "pageLength": 20,
      "dom": '<"onlinetool">Tfrtip',
      "tableTools": {
        "sSwfPath": "//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf"
      }
    } );

    historyt = $('#historytable').dataTable( {
      "ajax": {
        "url": "ajax/history_teacher.php"
      },
      "language": {
        "url": "ajax/zh-tw.json"
      },
      "ordering": false,
      "lengthChange": false,
      "pageLength": 20,
      "dom": '<"historytool">Tfrtip',
      "tableTools": {
        "sSwfPath": "//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf"
      }
    } );

    setInterval( function () {
      online.api().ajax.reload(null, false);
      historyt.api().ajax.reload(null, false);
    }, 600000 );

    $("div.onlinetool").html(
      '<input type="button" class="btn-link" id="tohistory" value="移到歷史">&nbsp;<input type="button" class="btn-link" id="disactiveonline" value="取消選取">'
    );

    $("div.historytool").html(
      '<input type="button" class="btn-link" id="toonline" value="移回線上">&nbsp;<input type="button" class="btn-link" id="disactivehistory" value="取消選取">'
    );

    alertify.set({ 
      labels: {
        ok     : "確定",
        cancel : "取消"
      } 
    });
    
  } );//end of document.ready

  $('#onlinetable tbody, #historytable tbody').on('click', 'tr', function () {
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

  $(document).on("click", '#disactivehistory', function() {
    $("#historytable tbody tr").removeClass("active");
  });

  $(document).on("click", '#disactiveonline', function() {
    $("#onlinetable tbody tr").removeClass("active");
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
