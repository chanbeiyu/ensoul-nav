<?php
/**
 * 获取主题设置参数
 */
//获取要显示的默认分类数据
$default_category_id = intval($theme_config['default_category_id']);
//如果$default_category_id为0，说明用户没有设置默认要显示的分类，则取第一个权重最高的来显示
if (empty($default_category_id)) {
    $default_category_id = intval($categorys[0]['id']);
}

//获取CID（分类ID）参数
$cid = @intval($_GET['cid']);
//如果CID为空，或者小于等于0，则使用默认ID
if (empty($cid) || $cid <= 0) {
    $cid = $default_category_id;
}

//遍历所有分类，判断用户传递的分类是否是私有
foreach ($categorys as $value) {
    if ($value['id'] == $cid) {
        //如果是私有
        if (intval($value['property']) === 1) {
            if (is_login) { //判断是否登录
                $links = get_links($cid); //已登录,获取分类下的链接
            } else {
                $links = []; //私有分类，且没有登录
            }
        } else {
            $links = get_links($cid); //公有分类,取分类下的链接
        }
        break; //终止循环
    }
}

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo $site['Title']; ?></title>
    <meta name="keywords" content="<?php echo $site['keywords']; ?>">
    <meta name="description" content="<?php echo $site['description']; ?>">
    <link rel="shortcut icon" href="<?php echo $favicon; ?>">
    <link rel='stylesheet' id='bootstrap-css' href='<?php echo $libs ?>/bootstrap4/css/bootstrap.min.css'
          type='text/css' media='all'>
    <link rel='stylesheet' id='style-css' href='<?php echo $theme_dir ?>/static/style.css?v=<?php echo $theme_ver; ?>'
          type='text/css' media='all'>
    <script src='<?php echo $libs ?>/jquery/jquery-3.6.0.min.js'></script>
