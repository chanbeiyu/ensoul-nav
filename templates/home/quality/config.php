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
                <label class="layui-form-label">一言</label>
                <div class="layui-input-inline">
                    <select lay-verify="required" name="hitokoto">
                        <option value="0">不显示</option>
                        <option value="1">显示</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">一言在线</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">天气</label>
                <div class="layui-input-inline">
                    <select lay-verify="required" name="hefeng">
                        <option value="0">不显示</option>
                        <option value="1">显示</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">和风天气在线</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">本地搜索</label>
                <div class="layui-input-inline">
                    <select lay-verify="required" name="search">
                        <option value="0">关闭</option>
                        <option value="1">开启</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">输入时搜索本地书签</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">导航条</label>
                <div class="layui-input-inline">
                    <select lay-verify="required" name="nav-bar">
                        <option value="0">不显示</option>
                        <option value="1">显示</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">导航条开关</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">双击事件</label>
                <div class="layui-input-inline">
                    <select lay-verify="required" name="dblclick">
                        <option value="0">无</option>
                        <option value="top">到顶部</option>
                        <option value="search">到搜索框</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">双击空白处时响应的动作</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">抽屉位置</label>
                <div class="layui-input-inline">
                    <select lay-verify="required" name="icon">
                        <option value="left_up">左上角</option>
                        <option value="right_up">右上角</option>
                        <option value="right_down">右下角</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">PC端分类抽屉图标的位置</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">链接列表</label>
                <div class="layui-input-inline">
                    <select lay-verify="required" name="links-lists">
                        <option value="all">全部</option>
                        <option value="fix-2">固定2排</option>
                        <option value="fix-3">固定3排</option>
                        <option value="fix-4">固定4排</option>
                        <option value="fix-5">固定5排</option>
                        <option value="fix-6">固定6排</option>
                        <option value="max-2">最多2排</option>
                        <option value="max-3">最多3排</option>
                        <option value="max-4">最多4排</option>
                        <option value="max-5">最多5排</option>
                        <option value="max-6">最多6排</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">链接列表显示样式</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">背景图URL</label>
                <div class="layui-input-block">
                    <input type="text" name="backgroundURL" placeholder="请输入图片URL" autocomplete="off"
                           class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">页内标题</label>
                <div class="layui-input-block">
                    <input type="text" name="title" placeholder="上网，从这里开始！" autocomplete="off"
                           class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">导航链接</label>
                <div class="layui-input-block">
                    <textarea name="nav-link" rows="2" placeholder="点击帮助按钮获取使用说明"
                              class="layui-textarea"></textarea>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">主题样式</label>
                <div class="layui-input-inline">
                    <select lay-verify="required" name="theme_style">
                        <option value="0">精简模式</option>
                        <option value="1">完整模式</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">精简模式将关闭广告热榜等</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">数据源</label>
                <div class="layui-input-inline">
                    <select lay-verify="required" name="data_source">
                        <option value="0">历史上的今天</option>
                        <option value="1">60秒读懂世界</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">第三方接口,不保证可用!</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">滚动广告</label>
                <div class="layui-input-block">
                    <input type="text" name="fad" placeholder="滚动的文字广告" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">文字广告</label>
                <div class="layui-input-block">
                    <textarea name="txtad" rows="2" placeholder="点击帮助按钮获取使用说明"
                              class="layui-textarea"></textarea>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">图片广告</label>
                <div class="layui-input-block">
                    <textarea name="ads_w" rows="2" placeholder="点击帮助按钮获取使用说明"
                              class="layui-textarea"></textarea>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">轮播图片</label>
                <div class="layui-input-block">
                    <textarea name="ad_slider" rows="2" placeholder="点击帮助按钮获取使用说明"
                              class="layui-textarea"></textarea>
                </div>
            </div>


            <div class="layui-form-item" style="padding-top: 10px;">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="save">保存</button>
                    <button class="layui-btn" id="help">帮助</button>
                </div>

            </div>
        </form>
    </div>
</div>
<script src="<?php echo $libs ?>/Layui/v2.6.8/layui.js"></script>
<script src="./templates/admin/js/public.js?v=<?php echo $Ver; ?>"></script>
<script src="./templates/admin/js/lay-config.js?v=<?php echo $Ver; ?>"></script>
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
        $('#help').on('click', function () {
            window.open("https://gitee.com/tznb/OneNav/wikis/%E4%B8%BB%E9%A2%98%E8%AF%B4%E6%98%8E/quality%20%E4%B8%BB%E9%A2%98%E8%AF%B4%E6%98%8E");
            return false;
        });
        layui.background.render("input[name='backgroundURL']");
    });
</script>
</body>
</html>