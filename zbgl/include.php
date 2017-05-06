<?php 
//个性化时间
function TimeAgo( $ptime ) {
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if($etime < 1) return '刚刚';
    $interval = array (
        12 * 30 * 24 * 60 * 60  =>  '年前 ('.date('Y/m/d', $ptime).')',
        30 * 24 * 60 * 60       =>  '个月前 ('.date('m/d', $ptime).')',
        7 * 24 * 60 * 60        =>  '周前 ('.date('m/d', $ptime).')',
        24 * 60 * 60            =>  '天前',
        60 * 60                 =>  '小时前',
        60                      =>  '分钟前',
        1                       =>  '秒前'
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}

/*最新文章*/
function PostTime(){
    global $zbp;
    $str = '';
$order = array('log_PostTime'=>'DESC');
$where = array(array('=','log_Status','0'));
$array = $zbp->GetArticleList(array('*'),$where,$order,array(8),'');
	foreach ($array as $p=>$hotlist)
	{$k = $p+1;
	$str .= '<li><span class="key-'.$k.'">'.$k.'</span><a href="'.$hotlist->Url.'" title="'.$hotlist->Title.'">'.$hotlist->Title.'</a></li>';
	}
	return $str;
}

/*最新评论*/
function comment(){
    global $zbp;
    $str = '';
	$order = $zbp->modulesbyfilename['comments']->MaxLi;
	if ($order == 0) $order = 8;
	$comments = $zbp->GetCommentList('*', array(array('=', 'comm_IsChecking', 0)), array('comm_PostTime' => 'DESC'), $order, null);
	foreach ($comments as $comment){
	$str .= '<li><img src="'.$comment->Author->Avatar.'"><a href="' . $comment->Post->Url .'#cmt' . $comment->ID .'"><span><strong>'.$comment->Author->StaticName.'</strong></span>' . SubStrUTF8(TransferHTML($comment->Content,'[nohtml]'),20) . '</a></li>';
	}
	return $str;
}

/*评论最多文章*/
function CommNums(){
    global $zbp;
    $str = '';
$order = array('log_CommNums'=>'DESC');
$where = array(array('=','log_Status','0'));
$array = $zbp->GetArticleList(array('*'),$where,$order,array(8),'');
	foreach ($array as $p=>$Commlist)
	{$k = $p+1;
	$str .= '<li><span class="key-'.$k.'">'.$k.'</span><a href="'.$Commlist->Url.'" title="'.$Commlist->Title.'">'.$Commlist->Title.'</a></li>';
	}
	return $str;
}

/*访问最多文章*/
function ViewNums(){
    global $zbp;
    $str = '';
$order = array('log_ViewNums'=>'DESC');
$where = array(array('=','log_Status','0'));
$array = $zbp->GetArticleList(array('*'),$where,$order,array(8),'');
	foreach ($array as $p=>$hotlist)
	{$k = $p+1;
	$str .= '<li><span class="key-'.$k.'">'.$k.'</span><a href="'.$hotlist->Url.'" title="'.$hotlist->Title.'">'.$hotlist->Title.'</a></li>';
	}
	return $str;
}

/*推荐图片*/
function Istop(){
	 global $zbp;
	 $str = '';
$array = GetList(4, null, null, null, null, null, array("only_ontop"  => true));
foreach ($array as $Istop){
$temp=mt_rand(1,8);
$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
$content = $Istop->Content;
preg_match_all($pattern,$content,$matchContent);
if(isset($matchContent[1][0])) 
$temp=$matchContent[1][0];
else
$temp=$zbp->host."zb_users/theme/$theme/style/images/random/$temp.jpg";
$str .= '<li><a href="'.$Istop->Url.'"><img src="'.$temp.'"/><span>'.$Istop->Title.'</span></a></li>';
}
return $str;
}

/*二维码*/
/*二维码*/
function Baiduwrm($article){
	global $zbp;  
	$str = '';
  $str .= '<img src="http://pan.baidu.com/share/qrcode?w=100&h=100&url='.$article->Url.'"/>';
	return $str;  
}

?>