<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?php echo $site['keywords'] ?>"/>
    <meta name="description" content="<?php echo $site['description'] ?>">
    <title><?php echo $site['Title']; ?></title>

    <?php require('const.php'); ?>
    <link rel="stylesheet" href="<?php echo $libs ?>/Font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo $libs ?>/Layui/v2.6.8/css/layui-icon.css">
    <script type="module" crossorigin src="<?php echo $theme_dir ?>/assets/index.js?v=3.4.0.221018"></script>
    <link rel="stylesheet" href="<?php echo $theme_dir ?>/assets/index.css?v=3.4.0.221018">
    <link rel="shortcut icon" href="<?php echo $favicon; ?>">
    <?php echo $site['custom_header'] . PHP_EOL ?>
    <?php echo $global_config['global_header'] . PHP_EOL ?>
</head>
<body>
<div id="app"></div>
</body>
<footer>
    <?php echo $copyright . PHP_EOL; ?>
    <?php echo $ICP . PHP_EOL; ?>
    <?php echo $site['custom_footer'] . PHP_EOL; ?>
    <?php echo $global_config['global_footer'] . PHP_EOL; ?>
</footer>
<?php echo $style; //隐藏登录入口?>
</html>
<!--主题来源:故时旅人(robin901118),适配者:落幕(lm21)-->
