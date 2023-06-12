<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $theme; ?> - 主题配置</title>
    <link rel='stylesheet' href='<?php echo $libs ?>/Layui/v2.6.8/css/layui.css'>
    <style>
        .layui-form-item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="layui-row" style="margin-top:18px;">
    <div class="layui-container">
        <form class="layui-form" lay-filter="form">

            <div class="layui-form-item">
                <label class="layui-form-label">默认分类</label>
                <div class="layui-input-inline">
                    <select lay-verify="required" name="default_category_id">
                        <?php echo_category(); ?>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">默认展示该分类下的链接</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">搜索引擎</label>
                <div class="layui-input-inline">
                    <select lay-verify="required" name="default_search">
                        <option value="baidu">百度</option>
                        <option value="google">Google</option>
                        <option value="bing">必应</option>
                        <option value="sogou">搜狗</option>
                        <option value="360">360搜索</option>
                        <option value="zhihu">知乎</option>
                        <option value="weibo">微博</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">默认搜索引擎</div>
            </div>

            <div class="layui-form-item" style="padding-top: 10px;">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="save">保存</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="<?php echo $libs ?>/Layui/v2.6.8/layui.js"></script>
<script src="./templates/admin/js/public.js?v=<?php echo $Ver; ?>"></script>
<script>
    var u = _GET('u');
    layui.use(['form'], function () {
        var form = layui.form;
        var $ = layui.$;
        form.val('form', <?php echo json_encode($theme_config);?>);
        form.on('submit(save)', function (data) {
            $.post(get_api('write_theme', 'config') + '&t=' + _GET('theme'), data.field, function (data, status) {
                if (data.code == 1) {
                    layer.msg(data.msg, {
                        icon: 1, time: 500, end: function () {
                            if (_GET('source') != 'admin') {
                                parent.location.reload();
                            }
                        }
                    });
                } else {
                    layer.msg(data.msg, {icon: 5});
                }
            });
            return false;
        });
    });
</script>
</body>
</html>