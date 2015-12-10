<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>簽到系統</title>
  <link rel="shortcut icon" href="favicon.ico" />
  <!-- JQuery from google -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <!-- BootStrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!-- alertify -->
  <script src="//cdn.jsdelivr.net/alertify.js/0.3.11/alertify.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/alertify.js/0.3.11/themes/alertify.core.css">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/alertify.js/0.3.11/themes/alertify.default.css">
  <script src="clock.js"></script>
</head>
<body>
 <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">簽到區</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="manage/user.php">人員管理</a></li>
          <li><a href="manage/log.php">簽到紀錄</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">活動及歷史資料 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="manage/1031all.php">1031學年度</a></li>
              <li><a href="manage/1032all.php">1032學年度</a></li>
              <li><a href="manage/1041all.php">1041學年度</a></li>
              <!--<li role="separator" class="divider"></li>-->
              <!--<li><a href="#">Separated link</a></li>-->
              <!--<li role="separator" class="divider"></li>-->
              <!--<li><a href="#">One more separated link</a></li>-->
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>
<div class="container">
  <form method="post" id="chk_form" action="" autocomplete="off">
    <div id="bibi" class="form-group">
      <p style="color:red; font-size:500%"><strong>
        ↑↑↑↑ 請感應學生證簽到！ ↑↑↑↑
      </strong></p>
      <div style="display:inline" id="showclock"></div>
      <input type="tel" class="form-control" name="cardnum" id="cardnum" style="ime-mode: disabled;" autofocus>
    </div>
  </form>
  <h2>
    <marquee behavior=alternate style="background-color:yellow"><strong>請確定右下角有出現綠色框框再離開←重要！！沒紀錄就當你沒有來<span style="color:red;">❤</span></strong></marquee>
    <br><br>
    <table width="100%">
      <tr> 
        <td>有任何問題請先看白板~<br><br>
            位置隨便坐，手寫筆自取，課後記得交回來^___^
        </td>
        <td ROWSPAN=2><img height="300" src=<?php echo "photo/Yuer".rand(1,6).".gif"; ?>></td>
      </tr>
      <tr>
        <!--<td>請繳交帳號通知單跟學生證影本~不然大家的薪水就GG惹喔~-->
             <!-- <br> ↑沒交的人已放生~^_< -->
        <!--</td>-->
        <td>
          </br>請還沒報名相見歡的同學到 </br></br>http://nasc.kktix.cc/events/5c922865</br>
          或是利用QR code<img src="http://s01.calm9.com/qrcode/2015-11/LMCUMU2C3V.png">報名
        </td>
      </tr>
      <tr>
        <td ALIGN=CENTER COLSPAN=2> 
          <!--<span style="color:red;">新同學麻煩請將學生證交給工作人員，方便建檔<br><br>
                                   之後參與計畫活動都需要用學生證簽到喔^__^
          </span>-->
        </td>
      </tr>
    </table>
  </h2>
  <br>
  <p ALIGN=CENTER style="color:red; font-size:850%">
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
          if(msg == "sucess")
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
