<script src="<?php echo $libs ?>/bootstrap4/js/bootstrap.min.js" type="application/javascript"></script>
<script src="<?php echo $theme_dir ?>/js/script.js"></script>
<script src="<?php echo $theme_dir ?>/js/svg.js"></script>
<div style="display:none;" class="back-to" id="toolBackTop"><a title="返回顶部"
                                                               onclick="window.scrollTo(0,0);return false;" href="#top"
                                                               class="back-top"></a></div>
<div class="mt-5 mb-3 footer text-muted text-center">
    <?php echo $copyright . PHP_EOL; ?>
    <?php echo $ICP . PHP_EOL; ?>
    <?php echo $site['custom_footer'] . PHP_EOL; ?>
    <?php echo $global_config['global_footer'] . PHP_EOL; ?>
</div>
</html>