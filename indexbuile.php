<?php
    $img=$_GET['img'];
    $name=$_GET['name'];
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
            生成你的圣诞头像
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

    <img src="" id="imgEnd" class="animated zoomIn">
    
<!--     <div class="btn"  id = "upload">
       上传照片
    </div> -->

    <input type="file" id="file" style="opacity: 0;position: fixed;bottom: -100px"  accept="image/*" capture="camera" >  
    
    <div class="flex flex-pack-justify" style="margin: 4% 7%;">
        <div class="btn"  id ="generate">
            生成      
        </div>

        <div class="btn" id = "off">
            脱下圣诞帽
        </div>

        <div class="btn" id="again">
            再来一次
        </div>
    </div>
</div>
<input type="hidden" id="headimg" value="<?php echo $img;?>">
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<div class="stickers swiper-container-horizontal swiper-container-free-mode"  id = "stickers">
    <ul class="swiper-wrapper">
        <li class="swiper-slide">
            <img src="images/4.png" data-src="images/4_1.png">
            <p>袜子</p>
        </li>
        <li class="swiper-slide tick">
            <img src = "images/16.png" data-src="images/16_1.png">
            <p>圣诞帽1</p>
        </li>
        <li class="swiper-slide">
            <img src = "images/19.png" data-src="images/19_1.png">
            <p>圣诞帽2</p>
        </li> 
        <li class="swiper-slide">
            <img src = "images/7.png" data-src="images/7_1.png">
            <p>铃铛</p>
        </li>
        <li class="swiper-slide">
            <img src = "images/15.png" data-src="images/15_1.png">
            <p>糖果</p>
        </li>
        <li class="swiper-slide" data-position = "center">
            <img src = "images/8.png" data-src="images/8_1.png">
            <p>鹿角1</p>
        </li>    
        <li class="swiper-slide" data-position = "center">
            <img src = "images/9.png" data-src="images/9_1.png">
            <p>鹿角2</p>
        </li>   
        <li class="swiper-slide" data-position = "center">
            <img src = "images/10.png" data-src="images/10_1.png">
            <p>鹿角3</p>
        </li>       
        <li class="swiper-slide" data-position = "rightBottom">
            <img src = "images/17.png" data-src="images/17_1.png" >
            <p>大v</p>
        </li> 


<!--         <li class="swiper-slide">
            <img src = "images/18.png" data-src="images/18_1.png">
            <p>苏宁</p>
        </li>     -->
    </ul>
    <div class="copyright">
           南京么么文化传播公司©
      </div>
</div>
<div style="display:none">
<script src="http://s19.cnzz.com/stat.php?id=3788915&web_id=3788915 " language="JavaScript"></script>
</div>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<?php
    require_once "jssdk.php";
    $jssdk = new JSSDK("wxf90ee8b34845fa70", "d84fc57802da6bc3f7bc3362670b6543");
    $signPackage = $jssdk->GetSignPackage();
    ?>
<script>
    wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: <?php echo $signPackage["timestamp"];?>,
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: [
            // 所有要调用的 API 都要加到这个列表中
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
        ]
    });
    wx.ready(function () {
        // 在这里调用 API
        wx.onMenuShareTimeline({
            title: '圣诞到了，我给头像带了个圣诞帽，你也来换一个！', // 分享标题
            link: 'http://www.minizhen.com/Christmas/ready.php', // 分享链接
            imgUrl: 'http://www.minizhen.com/Christmas/images/16_1.png', // 分享图标
            success: function () {
              
            },
            cancel: function () {
            }
        });

        wx.onMenuShareAppMessage({
            title: '圣诞到了，我给头像带了个圣诞帽，你也来换一个！', // 分享标题
            desc: '圣诞到了，我给头像带了个圣诞帽，你也来换一个！', // 分享描述
            link: 'http://www.minizhen.com/Christmas/ready.php', // 分享链接
            imgUrl: 'http://www.minizhen.com/Christmas/images/16_1.png', // 分享图标
            success: function () {
             
            },
            cancel: function () {
            }

        });
    });
</script>
<!-- <script src = "js/Stickers.js"></script> -->
<script src = "js/zepto.min.js"></script>
<script src = "js/swiper-3.4.1.jquery.min.js"></script>
<script src = "js/hammer.min.js"></script>
<script >
// <input type="file" name="imgOne" id="imgOne" onchange="preImg(this.id,'imgPre');" accept="image/*" capture="camera"  class="upload_btn"/>  