</head>
<body class="user-bookmark-body bookmark-default">
<div class="page-container">
    <div class="bookmark-bg">
        <div class="img-bg" id="img-bg"
             style='background-image: url("<?php echo empty($theme_config['bg_img']) ? $theme_dir . "/static/bg.jpg" : $theme_config['bg_img']; ?>");'></div>
        <div class="gradient-linear"></div>
    </div>
    <!--顶部栏-->
    <header class="navbar navbar-dark fixed-top">
        <?php if ($theme_config['qweather'] == 1) { ?>
            <!--和风天气-->
            <div class="weather">
                <div id="he-plugin-simple" style="display: contents;"></div>
                <script>
                    WIDGET = {
                        "CONFIG": {
                            "modules": "01234",
                            "background": "5",
                            "tmpColor": "FFFFFF",
                            "tmpSize": "20",
                            "cityColor": "FFFFFF",
                            "citySize": "16",
                            "aqiColor": "FFFFFF",
                            "aqiSize": "16",
                            "weatherIconSize": "30",
                            "alertIconSize": "18",
                            "padding": "0px 5px 0px 5px",
                            "shadow": "0",
                            "language": "auto",
                            "fixed": "false",
                            "vertical": "top",
                            "horizontal": "left",
                            "key": "257fe54e3a0b4cd29b399d2831bd56e0"
                        }
                    }
                </script>
                <script src="https://widget.qweather.net/simple/static/js/he-simple-common.js?v=2.0" defer=""></script>
            </div>
        <?php } ?>
        <!--有上角图标-->
        <ul class="nav navbar-menu">
            <li class="nav-login ml-3">
                <a href="./?c=admin&u=<?php echo U; ?>" class="text-light" title="系统管理">
                    <svg t="1681109027471" class="icon" viewBox="0 0 1024 1024" version="1.1"
                         xmlns="http://www.w3.org/2000/svg" p-id="4419" width="32" height="32">
                        <path
                            d="M512 704c-105.6 0-192-86.4-192-192s86.4-192 192-192 192 86.4 192 192-86.4 192-192 192z m0-320c-70.4 0-128 57.6-128 128s57.6 128 128 128 128-57.6 128-128-57.6-128-128-128z m75.2 576H438.4c-46.4 0-84.8-38.4-84.8-84.8 0-8-4.8-16-12.8-19.2-12.8-6.4-25.6-14.4-38.4-22.4-8-4.8-16-4.8-22.4-1.6-41.6 24-92.8 9.6-116.8-32L86.4 672c-11.2-19.2-14.4-43.2-8-65.6 6.4-22.4 20.8-40 40-51.2 6.4-4.8 11.2-12.8 11.2-20.8v-44.8c0-8-3.2-16-11.2-20.8-41.6-24-54.4-75.2-32-116.8l75.2-129.6c24-41.6 75.2-54.4 116.8-32 6.4 3.2 16 3.2 22.4-1.6 12.8-8 25.6-16 38.4-22.4 8-3.2 12.8-11.2 12.8-19.2 0-44.8 38.4-83.2 84.8-83.2h148.8c48 0 86.4 38.4 86.4 84.8 0 8 4.8 16 12.8 19.2 12.8 6.4 25.6 14.4 38.4 22.4 8 4.8 16 4.8 24 1.6 19.2-11.2 43.2-14.4 64-8 22.4 6.4 40 20.8 51.2 40l75.2 129.6c24 41.6 9.6 92.8-32 116.8-6.4 4.8-11.2 12.8-11.2 20.8V536c0 8 3.2 16 11.2 20.8 19.2 11.2 33.6 30.4 40 51.2s3.2 44.8-8 65.6L862.4 800c-24 40-75.2 54.4-116.8 32-6.4-4.8-16-3.2-24 1.6-12.8 8-25.6 16-38.4 22.4-8 3.2-12.8 11.2-12.8 19.2 1.6 46.4-36.8 84.8-83.2 84.8zM288 764.8c16 0 33.6 4.8 48 14.4 9.6 6.4 20.8 12.8 32 17.6 28.8 14.4 48 44.8 48 76.8 0 11.2 9.6 20.8 20.8 20.8h148.8c11.2 0 20.8-9.6 20.8-20.8 0-32 17.6-62.4 48-76.8 11.2-4.8 20.8-11.2 32-17.6 27.2-17.6 62.4-19.2 89.6-3.2 9.6 6.4 24 1.6 28.8-8L880 638.4c3.2-4.8 3.2-11.2 1.6-16-1.6-4.8-4.8-9.6-9.6-12.8-28.8-16-44.8-46.4-43.2-80v-35.2c-1.6-33.6 14.4-64 43.2-80 9.6-6.4 14.4-19.2 8-28.8L808 256c-3.2-4.8-8-8-12.8-9.6-4.8-1.6-11.2 0-16 1.6-28.8 16-62.4 14.4-89.6-3.2-9.6-6.4-20.8-12.8-32-17.6-28.8-14.4-48-44.8-48-76.8-1.6-12.8-11.2-22.4-22.4-22.4H438.4c-12.8 0-22.4 9.6-22.4 20.8 0 32-17.6 62.4-48 76.8-11.2 4.8-20.8 11.2-32 17.6-27.2 17.6-62.4 19.2-91.2 3.2-9.6-6.4-24-1.6-28.8 8L142.4 384c-6.4 9.6-1.6 24 8 28.8 28.8 16 44.8 46.4 43.2 80V528c1.6 33.6-14.4 64-43.2 80-4.8 3.2-8 8-9.6 12.8-1.6 4.8 0 11.2 1.6 16l75.2 129.6c6.4 9.6 19.2 14.4 28.8 8 12.8-6.4 27.2-9.6 41.6-9.6z"
                            fill="#8a8a8a" p-id="4420"></path>
                    </svg>
                </a>
            </li>
        </ul>
    </header>
    <div class="header-big mb-4">
        <div class="s-search">
            <div id="search" class="s-search mx-auto" data="<?php echo $theme_config['suggestion'] == 1 ? 1 : 0; ?>">
                <div class="big-title text-center mb-3 mb-md-5 mt-2">
                    <p class="h1" style="letter-spacing: 6px;"><?php echo $site['logo']; ?></p>
                </div>
                <div id="search-list-menu" class="hide-type-list" style="margin-bottom: 10px; ">
                    <div class="s-type text-center overflow-x-auto">
                        <div class="s-type-list big">
                            <div class="anchor" style="position: absolute; left: 50%; opacity: 0;"></div>
                            <label for="type-baidu1" class="active" data-id="group-b"><span>搜索</span></label>
                            <label for="type-br" data-id="group-c"><span>工具</span></label>
                            <label for="type-zhihu" data-id="group-d"><span>社区</span></label>
                            <label for="type-taobao1" data-id="group-e"><span>生活</span></label>
                            <label for="type-juhe" data-id="group-f"><span>影视</span></label>
                        </div>
                    </div>
                </div>
                <form action="https://www.baidu.com/s?wd=" method="get" target="_blank" class="super-search-fm">
                    <input type="text" id="search-text" class="form-control smart-tips search-key" zhannei=""
                           placeholder="输入关键字搜索" style="outline:0" autocomplete="off">
                    <button class="submit" type="submit">
                        <svg t="1681107371061" class="icon" viewBox="0 0 1024 1024" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" p-id="2916" width="32" height="32">
                            <path
                                d="M425.275 723.851c-40.108 0-79.093-7.867-115.76-23.391-35.402-14.962-67.222-36.386-94.476-63.71-27.324-27.324-48.748-59.074-63.71-94.476-15.524-36.737-23.391-75.651-23.391-115.83s7.867-79.093 23.391-115.76c14.962-35.402 36.386-67.152 63.71-94.476s59.074-48.748 94.476-63.71c36.737-15.524 75.651-23.391 115.76-23.391s79.093 7.867 115.76 23.391c35.402 14.962 67.222 36.386 94.476 63.71 27.324 27.324 48.748 59.074 63.71 94.476 15.524 36.667 23.391 75.651 23.391 115.76s-7.867 79.093-23.391 115.76c-14.962 35.402-36.386 67.222-63.71 94.476-27.324 27.254-59.074 48.748-94.476 63.71-36.667 15.594-75.582 23.461-115.76 23.461z m0-538.549c-64.412 0-124.961 25.077-170.549 70.664s-70.594 106.066-70.594 170.478 25.077 124.961 70.664 170.549c45.517 45.517 106.136 70.664 170.549 70.664s124.961-25.077 170.549-70.664c45.517-45.517 70.594-106.136 70.594-170.549s-25.077-124.961-70.664-170.549c-45.518-45.517-106.137-70.593-170.549-70.593z"
                                p-id="2917" fill="#ffffff"></path>
                            <path
                                d="M802.266 831.533c-7.165 0-14.4-2.74-19.879-8.218L595.683 636.61c-10.958-10.958-10.958-28.729 0-39.757 10.958-11.028 28.729-10.958 39.757 0l186.705 186.705c10.958 10.958 10.958 28.729 0 39.757-5.479 5.478-12.714 8.218-19.879 8.218z"
                                p-id="2918" fill="#ffffff"></path>
                        </svg>
                    </button>
                </form>
                <div id="search-list" class="hide-type-list">
                    <div class="search-group group-b s-current">
                        <ul class="search-type">
                            <li><input checked="checked" hidden="" type="radio" name="type" id="type-baidu1"
                                       value="https://www.baidu.com/s?wd=" data-placeholder="百度一下"><label
                                    for="type-baidu1"><span class="text-muted">百度</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-google1"
                                       value="https://www.google.com/search?q=" data-placeholder="谷歌两下"><label
                                    for="type-google1"><span class="text-muted">谷歌</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-sogo"
                                       value="https://www.sogou.com/web?query=" data-placeholder="搜狗搜索"><label
                                    for="type-sogo"><span class="text-muted">搜狗</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-bing1"
                                       value="https://cn.bing.com/search?q=" data-placeholder="必应搜索"><label
                                    for="type-bing1"><span class="text-muted">必应</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-kuake"
                                       value="https://quark.sm.cn/s?q=" data-placeholder="夸克搜索"><label
                                    for="type-kuake"><span class="text-muted">夸克</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-toutiao"
                                       value="https://so.toutiao.com/search/?keyword="
                                       data-placeholder="头条搜索"><label for="type-toutiao"><span
                                        class="text-muted">头条</span></label></li>
                        </ul>
                    </div>
                    <div class="search-group group-c">
                        <ul class="search-type">
                            <li><input hidden="" type="radio" name="type" id="type-br"
                                       value="https://rank.chinaz.com/all/" data-placeholder="请输入网址(不带https://)"><label
                                    for="type-br"><span class="text-muted">权重查询</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-links"
                                       value="https://link.chinaz.com/"
                                       data-placeholder="请输入网址(不带https://)"><label for="type-links"><span
                                        class="text-muted">友链检测</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-icp" value="https://icp.aizhan.com/"
                                       data-placeholder="请输入网址(不带https://)"><label for="type-icp"><span
                                        class="text-muted">备案查询</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-ping"
                                       value="https://ping.chinaz.com/"
                                       data-placeholder="请输入网址(不带https://)"><label for="type-ping"><span
                                        class="text-muted">PING检测</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-404"
                                       value="https://tool.chinaz.com/Links/?DAddress="
                                       data-placeholder="请输入网址(不带https://)"><label for="type-404"><span
                                        class="text-muted">死链检测</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-ciku"
                                       value="https://www.ciku5.com/s?wd=" data-placeholder="请输入关键词"><label
                                    for="type-ciku"><span class="text-muted">关键词挖掘</span></label></li>
                        </ul>
                    </div>
                    <div class="search-group group-d">
                        <ul class="search-type">
                            <li><input hidden="" type="radio" name="type" id="type-zhihu"
                                       value="https://www.zhihu.com/search?type=content&q="
                                       data-placeholder="知乎"><label for="type-zhihu"><span
                                        class="text-muted">知乎</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-wechat"
                                       value="https://weixin.sogou.com/weixin?type=2&query="
                                       data-placeholder="微信"><label for="type-wechat"><span
                                        class="text-muted">微信</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-weibo"
                                       value="https://s.weibo.com/weibo/" data-placeholder="微博"><label
                                    for="type-weibo"><span class="text-muted">微博</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-douban"
                                       value="https://www.douban.com/search?q=" data-placeholder="豆瓣"><label
                                    for="type-douban"><span class="text-muted">豆瓣</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-why"
                                       value="https://ask.seowhy.com/search/?q=" data-placeholder="SEO问答社区"><label
                                    for="type-why"><span class="text-muted">搜外问答</span></label></li>
                        </ul>
                    </div>
                    <div class="search-group group-e">
                        <ul class="search-type">
                            <li><input hidden="" type="radio" name="type" id="type-taobao1"
                                       value="https://s.taobao.com/search?q=" data-placeholder="淘宝"><label
                                    for="type-taobao1"><span class="text-muted">淘宝</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-jd"
                                       value="https://search.jd.com/Search?keyword=" data-placeholder="京东"><label
                                    for="type-jd"><span class="text-muted">京东</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-12306" value="https://www.12306.cn/?"
                                       data-placeholder="12306"><label for="type-12306"><span
                                        class="text-muted">12306</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-kd100"
                                       value="https://www.kuaidi100.com/?" data-placeholder="快递100"><label
                                    for="type-kd100"><span class="text-muted">快递100</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-qunar"
                                       value="https://www.qunar.com/?" data-placeholder="去哪儿"><label
                                    for="type-qunar"><span class="text-muted">去哪儿</span></label></li>
                        </ul>
                    </div>
                    <div class="search-group group-f">
                        <ul class="search-type">
                            <li><input hidden="" type="radio" name="type" id="type-juhe"
                                       value="https://www.cupfox.com/search?key="
                                       data-placeholder="影视资源聚合搜索"><label for="type-juhe"><span
                                        class="text-muted">聚合搜索</span></label></li>
                            <li><input hidden="" type="radio" name="type" id="type-555"
                                       value="https://www.o8tv.com/vodsearch/-------------.html?wd="
                                       data-placeholder="在线影视搜索"><label for="type-555"><span class="text-muted">555电影</span></label>
                            </li>
                            <li><input hidden="" type="radio" name="type" id="type-dyxs"
                                       value="http://dyxs15.com/search--------------/?wd="
                                       data-placeholder="在线影视搜索"><label for="type-dyxs"><span class="text-muted">电影先生</span></label>
                            </li>
                            <li><input hidden="" type="radio" name="type" id="type-dibi"
                                       value="https://www.mp4er.cc/search/" data-placeholder="在线及下载影视搜索"><label
                                    for="type-dibi"><span class="text-muted">哔嘀影视</span></label></li>
                        </ul>
                    </div>
                </div>
                <div class="card search-smart-tips">
                    <ul id="word" style="display: none"></ul>
                </div>
            </div>
        </div>
    </div>

    <section class="quick-sites position-relative">
        <div class="container text-center px-5">
            <div class="row">
                <?php foreach ($links as $link) { ?>
                    <a class="sites-btn col-3 col-md-2 text-center mb-4" target="_blank"
                       href="<?php echo $link['url']; ?>" title="<?php echo $link['title']; ?>" rel="noopener">
                        <div class="d-flex mb-2">
                            <div class="sites-icon mx-auto ub-blur-bg">
                                <img src="<?php echo $link['ico']; ?>" alt="">
                            </div>
                        </div>
                        <div class="sites-title ub-blur-bg px-2 text-xs overflowClip_1">
                            <span><?php echo $link['title']; ?></span>
                        </div>
                    </a>
                <?php } ?>
            </div>
    </section>

    <footer class="main-footer footer-type-1 position-relative text-xs">
        <div id="footer-tools" class="d-flex flex-column">
            <a href="javascript:" id="to-up" rel="go-top" style="display: none;" one-link-mark="yes">
                <svg t="1681108158198" class="icon" viewBox="0 0 1024 1024" version="1.1"
                     xmlns="http://www.w3.org/2000/svg" p-id="4419" width="32" height="32">
                    <path
                        d="M832 608c-8 0-16-3.2-22.4-9.6L512 300.8 214.4 598.4c-12.8 12.8-32 12.8-44.8 0-12.8-12.8-12.8-32 0-44.8l320-320c12.8-12.8 32-12.8 44.8 0l320 320c12.8 12.8 12.8 32 0 44.8-6.4 6.4-14.4 9.6-22.4 9.6zM512 960c-17.6 0-32-14.4-32-32V288c0-17.6 14.4-32 32-32s32 14.4 32 32v640c0 17.6-14.4 32-32 32z m320-800H192c-17.6 0-32-14.4-32-32s14.4-32 32-32h640c17.6 0 32 14.4 32 32s-14.4 32-32 32z"
                        fill="#8a8a8a" p-id="4420"></path>
                </svg>
            </a>
        </div>
        <div class="footer-inner text-center text-light my-3" style="color: #f8f9fa45!important;">
            <div class="footer-text">
                <?php echo $copyright . PHP_EOL; ?>
                <?php echo $ICP . PHP_EOL; ?>
                <?php echo $site['custom_footer'] . PHP_EOL; ?>
                <?php echo $global_config['global_footer'] . PHP_EOL; ?>
            </div>
        </div>
    </footer>
</div>
<script src="<?php echo $libs ?>/bootstrap4/js/bootstrap.min.js"></script>
<script src="<?php echo $theme_dir ?>/static/app.js?v=<?php echo $theme_ver; ?>"></script>
</body>
</html>