<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $site['Title']; ?></title>
    <meta name="keywords" content="<?php echo $site['keywords']; ?>">
    <meta name="description" content="<?php echo $site['description']; ?>">
    <link rel="shortcut icon" href="<?php echo $favicon; ?>">
    <link rel="stylesheet" href="<?php echo $theme_dir; ?>/css/zui.min.css">
    <link rel="stylesheet" href="<?php echo $theme_dir; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo $libs; ?>/Font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo $libs; ?>/Layui/v2.6.8/css/layui-icon.css">
    <style>
        <?php
        $backgroundURL = $theme_config['backgroundURL'];
        if( !empty($backgroundURL)  ) {?>
        body {
            background-image: url('<?php echo $backgroundURL;?>');
        }

        <?php } ?>
    </style>
    <?php echo $site['custom_header'] . PHP_EOL ?>
    <?php echo $global_config['global_header'] . PHP_EOL ?>
</head>
<body id="nav_body">
<!-- Header Nav -->
<header>
    <div class="main">
        <h1 class="logo">
            <a href="./?u=<?php echo $u ?>">
                <span><?php echo $site['logo']; ?></span>
            </a>
        </h1>
        <!-- Top Nav -->
        <nav class="nav">
            <ul>
                <li><a href="./index.php?c=admin&u=<?php echo U; ?>">系统管理</a></li>
                <?php if (is_apply()) { ?>
                    <li><a href="./index.php?c=apply&u=<?php echo U; ?>">申请收录</a></li>
                <?php }
                if (is_guestbook()) { ?>
                    <li><a href="./index.php?c=guestbook&u=<?php echo U; ?>">在线留言</a></li>
                <?php } ?>
            </ul>
        </nav>

        <!-- Mobile -->
        <button class="nav-btn visible-xs visible-sm"><span class="icon-line top"></span><span
                class="icon-line middle"></span><span class="icon-line bottom"></span>
        </button>
    </div>
</header>
<div id="content">
    <!-- Left Bar -->
    <div class="left-bar">
        <!--<div class="header"><h2>我的导航站</h2></div>-->
        <div class="menu" id="menu">
            <ul class="scrollcontent">
                <!-- Left Nav -->
                <?php foreach ($categorys as $category) { ?>
                    <li>
                        <a href="#category-<?php echo $category['id']; ?>">
                            <i class="<?php echo $category['font_icon']; ?>"></i><?php echo $category['name']; ?>
                        </a>
                    </li>
                <?php } ?>
                <!-- Left Nav End -->
            </ul>
        </div>
    </div>
    <!-- Content -->
    <div class="main">
        <div class="container content-box">
            <!-- Search -->
            <section class="sousuo">
                <div class="search">
                    <div class="search-box">
                        <button class="search-engine-name" id="search-engine-name">Baidu</button>
                        <input type="text" id="txt" class="search-input" placeholder="Hello World !"/>
                        <button class="search-btn" id="search-btn"><i class="fa fa-search"></i></button>
                    </div>
                    <!-- Engine  -->
                    <div class="search-engine">
                        <div class="search-engine-head">
                            <strong class="search-engine-tit">选择搜索引擎：</strong>
                        </div>
                        <ul class="search-engine-list">
                        </ul>
                    </div>
                </div>
            </section>
            <!-- Links -->
            <?php foreach ($categorys as $category) {
                $fid = $category['id'];
                $links = get_links($fid);
                //如果分类是私有的带上锁的图标
                $property = $category['property'] == 1 ? '<i class="fa fa-lock" style = "color:#5FB878"></i>' : '';
                $name = $category['name'];
                ?>
                <section class="item card-box">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="item-tit" display: block>
                                <strong><i class='<?php echo $category['font_icon']; ?>'></i><a class="comment-body"
                                                                                                name="<?php echo 'category-' . $fid; ?>"></a><?php echo $name; ?>&ensp;<?php echo $property; ?>
                                </strong>
                            </div>
                            <div class="clearfix two-list-box">
                                <?php
                                foreach ($links as $link) {
                                    $description = empty($link['description']) ? '作者很懒，没有填写描述。' : $link['description'];
                                    ?>
                                    <div class="col-md-3 col-sm-4 col-xs-6 ">
                                        <a href="<?php echo $link['url'] ?>" class="card-link" target="_blank">
                                            <img src="<?php echo $link['ico']; ?>" align="center" width="16px"
                                                 height="16px">
                                            <span class="card-tit"><?php echo $link['title'] ?></span>
                                            <div class="card-desc"><?php echo $description ?></div>
                                        </a>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
            <!-- Footer -->
            <footer class="footer">
                <div class="container">
                    <div class="rwo">
                        <div class="col-md-12">
                            <p>
                                <?php echo $copyright . PHP_EOL; ?>
                                <?php echo $ICP . PHP_EOL; ?>
                                <?php echo $site['custom_footer'] . PHP_EOL; ?>
                                <?php echo $global_config['global_footer'] . PHP_EOL; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- Content -->
    </div>
    <div id="get-top" title="回到顶部"><i class="fa fa-chevron-up"></i></div>
    <!-- jQuery (ZUI Require jQuery) -->
    <script src="<?php echo $libs; ?>/jquery/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $theme_dir; ?>/js/main.js"></script>
</div>
</body>
</html>
