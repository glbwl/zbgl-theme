<?php header("Content-type: text/html;charset=utf-8");echo '出错了，不能这样。http://www.glbwl.com';exit();?>{* Template Name:列表页普通文章 *}
{php}
$temp=mt_rand(1,8);
$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
$content = $article->Content;
preg_match_all($pattern,$content,$matchContent);
if(isset($matchContent[1][0])) 
$temp=$matchContent[1][0];
else
$temp=$zbp->host."zb_users/theme/$theme/style/images/random/$temp.jpg";
{/php}<div class="list"><div class="list-img"><a href="{$article.Url}" title="{$article.Title}"><img src="{$temp}"/></a><div class="list-l"><div class="list-meta">时间：{TimeAgo($article.Time())} / 阅读：{$article.ViewNums} / 评论：{$article.CommNums}</div><h3 class="list-title"><a href="{$article.Url}" title="{$article.Title}">{$article.Title}</a></h3></div></div><div class="list-content"><a href="{$article.Url}">{SubStrUTF8(TransferHTML($article.Intro,"[nohtml]"),120)}</a></div></div>