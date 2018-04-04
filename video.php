<?php
require 'functions.php';
#获取URL
$url = urldecode($_REQUEST["url"]);
$video = getVideo($url);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <title>视频详情-91视频预览</title>
        <link rel="stylesheet" href="frozenui/css/frozen.css">
        <link rel="stylesheet" href="frozenui/css/demo.css">
    </head>
    <body>
    	<header class="ui-header ui-header-positive ui-border-b">
            <i class="ui-icon-return" onclick="history.back()"></i><a href="list.php" style="position: absolute;left: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;列表页</a><h1>视频详情</h1><button onclick="window.location.href='index.php';" class="ui-btn">回首页</button>
        </header>

        <section class="ui-container">
        	<?php if($video['video']){ ?>
        	<div class="ui-tooltips ui-tooltips-guide">
                <div class="ui-tooltips-cnt ui-tooltips-cnt-link ui-border-b">
                    <i class="ui-icon-talk"></i>加载成功，如播放失败刷新页面获取新地址
                </div>
            </div>
            <?php } else{ ?>
            <div class="ui-tooltips ui-tooltips-warn">
                <div class="ui-tooltips-cnt ui-border-b">
                    <i></i>获取失败，请刷新重试
                </div>
            </div>
            
            <?php } ?>

            <p class="demo-desc"><?php echo $video['title']; ?></p>
        	<video width="100%"  controls="controls">
        		<source src="<?php echo $video['video']; ?>" type="video/mp4">
        	</video>


            <div class="demo-block">
            <div class="ui-form ui-border-t">
                <div class="ui-form-item ui-form-item-link ui-border-b">
                    <a target="_blank" href="<?php echo $video['video']; ?>">真实地址（长按另存，短按新窗口打开）</a>
                </div>
                <div class="ui-form-item ui-form-item-r ui-border-b">
                    <input type="text" id="videoUrl" placeholder="真实地址" value="<?php echo $video['video']; ?>">
                    <!-- 若按钮不可点击则添加 disabled 类 -->
                    <button type="button" data-clipboard-target="#videoUrl" class="copy ui-border-l">复制地址</button>
                </div>
            </div>
        </div>
		</section>
        <script src="https://cdn.bootcss.com/clipboard.js/2.0.0/clipboard.min.js"></script>
        <script>
            new ClipboardJS('.copy');
        </script>
    </body>
</html>
