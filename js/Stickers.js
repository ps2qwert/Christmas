var mwidth;
var mheight;
//绘制图片坐标
var X=0;
var Y=0;
//  js部分
var divObj=document.getElementById("cover");
var moveFlag=false;
//区别moueseup与click的标志
var clickFlag=false;
//  拖拽函数
divObj.addEventListener("touchstart",function(e){

        moveFlag=true;
        clickFlag=true;
        var clickEvent=window.event||e;
        mwidth=clickEvent.touches[0].clientX-divObj.offsetLeft;
        mheight=clickEvent.touches[0].clientY-divObj.offsetTop;
})

divObj.addEventListener("touchmove",function(e){
	event.preventDefault();
            clickFlag=false;
            var moveEvent=window.event||e;
            if(moveFlag){
                divObj.style.left=moveEvent.touches[0].clientX-mwidth+"px";
                divObj.style.top=moveEvent.touches[0].clientY-mheight+"px";
////              将鼠标坐标传给Canvas中的图像
                X=moveEvent.touches[0].clientX-mwidth;
                Y=moveEvent.touches[0].clientY-mheight;
////              下面四个条件为限制div以及图像的活动边界
                if(moveEvent.touches[0].clientX<=mwidth){
                    divObj.style.left=0+"px";
                    X=0;
                }
                if(parseInt(divObj.style.left)+divObj.offsetWidth >=window.screen.width){
                    divObj.style.left=window.screen.width - divObj.offsetWidth+"px";
                    X=window.screen.width - divObj.offsetWidth;
                }
                // if(moveEvent.touches[0].clientY<=mheight){
                //     divObj.style.top=0+"px";
                //     Y=0;
                // }
                if(parseInt(divObj.style.top)+divObj.offsetHeight>=window.screen.width){
                    divObj.style.top=window.screen.width-divObj.offsetHeight+"px";
                    Y=window.screen.width-divObj.offsetHeight;
                }
            }    
})

divObj.addEventListener("touchend",function(e){
            moveFlag=false;
})


/**
* pc端拖拽效果
*
*
**/

//     divObj.onmousedown=function(e){
//         moveFlag=true;
//         clickFlag=true;
//         var clickEvent=window.event||e;
//         var mwidth=clickEvent.clientX-divObj.offsetLeft;
//         var mheight=clickEvent.clientY-divObj.offsetTop;
//         document.onmousemove=function(e){
//             clickFlag=false;
//             var moveEvent=window.event||e;
//             if(moveFlag){
//                 divObj.style.left=moveEvent.clientX-mwidth+"px";
//                 divObj.style.top=moveEvent.clientY-mheight+"px";
// ////              将鼠标坐标传给Canvas中的图像
//                 X=moveEvent.clientX-mwidth;
//                 Y=moveEvent.clientY-mheight;
// ////              下面四个条件为限制div以及图像的活动边界
//                 if(moveEvent.clientX<=mwidth){
//                     divObj.style.left=0+"px";
//                     X=0;
//                 }
//                 if(parseInt(divObj.style.left)+divObj.offsetWidth >=window.screen.width){
//                     divObj.style.left=window.screen.width - divObj.offsetWidth+"px";
//                     X=window.screen.width - divObj.offsetWidth;
//                 }
//                 if(moveEvent.clientY<=mheight){
//                     divObj.style.top=0+"px";
//                     Y=0;
//                 }
//                 if(parseInt(divObj.style.top)+divObj.offsetHeight>=window.screen.width){
//                     divObj.style.top=window.screen.width-divObj.offsetHeight+"px";
//                     Y=window.screen.width-divObj.offsetHeight;
//                 }
//                 divObj.onmouseup=function(){
//                     moveFlag=false;
//                     if(clickFlag){
//                         alert("点击生效");
//                     }
//                 }
//             }
//         }
//     };