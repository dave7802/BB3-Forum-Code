<?php
/**
*
* @package Auto Video Embed  v.0.0.3
* @version $Id: auto_video_embed_post.php 2356 2012-02-10 21:10:05Z 4seven$
* @copyright (c) 2012 / 4seven
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
* Note: This file is included for use in posting.php, which controls previews.
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

// ---------------- CONFIG ---------------
// change from true to false to switch off
// enter width and height numeric, without px
#
$clipfish            = true;
$clipfish_width      = 464;
$clipfish_height     = 384;
#
$dailymotion         = true;
$dailymotion_width   = 420;
$dailymotion_height  = 336;
# 
$facebook            = true;
$facebook_width      = 400;
$facebook_height     = 300;
#
$flv                 = true;
$flv_width           = 425;
$flv_height          = 350;
#
$gametrailers        = true;
$gametrailers_width  = 640;
$gametrailers_height = 360;
#
$googlevideo  = true;
$metacafe     = true;
$mixcloud     = true;
$mp3          = true;
$myspace      = true;
$myvideo      = true;
$veoh         = true;
$vimeo        = true;
$yahoo        = true;
// Activate $youtube or $youtube_lnk. Not both!
$youtube      = true;
$youtube_lnk  = false;  //Enables a link which opens a spoiler-div to show embedded object.
// activate $youtube_new for youtu.be support
$youtube_new  = true;
#
// ---------------- CONFIG ---------------

// Auto Video Embed  v.0.0.3 / 4seven / 2012

// clipfish
if (($clipfish) && (strpos($preview_message, 'clipfish.de') !== false)){
$preview_message = preg_replace('#<a class="postlink" href="http:\/\/(.*?)clipfish.de\/video\/(.*?)">(.*?)<\/a>#U', 
'<object width="' . $clipfish_width . '" height="' . $clipfish_height . '" type="application/x-shockwave-flash" data="http://www.clipfish.de/cfng/flash/clipfish_player_3.swf" style="visibility: visible;"><param name="quality" value="high" /><param name="wmode" value="opaque" /><param name="allowscriptaccess" value="always" /><param name="allowfullscreen" value="true" /><param name="flashvars" value="data=http://www.clipfish.de/devxml/videoinfo/$2&amp;ec=http://www.clipfish.de/embed/video/$2&amp;vid=$2" />
</object>', $preview_message);}

// dailymotion
if (($dailymotion) && (strpos($preview_message, 'dailymotion.') !== false)){
$preview_message = preg_replace('#<a class="postlink" href="http:\/\/(.*?)dailymotion(.*?)\/video\/(.*?)">(.*?)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:' . $dailymotion_width . 'px;height:' . $dailymotion_height . 'px;" data="http://www.dailymotion$2/swf/$3"><param name="movie" value="http://www.dailymotion.$2/swf/$3" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /></object>', $preview_message);}

// facebook
if (($facebook) && (strpos($preview_message, 'facebook.com/video/video.php') !== false)){
$preview_message = preg_replace('#<a class="postlink" href="http:\/\/(.*?)facebook.com\/video\/video.php\?v=(.*?)">(.*?)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:' . $facebook_width . 'px;height:' . $facebook_height . 'px;" data="http://www.facebook.com/v/$2"><param name="movie" value="http://www.facebook.com/v/$2" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /></object>', $preview_message);}

// flv
if (($flv) && ((strpos($preview_message, '.flv"') !== false) or (strpos($preview_message, '.FLV"') !== false))){
// remote link
$preview_message = preg_replace('#<a class="postlink" href="http:\/\/(.*?).(flv|FLV)"(.*?)>(.*?)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:' . $flv_width . 'px;height:' . $flv_height . 'px;" data="mediaplayer/flv_player.swf"><param name="movie" value="mediaplayer/flv_player.swf" /><param name="allowfullscreen" value="true" /><param name="flashvars" value="file=http://$1.flv" /></object>', $preview_message);
// local link
$preview_message = preg_replace('#<a class="postlink-local" href="http:\/\/(.*?).(flv|FLV)"(.*?)>(.*?)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:' . $flv_width . 'px;height:' . $flv_height . 'px;" data="mediaplayer/flv_player.swf"><param name="movie" value="mediaplayer/flv_player.swf" /><param name="allowfullscreen" value="true" /><param name="flashvars" value="file=http://$1.flv" /></object>', $preview_message);}

// gametrailers
if (($gametrailers) && (strpos($preview_message, 'gametrailers.com/video/') !== false)){
$preview_message = preg_replace('#<a class="postlink" href="http:\/\/(.*?)gametrailers.com\/video\/(.*?)\/(.*?)">(.*?)<\/a>#is', '<!--[if !IE]> --><object type="application/x-shockwave-flash" width="' . $gametrailers_width . '" height="' . $gametrailers_height . '" data="http://media.mtvnservices.com/mgid:moses:video:gametrailers.com:$3"><param name="AllowScriptAccess" value="sameDomain" /><param name="allowFullScreen" value="true" /><param name="base" value="." /><param name="flashVars" value="" /></object><!-- <![endif]--><!--[if IE]><embed width="' . $gametrailers_width . '" height="' . $gametrailers_height . '" src="http://media.mtvnservices.com/mgid:moses:video:gametrailers.com:$3" quality="high" bgcolor="000000" name="efp" align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="autoPlay=false" allowfullscreen="true"></embed><![endif]-->', $preview_message);}

// googlevideo
if (($googlevideo) && (strpos($preview_message, '/videoplay?docid=') !== false)){
$preview_message = preg_replace('#<a class="postlink" href="http:\/\/video.google(.*?)\/videoplay\?docid=(.*?)">(.*?)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:450px; height:330px;" data="http://video.google$1/googleplayer.swf?docId=$2&amp;fs=true"><param name="movie" value="http://video.google$1/googleplayer.swf?docId=$2&amp;fs=true" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /></object>
', $preview_message);}

//metacafe
if (($metacafe) && (strpos($preview_message, 'metacafe.com/watch/') !== false)){
$preview_message = preg_replace('#<a class="postlink" href="http:\/\/(.*?)metacafe.com\/watch\/(.*?)\/(.*?)">(.*?)<\/a>#is', '<object type="application/x-shockwave-flash" style="height:345px;width:400px;" data="http://www.metacafe.com/fplayer/$2/$3.swf"><param name="movie" value="http://www.metacafe.com/fplayer/$2/$3.swf" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /></object>', $preview_message);}

// mixcloud
if (($mixcloud) && (strpos($preview_message, 'mixcloud.com/') !== false)){
$preview_message = preg_replace('#<a class="postlink" href="http:\/\/(.*?)mixcloud.com\/(.*?)">(.*?)<\/a>#is', '<object type="application/x-shockwave-flash" data="http://www.mixcloud.com/media/swf/player/mixcloudLoader.swf?v=20" width="300" height="300"><param name="movie" value="http://www.mixcloud.com/media/swf/player/mixcloudLoader.swf?v=20" /><param name="flashvars" value="feed=http://www.mixcloud.com/$2" /><param name="allowscriptaccess" value="always" /><param name="allowfullscreen" value="true" /><param name="quality" value="high" /></object>', $preview_message);}

// mp3
if (($mp3) && ((strpos($preview_message, '.mp3">') !== false) or (strpos($preview_message, '.MP3">') !== false))){
// remote link
$preview_message = preg_replace('#<a class="postlink" href="http:\/\/(.*?).(mp3|MP3)">(.*?)<\/a>#is', '<object type="application/x-shockwave-flash" data="mediaplayer/mp3_player.swf" width="200" height="55"><param name="movie" value="mediaplayer/mp3_player.swf" /><param name="flashvars" value="src=http://$1.mp3" /></object>', $preview_message);
// local link
$preview_message = preg_replace('#<a class="postlink-local" href="http:\/\/(.*?).(mp3|MP3)">(.*?)<\/a>#is', '<object type="application/x-shockwave-flash" data="mediaplayer/mp3_player.swf" width="200" height="55"><param name="movie" value="mediaplayer/mp3_player.swf" /><param name="flashvars" value="src=http://$1.mp3" /></object>', $preview_message);}

// myspace
if (($myspace) && (strpos($preview_message, 'vids.myspace.com/index.cfm') !== false)){
$preview_message = preg_replace('#<a class="postlink" href="http:\/\/vids.myspace.com\/index.cfm\?fuseaction=vids.individual&amp;videoid=(.*?)">(.*?)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:425px; height:360px;" data="http://mediaservices.myspace.com/services/media/embed.aspx/m=$1,t=1,mt=video"><param name="movie" value="http://mediaservices.myspace.com/services/media/embed.aspx/m=$1,t=1,mt=video" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /></object>', $preview_message);}

// myvideo
if (($myvideo) && (strpos($preview_message, 'myvideo.de/watch/') !== false)){
$preview_message = preg_replace('#<a class="postlink" href="http:\/\/(.*?)myvideo.de\/watch\/(.*?)">(.*?)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:425px; height:350px" data="http://www.myvideo.de/movie/$2"><param name="movie" value="http://www.myvideo.de/movie/$2" /><param name="allowfullscreen" value="true" /></object>', $preview_message);}

// veoh
if (($veoh) && (strpos($preview_message, 'veoh.com/') !== false)){
$preview_message = preg_replace('#<a class="postlink" href="http:\/\/(.*?)veoh.com\/(.*?)\/watch\/(.*?)">(.*?)<\/a>#is', 
'<object type="application/x-shockwave-flash" style="width:410px;height:341px;" class="veohFlashplayer" name="veohFlashPlayer" data="http://www.veoh.com/static/swf/webplayer/WebPlayer.swf?version=AFrontend.5.4.2.1021&amp;permalinkId=$3&amp;player=videodetailsembedded&amp;videoAutoPlay=0&amp;id=anonymous"><param name="movie" value="http://www.veoh.com/static/swf/webplayer/WebPlayer.swf?version=AFrontend.5.4.2.1021&amp;permalinkId=$3&amp;player=videodetailsembedded&amp;videoAutoPlay=0&amp;id=anonymous" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /></object>', $preview_message);}

// vimeo
if (($vimeo) && (strpos($preview_message, 'vimeo.com/') !== false)){
$preview_message = preg_replace('#<a class="postlink" href="http:\/\/(.*?)vimeo.com\/(.*?)">(.*?)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:400px;height:230px;" data="http://vimeo.com/moogaloop.swf?clip_id=$2&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=$2&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" /></object>', $preview_message);}

// yahoo
// reminder: checking yahoo fullscreen mode availability
if (($yahoo) && (strpos($preview_message, 'video.yahoo.com/') !== false)){
$preview_message = preg_replace('#<a class="postlink" href="http:\/\/(.*?)video.yahoo.com\/(.*?)\/(.*?)\/(.*?)-(.*?).html">(.*?)<\/a>#is', '<object type="application/x-shockwave-flash" data="http://d.yimg.com/nl/vyc/site/player.swf" width="630" height="354"><param name="movie" value="http://d.yimg.com/nl/vyc/site/player.swf" /><param name="flashvars" value="vid=$5&amp;autoPlay=false&amp;volume=100&amp;enableFullScreen=1&amp;lang=$1" /><param name="quality" value="high" /></object>', $preview_message);}

// youtube
if (($youtube) && (strpos($preview_message, '/watch?v=') !== false)){
$preview_message = preg_replace('#<a class="postlink" href="https?:\/\/(.*?)youtube(.*?)\/watch\?v=(.*?)">(.*?)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:425px; height:344px" data="http://$1youtube$2/v/$3"><param name="movie" value="http://$1youtube$2/v/$3&amp;hl=de&amp;fs=1&amp;rel=0&amp;hd=1" /><param name="allowfullscreen" value="true" /></object>', $preview_message);}

// youtube_lnk
if (($youtube_lnk) && (strpos($preview_message, '/watch?v=') !== false)){
$preview_message = preg_replace('#<a class="postlink" href="https?:\/\/(.*?)youtube(.*?)\/watch\?v=([A-Za-z0-9]+)(.*?)">(.*?)<\/a>#is', '<a href="http://$1youtube$2/v/$3$4&amp;hl=en&amp;fs=1&amp;rel=0&amp;hd=1">http://$1youtube$2/watch?v=$3$4&amp;hl=en&amp;fs=1&amp;rel=0&amp;hd=1</a>&nbsp;&nbsp;&nbsp;<span style="cursor:pointer;" onclick="spoile(&apos;yt_$3&apos;);"><img src="images/embed.gif" alt="" /></span><div id="yt_$3" style="display:none;"><br /><object type="application/x-shockwave-flash" style="width:425px; height:344px" data="http://$1youtube$2/v/$3$4&amp;hl=en&amp;fs=1&amp;rel=0&amp;hd=1"><param name="movie" value="http://$1youtube$2/v/$3$4&amp;hl=en&amp;fs=1&amp;rel=0&amp;hd=1" /><param name="allowfullscreen" value="true" /></object></div>', $preview_message);}

// youtube_new
if (($youtube_new) && (strpos($preview_message, 'youtu.be/') !== false)){
$preview_message = preg_replace('#<a class="postlink" href="https?:\/\/(.*?)youtu.be\/(.*?)">(.*?)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:425px; height:344px" data="http://youtube.com/v/$2&amp;hl=en&amp;fs=1&amp;rel=0&amp;hd=1"><param name="movie" value="http://youtube.com/v/$2&amp;hl=en&amp;fs=1&amp;rel=0&amp;hd=1" /><param name="allowfullscreen" value="true" /></object>', $preview_message);}

// Auto Video Embed  v.0.0.3 / 4seven / 2012

?>
