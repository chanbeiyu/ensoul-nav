<!DOCTYPE html>
<html lang="zh-CN" element::-webkit-scrollbar {display:none}>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $site['Title']; ?></title>
    <meta name="keywords" content="<?php echo $site['keywords'] ?>">
    <meta name="description" content="<?php echo $site['description'] ?>">
    <meta name="author" content="LyLme">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="full-screen" content="yes">
    <meta name="browsermode" content="application">
    <meta name="x5-fullscreen" content="true">
    <meta name="x5-page-mode" content="app">
    <meta name="lsvn" content="<?php echo base64_encode($version) ?>">
    <link rel="shortcut icon" href="<?php echo $favicon; ?>">
    <script src="<?php echo $libs ?>/jquery/jquery-3.5.1.min.js" type="application/javascript"></script>
    <link rel="stylesheet" href="<?php echo $libs; ?>/bootstrap4/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $libs; ?>/Font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo $theme_dir; ?>/css/style.css?v=20221225" type="text/css">
    <link rel="stylesheet" href="<?php echo $theme_dir; ?>/css/font.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $theme_dir; ?>/css/tag.css?v=20221225" type="text/css">
</head>
<style type="text/css">
    html body::before {
        background: url(<?php echo $theme_config['backgroundURL']??'./templates/quality/img/background.jpg';?>);
        background-size: cover;
    }

    <?php $icon = $theme_config['icon'] ;  if( $icon == 'right_up' || $icon == 'right_down'){ ?>
    @media screen and (min-width: 768px) {
        .type-right {
            right: 17px;
        }

        .box {
            margin: 0px 0;
            position: fixed;
            z-index: 1000;
            right: 115px;
        }

        .box-right {
            padding-left: 0px;
        }

        .change-type .type-left {
            border-bottom-right-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 5px;
            border-top-left-radius: 5px;
        }

    <?php } echo $icon == 'right_down' ? ".type-right{top: calc(100% - 160px);}	    }\n":"	    }\n";?>
    <?php
            $lists = $theme_config['links-lists'];
            $type = getSubstrRight($lists,'-');
            $num = intval(getSubstrLeft($lists,'-')) ;
            if( $type == 'fix' ){ //固定
                    echo "	    .links-lists { height: ".($num * 64) ."px;}
            @media screen and (max-width: 768px) {.links-lists {height: ".($num * 43.75) ."px;}}";
                }elseif($type == 'max'){ //最大
                    echo "	    .links-lists { max-height: ".($num * 64) ."px;}
            @media screen and (max-width: 768px) {.links-lists {max-height: ".($num * 43.75) ."px;}}";
                }
    ?>
</style>
<body>
<!--分类抽屉-->
<div class="box" style="height:90%;">
    <div class="change-type" style="height:90%;">
        <div style="overflow-y:auto;" class="type-left" id="type-left">
            <ul class="box-right">
                <li data-lylme="search"><a>搜索</a><span></span></li>
                <?php foreach ($categorys as $category) { ?>
                    <li data-lylme="group_<?php echo $category["id"]; ?>">
                        <a><?php echo $category["name"]; ?></a><span></span></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<!--topbar开始-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="position: absolute; z-index: 10000;">
    <button class="navbar-toggler collapsed" style="border: none; outline: none;" type="button" data-toggle="collapse"
            data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false"
            aria-label="Toggle navigation">
        <svg class="icon" width="200" height="200">
            <use xlink:href="#icon-menus"></use>
        </svg>
    </button>
    <div class="type-right">
        <svg t="1671693845864" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
             p-id="1680" width="200" height="200">
            <path
                d="M384 448H170.666667c-34.133333 0-64-29.866667-64-64V170.666667c0-34.133333 29.866667-64 64-64h213.333333c34.133333 0 64 29.866667 64 64v213.333333c0 34.133333-29.866667 64-64 64z m-213.333333-298.666667c-12.8 0-21.333333 8.533333-21.333334 21.333334v213.333333c0 12.8 8.533333 21.333333 21.333334 21.333333h213.333333c12.8 0 21.333333-8.533333 21.333333-21.333333V170.666667c0-12.8-8.533333-21.333333-21.333333-21.333334H170.666667zM384 917.333333H170.666667c-34.133333 0-64-29.866667-64-64v-213.333333c0-34.133333 29.866667-64 64-64h213.333333c34.133333 0 64 29.866667 64 64v213.333333c0 34.133333-29.866667 64-64 64z m-213.333333-298.666666c-12.8 0-21.333333 8.533333-21.333334 21.333333v213.333333c0 12.8 8.533333 21.333333 21.333334 21.333334h213.333333c12.8 0 21.333333-8.533333 21.333333-21.333334v-213.333333c0-12.8-8.533333-21.333333-21.333333-21.333333H170.666667zM853.333333 448h-213.333333c-34.133333 0-64-29.866667-64-64V170.666667c0-34.133333 29.866667-64 64-64h213.333333c34.133333 0 64 29.866667 64 64v213.333333c0 34.133333-29.866667 64-64 64z m-213.333333-298.666667c-12.8 0-21.333333 8.533333-21.333333 21.333334v213.333333c0 12.8 8.533333 21.333333 21.333333 21.333333h213.333333c12.8 0 21.333333-8.533333 21.333334-21.333333V170.666667c0-12.8-8.533333-21.333333-21.333334-21.333334h-213.333333zM853.333333 917.333333h-213.333333c-34.133333 0-64-29.866667-64-64v-213.333333c0-34.133333 29.866667-64 64-64h213.333333c34.133333 0 64 29.866667 64 64v213.333333c0 34.133333-29.866667 64-64 64z m-213.333333-298.666666c-12.8 0-21.333333 8.533333-21.333333 21.333333v213.333333c0 12.8 8.533333 21.333333 21.333333 21.333334h213.333333c12.8 0 21.333333-8.533333 21.333334-21.333334v-213.333333c0-12.8-8.533333-21.333333-21.333334-21.333333h-213.333333z"
                p-id="1681"></path>
        </svg>
    </div>
    <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="" target="_blant">首页</a></li>
            <li class="nav-item"><a class="nav-link" href="./index.php?c=admin&u=<?php echo $u ?>"
                                    target="_blank"><span>后台管理</span></a></li>
            <?php if (is_apply()) { ?>
                <li class="nav-item"><a class="nav-link" href="./index.php?c=apply&u=<?php echo $u ?>"
                                        target="_blank"><span>申请收录</span></a></li>
            <?php }
            if (is_guestbook()) { ?>
                <li class="nav-item"><a class="nav-link" href="./index.php?c=guestbook&u=<?php echo $u ?>"
                                        target="_blank"><span>在线留言</span></a></li>
            <?php } ?>
            <?php echo $theme_config['nav-link']; ?>
            <?php if ($theme_config['hefeng'] == '1') { //和风天气 ?>
                <div id="he-plugin-simple"></div>
                <script src="https://widget.qweather.net/simple/static/js/he-simple-common.js?v=2.0"></script>
            <?php } ?>
        </ul>
        <div id="main">
            <div id="show_date"></div>
            <div id="show_time"></div>
        </div>
    </div>
</nav>
<!--topbar结束-->
<div class="container" style="margin-top:10vh; position: relative; z-index: 100;">
    <h2 class="title"><?php echo $theme_config['title']; ?></h2>
    <?php if ($theme_config['hitokoto'] == '1') { //一言 ?>
        <script src="https://v1.hitokoto.cn/?encode=js&select=%23hitokoto" defer></script>
        <p id="hitokoto" class="content"></p>
    <?php } ?>
    <!--搜索开始-->
    <div id="search" class="s-search">
        <div id="search-list" class="hide-type-list">
            <div class="search-group group-a s-current" style="/*margin-top: 50px;*/">
                <ul class="search-type">
                    <li>
                        <input hidden="" checked="" type="radio" name="type" id="type-baidu"
                               value="https://www.baidu.com/s?word=" data-placeholder="百度一下，你就知道">
                        <label for="type-baidu" style="font-weight:600">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-icon_baidulogo"></use>
                            </svg>
                        </label>
                    </li>
                    <li>
                        <input hidden="" checked="" type="radio" name="type" id="type-sogou"
                               value="https://www.sogou.com/web?query=" data-placeholder="上网从搜狗开始">
                        <label for="type-sogou" style="font-weight:600">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-sougou"></use>
                            </svg>
                        </label>
                    </li>
                    <li>
                        <input hidden="" checked="" type="radio" name="type" id="type-bing"
                               value="https://cn.bing.com/search?q=" data-placeholder="微软必应搜索">
                        <label for="type-bing" style="font-weight:600">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-bing"></use>
                            </svg>
                        </label>
                    </li>
                    <li>
                        <input hidden="" checked="" type="radio" name="type" id="type-zhihu"
                               value="https://www.zhihu.com/search?q=" data-placeholder="有问题，上知乎">
                        <label for="type-zhihu" style="font-weight:600">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-zhihu"></use>
                            </svg>
                        </label>
                    </li>
                    <li>
                        <input hidden="" checked="" type="radio" name="type" id="type-bilibili"
                               value="https://search.bilibili.com/all?keyword=" data-placeholder="(゜-゜)つロ 干杯~">
                        <label for="type-bilibili" style="font-weight:600">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-bili"></use>
                            </svg>
                        </label>
                    </li>
                    <li>
                        <input hidden="" checked="" type="radio" name="type" id="type-weibo"
                               value="https://s.weibo.com/weibo/" data-placeholder="随时随地发现新鲜事">
                        <label for="type-weibo" style="font-weight:600">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-weibo"></use>
                            </svg>
                        </label>
                    </li>
                    <li>
                        <input hidden="" checked="" type="radio" name="type" id="type-google"
                               value="https://www.google.com.hk/search?hl=zh-CN&q="
                               data-placeholder="值得信任的搜索引擎">
                        <label for="type-google" style="font-weight:600">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-google00"></use>
                            </svg>
                        </label>
                    </li>
                    <li>
                        <input hidden="" checked="" type="radio" name="type" id="type-fanyi"
                               value="https://translate.google.cn/?hl=zh-CN&sl=auto&tl=zh-CN&text="
                               data-placeholder="输入翻译内容（自动检测语言）">
                        <label for="type-fanyi" style="font-weight:600">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-fanyi"></use>
                            </svg>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        <form action="https://www.baidu.com/s?wd=" method="get" target="_blank" id="super-search-fm">
            <input type="text" id="search-text" placeholder="百度一下，你就知道" style="outline:0;" autocomplete="off">
            <button class="submit" type="submit">
                <svg style="width: 22px; height: 22px; margin: 0 20px 0 20px; color: #fff;" class="icon"
                     aria-hidden="true">
                    <use xlink:href="#icon-sousuo"></use>
                </svg>
            </button>
            <ul id="word" style="display: none;"></ul>
        </form>
        <div class="set-check hidden-xs">
            <input type="checkbox" id="set-search-blank" class="bubble-3" autocomplete="off">
        </div>
    </div>
    <?php
    if ($theme_config['theme_style'] == 1) {
        include "tools.php";
    }
    include "list.php";
    include "footer.php";
    ?>
