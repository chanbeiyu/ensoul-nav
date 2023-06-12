<script>
    //如果URL锚点为空则默认搜索获取输入焦点方便快速搜索
    if (window.location.hash == '') {
        document.getElementById('search-text').focus();
    }

    //导航条点击事件
    function point(key) {
        $('html, body').animate({scrollTop: $('#group_' + key).offset().top}, 300);
    }
    <?php if($theme_config['dblclick'] != '0') { ?>
    //双击事件
    var timeoutID = null;
    var dblclick = "<?php echo $theme_config['dblclick']; ?>";
    $('body').on('dblclick', function (e) {
        clearTimeout(timeoutID);
        //排除部分标签
        if (!/INPUT|H2|SPAN/.test(e.target.nodeName)) {
            if (dblclick == 'top') {
                $("html,body").animate({scrollTop: 0}, 100);
            } else if (dblclick == 'search') {
                document.getElementById('search-text').focus();
            }
        }
    });
    <?php } ?>
</script>
<script src="<?php echo $libs; ?>/bootstrap4/js/bootstrap.min.js" type="application/javascript"></script>
<script src="<?php echo $theme_dir; ?>/js/script.js?v=20221225"></script>
<script src="<?php echo $theme_dir; ?>/js/typed.js"></script>
<script src="<?php echo $theme_dir; ?>/js/svg.js"></script>
<?php if ($theme_config['search'] == '1') { ?>
    <script type='text/javascript' src="<?php echo $libs ?>/Other/holmes.js"></script>
    <script>
        var h = holmes({
            input: '#search-text',
            find: '.url-card',
            hiddenAttr: true
        });
    </script>
<?php } ?>
<div style="display:none;" class="back-to" id="toolBackTop">
    <a title="返回顶部" onclick="window.scrollTo(0,0);return false;" href="#top" class="back-top"></a>
</div>
<div class="mt-5 mb-3 footer text-muted text-center">
    <?php echo $copyright . PHP_EOL; ?><?php echo $ICP . PHP_EOL; ?><?php echo $site['custom_footer'] . PHP_EOL; ?><?php echo $global_config['global_footer'] . PHP_EOL; ?>
</div>
</html>
