<?php
/*if($_GET['uid']&&$_GET['name']){
	$state=$_GET['uid'];
}else{
	$state='n';
}*/
header("Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxf90ee8b34845fa70&redirect_uri=http://www.minizhen.com/Christmas/oauth2.php&response_type=code&scope=snsapi_userinfo&state=$state#wechat_redirect");
?>