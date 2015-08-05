<!DOCTYPE html>
<html>
<head>
<?php require("include/head.html");?>
</head>
<body>
<?php require("include/menu.php");?>
<div class="container">

  <div id="addcheckin">
    <form name="addcheckin" method="post" action="" autocomplete="off">
      <div class="form-group">
        姓名
        <select name="name">
　        <option value="">*</option>
        </select>
      </div>
      <div class="form-group">
        補簽日期時間
        <input id="dt" type="date" placeholder="2014-09-18">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-default" value="送出">
      </div>
    </form>
  </div><!-- End of addcheckin -->

  <table class="table table-hover" id="logtable">
    <thead><tr>
      <th>姓名&nbsp;<input type="button" class="btn-link" id="openadd" value="補登(目前沒有用)"></th>
      <th>簽到時間</th>
    </tr></thead>
    <tbody>

    </tbody>
    <tfoot><tr>
      <th>姓名</th>
      <th>簽到時間</th>
    </tr></tfoot>
  </table><!-- End of logtable -->
</div><!-- End of container -->

<script>
  $(document).ready(function () {
    $("#addcheckin").hide();
    $('a[href="log.php"]').attr('disabled', true);
    var table = $('#logtable').dataTable( {
      "ajax": {
        "url": "ajax/log.php"
      },
      "language": {
        "url": "ajax/zh-tw.json"
      },
      "ordering": false,
      "lengthChange": false,
      "pageLength": 100,
      "dom": 'T<"clear">lfrtip',
      "tableTools": {
        "sSwfPath": "//cdn.datatables.net/tabletools/2.2.3/swf/copy_csv_xls_pdf.swf"
      }
    } );
    setInterval( function () {    
      table.api().ajax.reload(null, false);
    }, 5000 );
  });
  $('#logtable tbody').on('click', 'tr', function () {
    $(this).toggleClass('active');
  });
</script>
<?php require("include/footer.html"); ?>
</body>
</html>
