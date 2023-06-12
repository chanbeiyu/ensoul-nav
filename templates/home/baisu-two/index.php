<?php
$Logo = $theme_config['logo_url'];
$Logo = empty($Logo) ? $theme_dir . '/images/logo.png' : $Logo;
if ($theme_config['search'] == 0) {
    $theme_config['weather'] = 0;
    $theme_config['date'] = 0;
    $theme_config['search_url'] = 0;
    $theme_config['search_bookmark'] = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta name="applicable-device" content="pc,mobile">
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="author" content="BaiSu"/>
    <title><?php echo $site['Title']; ?></title>
    <meta name="keywords" content="<?php echo $site['keywords']; ?>">
    <meta name="description" content="<?php echo $site['description']; ?>">
    <link rel="shortcut icon" href="<?php echo $favicon; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_dir ?>/css/style.css?v=<?php echo $theme_ver; ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $libs ?>/Font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $libs ?>/Layui/v2.6.8/css/layui.css"/>
    <script>var u = '<?php echo $u?>';
        var search_bookmark = <?php echo $theme_config['search_bookmark']?>;</script>
    <style type="text/css">
        <?php if($theme_config['weather'] == 0 && $theme_config['date'] == 0){ ?>
        /*搜索栏宽度*/
        .search-main {
            width: calc(100%);
        }

        <?php }elseif($theme_config['weather'] == 0 || $theme_config['date'] == 0){ ?>
        /*搜索栏宽度*/
        .search-main {
            width: calc(100% - 250px);
        }

        <?php }?>
        @media only screen and (max-width: 1200px) {
            .search-main {
                width: 100%;
            }
        }

        <?php if( !is_login) { ?>
        /*未登录样式*/
        .is_login {
            display: none !important;
        }

        .index-nav .type-list .list {
            border-radius: 5px 5px 5px 5px;
        }

        .index-nav .type-list .list a {
            width: 100%;
        }

        <?php }?>
        /*链接描述是否显示*/
        .site-main .site-list .list .desc {
            display: <?php echo $theme_config['describe'] == '1' ? "block" : "none" ; ?>;
        }

        <?php echo !empty($theme_config['search_background_url']) ? ".search-main {background-image: url(".$theme_config['search_background_url'].");}" : "" ; ?>

    </style>
    <?php echo $site['custom_header'] . PHP_EOL ?>
    <?php echo $global_config['global_header'] . PHP_EOL ?>
</head>
<body>
<!--手机顶部-->
<div class="m-header">
    <div class="logo"><a href=""><img src="<?php echo $Logo ?>"/></a></div>
    <div class="navbar"><i class="iconfont icon-caidan"></i></div>
    <div class="m-navlist-w">
        <div class="m-navlist">
            <a href="./index.php?c=admin&u=<?php echo $u ?>" class="list fa fa-user-circle">&ensp;后台管理</a>
            <?php foreach ($categorys as $category) { ?>
                <a href="#category-<?php echo $category['id']; ?>" class="list catlist"><i
                        class='<?php echo $category['font_icon']; ?>'></i><?php echo $category['name']; ?></a>
            <?php } ?>
        </div>
    </div>
</div>

<!--左侧分类栏-->
<div class="index-nav">
    <div class="logo"><a href=""><img src="<?php echo $Logo ?>"/></a></div>
    <div class="type-list">
        <?php foreach ($category_parent as $category) { ?>
            <div class="list">
                <a href="#category-<?php echo $category['id']; ?>" class="catlist list-a"><i
                        class='<?php echo $category['font_icon']; ?>'></i><?php echo $category['name']; ?></a>
                <span class="editFid is_login" data-fid="<?php echo $category['id']; ?>"><i
                        class="iconfont icon-bianji"></i></span>
            </div>
            <?php foreach (get_category_sub($category['id']) as $category_sub) { ?>
                <div class="list" style="padding-left:1em;">
                    <a class="catlist list-a list-s" href="#category-<?php echo $category_sub['id']; ?>"><i
                            class='<?php echo $category_sub['font_icon']; ?>'></i><?php echo $category_sub['name']; ?>
                    </a>
                    <span class="editFid is_login" data-fid="<?php echo $category_sub['id']; ?>"><i
                            class="iconfont icon-bianji"></i></span>
                </div>
                <?php
            }
        }
        ?>
        <div class="list add is_login" id="addCat"><a><i class="iconfont icon-tianjia"></i>添加分类</a></div>
    </div>
    <div class="user-info">
        <div class="pic" id="config"><img src="<?php echo $theme_dir ?>/images/touxiang.png"/></div>
        <div class="text">
            <?php if (is_login) { ?>
                <a href="./index.php?c=admin&u=<?php echo U ?>" target="_blank">
                    <p class="t1"></p>
                    <p class="t2">系统管理</p>
                </a>
            <?php } else { ?>
                <a href="./index.php?c=admin&u=<?php echo U ?>" target="_self">
                    <p class="t1">尚未登录</p>
                    <p class="t2">请先登录账户！</p>
                </a>
            <?php } ?>
        </div>
    </div>
</div>

<!--中间主体-->
<div class="index-main">
    <?php
    if ($theme_config['search'] == 1) {
        ?>
        <div class="search-main-w">
            <!--搜索-->
            <div class="search-main">
                <div class="search-input">
                    <input type="text" class="kw" name="search" id="search" value="" class="kw"
                           placeholder="回车键百度搜索" autocomplete="off"/>
                    <button class="search-bendi"><i class="iconfont icon-sousuo"></i></button>
                </div>
                <div class="search-btnlist">
                    <button class="search-btn" data-url="https://www.baidu.com/s?ie=UTF-8&wd="><img
                            src="<?php echo $theme_dir ?>/images/icon/baidu.svg"/>百度搜索
                    </button>
                    <button class="search-change"><i class="iconfont icon-xiangxia"></i></button>
                    <div class="search-lists hide">
                        <div class="list" id="baidu" data-url="https://www.baidu.com/s?ie=UTF-8&wd="><img
                                src="<?php echo $theme_dir ?>/images/icon/baidu.svg"/>百度搜索
                        </div>
                        <div class="list" id="google" data-url="https://www.google.com/search?q="><img
                                src="<?php echo $theme_dir ?>/images/icon/google.svg"/>谷歌搜索
                        </div>
                        <div class="list" id="bing" data-url="https://cn.bing.com/search?q="><img
                                src="<?php echo $theme_dir ?>/images/icon/bing.svg"/>必应搜索
                        </div>
                        <div class="list" id="zhihu" data-url="https://www.zhihu.com/search?type=content&q="><img
                                src="<?php echo $theme_dir ?>/images/icon/zhihu.png"/>知乎搜索
                        </div>
                        <div class="list" id="bilibili" data-url="https://search.bilibili.com/all?keyword="><img
                                src="<?php echo $theme_dir ?>/images/icon/bilibili.svg"/>Bilibili搜索
                        </div>
                        <div class="list" id="weibo" data-url="https://s.weibo.com/weibo?q="><img
                                src="<?php echo $theme_dir ?>/images/icon/weibo.svg"/>微博搜索
                        </div>
                        <div class="list" id="toutiao"
                             data-url="https://so.toutiao.com/search?dvpf=pc&source=input&keyword="><img
                                src="<?php echo $theme_dir ?>/images/icon/toutiao.ico"/>头条搜索
                        </div>
                        <div class="list kongs"></div>
                    </div>
                </div>
            </div>
            <?php
            if ($theme_config['date'] == 1) {
                ?>
                <!--日期时间-->
                <div class="date-main">
                    <time class="times" id="nowTime">18:18:18</time>
                    <span class="dates" id="nowYmd">2023年02月06日</span>
                    <div class="list">
                        <span class="lunars" id="nowLunar">癸卯年正月十六</span>
                        <span class="weeks" id="nowWeek">星期一</span>
                    </div>
                </div>
            <?php } ?>
            <?php
            if ($theme_config['weather'] == 1) {
                ?>
                <!--天气-->
                <div class="weather-main" id="he-plugin-standard"></div>
            <?php } ?>
        </div>
    <?php } ?>
    <!--链接列表-->
    <div class="site-main">
        <?php foreach ($categorys as $category) {
            $fid = $category['id'];
            $links = get_links($fid);
            $property = $category['property'] == 1 ? '<span><i class="one iconfont icon-suo"></i></span>' : '';
            ?>
            <div class="site-name" id="category-<?php echo $category['id']; ?>"><i
                    class='<?php echo $category['font_icon']; ?>'></i><?php echo $category['name']; ?><?php echo $property; ?>
                <p class="c_desc"><?php echo $category['description']; ?></p></div>
            <div class="site-list">
                <?php foreach ($links as $link) {
                    $link['description'] = empty($link['description']) ? '作者很懒，没有填写描述。' : $link['description'];
                    ?>
                    <div class="list urllist"<?php if (is_login) { ?> id="<?php echo $link['id']; ?>"<?php } ?>>
                        <a href="<?php echo $link['url']; ?>">
                            <p class="name"><img src="<?php echo $link['ico']; ?>"><?php echo $link['title']; ?></p>
                            <?php if ($theme_config['search_url'] == 1) { ?>
                                <p class="hide"><?php echo $link['real_url']; ?></p>
                            <?php } ?>
                            <?php if ($theme_config['describe'] == 1) { ?>
                                <p class="desc"><?php echo $link['description']; ?></p>
                            <?php } ?>
                        </a>
                        <?php if ($link['property'] == 1) { ?>
                            <span><i class="one iconfont icon-suo"></i></span>
                        <?php } ?>
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

<!--底部版权-->
<footer>
    <?php echo $copyright . PHP_EOL; ?>
    <?php echo $ICP . PHP_EOL; ?>
    <?php echo $site['custom_footer'] . PHP_EOL; ?>
    <?php echo $global_config['global_footer'] . PHP_EOL; ?>
</footer>

<!--右下角-->
<div class="tool-list">
    <div class="addsite list is_login" id="addsite"><i class="iconfont icon-tianjia"></i></div>
    <a href="./index.php?c=admin&u=<?php echo $u ?>" class="addsite list"><i class="iconfont icon-zhanghao"></i></a>
    <div class="scroll_top list"><i class="iconfont icon-top"></i></div>
</div>


<!--iconfont-->
<link rel="stylesheet" type="text/css" href="<?php echo $theme_dir ?>/iconfont/iconfont.css"/>
<script src="<?php echo $theme_dir ?>/iconfont/iconfont.js" type="text/javascript" charset="utf-8"></script>
<!--JS-->
<script src="<?php echo $libs ?>/jquery/jquery-3.6.0.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $libs ?>/Layui/v2.6.8/layui.js" type="text/javascript" charset="utf-8"></script>
<?php if ($theme_config['search_bookmark'] == 1) { ?>
    <script src="<?php echo $libs ?>/Other/holmes.js" type="text/javascript" charset="utf-8"></script>
<?php } ?>
<script src="<?php echo $theme_dir ?>/js/common.js?v=<?php echo $theme_ver; ?>" type="text/javascript"
        charset="utf-8"></script>
<?php
if (is_login) {
    require 'admin.php';
}
if ($theme_config['weather'] == 1) {
    ?>

    <!--天气-->
    <script type="text/javascript">
        WIDGET = {
            "CONFIG": {
                "layout": "1",
                "width": "240",
                "height": "180",
                "background": "1",
                "dataColor": "FFFFFF",
                "borderRadius": "6",
                "modules": "10",
                "key": "7423b182d5cb48239f19df9e25cdf320"
            }
        }
    </script>
    <script src="https://widget.qweather.net/standard/static/js/he-standard-common.js?v=2.0"></script>
<?php } ?>
<!--打开方式-->
<script type="text/javascript">
    $(document).ready(function () {
        $(".urllist").find("a").attr("target", "<?php echo $theme_config['open_with'] == 0 ? '_blank' : '_self'?>");
    })
</script>
</body>
</html>