// function preImg(sourceId, targetId) {  
//     if (typeof FileReader === 'undefined') {  
//         alert('Your browser does not support FileReader...');  
//         return;  
//     }  
//     var file = document.getElementById(sourceId).files[0];  
//     if(!/image\/\w+/.test(file.type))
//     {
//     alert("图片类型必须是.gif,jpeg,jpg,png中的一种")
//     return false;
//     }else{
//     var reader = new FileReader();  
//     reader.onload = function(e) {  
//         var kbs = e.total / 1024;   
//         if(kbs > 1024){
//             alert( "图片大小超过限制,请限制在K以内")      
//             return;
//         }
//         var img = document.getElementById(targetId);  
//         img.src = this.result;  
//     }  
//         reader.readAsDataURL(document.getElementById(sourceId).files[0]);       
//     }
// }
</script>
<script>
   //  var hammertime = new Hammer(document.getElementById('cover'));
   //  hammertime.add(new Hammer.Pinch());
   // var coverWidth;
   // var coverWidthEnd
   // hammertime.on("pinchstart",function(e){
   //              coverWidth = $("#cover").width();
   // })
   //  hammertime.on("pinchin",function(e){
   //      // $("#cover")[0].style.webkitTransform = "scale("+e.scale+")"
   //      if( coverWidthEnd >= 100 && coverWidthEnd <= 300 ){
   //                   $("#cover").width( coverWidth * e.scale);
   //      }
   //      coverWidthEnd = $("#cover").width()
   //  })
    
   //  hammertime.on("pinchout",function(e){
   //      // $("#cover")[0].style.webkitTransform = "scale("+e.scale+")"
   //      // $("#cover").css({
   //      //     "left" : $("#cover").offset().left,
   //      //     "top" : document.getElementById('cover').offsetTop
   //      // }) 
   //      if(  coverWidthEnd >= 100 && coverWidthEnd <= 300 ){
   //          $("#cover").width( coverWidth * e.scale);
   //      }
   //      coverWidthEnd = $("#cover").width()
   //  })

   //  hammertime.on("pinchend",function(e){
   //      if ( coverWidthEnd > 300){
   //          $("#cover").width(300);
   //      }else if( coverWidthEnd < 100 ){
   //          $("#cover").width(100);
   //      }

   //  })

    var headhtml = {
            drawImg : "生成你的圣诞头像",
            drawEnd : "长按保存图片",
            off : "长按保存去还原你的头像吧"
    }

    var mySwiper1 = new Swiper('#stickers',{
      freeMode : true,
      slidesPerView : 'auto',
  });
</script>

<script>
var imgScale = 0.82
var c=document.getElementById("canvas")
var ctx = c.getContext("2d");
var img=document.getElementById("myImg");
var imgbg = document.createElement('img');
imgbg.src = '<?php echo $img;?>';
var space = window.screen.width - (window.screen.width * imgScale)  
var spaceLeft = (window.screen.width - (window.screen.width * imgScale))/2
ctx.fillStyle="#fcfcfc";
ctx.fillRect(0,0,window.screen.width,window.screen.width);
imgbg.onload = function(e) {
    ctx.drawImage(imgbg, 0, space+14, window.screen.width*imgScale, window.screen.width*imgScale);
}
document.getElementById('canvas').width = window.screen.width
document.getElementById('canvas').height = window.screen.width
$('#content').css("height",window.screen.width)
var c1 = document.getElementById("canvas1");

// 生成
$("#generate").on("click",function(){
    var imgstyle = {
        x : $("#cover").offset().left,
        y : document.getElementById('cover').offsetTop,
        width : $("#cover").offset().width,
        height : $("#cover").offset().height
    }
    var stickersP = $(".tick").attr("data-position");
    draw(imgstyle,stickersP)
    $("#again").show();
    $("#generate").hide();
    $('#content').hide();
    $("#imgEnd").show();
    $(".head").html(headhtml.drawEnd);
    $("#stickers").hide();
})

