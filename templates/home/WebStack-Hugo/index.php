<?php
$lazyload = $theme_config['lazyload'] == 1 ? 'data-src' : 'src';
$theme_config['logo_light'] = empty($theme_config['logo_light']) ? "{$theme_dir}/assets/images/bt8-expand-light.png" : $theme_config['logo_light'];
$theme_config['logo_dark'] = empty($theme_config['logo_dark']) ? "{$theme_dir}/assets/images/bt8-expand-dark.png" : $theme_config['logo_dark'];
$theme_config['logo_collapsed'] = empty($theme_config['logo_collapsed']) ? "{$theme_dir}/assets/images/bt.png" : $theme_config['logo_collapsed'];

function echo_url_card($id)
{
    $links = get_links($id);
    foreach ($links as $link) {
        $link['description'] = empty($link['description']) ? '作者很懒，没有填写描述。' : $link['description'];
        ?>
        <div class="url-card col-6 col-sm-6 col-md-4 col-xl-5a col-xxl-6a">
            <div class="url-body default">
                <a href="<?php echo $link['url']; ?>" target="_blank" data-url="<?php echo $link['url']; ?>"
                   class="card no-c mb-4" data-toggle="tooltip" data-placement="bottom"
                   data-original-title="<?php echo $link['description']; ?>">
                    <div class="card-body">
                        <div class="url-content d-flex align-items-center">
                            <div class="url-img mr-2 d-flex align-items-center justify-content-center">
                                <img class="lazy" <?php echo $GLOBALS['lazyload']; ?>="<?php echo $link['ico']; ?>" alt=
                                "">
                            </div>
                            <div class="url-info flex-fill">
                                <div class="text-sm overflowClip_1">
                                    <strong><?php echo $link['title']; ?></strong>
                                </div>
                                <?php if ($GLOBALS['theme_config']['hide-description'] == 0) { ?>
                                    <p class="overflowClip_1 m-0 text-muted text-xs"><?php echo $link['description']; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="<?php echo $link['real_url']; ?>" class="togo text-center " data-toggle="tooltip"
                   data-placement="right" title="直达" rel="nofollow">
                    <i class="iconfont icon-goto"></i>
                </a>
            </div>
        </div>
        <?php
    }
}

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#f9f9f9"/>
    <title><?php echo $site['Title']; ?></title>
    <meta name="keywords" content="<?php echo $site['keywords']; ?>"/>
    <meta name="description" content="<?php echo $site['description']; ?>">
    <link rel="shortcut icon" href="<?php echo $favicon; ?>">
    <link rel="stylesheet" href="<?php echo $theme_dir ?>/assets/css/iconfont.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="<?php echo $libs ?>/bootstrap4/css/bootstrap.min.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="<?php echo $theme_dir ?>/assets/css/style-3.03029.1.css?v=<?php echo $theme_ver; ?>"
          type="text/css" media="all"/>
    <link rel="stylesheet" href="<?php echo $theme_dir ?>/assets/css/custom-style.css?v=<?php echo $theme_ver; ?>"
          type="text/css" media="all"/>
    <link rel="stylesheet" href="<?php echo $libs ?>/Font-awesome/4.7.0/css/font-awesome.css">
    <script type="text/javascript" src="<?php echo $libs ?>/jquery/jquery-3.6.0.min.js"></script>
    <style>
        body, html {
            font-size: <?php echo $theme_config['font-size'];?>px;
        }

        <?php  echo empty($theme_config['bg_img']) ? '':"body{background-size: cover;background-image:url({$theme_config['bg_img']});background-attachment: fixed;}";?>
        <?php if(!in_array($theme_config['bg'],['not','white-bg'])){echo '.slider_menu[sliderTab] {background: rgb(255 255 255);}';}?>
        <?php if($theme_config['hide-description'] == 1){echo '.url-card .url-img{width:20px;height:20px;}.url-card .mini a.togo,.url-card .default a.togo{top: 10px;} 
        ';}?>
    </style>
    <?php echo $site['custom_header'] . PHP_EOL ?>
    <?php echo $global_config['global_header'] . PHP_EOL ?>
    <?php echo $theme_config['header_code'] . PHP_EOL ?>
</head>
<body class="io-grey-mode">
<div id="loading">
    <div class="loader"><?php echo $site['Title']; ?></div>
</div>

<div class="page-container">
    <!--左侧栏-->
    <div id="sidebar" class="sticky sidebar-nav fade mini-sidebar" style="width: 60px;"
         data="<?php echo $theme_config['sidebar-nav'] == 1 ? 1 : 0; ?>">
        <div class="modal-dialog h-100 sidebar-nav-inner">
            <!--头部Logo-->
            <div class="sidebar-logo border-bottom border-color">
                <div class="logo overflow-hidden">
                    <a href="./?u=<?php echo U; ?>" class="logo-expanded">
                        <img src="<?php echo $theme_config['logo_light'] ?>" height="40" class="logo-light">
                        <img src="<?php echo $theme_config['logo_dark'] ?>" height="40" class="logo-dark d-none">
                    </a>
                    <a href="./?u=<?php echo U; ?>" class="logo-collapsed">
                        <img src="<?php echo $theme_config['logo_collapsed'] ?>" height="40" class="logo-light">
                        <img src="<?php echo $theme_config['logo_collapsed'] ?>" height="40" class="logo-dark d-none">
                    </a>
                </div>
            </div>
            <!--中部分类-->
            <div class="sidebar-menu flex-fill">
                <div class="sidebar-scroll">
                    <div class="sidebar-menu-inner">
                        <ul>
                            <?php foreach ($category_parent as $category) { ?>
                                <li class="sidebar-item">
                                    <a href="#category-<?php echo $category['id']; ?>" class="smooth">
                                        <?php if (empty($category['icon'])) { ?>
                                            <i class="<?php echo $category['font_icon']; ?> fa-lg icon-fw icon-lg mr-2"></i>
                                        <?php } else { ?>
                                            <img class="icon" src="<?php echo get_category_icon($category['icon']); ?>">
                                        <?php } ?>
                                        <span><?php echo $category['name']; ?></span>
                                        <?php if (!empty($category['subitem_count'])) { // 存在子分类则显示图标 ?>
                                            <i class="iconfont icon-arrow-r-m sidebar-more text-sm"></i>
                                        <?php } ?>
                                    </a>
                                    <?php if (!empty($category['subitem_count'])) { //存在子分类则输出?>
                                        <ul>
                                            <?php foreach (get_category_sub($category['id']) as $category_sub) { ?>
                                                <li>
                                                    <a href="#category-<?php echo $category_sub['id']; ?>"
                                                       class="smooth">
                                                        <?php if (empty($category_sub['icon'])) { ?>
                                                            <i class="<?php echo $category_sub['font_icon']; ?> fa-lg icon-fw icon-lg mr-2"></i>
                                                        <?php } else { ?>
                                                            <img class="icon"
                                                                 src="<?php echo get_category_icon($category_sub['icon']); ?>">
                                                        <?php } ?>
                                                        <span><?php echo $category_sub['name']; ?></span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!--底部-->
            <div class="border-top py-2 border-color">
                <div class="flex-bottom">
                    <ul>
                        <?php if (is_guestbook()) { ?>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page sidebar-item">
                                <a href="./index.php?c=guestbook&u=<?php echo $u ?>" target="_blank"><i
                                        class="fa fa-commenting-o fa-lg icon-fw icon-lg mr-2"></i><span>在线留言</span></a>
                            </li>
                        <?php } ?>
                        <?php if (is_apply()) { ?>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page sidebar-item">
                                <a href="./index.php?c=apply&u=<?php echo $u ?>" target="_blank"><i
                                        class="fa fa-pencil fa-lg icon-fw icon-lg mr-2"></i><span>网站提交</span></a>
                            </li>
                        <?php } ?>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page sidebar-item">
                            <a href="./index.php?c=admin&u=<?php echo $u ?>" target="_blank"><i
                                    class="fa fa-user fa-lg icon-fw icon-lg mr-2"></i><span>系统管理</span></a>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--主体内容-->
    <div class="main-content flex-fill <?php echo empty($theme_config['bg_img']) ? $theme_config['bg'] : ''; ?>">
        <div class="big-header-banner">
            <div id="header" class="page-header sticky">
                <div class="navbar navbar-expand-md">
                    <div class="container-fluid p-0">
                        <!--手机端顶部图标-->
                        <a href="" class="navbar-brand d-md-none">
                            <img src="<?php echo $theme_config['logo_collapsed'] ?>" class="logo-light">
                            <img src="<?php echo $theme_config['logo_collapsed'] ?>" class="logo-dark d-none">
                        </a>

                        <div class="collapse navbar-collapse order-2 order-md-1">
                            <!--分类收缩图标-->
                            <div class="header-mini-btn">
                                <label>
                                    <input id="mini-button" type="checkbox">
                                    <svg viewbox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                        <path class="line--1" d="M0 40h62c18 0 18-20-17 5L31 55"></path>
                                        <path class="line--2" d="M0 50h80"></path>
                                        <path class="line--3" d="M0 60h62c18 0 18 20-17-5L31 45"></path>
                                    </svg>
                                </label>
                            </div>
                            <!--顶部链接-->
                            <ul class="navbar-nav site-menu" style="margin-right: 16px;">
                                <li><a href="./?c=admin&u=<?php echo U; ?>"><i
                                            class="fa fa-user-circle-o icon-fw mr-2"></i><span> 管理</span></a></li>
                                <?php echo $theme_config['navbar-link']; ?>
                            </ul><!--nav end-->
                            <?php if ($theme_config['qweather'] == 1) { ?>
                                <!--qweather-->
                                <div class="rounded-circle weather">
                                    <div id="he-plugin-simple" style="display: contents;"></div>
                                    <script>WIDGET = {
                                            CONFIG: {
                                                "modules": "01234",
                                                "background": 5,
                                                "tmpColor": "E4C600",
                                                "tmpSize": 14,
                                                "cityColor": "E4C600",
                                                "citySize": 14,
                                                "aqiColor": "#E4C600",
                                                "aqiSize": 14,
                                                "weatherIconSize": 24,
                                                "alertIconSize": 18,
                                                "padding": "10px 10px 10px 10px",
                                                "shadow": "1",
                                                "language": "auto",
                                                "borderRadius": 5,
                                                "fixed": "false",
                                                "vertical": "middle",
                                                "horizontal": "left",
                                                "key": "085791e805a24491b43b06cf58ab31e7"
                                            }
                                        }
                                    </script>
                                    <script
                                        src="https://widget.qweather.net/simple/static/js/he-simple-common.js?v=2.0"></script>
                                </div>
                                <!--qweather end-->
                            <?php } ?>
                        </div><!--left end-->
                        <!--right-->
                        <ul class="nav navbar-menu text-xs order-1 order-md-2">
                            <?php if ($theme_config['hitokoto'] == 1) { ?>
                                <li class="nav-item mr-3 mr-lg-0 d-none d-lg-block">
                                    <script>
                                        fetch('https://v1.hitokoto.cn')
                                            .then(response => response.json())
                                            .then(data => {
                                                const hitokoto = document.getElementById('hitokoto_text')
                                                hitokoto.href = 'https://hitokoto.cn/?uuid=' + data.uuid
                                                hitokoto.innerText = data.hitokoto
                                            })
                                            .catch(console.error)
                                    </script>
                                    <div><a href="#" target="_blank" id="hitokoto_text">欢迎使用TwoNav</a></div>
                                </li>
                            <?php } ?>
                            <!--搜索图标-->
                            <li class="nav-search ml-3 ml-md-4">
                                <a href="javascript:" data-toggle="modal" data-target="#search-modal"
                                   class="search-modal">
                                    <i class="iconfont icon-search icon-2x"></i>
                                </a>
                            </li>
                            <!--菜单图标-->
                            <li class="nav-item d-md-none mobile-menu ml-3 ml-md-4">
                                <a href="javascript:" id="sidebar-switch" data-toggle="modal" data-target="#sidebar">
                                    <i class="iconfont icon-classification icon-2x"></i>
                                </a>
                            </li>
                        </ul><!--right end-->
                    </div>
                </div>
            </div>
            <div class="placeholder" style="height:74px"></div>
        </div>
        <?php if ($theme_config['search-bg'] == 1) {
            require 'search-bg.php';
        } ?>
        <div id="content" class="content-site customize-site">
            <div class="flex-fill screen" style="display: none">
                <h4 class="text-gray text-lg mb-4">
                    <i class="fa fa-search icon-fw mr-2" id="search_bookmark"
                       data="<?php echo $theme_config['search_bookmark']; ?>"></i>站内搜索
                </h4>
                <div class="flex-fill"></div>
            </div>
            <div class="row screen" id="screen_result" style="display: none"></div>
            <?php foreach ($category_parent as $category) {
                $fid = $category['id'];
                $property = $category['property'] == 1 ? $property = '<i class="fa fa-lock" style="color:#5FB878"></i>' : '';
                ?>
                <div class="d-flex flex-fill">
                    <h4 class="text-gray text-lg mb-4">
                        <?php if (empty($category['icon'])) { ?>
                            <i class="<?php echo $category['font_icon']; ?> icon-fw mr-2"
                               id="category-<?php echo $category['id']; ?>"></i>
                        <?php } else { ?>
                            <img class="icon" src="<?php echo get_category_icon($category['icon']); ?>">
                        <?php } ?>
                        <?php echo $category['name']; ?> <?php echo $property; ?>
                    </h4>
                    <div class="flex-fill"></div>
                </div>
                <?php //如果存在二级分类
                if ($category['subitem_count'] > 0) {
                    $tabs = get_category_sub($category['id']); //读取二级分类
                    //读取配置,是否隐藏一级分类
                    if ($theme_config['hide-category'] == 0 || ($theme_config['hide-category'] == 1 && has_db('user_links', ['uid' => UID, 'status' => 1, 'fid' => $category['id']]))) {
                        array_unshift($tabs, $category); //不隐藏,将一级分类插入数组前面
                    }
                    ?>
                    <div class="d-flex flex-fill flex-tab align-items-center">
                        <div class='overflow-x-auto slider_menu mini_tab' slidertab="sliderTab">
                            <ul class="nav nav-pills menu" role="tablist">
                                <?php //渲染tab
                                foreach ($tabs as $key => $tab) { ?>
                                    <li class="pagenumber nav-item" data-id="<?php echo $tab['id']; ?>">
                                        <a id="category-<?php echo $tab['id']; ?>"
                                           class="nav-link <?php echo $key == 0 ? "active" : "" ?>" data-toggle="pill"
                                           href="#tab-<?php echo $tab['id']; ?>"
                                           data-link=""><?php echo $tab['name']; ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="flex-fill"></div>
                    </div>
                    <div class="tab-content mt-4">
                        <?php foreach ($tabs as $key => $tab) { ?>
                            <div id="tab-<?php echo $tab['id']; ?>"
                                 class="tab-pane <?php echo $key == 0 ? "active" : "" ?>">
                                <div class="row">
                                    <?php echo_url_card($tab['id']); ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php
                    //如果不存在二级分类
                } else { ?>
                    <div class="row">
                        <?php echo_url_card($category['id']); ?>
                    </div>
                <?php } ?>
                <br/>
            <?php } ?>
            <?php if (!empty($theme_config['friend-link'])) { ?>
                <h4 class="text-gray text-lg mb-4"><i class="iconfont icon-book-mark-line icon-lg mr-2"
                                                      id="friendlink"></i>友情链接</h4>
                <div class="friendlink text-xs card">
                    <div class="card-body">
                        <?php echo $theme_config['friend-link']; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <footer class="main-footer footer-type-1 text-xs">
            <div id="footer-tools" class="d-flex flex-column">
                <a href="javascript:" id="to-up" class="btn rounded-circle go-up m-1" data-toggle="tooltip"
                   data-placement="left" title="返回顶部">
                    <i class="iconfont icon-to-up"></i>
                </a>
                <a href="javascript:" data-toggle="modal" data-target="#search-modal"
                   class="btn rounded-circle m-1 search-modal" rel="search" one-link-mark="yes" title="聚合搜索">
                    <i class="iconfont icon-search"></i>
                </a>
                <a href="javascript:" id="NightMode" data="<?php echo $theme_config['NightMode']; ?>"
                   class="btn rounded-circle switch-dark-mode m-1" data-toggle="tooltip" data-placement="left"
                   title="日间模式">
                    <i class="mode-ico iconfont"></i>
                </a>
            </div>
            <div class="footer-inner">
                <div class="footer-text">
                    <?php echo $copyright . PHP_EOL; ?>
                    <?php echo $ICP . PHP_EOL; ?>
                    <?php echo $site['custom_footer'] . PHP_EOL; ?>
                    <?php echo $global_config['global_footer'] . PHP_EOL; ?>
                </div>
            </div>
        </footer>
    </div>
</div>
<?php if ($theme_config['search-modal'] == 1) {
    require 'search-modal.php';
} ?>
<?php if ($theme_config['hover_tip'] == 1) { //悬停提示 ?>
    <script type='text/javascript' src='<?php echo $theme_dir ?>/assets/js/popper.min.js'></script>
<?php } ?>
<script type='text/javascript' src='<?php echo $libs ?>/bootstrap4/js/bootstrap.min.js'></script>
<?php if ($theme_config['lazyload'] == 1) { //延迟加载 ?>
    <script type='text/javascript' src='<?php echo $theme_dir ?>/assets/js/lazyload.min-12.4.0.js'></script>
<?php } ?>
<script type='text/javascript'
        src='<?php echo $theme_dir ?>/assets/js/app-mini.js?v=<?php echo $theme_ver; ?>'></script>
</body>
</html>