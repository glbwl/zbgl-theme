<?php header("Content-type: text/html;charset=utf-8");echo '出错了，不能这样。http://www.glbwl.com';exit();?><!DOCTYPE html><html lang="{$lang['lang_bcp47']}"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, maximum-scale=1.0">{if $type=='article'}
{php}
$aryTags = array();
foreach($article->Tags as $key){
 $aryTags[] = $key->Name;
 }
if(count($aryTags)>0){
  $keywords = implode(',',$aryTags);
} else {
  $keywords = $zbp->name;
}
$description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');
{/php}<meta name="keywords" content="{$keywords}"/><meta name="description" content="{$description}"/><title>{$title}_{$name}</title>
{elseif $type=='page'}<meta name="keywords" content="{$title},{$name}"/>
{php}
$description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');
{/php}<meta name="description" content="{$description}"/><title>{$title}_{$name}_{$subname}</title>{elseif $type=='index'}<meta name="Keywords" content="孤狼,孤狼备忘录,网络备忘录,孤狼博客,个人博客,技术博客,原创博客" /><meta name="description" content="孤狼是一名电脑爱好者，非常喜欢电脑，所以孤狼备忘录博客会经常分享一些原版系统、软件、电脑技术、操作技巧、系统安装和有关电脑知识与新闻的文章。" /><title>{$name}{if $page>'1'}_第{$pagebar.PageNow}页{/if}_{$subname}</title>{else}<meta name="Keywords" content="{$title},{$name}"><meta name="description" content="{$title}_{$name}_当前是第{$pagebar.PageNow}页"> <title>{$title}_{$name}_第{$pagebar.PageNow}页</title>{/if}<link rel="stylesheet" type="text/css" href="{$host}zb_users/theme/{$theme}/style/{$style}.css"/><script type="text/javascript" src="{$host}zb_system/script/jquery-2.2.4.min.js"></script> <script type="text/javascript" src="{$host}zb_system/script/zblogphp.js"></script><script type="text/javascript" src="{$host}zb_system/script/c_html_js_add.php"></script>{$header}</head><body><div class="wrapper"><div class="menu"><a href="#" title="点击弹开">导航</a></div><div class="header"><div class="logo"><h1><a href="{$host}">{$name}</a></h1><samp>{$subname}</samp></div><div class="search"><form name="search" method="post" action="{$host}zb_system/cmd.php?act=search"><span><input type="text" name="q" size="11"  class="search-text" placeholder="输入搜索内容"/></span><input type="submit" class="search-submit" value=""/></form></div><div class="nav"><ul>{module:navbar}</ul></div><div class="social-links">{module:controlpanel}</div></div>