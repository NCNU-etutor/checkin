<!DOCTYPE html>
<html>
<head>
<?php require("include/head.html");?>
</head>
<body>
<?php require("include/menu.php");?>
<div class="container">
  <div class="modal fade" id="addcheckinModal" tabindex="-1" role="dialog" aria-labelledby="addcheckinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="addcheckinModalLabel">補登簽到</h4>
        </div>
        <div class="modal-body">
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
        </div><!--End of modal-body-->
      </div><!--End of modal-content-->
    </div><!--End of modal-dialog-->
  </div><!--End of addcheckinModal-->

  <table class="table table-hover" id="logtable">
    <thead><tr>
      <th>姓名&nbsp;<input type="button" class="btn-link" data-toggle="modal" data-target="#addcheckinModal" value="補登(測試中)"></th>
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
