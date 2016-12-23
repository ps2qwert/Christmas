<?php
    session_start();
    $img=$_GET['img'];
    $name=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width = device-width ,height = device-height ,initial-scale = 1,minimum-scale = 1,maximum-scale = 1,user-scalable =no,"/>
    <title>圣诞</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css?v=20161220">
    <link rel="stylesheet" type="text/css" href="css/swiper-3.4.1.min.css">
</head>
<body>
<div class="main">
    <div class="head">
            拖动挂件装饰你的头像吧
    </div>

    <div id="content">
    <!--     <div id="head">
            <img id="imgurl" src="<?php echo $img;?>">
        </div> -->
        <canvas width="320" height ="500" id="canvas"> </canvas>
        <canvas id="canvas1" style="z-index:1"></canvas>
        <div class="" id = "cover">
            <img src="images/16_1.png" id = "myImg">
        </div>
    </div>

    <img src="" id="imgEnd">

<!--     <div class="btn"  id = "upload">
       上传照片
    </div> -->

    <input type="file" id="file" style="opacity: 0;position: fixed;bottom: -100px"  accept="image/*" capture="camera" >  

    <div class="btn"  id ="generate">
        生成      
    </div>

    <div class="btn" id="again">
        再来一次
    </div>
</div>



</br>
</br>
</br>
<div class="stickers swiper-container-horizontal swiper-container-free-mode"  id = "stickers">
    <ul class="swiper-wrapper">
<!--         <li class="tick swiper-slide">
            <img src="images/1.png">
            <p>花圈</p>
        </li>
        <li class="swiper-slide">
            <img src="images/2.png">
            <p>圣诞帽</p>
        </li>
        <li class="swiper-slide">
            <img src="images/3.png">
            <p>圣诞帽</p>
        </li> -->
        <li class="swiper-slide">
            <img src="images/4.png" data-src="images/4_1.png">
            <p>袜子</p>
        </li>
        <li class="swiper-slide">
            <img src = "images/16.png" data-src="images/16_1.png">
            <p>圣诞帽</p>
        </li>
        <li class="swiper-slide">
            <img src = "images/7.png" data-src="images/7_1.png">
            <p>铃铛</p>
        </li>
        <li class="swiper-slide">
            <img src = "images/15.png" data-src="images/15_1.png">
            <p>糖果</p>
        </li>    
        <li class="swiper-slide">
            <img src = "images/17.png" data-src="images/17_1.png">
            <p>大v</p>
        </li>    
    </ul>
</div>
<div style="display:none">
<script src="http://s19.cnzz.com/stat.php?id=3788915&web_id=3788915 " language="JavaScript"></script>
</div>

<script src = "js/Stickers.js"></script>
<script src = "js/zepto.min.js"></script>
<script src = "js/swiper-3.4.1.jquery.min.js"></script>
<script src = "js/hammer.min.js"></script>
<script>
var hammertime=new Hammer(document.getElementById("cover"));hammertime.add(new Hammer.Pinch);var coverWidth,coverWidthEnd;hammertime.on("pinchstart",function(a){coverWidth=$("#cover").width()});hammertime.on("pinchin",function(a){100<=coverWidthEnd&&300>=coverWidthEnd&&$("#cover").width(coverWidth*a.scale);coverWidthEnd=$("#cover").width()});hammertime.on("pinchout",function(a){100<=coverWidthEnd&&300>=coverWidthEnd&&$("#cover").width(coverWidth*a.scale);coverWidthEnd=$("#cover").width()});
hammertime.on("pinchend",function(a){300<coverWidthEnd?$("#cover").width(300):100>coverWidthEnd&&$("#cover").width(100)});var headhtml={drawImg:"\u62d6\u52a8\u6302\u4ef6\u88c5\u9970\u4f60\u7684\u5934\u50cf\u5427",drawEnd:"\u957f\u6309\u4fdd\u5b58\u56fe\u7247"},mySwiper1=new Swiper("#stickers",{freeMode:!0,slidesPerView:"auto"}),imgScale=.8,c=document.getElementById("canvas"),ctx=c.getContext("2d"),img=document.getElementById("myImg"),imgbg=document.createElement("img");imgbg.src="<?php echo $img;?>";
var space=(window.screen.width-window.screen.width*imgScale)/2;ctx.fillStyle="#fcfcfc";ctx.fillRect(0,0,window.screen.width,window.screen.width);imgbg.onload=function(a){ctx.drawImage(imgbg,0,space,window.screen.width*imgScale,window.screen.width*imgScale)};document.getElementById("canvas").width=window.screen.width;document.getElementById("canvas").height=window.screen.width;$("#content").css("height",window.screen.width);var c1=document.getElementById("canvas1");
$("#generate").on("click",function(){var a={x:$("#cover").offset().left,y:document.getElementById("cover").offsetTop,width:$("#cover").offset().width,height:$("#cover").offset().height};draw(a);$("#again").show();$("#generate").hide();$("#content").hide();$("#imgEnd").show();$(".head").html(headhtml.drawEnd);$("#stickers").hide()});$(".stickers ul li").click(function(){var a=$(this).find("img").attr("data-src");$("#myImg").attr("src",a);$(this).siblings().removeClass("tick");$(this).addClass("tick")});
$("#again").on("click",function(){$("#again").hide();$("#generate").show();$("#content").show();$("#imgEnd").hide();$(".head").html(headhtml.drawImg);$("#stickers").show()});
function draw(a){c1.width=window.screen.width;c1.height=window.screen.width;var b=c1.getContext("2d");b.fillStyle="#fcfcfc";b.fillRect(0,0,window.screen.width,window.screen.width);var d=document.createElement("img");d.src="<?php echo $img;?>";var e=(window.screen.width-window.screen.width*imgScale)/2;console.log("\u8bfb\u53d6\u5934\u50cf\u5f00\u59cb");d.onload=function(h){console.log("\u8bfb\u53d6\u5934\u50cf\u6210\u529f");b.drawImage(d,0,e,window.screen.width*imgScale,window.screen.width*imgScale);
var f=document.createElement("img"),g=window.screen.width-a.width;f.src=$("#myImg").attr("data-src");f.onload=function(d){console.log("\u8bfb\u53d6\u88c5\u9970\u6210\u529f");b.drawImage(f,g,0,a.width,a.height);d=c1.toDataURL("images/jpeg",50);document.getElementById("imgEnd").src=d}}}
var overscroll=function(a){a.addEventListener("touchstart",function(){var b=a.scrollTop,d=a.scrollHeight,e=b+a.offsetHeight;0===b?a.scrollTop=1:e===d&&(a.scrollTop=b-1)});a.addEventListener("touchmove",function(b){a.offsetHeight<a.scrollHeight&&(b._isScroller=!0)})};overscroll(document.querySelector(".main"));document.body.addEventListener("touchmove",function(a){a._isScroller||a.preventDefault()});
</script>
</body>
</html>