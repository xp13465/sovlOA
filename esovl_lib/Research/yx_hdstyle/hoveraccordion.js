/**
 * HoverAccordion - jQuery plugin for intuitively opening accordions and menus
 * http://berndmatzner.de/jquery/hoveraccordion/
 * Copyright (c) 2008 Bernd Matzner
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 * Version: 0.5.0
 */
(function($){$.fn.hoverAccordion=function(options){options=jQuery.extend({speed:'fast',activateitem:'true',active:'active',header:'header',hover:'hover',opened:'opened',closed:'closed',keepheight:'true'},options);var thislist=this;var thisurl=window.location.href;var i=0;function doHover(obj){if($(obj).html()==undefined)obj=this;if(!thislist.is(':animated')){var newelem=$(obj).parent().children('ul');var oldelem=$(obj).parent().parent().children('li').children('ul:visible');if(options.keepheight=='true'){thisheight=maxheight;}else{thisheight=newelem.height();}if(!newelem.is(':visible')){newelem.children().hide();newelem.animate({height:thisheight},{step:function(n,fx){newelem.height(thisheight-n);},duration:options.speed}).children().show();oldelem.animate({height:'hide'},{step:function(n,fx){newelem.height(thisheight-n);},duration:options.speed}).children().hide();oldelem.parent().children('a').addClass(options.closed).removeClass(options.opened);newelem.parent().children('a').addClass(options.opened).removeClass(options.closed);}}};var itemNo=0;var maxheight=0;$(this).children('li').each(function(){var thisitem=$(this);itemNo++;var thislink=thisitem.children('a');if(thislink.length>0){thislink.hover(function(){$(this).addClass(options.hover);},function(){$(this).removeClass(options.hover);});var thishref=thislink.attr('href');if(thishref=='#'){thislink.click(function(){doHover(this);this.blur();return false;});}else if(options.activateitem=='true'&&thisurl.indexOf(thishref)>0&&thisurl.length-thisurl.lastIndexOf(thishref)==thishref.length){thislink.parent().addClass(options.active);}}var thischild=thisitem.children('ul');if(thischild.length>0){if(maxheight<thischild.height())maxheight=thischild.height();thischild.children('li.'+options.active).parent().parent().children('a').addClass(options.header);thislink.hover(function(){var t=this;i=setInterval(function(){doHover(t);clearInterval(i);},180);},function(){clearInterval(i);});if(options.activateitem=='true'){thischild.children('li').each(function(){var m=$(this).children('a').attr('href');if(m){if(thisurl.indexOf(m)>0&&thisurl.length-thisurl.lastIndexOf(m)==m.length){$(this).addClass(options.active).parent().parent().children('a').addClass(options.opened);}}});}else if(parseInt(options.activateitem)==itemNo){thisitem.addClass(options.active).children('a').addClass(options.opened);}}thischild.not($(this).parent().children('li.'+options.active).children('ul')).not(thischild.children('li.'+options.active).parent()).hide().parent().children('a').addClass(options.closed);});return this;};})(jQuery);
// Set
$(document).ready(function(){
	$('#drawer').hoverAccordion({
		activateitem: '1',
		speed: 'fast'
	});
	$('#drawer').children('li:first').addClass('firstitem');
	$('#drawer').children('li:last').addClass('lastitem');
});