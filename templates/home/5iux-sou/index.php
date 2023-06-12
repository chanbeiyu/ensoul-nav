<?php
//禁用错误报告
error_reporting(0);
$t = urlencode($_GET["t"]);
$q = urlencode($_POST["q"]);
if (empty($q)) {
} else {
    if ($t == "b") {
        echo '<script>window.location.href="//www.baidu.com/s?ie=utf-8&word=' . $q . '";</script>';
    } elseif ($t == "g") {
        echo '<script>window.location.href="https://www.google.com.hk/search?hl=zh&q=' . $q . '";</script>';
    } else {
        //默认百度
        echo '<script>window.location.href="https://www.baidu.com/s?word=' . $q . '";</script>';
    }
};
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="theme-color" content="#ffffff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="full-screen" content="yes"><!--UC强制全屏-->
    <meta name="browsermode" content="application"><!--UC应用模式-->
    <meta name="x5-fullscreen" content="true"><!--QQ强制全屏-->
    <meta name="x5-page-mode" content="app"><!--QQ应用模式-->
    <title><?php echo $site['Title']; ?></title>
    <meta name="keywords" content="<?php echo $site['keywords']; ?>">
    <meta name="description" content="<?php echo $site['description']; ?>">
    <link rel="shortcut icon" href="<?php echo $favicon; ?>">
    <link href="<?php echo $theme_dir; ?>/style.css?v=<?php echo $version; ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $libs; ?>/Font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo $libs; ?>/Layui/v2.6.8/css/layui-icon.css">
    <script src="<?php echo $libs; ?>/jquery/jquery-3.6.0.min.js">"></script>
    <script src="<?php echo $theme_dir; ?>/sou.js?v=<?php echo $version; ?>"></script>

    <?php
    $backgroundURL = $theme_config['backgroundURL'];
    if (!empty($backgroundURL)) { ?>
        <style>
            body {
                background-image: url('<?php echo $backgroundURL;?>');
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-color: #464646;
            }
        </style>
    <?php } ?>
    <?php echo $site['custom_header'] . PHP_EOL ?>
    <?php echo $global_config['global_header'] . PHP_EOL ?>
</head>
<body>
<div id="menu"><i></i></div>
<div class="list closed">
    <ul>
        <!-- 遍历分类目录 -->
        <?php foreach ($categorys as $category) {
            $links = get_links($category['id']);
            $property = $category['property'] == 1 ? '&nbsp;<i class="fa fa-lock" style = "color:#5FB878"></i>' : '';
            ?>
            <li class="title"><i style="display: inline;"
                                 class='<?php echo $category['font_icon']; ?>'></i> <?php echo $category['name'] . $property; ?>
            </li>
            <?php
            foreach ($links as $link) {
                $link['description'] = empty($link['description']) ? '作者很懒，没有填写描述。' : $link['description'];
                ?>
                <li><a rel="nofollow" href="<?php echo $link['url']; ?>" title="<?php echo $link['description']; ?>"
                       target="_blank">
                        <img class="linkimg" src="<?php echo $link['ico']; ?>" width="16px" height="16px">
                        <span><?php echo $link['title']; ?></span>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
</div>
<div class="mywth" style="width: 200px;">
    <div id="he-plugin-simple"></div>
</div>
<div id="content">
    <div class="con">
        <div class="shlogo"><h2 class="title"><?php echo $theme_config['title']; ?></h2></div>
        <div class="sou">
            <form action="" method="post" target="_self">
                <?php
                if ($t == "b") {
                    echo '<div class="lg" style="background: url(' . $theme_dir . '/icon/baidu.svg) no-repeat center/cover;" onclick="window.location.href=\'?t=g\';"></div>';
                } elseif ($t == "g") {
                    echo '<div class="lg" style="background: url(' . $theme_dir . '/icon/g.svg) no-repeat center/cover;" onclick="window.location.href=\'?t=b\';"></div>';
                } else {
                    //上面知道把默认谷歌改成百度，这里不知道改吗大佬们？。。
                    echo '<div class="lg" style="background: url(' . $theme_dir . '/icon/baidu.svg) no-repeat center/cover;" onclick="window.location.href=\'?t=g\';"></div>';
                }

                ?>
                <input class="wd" type="text" placeholder="请输入搜索内容" name="q" x-webkit-speech lang="zh-CN"
                       autocomplete="off">
                <button>
                    <svg class="icon" style=" width: 21px; height: 21px; opacity: 0.5;" aria-hidden="true">
                        <use xlink:href="#icon-sousuo"></use>
                    </svg>
                </button>
            </form>
            <div id="word"></div>
        </div>
    </div>
    <div class="foot" style="height: 40px;">
        <?php echo $copyright; ?> |
        <a class="nav-link" href="./index.php?c=admin&u=<?php echo U; ?>" target="_blank"><span>系统管理</span></a>
        <?php echo $ICP . PHP_EOL; ?>
        <?php echo $site['custom_footer'] . PHP_EOL; ?>
        <?php echo $global_config['global_footer'] . PHP_EOL; ?>
    </div>
</div>
<!--
作者:D.Young
主页：https://blog.5iux.cn/
github：https://github.com/5iux/sou
日期：2020-11-23
适配者:落幕
版权所有，请勿删除
-->
<!--天气插件-->
<?php
$WeatherKey = $theme_config['WeatherKey'];
$WeatherPosition = intval(empty($WeatherKey) ? "0" : $theme_config['WeatherPosition']);
if ($WeatherPosition != 0) {
    ?>
    <script>
        WIDGET = {
            "CONFIG": {
                "modules": "01234", //实况温度、城市、天气状况、预警
                "background": "<?php echo $theme_config['WeatherBackground'];?>", //背景颜色
                //"tmpColor": "4A4A4A", //温度文字颜色
                "tmpSize": "16",
                //"cityColor": "4A4A4A", //城市名文字颜色
                "citySize": "16",
                //"aqiColor": "4A4A4A", //空气质量文字颜色
                "aqiSize": "16",
                "weatherIconSize": "24", //天气图标尺寸
                "alertIconSize": "18", //预警图标尺寸
                "padding": "5px 1px 5px 1px", //边距
                "borderRadius": "5", //圆角
                "key": "<?php echo $WeatherKey;?>"
            }
        }
    </script>
    <script src="https://widget.qweather.net/simple/static/js/he-simple-common.js?v=2.0"></script>
<?php } ?>
<!--天气插件End-->
</body>
</html>
