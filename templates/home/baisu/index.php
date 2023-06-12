<?php
$Width = intval($theme_config['left_width']);
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8"/>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="applicable-device" content="pc,mobile">
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <title><?php echo $site['Title']; ?></title>
    <meta name="keywords" content="<?php echo $site['keywords']; ?>">
    <meta name="description" content="<?php echo $site['description']; ?>">
    <link rel="shortcut icon" href="<?php echo $favicon; ?>">
    <link rel="stylesheet" href="<?php echo $libs ?>/Font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo $libs ?>/Layui/v2.6.8/css/layui-icon.css">
    <link rel="stylesheet" href="<?php echo $theme_dir ?>/static/style.css?v=<?php echo $theme_ver; ?>">
    <style>
        <?php if( !is_login) {echo '        .is_login{display:none!important;}';}?>
        <?php if( $theme_config['fonts'] == 1 ) {?>
        /*Logo个性字体*/
        @font-face {
            font-family: youshe;
            src: url('<?php echo $theme_dir?>/static/youshe.ttf');
        }

        <?php } ?>
        /*导航宽度*/
        header {
            width: <?php echo $Width?>px;
        }

        nav.main-top {
            padding: 0px 20px 0px <?php echo $Width+20?>px;
        }

        .main {
            padding-left: <?php echo $Width?>px;
        }

        @media only screen and (max-width: 1200px) {
            .main {
                padding-left: 0;
                padding-top: 0px;
            }

            nav.main-top {
                padding: 0 4% 0;
            }
        }
    </style>
    <?php echo $site['custom_header'] . PHP_EOL ?>
    <?php echo $global_config['global_header'] . PHP_EOL ?>
</head>
<body>

<!-- 左侧栏 -->
<header>
    <div class="logo"><a href=""><?php echo $site['logo']; ?></a></div>
    <div class="typelist">
        <p class="login"><a href="./index.php?c=admin&u=<?php echo U ?>" title="后台管理" target="_blank"><i
                    class="fa fa-user-circle-o"></i>后台管理</a></p>
        <?php foreach ($categorys as $category) { ?>
            <p><a href="#category-<?php echo $category['id']; ?>"><i
                        class='<?php echo $category['font_icon']; ?>'></i><?php echo $category['name']; ?></a></p>
        <?php } ?>
    </div>
</header>

<!-- 窄屏顶部栏 -->
<div class="header" style="position: fixed;z-index: 9999;">
    <div class="logo"><a href="./?u=<?php echo $u ?>"><?php echo $site['logo']; ?></a></div>
    <div class="nav-bar"><i class="fa fa-bars"></i></div>
</div>

<!-- 顶部栏 -->
<nav class="main-top">
    <div class="search"><input type="text" class="search-input" placeholder="输入关键词搜索"/>
        <button id="baidu">百度搜索</button>
    </div>
    <div class="main-top-r">
        <span class="theme"><i class="fa fa-magic" title="深色模式"></i></span>
        <span class="config is_login"><i class="layui-icon layui-icon-theme" title="主题配置"></i></span>
        <span class="bs-addUrl is_login"><i class="fa fa-plus" title="快速添加"></i></span>
        <a href="./index.php?c=admin&u=<?php echo U ?>" title="系统管理" target="_blank"><i
                class="fa fa-user-circle-o"></i></a>
    </div>
</nav>

<!--正文内容部分-->
<div class="main">
    <div class="site-main">
        <!-- 遍历分类目录 -->
        <?php foreach ($categorys as $category) {
            $fid = $category['id'];
            $links = get_links($fid);
            $property = $category['property'] == 1 ? '<span class="private"><i class="fa fa-lock"></i></span>' : '';
            ?>

            <div class="site-type" id="category-<?php echo $category['id']; ?>"><i
                    class='<?php echo $category['font_icon']; ?>'></i><?php echo $category['name']; ?><?php echo $property; ?>
            </div>
            <div class="site-list">
                <?php foreach ($links as $link) {
                    $link['description'] = empty($link['description']) ? '作者很懒，没有填写描述。' : $link['description'];//默认描述
                    ?>
                    <div class="list url-list">
                        <a href="<?php echo $link['url']; ?>" title="<?php echo $link['description']; ?>">
                            <p class="name"><img src="<?php echo $link['ico']; ?>"><?php echo $link['title']; ?>
                            </p><?php
                            if ($theme_config['describe'] == 1) {
                                echo '
                <p class="desc">' . $link['description'] . '</p>';
                            }
                            if ($theme_config['search_url'] == 1) {
                                echo '
                <span style = "display:none;">' . $link['real_url'] . '</span>';
                            }
                            if ($link['property'] == 1) {
                                echo '
                <span class="private"><i class="fa fa-lock"></i></span>';
                            } ?>

                        </a>
                    </div>
                <?php } ?>
                <div class="list kongs"></div>
                <div class="list kongs"></div>
                <div class="list kongs"></div>
                <div class="list kongs"></div>
            </div>
        <?php } ?>
    </div>
</div>
<!--正文内容部分END-->
<div class="footer"></div>
<footer>
    <?php echo $copyright . PHP_EOL; ?>
    <?php echo $ICP . PHP_EOL; ?>
    <?php echo $site['custom_footer'] . PHP_EOL; ?>
    <?php echo $global_config['global_footer'] . PHP_EOL; ?>
</footer>
<!--右下角-->
<div class="tool-bars">
    <p class="bs-addUrl is_login"><i class="fa fa-plus" title="快速添加"></i></p>
    <p class="scroll_top"><i class="fa fa-chevron-up" title="返回顶部"></i></p>
</div>
<!--JS-->
<script src="<?php echo $libs ?>/jquery/jquery-3.6.0.min.js"></script>
<script src="<?php echo $libs ?>/Layer/v3.3.0/layer.js"></script>
<script src="<?php echo $libs ?>/Other/holmes.js"></script>
<script src="<?php echo $theme_dir ?>/static/embed.js?v=<?php echo $theme_ver; ?>"></script>
<script type="text/javascript">
    var u = '<?php echo $u?>';
    var t = '<?php echo str_replace("./templates/", "", $theme);?>';
    var bodyh = $(document.body).height();
    var htmlh = $(window).height();
    if (bodyh > htmlh) {
        $('footer').addClass('show')
    } else {
        $('footer').removeClass('show')
    }
    //打开方式
    $(document).ready(function () {
        $(".url-list").find("a").attr("target", "<?php echo $theme_config['open_with'] == 0 ? '_blank' : '_self'?>");
    })
</script>
</body>
</html>