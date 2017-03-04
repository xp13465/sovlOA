<style type="text/css">
/* Reset style
* { margin:0; padding:0; word-break:break-all; }
body { background:#FFF; color:#333; font:12px/1.6em Helvetica, Arial, sans-serif; }
h1, h2, h3, h4, h5, h6 { font-size:1em; }
a { color:#0287CA; text-decoration:none; }
	a:hover { text-decoration:underline; }
ul, li { list-style:none; }
fieldset, img { border:none; }
legend { display:none; }
em, strong, cite, th { font-style:normal; font-weight:normal; }
input, textarea, select, button { font:12px Helvetica, Arial, sans-serif; }
table { border-collapse:collapse; }
html { overflow:-moz-scrollbars-vertical; } */ /*Always show Firefox scrollbar*/

/* iFocus style */
#ifocus { width:440px; height:215px; margin:5px; border:1px solid #DEDEDE; background:#F8F8F8; }
	#ifocus_pic { display:inline; position:relative; float:left; width:353px; height:196px; overflow:hidden; margin:10px 0 0 10px; }
		#ifocus_piclist { position:absolute; }
		#ifocus_piclist li { width:355px; height:198px; overflow:hidden; }
		#ifocus_piclist img { width:355px; height:196px; }
	#ifocus_btn { display:inline; float:right; width:68px; margin:9px 9px 0 0; }
	#ifocus_btn ul{ width:68px;}
		#ifocus_btn li { width:68px; height:51px; cursor:pointer; opacity:0.5; -moz-opacity:0.5; filter:alpha(opacity=50); }
		#ifocus_btn img { width:48px; height:32px; margin:7px 0 0 11px; }
		#ifocus_btn .current { background: url(images/ifocus_btn_bg.gif) 8px 2px no-repeat; opacity:1; -moz-opacity:1; filter:alpha(opacity=100); }
	#ifocus_opdiv { position:absolute; left:0; bottom:0; width:410px; height:35px; background:#000; opacity:0.5; -moz-opacity:0.5; filter:alpha(opacity=50); }
	#ifocus_tx { position:absolute; left:8px; bottom:8px; color:#FFF; }
		#ifocus_tx .normal { display:none; }
</style>

<script type="text/javascript">
function $(id) { return document.getElementById(id); }

function addLoadEvent(func){
	var oldonload = window.onload;
	if (typeof window.onload != 'function') {
		window.onload = func;
	} else {
		window.onload = function(){
			oldonload();
			func();
		}
	}
}

function moveElement(elementID,final_x,final_y,interval) {
  if (!document.getElementById) return false;
  if (!document.getElementById(elementID)) return false;
  var elem = document.getElementById(elementID);
  if (elem.movement) {
    clearTimeout(elem.movement);
  }
  if (!elem.style.left) {
    elem.style.left = "0px";
  }
  if (!elem.style.top) {
    elem.style.top = "0px";
  }
  var xpos = parseInt(elem.style.left);
  var ypos = parseInt(elem.style.top);
  if (xpos == final_x && ypos == final_y) {
		return true;
  }
  if (xpos < final_x) {
    var dist = Math.ceil((final_x - xpos)/10);
    xpos = xpos + dist;
  }
  if (xpos > final_x) {
    var dist = Math.ceil((xpos - final_x)/10);
    xpos = xpos - dist;
  }
  if (ypos < final_y) {
    var dist = Math.ceil((final_y - ypos)/10);
    ypos = ypos + dist;
  }
  if (ypos > final_y) {
    var dist = Math.ceil((ypos - final_y)/10);
    ypos = ypos - dist;
  }
  elem.style.left = xpos + "px";
  elem.style.top = ypos + "px";
  var repeat = "moveElement('"+elementID+"',"+final_x+","+final_y+","+interval+")";
  elem.movement = setTimeout(repeat,interval);
}

function classNormal(iFocusBtnID,iFocusTxID){
	var iFocusBtns= $(iFocusBtnID).getElementsByTagName('li');
	var iFocusTxs = $(iFocusTxID).getElementsByTagName('li');
	for(var i=0; i<iFocusBtns.length; i++) {
		iFocusBtns[i].className='normal';
		iFocusTxs[i].className='normal';
	}
}

