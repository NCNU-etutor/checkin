<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>簽到系統</title>
  <link rel="shortcut icon" href="favicon.ico" />
  <!-- JQuery from google -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <!-- BootStrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <!-- alertify -->
  <script src="//cdn.jsdelivr.net/alertify.js/0.3.11/alertify.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/alertify.js/0.3.11/themes/alertify.core.css">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/alertify.js/0.3.11/themes/alertify.default.css">
  <script>
    function showtime(){
　    document.getElementById('showclock').innerHTML = '目前時間：' + new Date().toLocaleString() + ' 星期' + '日一二三四五六'.charAt(new Date().getDay());
  　  setTimeout('showtime()',1000);
    }
    window.onload = function () {
      showtime();
    }
  </script>
</head>
<body>
<div class="container-fluid">
  <a class="btn btn-info" href="index.php">簽到區</a>
  <a class="btn btn-primary" href="manage/user.php">人員管理</a>
  <a class="btn btn-success" href="manage/log.php">簽到紀錄</a>
  <a class="btn btn-warning" href="manage/calculate.php">活動簽到計算</a>
  <form method="post" id="chk_form" action="" autocomplete="off">
    <div id="bibi" class="form-group">
      <p style="color:red; font-size:500%"><strong>
        請感應學生證簽到！
        <br>
        ↙↙↙↙↙讀卡機在左下角
      </strong></p>
      <div style="display:inline" id="showclock"></div>
      <input type="tel" class="form-control" name="cardnum" id="cardnum" style="ime-mode: disabled;" autofocus>
    </div>
  </form>
  <h2>
    <marquee behavior=alternate style="background-color:yellow"><strong>請確定右下角有出現綠色框框再離開←重要！！沒紀錄就當你沒有來<span style="color:red;">❤</span></strong></marquee>
    <br><br>
    <table>
      <tr> 
        <td>有任何問題請先看白板~<br>
            位置隨便坐，手寫筆自取，課後記得交回來^___^
        </td>
        <td ROWSPAN=2><img src="yuer.gif"></td>
      </tr>
      <tr>
        <td>請繳交帳號通知單跟學生證影本~不然大家的薪水就GG惹喔~
             <!-- <br> ↑沒交的人已放生~^_< -->
        </td>
      </tr>
      <tr>
        <td ALIGN=CENTER COLSPAN=2>
          <span style="color:red;">新同學麻煩請將學生證交給工作人員，方便建檔<br>
                                   之後參與計畫活動都需要用學生證簽到喔^__^
          </span>
        </td>
      </tr>
    </table>
  </h2>
  <br>
  <p style="color:red; font-size:850%">
    下課垃圾請帶走!!!
  </p>
  <script>
    $(document).ready(function(){
      // Handler for .ready() called.
      $('html, body').animate({
        scrollTop: $('#bibi').offset().top
      }, 'slow');
      $('a[href="index.php"]').attr('disabled', true);
    });

    $('#chk_form').bind('submit', function(e){
      e.preventDefault();
      $.ajax({
        url: "check.php",
        data: $('#chk_form').serialize(),
        type: "POST",
        success:function(msg){
          msg = msg.replace(/\s*$/, "");
          if(msg == "wed_success")
            alertify.log('星期三午間簽到成功！', 'success', '3000');
          else if(msg == "sucess")
            alertify.log('簽到成功！', 'success', '3000');
          else if(msg == "already")
            alertify.log('已簽到過！', 'error', '3000'); 
          else
            alertify.log('簽到異常，請找助理協助', 'error', '3000'); 
        },
        error:function(xhr){
          alertify.log('Ajax request 發生錯誤', 'error', '3000');
        },
        complete:function(){
          $('#chk_form input').val('');
        },
      }); 
    });

  </script>
</div><!-- End of container -->
<footer>
  <p align="center" style="color:gray">System Design by: richegg</p>
</footer>
</body>
</html>
