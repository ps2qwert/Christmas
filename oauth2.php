<?php
function filter($str) {
    if($str){
        $name = $str;
        $name = preg_replace('/\xEE[\x80-\xBF][\x80-\xBF]|\xEF[\x81-\x83][\x80-\xBF]/', '', $name);
        $name = preg_replace('/xE0[x80-x9F][x80-xBF]‘.‘|xED[xA0-xBF][x80-xBF]/S','?', $name);
        $return = json_decode(preg_replace("#(\\\ud[0-9a-f]{3})#ie","",json_encode($name)));
        if(!$return){
            return $this->jsonName($return);
        }
    }else{
        $return = '';
    }
    return $return;

}

function https_request($url,$data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}
if (isset($_GET['code'])){
    $appid='wxf90ee8b34845fa70';
    $code=$_GET['code'];
    $secret='d84fc57802da6bc3f7bc3362670b6543';
    $url='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secret.'&code='.$code.'&grant_type=authorization_code';
    $result = https_request($url);
    $jsoninfo = json_decode($result, true);
   // print_r($jsoninfo);
    $openid = $jsoninfo["openid"];//从返回json结果中读出openid
    $access_token = $jsoninfo["access_token"];//从返回json结果中读出openid
    $url1 = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
    $result1 = https_request($url1);
    $jsoninfo1 = json_decode($result1, true);
    $nickname=$jsoninfo1["nickname"];
    $headimgurl=$jsoninfo1['headimgurl'];
    if($nickname){
        session_start();
        $_SESSION['username']=$nickname;
        $_SESSION['image']=$headimgurl;
        if(count($_SESSION)>1){
            $url="./index.php";
            header("Location:$url");
         }
    }
}else{
    echo "NO CODE";
}
?>