function classCurrent(iFocusBtnID,iFocusTxID,n){
	var iFocusBtns= $(iFocusBtnID).getElementsByTagName('li');
	var iFocusTxs = $(iFocusTxID).getElementsByTagName('li');
	iFocusBtns[n].className='current';
	iFocusTxs[n].className='current';
}
function iFocusChange() {
	if(!$('ifocus')) return false;
	$('ifocus').onmouseover = function(){atuokey = true};
	$('ifocus').onmouseout = function(){atuokey = false};
	var iFocusBtns = $('ifocus_btn').getElementsByTagName('li');
	var listLength = iFocusBtns.length;
	iFocusBtns[0].onmouseover = function() {
		moveElement('ifocus_piclist',0,0,5);
		classNormal('ifocus_btn','ifocus_tx');
		classCurrent('ifocus_btn','ifocus_tx',0);
	}
	if (listLength>=2) {
		iFocusBtns[1].onmouseover = function() {
			moveElement('ifocus_piclist',0,-198,5);
			classNormal('ifocus_btn','ifocus_tx');
			classCurrent('ifocus_btn','ifocus_tx',1);
		}
	}
	if (listLength>=3) {
		iFocusBtns[2].onmouseover = function() {
			moveElement('ifocus_piclist',0,-394,5);
			classNormal('ifocus_btn','ifocus_tx');
			classCurrent('ifocus_btn','ifocus_tx',2);
		}
	}
if (listLength>=4) {
		iFocusBtns[3].onmouseover = function() {
			moveElement('ifocus_piclist',0,-592,5);
			classNormal('ifocus_btn','ifocus_tx');
			classCurrent('ifocus_btn','ifocus_tx',3);
		}
	}
}

setInterval('autoiFocus()',5000);
var atuokey = false;
function autoiFocus() {
	if(!$('ifocus')) return false;
	if(atuokey) return false;
	var focusBtnList = $('ifocus_btn').getElementsByTagName('li');
	var listLength = focusBtnList.length;
	for(var i=0; i<listLength; i++) {
		if (focusBtnList[i].className == 'current') var currentNum = i;
	}
	if (currentNum==0&&listLength!=1 ){
		moveElement('ifocus_piclist',0,-198,5);
		classNormal('ifocus_btn','ifocus_tx');
		classCurrent('ifocus_btn','ifocus_tx',1);
	}
	if (currentNum==1&&listLength!=2 ){
		moveElement('ifocus_piclist',0,-394,5);
		classNormal('ifocus_btn','ifocus_tx');
		classCurrent('ifocus_btn','ifocus_tx',2);
	}
	if (currentNum==2&&listLength!=3 ){
		moveElement('ifocus_piclist',0,-592,5);
		classNormal('ifocus_btn','ifocus_tx');
		classCurrent('ifocus_btn','ifocus_tx',3);
	}
	if (currentNum==3 ){
		moveElement('ifocus_piclist',0,0,5);
		classNormal('ifocus_btn','ifocus_tx');
		classCurrent('ifocus_btn','ifocus_tx',0);
	}
	if (currentNum==1&&listLength==2 ){
		moveElement('ifocus_piclist',0,0,5);
		classNormal('ifocus_btn','ifocus_tx');
		classCurrent('ifocus_btn','ifocus_tx',0);
	}
	if (currentNum==2&&listLength==3 ){
		moveElement('ifocus_piclist',0,0,5);
		classNormal('ifocus_btn','ifocus_tx');
		classCurrent('ifocus_btn','ifocus_tx',0);
	}
}
addLoadEvent(iFocusChange);
</script>
</head>
<body><div align="center">
<div id="ifocus">
	<div id="ifocus_pic">
		<div id="ifocus_piclist" style="left:0; top:0;">
			<ul>
				<li><a href="<?=$rowb["hd_link1"]?>" target="_blank"><img src="/admin_root/<?=$rowb["hd_pic1"]?>"/></a></li>
				<li><a href="<?=$rowb["hd_link2"]?>" target="_blank"><img src="/admin_root/<?=$rowb["hd_pic2"]?>" alt=""/></a></li>
				<li><a href="<?=$rowb["hd_link3"]?>" target="_blank"><img src="/admin_root/<?=$rowb["hd_pic3"]?>" alt=""/></a></li>
				<li><a href="<?=$rowb["hd_link4"]?>" target="_blank"><img src="/admin_root/<?=$rowb["hd_pic4"]?>" alt=""/></a></li>
			</ul>
    </div>
		<div id="ifocus_opdiv"></div>
		<div id="ifocus_tx">
			<ul>
				<li class="current"><?=$rowb["hd_title1"]?></li>
				<li class="normal"><?=$rowb["hd_title2"]?></li>
				<li class="normal"><?=$rowb["hd_title3"]?></li>
				<li class="normal"><?=$rowb["hd_title4"]?></li>
			</ul>
		</div>
	</div>
	<div id="ifocus_btn">
		<ul>
			<li class="current"><img src="/admin_root/<?=$rowb["hd_pic1"]?>" alt="" /></li>
			<li class="normal"><img src="/admin_root/<?=$rowb["hd_pic2"]?>" alt="" /></li>
			<li class="normal"><img src="/admin_root/<?=$rowb["hd_pic3"]?>" alt="" /></li>
			<li class="normal"><img src="/admin_root/<?=$rowb["hd_pic4"]?>" alt="" /></li>
		</ul>
	</div>
</div>

</div>