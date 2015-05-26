function showtime(){
    document.getElementById('showclock').innerHTML = '目前時間：' + new Date().toLocaleString() + ' 星期' + '日一二三四五六'.charAt(new Date().getDay());
    setTimeout('showtime()',1000);
}
window.onload = function () {
    showtime();
}
