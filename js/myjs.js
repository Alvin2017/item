/**
 * Created by bjwsl-001 on 2017/4/15.
 */
+(function(){
  //首页欢迎光临
        var ctx = c1.getContext('2d');
        var txt = "欢迎您";
        ctx.textBaseline = 'top';
        ctx.font ='20px SimHei';
        ctx.fillStyle="white";
       var x = 0;
        var w = ctx.measureText(txt).width;
        var timer = setInterval(function(){
            ctx.clearRect(0,0,500,4000);
            x += 5;
            ctx.fillText(txt,x,4);
            if(x>500){
                x = -w;
            }
        },300);

    //导航鼠标进入动画
    $("#sidebar>ul").on("click","li",function(e){
       var currentId=$(this).attr("class");
       
        var cls="#"+currentId;
        if($(cls).attr("class")!="current"){
            //console.log(currentId);
        //    $(cls).show();
        //$(cls).addClass("current").siblings("div").css("display","none");
        //    $(".comment").css("display","none");
            $(cls).siblings(".current").slideUp("slow",function(){

                $(cls).siblings(".current").removeClass("current");
                //alert(1);
                $(cls).slideDown().addClass("current");

            })
        }

    })
})();
//留言板打开
$("#comment").on("click",'a',function(e){
    e.preventDefault();
    $(".comment").css("display","block").addClass("current").siblings("div").css("display","none").removeClass("current");
    $.ajax({
        type:"get",
        url:"data/Allban.php",
        success:function(data){
            var   html="";
            $.each(data,function(i,obj){
                if(i!=data.length-1){
              html+="<li><p><span>匿名</span><span class='pull-right'>"+obj.time+"</span></p><p>"+obj.message+"</p></li>";}
            })
            $("#ulContent").html(html);
            var html1="";
            for(var i=1;i<=data[data.length-1];i++){
          html1+=` <a href='data/Allban.php?pageNo=${i}'>${i}</a>&nbsp`;
            }
            $("#page").html(html1);
	    $("#page>a:first-child").addClass("active");
        }
    })
});

//点击分页获得每页响应的数据
$("#page").on("click",'a',function(e){
    e.preventDefault();
    var pno=$(this).html();
    $(this).addClass("active").siblings("a").removeClass("active");
    $.ajax({
        type:"get",
        url:"data/Allban.php?pageNo="+pno,
        success:function(data){
            var   html="";
            $.each(data,function(i,obj){
                if(i!=data.length-1){
                    html+="<li><p><span>匿名</span><span class='pull-right'>"+obj.time+"</span></p><p>"+obj.message+"</p></li>";}
            })
            $("#ulContent").html(html);
        }

    })
});

//点击发表按钮发表留言
$(".comment>button").click(function(){
       if($("#msg").val()!=""){
        $.ajax({
            type:"post",
            url:"data/ban.php",
            data:{message:$("#msg").val()},
            success:function(data){
                var html="";
                html+="<li><p><span>匿名</span><span class='pull-right'>"+data.time+"</span></p><p>"+data.message+"</p></li>";
                $("#ulContent").prepend(html).children("#ulContent>li:last-child").remove();
                $("#msg").val("");
            }
        })
    }
})