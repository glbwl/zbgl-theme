<?php header("Content-type: text/html;charset=utf-8");echo '出错了，不能这样。http://www.glbwl.com';exit();?>{template:header}<div class="main"><div class="center">
<div class="center-c"><h2>{$article.Title}</h2></div>
{if $article.Content}	
{foreach $articles as $Content}
{php}
$temp=mt_rand(1,8);
$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
$content = $Content->Content;
preg_match_all($pattern,$content,$matchContent);
if(isset($matchContent[1][0])) 
$temp=$matchContent[1][0];
else
$temp=$zbp->host."zb_users/theme/$theme/style/images/random/$temp.jpg";
{/php}<div class="list"><div class="list-img"><a href="{$Content.Url}" title="{$Content.Title}"><img src="{$temp}"/></a><div class="list-l"><div class="list-meta">时间：{TimeAgo($Content.Time())} / 阅读:{$Content.ViewNums} / 评论:{$Content.CommNums}</div><h3 class="list-title"><a href="{$Content.Url}" title="{$Content.Title}">{$Content.Title}</a></h3></div></div><div class="list-content"><a href="{$Content.Url}">{SubStrUTF8(TransferHTML($Content.Intro,"[nohtml]"),120)}</a></div></div>{/foreach}{else}<div class="list"><h4>搜索失败，请重新输入“关键词”！</h4></div>{/if}<div class="pagebar">{template:pagebar}</div> </div></div><div class="sidebar">{template:sidebar}</div>{template:footer}