// 选中装饰品
$(".stickers ul li").click(function(){
    var stickersPosition = $(this).attr("data-position");
    switch(stickersPosition){
        case 'rightBottom':
                ctx.clearRect(0,0, window.screen.width, window.screen.width);ctx.fillStyle="#fcfcfc";
                ctx.fillRect(0,0,window.screen.width,window.screen.width);
                ctx.drawImage(imgbg, 0, 0, window.screen.width*imgScale, window.screen.width*imgScale);
                $("#cover").css({"top":"auto","bottom": 0})

            break;
        case 'center':
                ctx.clearRect(0,0, window.screen.width, window.screen.width);
                ctx.fillStyle="#fcfcfc";
                ctx.fillRect(0,0,window.screen.width,window.screen.width); 
                ctx.drawImage(imgbg, spaceLeft, space, window.screen.width*imgScale, window.screen.width*imgScale);

            break;
        default:
                ctx.clearRect(0,0, window.screen.width, window.screen.width);ctx.fillStyle="#fcfcfc";
                ctx.fillRect(0,0,window.screen.width,window.screen.width);
                ctx.drawImage(imgbg, 0, space, window.screen.width*imgScale, window.screen.width*imgScale);          
                $("#cover").css({"top":"0","bottom": "auto"})
    }  


    var stSrc = $(this).find("img").attr("data-src");
    $("#myImg").attr("src",stSrc);
    $(this).siblings().removeClass("tick");
    $(this).addClass("tick")
})

// 再来一次
$("#again").on("click",function(){
    $("#again").hide();
    $("#generate").show();
    $('#content').show();
    $("#imgEnd").hide();
    $(".head").html(headhtml.drawImg);
    $("#stickers").show();
})

// 脱下圣诞帽
$("#off").on("click",function(){
    $.ajax({
        url : "image.php",
        type : "POST",
        dataType : "json",
        data : {
          name : '<?php echo $name;?>'
        },
        success: function(data){
          console.log(data)
          $("#imgEnd").attr("src",data)
        },
        error : function(){

        }
    })

    $("#again").show();
    $("#generate").hide();
    $('#content').hide();
    $("#imgEnd").show();
    $(".head").html(headhtml.off);
    $("#stickers").hide();    
})



function draw(imgstyle,sPt){
    c1.width = window.screen.width
    c1.height = window.screen.width
    var ctx1 = c1.getContext("2d");
    ctx1.fillStyle="#fcfcfc";
    ctx1.fillRect(0,0,window.screen.width,window.screen.width);    
    var imgbg1 = document.createElement('img');
    imgbg1.src = "<?php echo $img;?>";
    var space = window.screen.width - (window.screen.width * imgScale) 
    console.log("读取头像开始")
    imgbg1.onload = function(e){
        console.log("读取头像成功")
        switch(sPt){
            case 'rightBottom':
                ctx1.drawImage(imgbg1,0,0,window.screen.width*imgScale, window.screen.width*imgScale)
                break;
            case 'center':
                ctx1.drawImage(imgbg1,spaceLeft,space,window.screen.width*imgScale, window.screen.width*imgScale)
            default:
                ctx1.drawImage(imgbg1,0,space,window.screen.width*imgScale, window.screen.width*imgScale)
        }  
        var imgStickers = document.createElement("img");
        var stickersSp = window.screen.width - imgstyle.width;
        var stickersP = window.screen.width - imgstyle.height;
        imgStickers.src = $("#myImg").attr("src");
        imgStickers.onload = function(e){
            console.log("读取装饰成功")
            switch(sPt){
                case 'rightBottom':
                    ctx1.drawImage(imgStickers,stickersSp,stickersP,imgstyle.width, imgstyle.height)
                    break;
                default:
                    ctx1.drawImage(imgStickers,stickersSp,0,imgstyle.width,imgstyle.height)
            }  
            var dataUrl = c1.toDataURL("images/jpeg",50);
            document.getElementById("imgEnd").src = dataUrl;
        }        
    }    
}




// 清除微信浏览器内部滚动
var overscroll = function(el) {
    el.addEventListener('touchstart', function() {
        var top = el.scrollTop
          , totalScroll = el.scrollHeight
          , currentScroll = top + el.offsetHeight
        //If we're at the top or the bottom of the containers
        //scroll, push up or down one pixel.
        //
        //this prevents the scroll from "passing through" to
        //the body.
        if(top === 0) {
          el.scrollTop = 1
        } else if(currentScroll === totalScroll) {
          el.scrollTop = top - 1
        }
    })
    el.addEventListener('touchmove', function(evt) {
        //if the content is actually scrollable, i.e. the content is long enough
        //that scrolling can occur
        if(el.offsetHeight < el.scrollHeight)
          evt._isScroller = true
    })
}

overscroll(document.querySelector('.main'));

document.body.addEventListener('touchmove', function(evt) {
  //In this case, the default behavior is scrolling the body, which
  //would result in an overflow.  Since we don't want that, we preventDefault.
  if(!evt._isScroller) {
    evt.preventDefault()
  }
})
</script>
</body>
</html>