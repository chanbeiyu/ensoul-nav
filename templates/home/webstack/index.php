<?php
$column = ($theme_config['column'] == 6) ? 2 : 3; //显示链接的列数，默认为4可选为6
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="viggo"/>
    <title><?php echo $site['Title']; ?></title>
    <meta name="keywords" content="<?php echo $site['keywords']; ?>">
    <meta name="description" content="<?php echo $site['description']; ?>">
    <link rel="stylesheet" href="<?php echo $theme_dir ?>/assets/css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="<?php echo $libs ?>/Font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $theme_dir ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $theme_dir ?>/assets/css/xenon-core.css">
    <link rel="stylesheet" href="<?php echo $theme_dir ?>/assets/css/xenon-components.css">
    <link rel="stylesheet" href="<?php echo $theme_dir ?>/assets/css/xenon-skins.css">
    <link rel="stylesheet" href="<?php echo $theme_dir ?>/assets/css/nav.css?v=<?php echo $theme_ver; ?>">
    <link rel="shortcut icon" href="<?php echo $favicon; ?>">
    <script src="<?php echo $libs ?>/jquery/jquery-2.2.4.min.js"></script>
    <script src="<?php echo $libs ?>/Other/holmes.js"></script>
    <style>
        .xe-user-img img {
            width: 40px;
            padding: 7px 0;
            border-radius: 50%;
        }

        .xe-user-img svg {
            width: 40px;
            height: 40px;
        }
    </style>
    <?php echo $site['custom_header'] . PHP_EOL ?>
    <?php echo $global_config['global_header'] . PHP_EOL ?>
</head>
<body class="page-body">
<div id="top"></div>
<div class="top mdui-shadow-10">
    <a href="javascript:;" title="返回顶部" onclick="gotop()"><i class="fa fa-arrow-up"></i></a>
