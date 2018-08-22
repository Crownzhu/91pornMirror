<?php
require 'functions.php';

#获取URL
if($_REQUEST["domain"]){
	$domain = urldecode($_REQUEST["domain"]);
}
if($_COOKIE['91url']){
    $domain =$_COOKIE['91url'];
}
if($domain == ''){
    $domain="http://www.91porn.com";
}
setcookie('91url',$domain);

$page=1;
if($_REQUEST["page"]){
	$page = $_REQUEST["page"];
}
$list = getList($domain,$page);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <title>视频列表-91视频预览</title>
        <!--<script type="text/javascript" src="http://tajs.qq.com/stats?sId=37342703" charset="UTF-8"></script>-->
        <link rel="stylesheet" href="frozenui/css/frozen.css">
        <link rel="stylesheet" href="frozenui/css/demo.css">
        <script src="frozenui/lib/zepto.min.js"></script>
        <!--<script src="frozenui/js/frozen.js"></script>-->
    </head>
    <body ontouchstart>
    	<header class="ui-header ui-header-positive ui-border-b">
            <i class="ui-icon-return" onclick="history.back()"></i><h1>视频列表</h1><button onclick="window.location.href='index.php';" class="ui-btn">回首页</button>
        </header>

        <section class="ui-container">
		<section id="panel">
    <div class="demo-item">
        <p class="demo-desc">第<b><?php echo $page?></b>页</p>


        <div class="demo-block">
            <div class="ui-form ui-border-t">
                <form action="#">
                    <div class="ui-form-item ui-form-item-switch ui-border-b">
                        <p>
                            只看精华
                        </p>
                        <label class="ui-switch">
                            <input type="checkbox" id="jinghua" checked="">
                        </label>
                    </div>
                </form>
            </div>

            <section class="ui-panel">
                <ul class="ui-grid-trisect">
                	<?php
                	foreach ($list as $key => $value) {  ?>              		
	                    <li data-href="video.php?url=<?php echo urlencode($value["link"]) ?>">
	                        <div class="ui-border">
	                            <div class="ui-grid-trisect-img">
	                                <span style="background-image:url('<?php echo str_replace("1_","",$value["pic"])?>')"></span>
	                            </div>
	                            <div style="padding: 2%">
	                                <h4 class="ui-nowrap-multi" style="height:50px"><?php echo $value["title"]; ?></h4>                                
	                            </div>
	                        </div>
	                    </li>
                	<?php }	?>
                    
                </ul>
            </section>
        </div>
    </div>
		</section>
                
		<?php if($page>1){ ?>
			<div><a href="list.php?page=<?php echo $page - 1 ?>" class="ui-btn-lg">上一页</a><br></div>
		<?php } ?>		
		<a href="list.php?page=<?php echo $page + 1 ?>" class="ui-btn-lg ui-btn-primary">下一页</a>
            </div>

		</section>
		<script src="https://cdn.bootcss.com/jquery/2.1.2/jquery.min.js"></script>
        <script src="https://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
		<script>

        $("[data-href]").click(function(){
        	location.href = ($(this).data('href'));
        });

        $(function(){
            $("#jinghua").click(function(){
                $this = $(this);

                if($this.is(":checked")){
                    $.cookie("jinghua","1");
                }else{
                    $.cookie("jinghua","2");
                }
                location.reload();
            });

            if($.cookie("jinghua") == "2"){
                $("#jinghua").removeAttr("checked");
            }
        });
        </script>
    </body>
</html>



















