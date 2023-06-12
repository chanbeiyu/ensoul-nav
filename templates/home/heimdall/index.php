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

//定义搜索引擎
$search_engines = [
    "baidu" => [
        "name" => "百度",
        "url" => "https://www.baidu.com/s?ie=utf-8&word="
    ],
    "google" => [
        "name" => "Google",
        "url" => "https://www.google.com/search?q="
    ],
    "bing" => [
        "name" => "必应",
        "url" => "https://cn.bing.com/search?FORM=BESBTB&q="
    ],
    "sogou" => [
        "name" => "搜狗",
        "url" => "https://www.sogou.com/web?query="
    ],
    "360" => [
        "name" => "360搜索",
        "url" => "https://www.so.com/s?ie=utf-8&fr=none&src=360sou_newhome&ssid=&q="
    ],
    "zhihu" => [
        "name" => "知乎",
        "url" => "https://www.zhihu.com/search?type=content&q="
    ],
    "weibo" => [
        "name" => "微博",
        "url" => "https://s.weibo.com/weibo?q="
    ]
];
//获取默认搜索引擎
$default_search = $theme_config['default_search'];
//检查默认搜索引擎是否存在
if (array_key_exists($default_search, $search_engines)) {
    //如果存在
    $tmp_search[$default_search] = $search_engines[$default_search];
    //删除指定的搜索引擎
    unset($search_engines[$default_search]);
    //追加默认搜索引擎到第一位，使用array_merge合并
    $search_engines = array_merge($tmp_search, $search_engines);
}

?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $site['Title']; ?></title>
    <meta name="keywords" content="<?php echo $site['keywords']; ?>">
    <meta name="description" content="<?php echo $site['description']; ?>">
    <link rel="mask-icon" href="<?php echo $theme_dir; ?>/img/heimdall-logo-small.svg" color="black">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="<?php echo $favicon; ?>">
    <link rel="stylesheet" href="<?php echo $theme_dir; ?>/css/app.css?v=<?php echo $version; ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo $theme_dir; ?>/css/all.min.css" type="text/css">
    <script src="<?php echo $theme_dir; ?>/js/fontawesome.js"></script>
    <?php echo $site['custom_header'] . PHP_EOL ?>
    <?php echo $global_config['global_header'] . PHP_EOL ?>
</head>
<body>
<div id="app">
    <div class="content">
        <main id="main">
            <!-- 搜索框 -->
            <div class="searchform">
                <div id="search-container" class="input-container">
                    <select name="provider" id="engine">
                        <?php foreach ($search_engines as $key => $search) {
                            if ($key === 0) {
                                $key = "360";
                            } ?>
                            <option value="<?php echo $key; ?>"><?php echo $search['name'] ?></option>
                        <?php } ?>
                    </select>
                    <input class="homesearch" onkeydown="trigger_search();" placeholder="请输入关键词..." id="q"
                           name="q" type="text">
                    <button type="submit" onclick="start_search()">搜索</button>
                </div>
            </div>
            <!-- 搜索框END -->
            <div id="sortable">
                <?php foreach ($links as $link) {
                    $link['description'] = $link['description'] ?? "管理员未设置描述！";
                    ?>
                    <div class="mylink">
                        <section class="item-container">
                            <div class="item" style="background-color: #161b1f">
                                <div class="app-icon-container"><img class="app-icon" src="<?php echo $link['ico']; ?>">
                                </div>
                                <div class="details link-title">
                                    <div class="title white"><?php echo $link['title']; ?></div>
                                </div>
                                <div style="display:none;"><?php echo $link['url']; //隐藏链接(用于搜索URL) ?></div>
                                <a rel="noopener noreferrer" onclick="this.blur();" class="link white" target="heimdall"
                                   href="<?php echo $link['url']; ?>">
                                    <i class="fas fa-arrow-alt-to-right"></i>
                                </a>
                            </div>
                            <a class="item-edit" title="编辑此链接" target="_blank"
                               href="./index.php?c=admin&page=link_edit&id=<?php echo $link['id'] . '&u=' . $u; ?>"><i
                                    class="fas fa-pencil"></i></a>
                            <div class="tooltip"><?php echo $link['description']; ?></div>
                        </section>
                    </div>
                <?php } ?>
            </div>
            <div id="config-buttons" style="z-index:9999;">
                <a id="items" class="config" href="javascript:;" title="查看其它分类">
                    <i class="fas fa-list"></i>
                    <div class="tooltip left" style="margin-bottom:66px;">
                        <?php foreach ($categorys as $category) { ?>
                            <div class="cat-name" title="<?php echo $category['name']; ?>"
                                 onclick="jump_category('<?php echo $category['id'] . '&u=' . $u; ?>')"><?php echo $category['name']; ?></div>
                        <?php } ?>
                    </div>
                </a>
                <?php if (is_login) { ?>
                    <a id="config-button" class="config" href="javascript:;"><i class="fas fa-exchange"></i>
                        <div class="tooltip left">切换编辑模式</div>
                    </a>
                    <a id="users" class="config" href="./index.php?c=admin&u=<?php echo $u; ?>"><i
                            class="fas fa-user"></i>
                        <div class="tooltip left">后台管理</div>
                    </a>
                <?php } else { ?>
                    <a id="users" class="config" href="./index.php?c=login&u=<?php echo $u; ?>"><i
                            class="fas fa-user"></i>
                        <div class="tooltip left">登录</div>
                    </a>
                <?php } ?>
            </div>
        </main>
    </div>
</div>
<!-- 页面底部 -->
<div class="footer">
    <footer>
        <?php echo $copyright . PHP_EOL; ?>
        <?php echo $ICP . PHP_EOL; ?>
        <?php echo $site['custom_footer'] . PHP_EOL; ?>
        <?php echo $global_config['global_footer'] . PHP_EOL; ?>
    </footer>
</div>
<!-- 页面底部END -->
<script src="<?php echo $libs ?>/jquery/jquery-3.6.0.min.js"></script>
<script src="<?php echo $theme_dir; ?>/js/jquery-ui.min.js"></script>
<script src="<?php echo $theme_dir; ?>/js/app_2.js"></script>
<script src="<?php echo $libs ?>/Other/holmes.js"></script>
<script src="<?php echo $theme_dir; ?>/js/embed.js?v=<?php echo $version; ?>"></script>
<script id="custom_js">var u = '<?php echo $u?>';</script>
</body>
</html>