</div>
<div class="page-container">
    <div class="sidebar-menu toggle-others fixed">
        <div class="sidebar-menu-inner">
            <header class="logo-env">
                <div class="logo">
                    <a href="/" class="logo-expanded" title="<?php echo $site['logo']; ?>">
                        <h1><?php echo $site['title']; ?></h1></a>
                </div>
                <div class="mobile-menu-toggle visible-xs">
                    <a href="#" data-toggle="mobile-menu"><i class="fa-bars"></i></a>
                </div>
            </header>
            <ul id="main-menu" class="main-menu">
                <div class="search">
                    <input type="text" class="form-control" name="search" id="search" placeholder="输入书签关键词"/>
                    <i class="fa fa-search"></i>
                </div>
                <?php foreach ($category_parent as $key => $category) { ?>
                    <li>
                        <a href="#category-<?php echo $category['id']; ?>"
                           onclick="SmoothScrollTo('#<?php echo 'category-' . $category['id']; ?>',200)">
                            <i class='<?php echo $category['font_icon']; ?>'></i><span
                                class="title"><?php echo $category['name']; ?></span>
                        </a>
                        <?php if (!empty($category['subitem_count'])) { ?>
                            <ul>
                                <?php foreach (get_category_sub($category['id']) as $category_sub) { ?>
                                    <li>
                                        <a href="#category-<?php echo $category_sub['id']; ?>" class="smooth">
                                            <i class='<?php echo $category_sub['font_icon']; ?>'></i><span
                                                class="title"><?php echo $category_sub['name']; ?></span>
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
    <div class="main-content">
        <nav class="navbar user-info-navbar" role="navigation">
            <ul class="user-info-menu left-links list-inline list-unstyled">
                <li class="hidden-sm hidden-xs"><a href="#" data-toggle="sidebar"><i class="fa-bars"></i></a></li>
                <li><a href="./index.php?c=admin&u=<?php echo U; ?>">系统管理</a></li>
                <?php if (is_apply()) { ?>
                    <li><a href="./index.php?c=apply&u=<?php echo U; ?>" target="_blank">申请收录</a></li>
                <?php }
                if (is_guestbook()) { ?>
                    <li><a href="./index.php?c=guestbook&u=<?php echo U; ?>" target="_blank">留言板</a></li>
                <?php } ?>
            </ul>
            <ul class="user-info-menu right-links list-inline list-unstyled">
                <li class="hidden-sm hidden-xs">
                    <a href="./index.php?c=admin&u=<?php echo U; ?>" title="OneNav后台管理" target="_blank"><i
                            class="fa-dashboard"></i> 后台管理</a>
                </li>
            </ul>
        </nav>
        <?php foreach ($categorys as $category) {
            $fid = $category['id'];
            $links = get_links($fid);
            $property = $category['property'] == 1 ? '<i class="fa fa-lock" style = "color:#5FB878"></i>' : '';
            ?>
            <h4 class="text-gray" id="category-<?php echo $fid; ?>">
                <?php echo
                "<i class='{$category['font_icon']}'></i> {$category['name']} {$property}
                <i style = \"font-size:14px;\">{$category['description']}</i>\n"; ?>
            </h4>
            <div class="row" style="margin-bottom:2em;">
                <?php foreach ($links as $link) {
                    switch ($theme_config['hover']) {
                        case 1:
                            $title = $link['title'];
                            break;
                        case 2:
                            $title = $link['description'];
                            break;
                        case 3:
                            $title = $link['real_url'];
                            break;
                        default:
                            $title = '';
                            break;
                    }
                    ?>
                    <div class="col-sm-<?php echo $column; ?> link">
                        <div class="xe-widget xe-conversations box2 label-info"
                             onclick="window.open('<?php echo $link['url']; ?>'<?php echo $theme_config['open_with'] == 1 ? ",'_self'" : '' ?>)"
                             data-toggle="tooltip" data-placement="bottom" title="<?php echo $title; ?>">
                            <?php if ($link['property'] == 1) {
                                echo "
                    <div class=\"subscript\"></div>\n";
                            } ?>
                            <div class="xe-comment-entry">
                                <a class="xe-user-img">
                                    <?php echo '<img data-src="' . $link['ico'] . '" class="lozad img-circle">' . PHP_EOL; ?>
                                </a>
                                <?php if ($theme_config['search_url'] == 1) {
                                    echo
                                        '                            <span style = "display:none;">' . $link['real_url'] . '</span>
';
                                } ?>
                                <div class="xe-comment">
                                    <a href="#" class="xe-user-name overflowClip_1">
                                        <strong><?php echo $link['title']; ?></strong>
                                    </a>
                                    <p class="overflowClip_2"><?php echo $link['description']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <br/>
        <footer class="main-footer sticky footer-type-1">
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
<!-- 锚点平滑移动 -->
<script type="text/javascript">
    function SmoothScrollTo(id_or_Name, timelength) {
        var timelength = timelength || 1000;
        $('html, body').animate({
            scrollTop: $(id_or_Name).offset().top - 70
        }, timelength, function () {
            window.location.hash = id_or_Name;
        });
    }

    $(document).ready(function () {
        //img lazy loaded
        const observer = lozad();
        observer.observe();

        $(document).on('click', '.has-sub', function () {
            var _this = $(this)
            if (!$(this).hasClass('expanded')) {
                setTimeout(function () {
                    _this.find('ul').attr("style", "")
                }, 300);

            } else {
                $('.has-sub ul').each(function (id, ele) {
                    var _that = $(this)

                    if (_this.find('ul')[0] != ele) {
                        setTimeout(function () {
                            _that.attr("style", "")
                        }, 300);
                    }
                })
            }
        })
        $('.user-info-menu .hidden-sm').click(function () {
            if ($('.sidebar-menu').hasClass('collapsed')) {
                $('.has-sub.expanded > ul').attr("style", "")
            } else {
                $('.has-sub.expanded > ul').show()
            }
        })
        $("#main-menu li ul li").click(function () {
            $(this).siblings('li').removeClass('active'); // 删除其他兄弟元素的样式
            $(this).addClass('active'); // 添加当前元素的样式
        });
        $("a.smooth").click(function (ev) {
            ev.preventDefault();
            public_vars.$mainMenu.add(public_vars.$sidebarProfile).toggleClass('mobile-is-visible');
            ps_destroy();
            $("html, body").animate({
                scrollTop: $($(this).attr("href")).offset().top - 30
            }, {
                duration: 500,
                easing: "swing"
            });
        });
        return false;
    });

    var href = "";
    var pos = 0;
    $("a.smooth").click(function (e) {
        $("#main-menu li").each(function () {
            $(this).removeClass("active");
        });
        $(this).parent("li").addClass("active");
        e.preventDefault();
        href = $(this).attr("href");
        pos = $(href).position().top - 30;
    });

    function gotop() {
        $("html,body").animate({scrollTop: '0px'}, 600);
    }

    // 搜索框
    var h = holmes({
        input: '.search input',
        find: '.link',
        hiddenAttr: true
    });
    //搜索框END
</script>
<!-- Bottom Scripts -->
<script src="<?php echo $theme_dir ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo $theme_dir ?>/assets/js/TweenMax.min.js"></script>
<script src="<?php echo $theme_dir ?>/assets/js/resizeable.js"></script>
<script src="<?php echo $theme_dir ?>/assets/js/joinable.js"></script>
<script src="<?php echo $theme_dir ?>/assets/js/xenon-api.js"></script>
<script src="<?php echo $theme_dir ?>/assets/js/xenon-toggles.js"></script>
<!-- JavaScripts initializations and stuff -->
<script src="<?php echo $theme_dir ?>/assets/js/xenon-custom.js"></script>
<script src="<?php echo $theme_dir ?>/assets/js/lozad.js"></script>
</body>
</html>