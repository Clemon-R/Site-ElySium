<script type="text/javascript" src="js/jscolor/jscolor.js"></script>
<script type="text/javascript"><!--
function getInternetExplorerVersion()
// Returns the version of Internet Explorer or a -1
// (indicating te use of another browser).
{
  var rv = -1; // Return value assumes failure.
  if (navigator.appName == 'Microsoft Internet Explorer')
  {
var ua = navigator.userAgent;
if (re.exec(ua) != null)
var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
  rv = parseFloat( RegExp.$1 );
  }
  return rv;
}

function readCookie(name) {
var nameEQ = name + "=";
var ca = document.cookie.split(';');
for(var i=0;i < ca.length;i++) {
  var c = ca[i];
  while (c.charAt(0)==' ') c = c.substring(1,c.length);
  if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
}
return null;
}

function createCookie(name,value,min) {
if (min) {
  var date = new Date();
  date.setTime(date.getTime()+(min*60*120));
  var expires = "; expires="+date.toGMTString();
}
else var expires = "";
document.cookie = name+"="+value+expires+"; path=/";
}


window.onload = function vote_popup() {

var ver = getInternetExplorerVersion();
if(navigator.appName == 'Microsoft Internet Explorer' && ver < 7.0)
{
return;
}

sgvote6 = readCookie('sgvote6');

if (sgvote6 == null) {
  document.getElementById('vote_popup').style.display = "block";
}

}

function hide_vote_popup() {
createCookie('sgvote6','yes','1440');
document.getElementById('vote_popup').style.display = "none";
document.getElementById('vote_popup').innerHTML = "";
alert("Merci quand même, bon jeux sur <?php echo $titre; ?>");
};
function hide_voted_popup() {
createCookie('sgvote6','yes','1440');
document.getElementById('vote_popup').style.display = "none";
document.getElementById('vote_popup').innerHTML = "";
alert("Merci a vous");
};
// --></script>

<div id="vote_popup" style="background: transparent url(http://img197.imageshack.us/img197/4172/transa.png) repeat scroll 0% 0%; width: 100%; height: 100%; position: fixed; left: 0px; right: 0px; top: 0px; bottom: 0px; color: #f0f0f0; font-size: 9px; text-align: center; z-index: 99999; display: none;">
<div style="margin-top: 200px; width: 564px; margin-left: auto; margin-right: auto; display: block; background-color: "><span style="color: white; font-size: medium;"><strong>Bienvenu Sur <?php echo $titre; ?></strong></span>
<br>
<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo $facebook; ?>&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;font=arial&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px; margin-left: 240px; margin-right: auto;" allowTransparency="true"></iframe>
<br>
<br>
<span style="color: red; font-size: small;"></span>
<p><a onclick="hide_voted_popup();" href="http://www.rpg-paradize.com/?page=vote&vote=<?php echo $rpgcode; ?>" target="_new"> <img style="border-color:" title="Clique pour voter pour <?php echo $titre; ?>" src="theme/officiel/img/img_vote.png" border="0" alt="" /> </a><br /> <br /><span onclick="hide_vote_popup();"> <span style="cursor: pointer; font-family: Tahoma; font-size: x-small;"> <span style="font-size: xsmall;">Je ne souhaite pas voter pour <?php echo $titre; ?> !</span> </span> </span></p>
</div>
</div>