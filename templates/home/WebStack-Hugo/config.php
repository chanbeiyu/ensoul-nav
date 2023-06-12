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
                <label class="layui-form-label">悬停提示</label>
                <div class="layui-input-inline" style="width: 80px;">
                    <select lay-verify="required" name="hover_tip">
                        <option value="0">关闭</option>
                        <option value="1">开启</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">鼠标悬停在链接卡片上的冒泡效果</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">站内搜索</label>
                <div class="layui-input-inline" style="width: 80px;">
                    <select lay-verify="required" name="search_bookmark">
                        <option value="0">关闭</option>
                        <option value="1">开启</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">在搜索框输入关键字实时查找站内书签</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">聚合搜索</label>
                <div class="layui-input-inline" style="width: 80px;">
                    <select lay-verify="required" name="search-bg">
                        <option value="0">关闭</option>
                        <option value="1">开启</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">顶部的搜索功能</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">搜索热词</label>
                <div class="layui-input-inline" style="width: 80px;">
                    <select lay-verify="required" name="suggestion">
                        <option value="0">关闭</option>
                        <option value="1">开启</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">数据来源于百度</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">随处搜索</label>
                <div class="layui-input-inline" style="width: 80px;">
                    <select lay-verify="required" name="search-modal">
                        <option value="0">关闭</option>
                        <option value="1">开启</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">右上角和右下角那个搜索</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">天气预报</label>
                <div class="layui-input-inline" style="width: 80px;">
                    <select lay-verify="required" name="qweather">
                        <option value="0">关闭</option>
                        <option value="1">开启</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">数据来自于和风天气</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">侧边导航</label>
                <div class="layui-input-inline" style="width: 80px;">
                    <select lay-verify="required" name="sidebar-nav">
                        <option value="0">收起</option>
                        <option value="1">展开</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">侧边导航栏的默认状态</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">在线一言</label>
                <div class="layui-input-inline" style="width: 80px;">
                    <select lay-verify="required" name="hitokoto">
                        <option value="0">关闭</option>
                        <option value="1">开启</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">右上角那一句话</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">延迟加载</label>
                <div class="layui-input-inline" style="width: 80px;">
                    <select lay-verify="required" name="lazyload">
                        <option value="0">关闭</option>
                        <option value="1">开启</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">延迟加载图标(建议开启)</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">分类隐藏</label>
                <div class="layui-input-inline" style="width: 80px;">
                    <select lay-verify="required" name="hide-category">
                        <option value="0">关闭</option>
                        <option value="1">自动</option>
                        <option value="2">强制</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">分类tab标签是否隐藏一级分类</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">链接描述</label>
                <div class="layui-input-inline" style="width: 80px;">
                    <select lay-verify="required" name="hide-description">
                        <option value="0">显示</option>
                        <option value="1">隐藏</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">是否显示链接描述</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">字体大小</label>
                <div class="layui-input-inline" style="width: 110px;">
                    <select lay-verify="required" name="font-size">
                        <option value="13">13</option>
                        <option value="14">14(默认)</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">字体大小</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">夜间模式</label>
                <div class="layui-input-inline" style="width: 110px;">
                    <select lay-verify="required" name="NightMode">
                        <option value="0">默认白天</option>
                        <option value="1">默认夜间</option>
                        <option value="2">自动模式</option>
                        <option value="3">强制白天</option>
                        <option value="4">强制夜间</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">仅默认状态,前端手动切换时优先</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">背景色</label>
                <div class="layui-input-inline" style="width: 110px;">
                    <select lay-verify="required" name="bg">
                        <option value="not">白色</option>
                        <option value="white-bg">白格子</option>
                        <option value="grid-bg">灰格子</option>
                        <option value="polkadot-bg">小圆点</option>
                        <option value="mosaic-bg">马赛克</option>
                        <option value="brickwall-bg">砖墙</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">背景色</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">背景图</label>
                <div class="layui-input-block">
                    <input type="text" name="bg_img" placeholder="详情见帮助" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">白天横幅</label>
                <div class="layui-input-block">
                    <input type="text" name="light_bg" placeholder="详情见帮助,留空则透明" autocomplete="off"
                           class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">夜间横幅</label>
                <div class="layui-input-block">
                    <input type="text" name="night_bg" placeholder="详情见帮助,留空则黑色背景" autocomplete="off"
                           class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">Logo白天</label>
                <div class="layui-input-block">
                    <input type="text" name="logo_light" placeholder="白天展开侧边栏的Logo" autocomplete="off"
                           class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">Logo夜间</label>
                <div class="layui-input-block">
                    <input type="text" name="logo_dark" placeholder="夜间展开侧边栏的Logo" autocomplete="off"
                           class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">Logo收起</label>
                <div class="layui-input-block">
                    <input type="text" name="logo_collapsed" placeholder="白天和夜间收起侧边栏的Logo" autocomplete="off"
                           class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">顶部链接</label>
                <div class="layui-input-block">
                    <textarea name="navbar-link" rows="2" placeholder="详情见帮助" class="layui-textarea"></textarea>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">友情链接</label>
                <div class="layui-input-block">
                    <textarea name="friend-link" rows="2" placeholder="详情见帮助" class="layui-textarea"></textarea>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">header代码</label>
                <div class="layui-input-block">
                    <textarea name="header_code" rows="2" placeholder="自定义代码" class="layui-textarea"></textarea>
                </div>
            </div>

            <div class="layui-form-item" style="padding-top: 10px;">
                <div class="layui-input-block">
                    <button class="layui-btn layui-btn-primary layui-border-black" id="help">帮助</button>
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
        $('#help').on('click', function () {
            window.open("https://gitee.com/tznb/TwoNav/wikis/pages?sort_id=7976690&doc_id=3767990");
            return false;
        });
    });
</script>
</body>
</html>