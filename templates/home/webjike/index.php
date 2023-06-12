<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $site['keywords']; ?>">
    <meta name="description" content="<?php echo $site['description']; ?>">
    <title><?php echo $site['Title']; ?></title>
    <link rel="shortcut icon" href="<?php echo $favicon; ?>">
    <link rel="stylesheet" href="<?php echo $theme_dir; ?>/css/zui.min.css">
    <link rel="stylesheet" href="<?php echo $theme_dir; ?>/css/main-style.css?v=<?php echo $theme_ver; ?>">
    <link rel="stylesheet" href="<?php echo $libs; ?>/Font-awesome/4.7.0/css/font-awesome.css">
    <?php echo $site['custom_header'] . PHP_EOL ?>
    <?php echo $global_config['global_header'] . PHP_EOL ?>
</head>
<body data-page-name="office">
<!--[if lt IE 8]>
<div class="alert alert-danger">您正在使用 <strong>过时的</strong> 浏览器. 是时候 <a href="http://browsehappy.com/">更换一个更好的浏览器</a>
    来提升用户体验.
</div>
<![endif]-->
<!--头部导航条Start-->
<header id="fenzhi-nav">
    <div class="main">
        <div class="logo">
            <a href=""><img
                    src="<?php echo $theme_dir; ?>/images/logo.png"><span><?php echo $site['logo']; ?></span></a>
        </div>
        <nav class="nav">
            <ul>
                <?php if (is_apply()) { ?>
                    <li><a href="./index.php?c=apply&u=<?php echo U; ?>">申请收录</a></li>
                <?php }
                if (is_guestbook()) { ?>
                    <li><a href="./index.php?c=guestbook&u=<?php echo U; ?>">在线留言</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</header>
<!--头部导航条End-->
<!--Content Start-->
<div id="content">
    <div class="left-bar">
        <!--左侧 Start-->
        <div class="menu" id="menu">
            <ul class="scrollcontent">
                <?php foreach ($categorys as $category) { ?>
                    <li><a href="#row-<?php echo $category['id']; ?>"><i
                                class='<?php echo $category['font_icon']; ?>'></i><?php echo $category['name']; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="menu-about"><i class="fa fa-user-circle icon-fw icon-lg mr-2"></i><span><a
                    href="./index.php?c=admin&u=<?php echo $u ?>"><?php echo is_login ? '后台管理' : '登录'; ?></a></span>
        </div>
    </div>
    <!--正文 Start-->
    <div class="duty-main">
        <div class="container content-box">
            <section class="sousuo">
                <div class="search">
                    <div class="search-box">
                        <span class="search-icon"
                              style="background: url('<?php echo $theme_dir; ?>/images/search_icon.png')"></span>
                        <input type="text" id="txt" class="search-input"
                               placeholder="请输入关键字，按回车 / Enter 搜索"/>
                        <button class="search-btn" id="search-btn"><i class="fa fa-search"></i></button>
                    </div>
                    <!-- 搜索热词 -->
                    <div class="box search-hot-text" id="box" style="display: none">
                        <ul></ul>
                    </div>
                    <!-- 搜索引擎 -->
                    <div class="search-engine">
                        <div class="search-engine-head">
                            <strong class="search-engine-tit">选择您的默认搜索引擎：</strong>
                            <div class="search-engine-tool">搜索热词： <span id="hot-btn"></span></div>
                        </div>
                        <ul class="search-engine-list"></ul>
                    </div>
                </div>
            </section>
            <?php if ($theme_config['location'] == '1') { ?>
                <div class="row duty-custom layui-hide-sm layui-hide-md layui-hide-lg">
                    <!--手机端后台入口-->
                    <div class="col-md-12">
                        <strong class="duty-item-name-two">
                            <a class="duty-custom-link" style="color: #6b7184;"
                               href="./index.php?c=admin&u=<?php echo $u ?>">
                                <i class="fa fa-user-circle"></i>后台管理</a>
                        </strong>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="duty-tool">
                        <div class="duty-tool-notice" <?php if ($theme_config['Notice'] == '0') {
                            echo 'style="display:none;"';
                        } ?>>
                            <i class="fa fa-volume-up" aria-hidden="true"></i>
                            <span><?php if ($theme_config['Notice'] == '1') {
                                    echo $site['description'];
                                } else {
                                    echo $theme_config['NoticeC'];
                                } ?></span>
                        </div>
                        <ul class="duty-tool-switch hidden-xs hidden-sm">
                            <li><span>图标</span><i class="fa fa-toggle-on"></i></li>
                            <li><span>描述</span><i class="fa fa-toggle-on"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
            foreach ($categorys as $category) {
                $links = get_links($category['id']);
                $property = $category['property'] == 1 ? '<i class="fa fa-lock" style="color:#5FB878"></i>' : '';
                ?>
                <div class="row duty-item">
                    <div class="col-md-12">
                        <div id="row-<?php echo $category['id']; ?>" class="anchor-link"></div>
                        <strong class="duty-item-name">
                            <i class='<?php echo $category['font_icon']; ?>'> </i> <?php echo $category['name']; ?> <?php echo $property; ?>
                        </strong>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <?php
                            foreach ($links as $link) {
                                $link['description'] = empty($link['description']) ? '作者很懒，没有填写描述。' : $link['description'];
                                ?>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <?php if ($link['property'] == 1) { ?>
                                        <div class="angle"><span></span></div>
                                    <?php } ?>
                                    <a rel="nofollow" href="<?php echo $link['url']; ?>"
                                       title="<?php echo $link['description']; ?>" class="duty-card" target="_blank">
                                        <div class="duty-card-tit"><img
                                                src="<?php echo $link['ico']; ?>"><?php echo $link['title']; ?></div>
                                        <div class="duty-card-des"><?php echo $link['description']; ?></div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($theme_config['location'] == '2') { ?>
                <div class="row duty-custom layui-hide-sm layui-hide-md layui-hide-lg">
                    <!--手机端后台入口-->
                    <div class="col-md-12">
                        <strong class="duty-item-name-two">
                            <a class="duty-custom-link fa fa-user-circle" href="./index.php?c=admin&u=<?php echo $u ?>">&emsp;后台管理&emsp;</a>
                        </strong>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!--正文 End-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-main">
                        <?php echo $copyright . PHP_EOL; ?>
                        <?php echo $ICP . PHP_EOL; ?>
                        <?php echo $site['custom_footer'] . PHP_EOL; ?>
                        <?php echo $global_config['global_footer'] . PHP_EOL; ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="top" class="hidden-xs hidden-sm">
        <ul>
            <li class="top-item">
                <a href="javascript:;" data-tooltip="返 回顶 部" style="display: none" id="go-top"><i
                        class="fa fa-chevron-up"></i></a>
            </li>
        </ul>
    </div>
</div>
<!--Content End-->
<script src="<?php echo $libs; ?>/jquery/jquery-2.2.4.min.js"></script>
<script src="<?php echo $theme_dir; ?>/js/main.min.js?v=3.0.3"></script>
</body>
</html>