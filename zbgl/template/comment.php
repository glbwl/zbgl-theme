<?php header("Content-type: text/html;charset=utf-8");echo '出错了，不能这样。http://www.glbwl.com';exit();?><ul class="msg"  id="cmt{$comment.ID}"><li class="msgname"><div class="avatar"><img src="{$comment.Author.Avatar}"/></div><div class="commentname"><a href="{$comment.Author.HomePage}" target="_blank">{$comment.Author.StaticName}</a>&nbsp;&nbsp;<span>{$comment.Time()}&nbsp;<a href="#comment" onclick="return zbp.comment.reply('{$comment.ID}')">回复该评论</a></span><div class="comment_text">{$comment.Content}</div></div></li>{foreach $comment.Comments as $comment}<li class="msgarticle">{template:comment}</li>{/foreach}</ul>