<html lang="en"><head><meta http-equiv="X-Frame-Options" content="deny">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="shortcut icon" href="pic/titan.png" type="image/x-icon">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style/style.css">
<script src="js/jquery.js"></script>
<script src="js/exec.js"></script>
<script src="js/feature.js"></script>
<title>NETELLER CHECKER</title>
</head>
<body><div id="wrapper">
<header>
<script type='text/javascript'>
function loadCSS(e, t, n) { "use strict"; var i = window.document.createElement("link"); var o = t || window.document.getElementsByTagName("script")[0]; i.rel = "stylesheet"; i.href = e; i.media = "only x"; o.parentNode.insertBefore(i, o); setTimeout(function () { i.media = n || "all" }) }
loadCSS("https://rawgit.com/lamhamdi/b-shortner/master/font-ge_dinar.css");
loadCSS("http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css");
</script>

</head>
<body>
<style type='text/css'>
#tab-demo{width:100%;height:60px;top:0;left:0;background:#3f4652;color:#fff;z-index:99999;position:fixed;-webkit-transform:translateZ(0)}
.closebutton{background:#2ecc71;text-align:center;height:60px;padding:0 20px 0 57px;position:fixed;top:0;left:0;line-height:60px;cursor:pointer;color:#fff;left:20px;transition:all .3s}
.closebutton:before{content:'\f00d';position:absolute;left:0;font-family:fontawesome;padding:0 20px;font-weight:normal;font-size:22px;transition:all .6s;}
a.closebutton {color:#fff;text-decoration:none;}
.closebutton:hover {background:#27ba66}
.closebutton:hover:before {transform:rotate(360deg);}
.dlbutton,a.dlbutton{background:#3f5870;text-align:center;height:60px;padding:0 20px 0 57px;position:fixed;top:0;left:146px;line-height:60px;cursor:pointer;color:#fff;text-decoration:none;transition:all .3s}
.dlbutton:before{content:'\f060';position:absolute;left:0;font-family:fontawesome;padding:0 20px;font-weight:normal;font-size:22px;transition:all .6s;}
.dlbutton:hover {background:#2c3e50}
.dlbutton:hover:before {transform:rotate(360deg);content:'\f00c';}
.demologo,a.demologo{padding-right:75px;font-size:18px;font-weight:700;text-transform:uppercase;line-height:60px;right:20px;position:fixed;color:#fff;letter-spacing:.5px;text-decoration:none}
.demologo:before{content:'\f108';position:absolute;right:0;background:#3f4e51;font-family:fontawesome;padding:0 20px;font-weight:normal;font-size:22px;}
.demologo:after {content: '- Checker Service';text-transform:capitalize;padding-left:5px;transform:scale(0.9) translate(-34px,0);transition:all.3s;}
.demologo:hover:after {opacity:1;visibility:visible;transform:scale(1.0) translate(0,0);}
</style>
<script type='text/javascript'>
</script>
</body><br><br><br>
<div class="header">
<center>
<div class="stats">
<font size="5" color="gold" ><b>Neteller Valid Email Checker</b></font>
<br>
<br>
</center>
</div></header>
<div id="form-container">
<div id="form-centered">
<center>
<span id="listempass">List Email To Check (<b id="mailistLength"></b>)</span>
<div>
<br>
<textarea id="empass" name="empass" onkeyup="getMailistLength()" placeholder="Put Mail list here which you want to check Ex:- email@domain.com"></textarea><br>
<select name="speed_switcher" id="speed_switcher" style="display: none;">
<option value="slow">Slow</option>
<option value="fast">Normal</option>
<option value="very_fast" selected="">Fast</option>
</select>
<select name="link_switcher" id="link_switcher" style="display: none;">
<option value="single">Single</option>
<option value="multi">Multi</option>
</select>
<label for="link_switcher">Speed : </label>
<select name="ratio" id="ratio" style="color: black;">
<option value="3000">Slow</option>
<option value="2000">Medium</option>
<option value="500" selected="">Very Fast</option>
<option value="1000" selected="">Fast</option>
</select>
&nbsp;&nbsp;&nbsp;
<label for="link_switcher">Effect : </label>
<select name="effect_switcher" id="effect_switcher" style="color: black;">
<option value="enable">Enable</option>
<option value="disable" selected="">Disable</option>
</select>
<br><br>
<button id="start-button">START CHECK</button>
<br><br>
<button id="stop-button">STOP HERE</button>
<div id="proc-send" style="display: none; margin-top: 10px;">
<span id="ygdicek" style="font-size: 13px; color: lime;"></span> <br>
<img src="pic/l.gif" alt="loading" style="width: 30px;">
</div>
<div id="proc-done" style="display: none; margin-top: 10px;">
<span id="nowChecked"></span>
<span id="log_mess" style="font-size: 13px; color: gold;"></span>
</div>
</div>
</center>
</div>
</div>
<br><br><br>
<div id="result-container" style="display: none;">
<div id="result-live">
<span id="result-live-note" class="copier" onclick="selectText('live_res')" title="Copy all registered Neteller live emails">LIVE : <i id="berapaLive"></i></span>
<fieldset id="live_res" class="results"></fieldset>
</div>
<div id="result-invalid">
<span id="result-invalid-note" class="copier" onclick="selectText('invalid_res')" title="Copy all not registered Neteller emails">DIE : <i id="berapaInvalid"></i></span>
<fieldset id="invalid_res" class="results"></fieldset>
</div>
<div id="result-nocard">
<span id="result-nocard-note" class="copier" onclick="selectText('unknown_res')" title="Copy all UNKNOWN result">LIMITED ACCOUNT : <i id="berapaUnknown"></i></span>
<fieldset id="unknown_res" class="results"></fieldset>
</div>
</div>
</div>

</body></html>