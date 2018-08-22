<?php
error_reporting(0);
$url91 = ($_COOKIE["91url"] == '' || stripos($_COOKIE["91url"],'http://') == 0) ? 'http://www.91porn.com' : $_COOKIE["91url"];
//$page91 = $_COOKIE["91page"] == '' ? 1 : $_COOKIE["91page"];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <title>91视频预览</title>
        <link rel="stylesheet" href="frozenui/css/frozen.css">
        <link rel="stylesheet" href="frozenui/css/demo.css">
        <script src="frozenui/lib/zepto.min.js"></script>
    </head>
    <body ontouchstart>
    	<header class="ui-header ui-header-positive ui-border-b">
            <h1>91视频预览</h1>
        </header>

        <section class="ui-container">
		<section id="panel">
    <div class="demo-item">
        <p class="demo-desc">设置</p>
        <form action="list.php" method="get">
                    <div class="ui-form-item ui-border-b">
                        <label>
                            91地址
                        </label>
                        <input type="text" name="domain" placeholder="输入地址，如：http://www.91porn.com" value="<?php echo $url91;?>">
                        
                    </div>
                    <div class="ui-form-item ui-border-b">
                        <label>
                            页码
                        </label>
                        <input placeholder="页码" name="page" type="number" value="1">
                    </div>
                    
                    <div class="ui-tips ui-tips-info">
                        <i></i><span>设置可用域名和页码可直接访问</span>
                    </div>
                    <div class="ui-btn-wrap">
		                <button type="submit" class="ui-btn-lg ui-btn-primary">
		                    确定
		                </button>
		            </div>
                </form>
    </div>

        <p class="demo-desc">关于</p>
        <div class="ui-whitespace">
                <p class="ui-txt-default">本站是用免费服务器搭建的，免不了会崩溃</p>
            </div>
		</section>
                
		
    </body>
</html>
