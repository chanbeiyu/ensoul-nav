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
                <label class="layui-form-label">搜索框背景</label>
                <div class="layui-input-block">
                    <input type="text" name="backgroundURL" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">搜索框背景</label>
                <div class="layui-input-block">
                    <input type="text" name="title" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">天气插件</label>
                <div class="layui-input-inline">
                    <select lay-verify="required" name="WeatherPosition">
                        <option value="0">关闭</option>
                        <option value="1">显示</option>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">天气背景</label>
                <div class="layui-input-inline">
                    <select lay-verify="required" name="WeatherBackground">
                        <option value="1">随天气变化</option>
                        <option value="2">浅色</option>
                        <option value="3">深色</option>
                        <option value="4">透明</option>
                    </select>
                </div>
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
<script src="./templates/admin/js/lay-config.js?v=<?php echo $Ver; ?>" charset="utf-8"></script>
<script>
    var u = _GET('u');
    layui.use(['form', 'background'], function () {
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
        layui.background.render("input[name='backgroundURL']");
    });
</script>
</body>
</html>