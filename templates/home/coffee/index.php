<?php
if ($is_login) {
    $html = '<li class=""><a href="./index.php?c=admin&u=' . $u . '" target="_blank">管理</a></li>';
} elseif ($site['GoAdmin']) {
    $html = '<li class=""><a href="./index.php?c=' . ($login == 'login' ? $login : $Elogin) . '&u="' . $u . ' target="_blank">登录</a></li>';
}
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <title><?php echo $site['Title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="applicable-device" content="pc,mobile">
    <meta name="keywords" content="<?php echo $site['keywords'] ?>"/>
    <meta name="description" content="<?php echo $site['description'] ?>"/>
    <link rel="shortcut icon" href="<?php echo $favicon; ?>">
    <link rel="stylesheet" href="<?php echo $theme_dir ?>/css/ops-coffee.min.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $theme_dir ?>/css/nav.ops-coffee.min.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $libs ?>/Font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo $libs ?>/Layui/v2.6.8/css/layui-icon.css">
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-158772988-2');
    </script>
    <?php echo $site['custom_header'] . PHP_EOL ?>
    <?php echo $global_config['global_header'] . PHP_EOL ?>
</head>

<body data-rsssl=1>
<div class="header">
    <div class="container">
        <a class="site" href=""><?php echo $site['logo']; ?></a>
        <nav class="header-menu">
            <ul>
                <li><a href="./index.php?c=admin&u=<?php echo U; ?>" target="_blank">系统管理</a></li>
                <?php if (is_apply()) { ?>
                    <li><a href="./index.php?c=apply&u=<?php echo U; ?>" target="_blank">申请收录</a></li>
                <?php }
                if (is_guestbook()) { ?>
                    <li><a href="./index.php?c=guestbook&u=<?php echo U; ?>" target="_blank">留言板</a></li>
                <?php } ?>
                <?php echo $html;
                echo $theme_config['toplink']; ?>
            </ul>
        </nav>
    </div>
</div>
<!-- header -->
<div id="content-wrapper">
    <div class="container">
        <?php if ($theme_config['search'] == 1) { ?>
            <section class="sousuo">
                <div class="search">
                    <div class="search-box">
                        <img class="search-icon" src="">
                        <input type="text" id="txt" class="search-input"
                               placeholder="点击左侧图标可选择搜索引擎；按回车搜索">
                        <button class="search-btn" id="search-btn"><img src="<?php echo $theme_dir ?>/images/sou0.png">
                        </button>
                    </div>
                    <!-- 搜索引擎 -->
                    <div class="search-engine" style="display: none;">
                        <ul class="search-engine-list"></ul>
                    </div>
                </div>
            </section>
        <?php } ?>
        <?php
        foreach ($categorys as $category) {
            $fid = $category['id'];
            $links = get_links($fid);
            //如果分类是私有的
            if ($category['property'] == 1) {
                $property = '&nbsp;<i class="fa fa-lock" style = "color:#5FB878"></i>';
            } else {
                $property = '';
            }
            ?>
            <div class="nav-cell clearfix">
                <h2><i style="display: inline;" class='<?php echo $category['font_icon']; ?>'></i>
                    <?php echo $category['name'] . $property; ?></h2>
                <ul class="nav-list">
                    <?php
                    foreach ($links as $link) {
                        $link['description'] = empty($link['description']) ? '作者很懒，没有填写描述。' : $link['description'];
                        ?>
                        <li>
                            <a class="nav-item clearfix" href="<?php echo $link['url']; ?>" target="_blank">
                                <div class="nav-img"
                                     style="margin-bottom:40px;background-image: url(<?php echo $link['ico']; ?>);"></div>
                                <div class="nav-name"><?php echo $link['title']; ?></div>
                                <p><?php echo $link['description']; ?></p>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>

<!-- footer -->
<footer class="footer">
    <div class="container clearfix">
        <?php echo $copyright . PHP_EOL; ?>
        <?php echo $ICP . PHP_EOL; ?>
        <?php echo $site['custom_footer'] . PHP_EOL; ?>
        <?php echo $global_config['global_footer'] . PHP_EOL; ?>
        <div class="link">
            <?php echo $theme_config['bottomlink']; ?>
        </div>
    </div>
</footer>

<script src="<?php echo $theme_dir ?>/js/nav.ops-coffee.min.js"></script>
</body>
</html>