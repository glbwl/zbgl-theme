<?php header("Content-type: text/html;charset=utf-8");echo '出错了，不能这样。http://www.glbwl.com';exit();?>{* Template Name:文章页单页 *}{template:header}<div class="main"><div class="center">{if $article.Type==ZC_POST_TYPE_ARTICLE}{template:post-single}{else}{template:post-page}{/if}</div></div><div class="sidebar">{template:sidebar2}{template:sidebar-right02}{template:sidebar4}</div>{template:footer}