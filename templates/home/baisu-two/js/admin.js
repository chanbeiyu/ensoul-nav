layui.use(['dropdown', 'layer', 'form'], function () {
    var dropdown = layui.dropdown,
        layer = layui.layer,
        form = layui.form,
        $ = layui.jquery;
    var host = window.location.protocol + "//" + window.location.host;
    var isSupported = ClipboardJS.isSupported();
    //右键菜单
    dropdown.render({
        elem: '.urllist',
        trigger: 'contextmenu' //右键事件
        , data: [{
            title: '访问',
            templet: '<i class="iconfont icon-charulianjie"></i> {{d.title}}',
            id: 1
        }, {
            title: '复制',
            templet: '<div class="copybtn"><i class="iconfont icon-fuzhi"></i> {{d.title}}</div>',
            id: 2
        }, {
            title: '编辑',
            templet: '<i class="iconfont icon-bianji"></i> {{d.title}}',
            id: 3
        }, {
            title: '删除',
            templet: '<i class="iconfont icon-shanchu"></i> {{d.title}}',
            id: 4
        }],
        click: function (data, othis) {
            var elem = $(this.elem),
                listId = elem.attr('id');
            listUrl = $('#' + listId + ' a').attr("href");
            console.log(listId, listUrl);
            switch (data.id) {
                case 1: //访问
                    window.open(listUrl, '_blank');
                    break;
                case 2: //复制
                    if (isSupported) {
                        ClipboardJS.copy(host + listUrl.slice(1));
                        layer.msg('复制成功', {icon: 1});
                    } else {
                        layer.msg('复制失败,您的浏览器不支持', {icon: 5});
                    }
                    break;
                case 3: //编辑
                    layer.open({
                        type: 1,
                        scrollbar: false,
                        title: false,
                        closeBtn: 0,
                        shadeClose: true,
                        skin: 'addsiteBox',
                        content: $('#editsiteBox')
                    });
                    get_a_link(listId);
                    break;
                case 4: //删除
                    layer.confirm('一定要删除吗？', {
                        btn: ['删除', '取消']
                    }, function () {
                        deleteUrl(listId);
                    }, function () {
                        layer.msg('取消删除！', {time: 600,});
                    });
                    break;
            }
        }
    });
    //添加链接弹窗
    $('#addsite').click(function () {
        layer.open({
            type: 1,
            scrollbar: false,
            title: false,
            closeBtn: 0,
            shadeClose: true,
            skin: 'addsiteBox',
            content: $('#addsiteBox')
        });
    });

    $('.addsite-main .list.type span.fid').click(function () {
        var fid = $(this).data('fid');
        $('#addsiteBox input#fid').val(fid);
        $('#editsiteBox input#fid').val(fid);
        $(this).addClass("hover").siblings().removeClass('hover');
    });

    //添加链接
    form.on('submit(add_link)', function (data) {
        addUrl(data.field);
        return false;
    });
    //修改链接
    form.on('submit(edit_link)', function (data) {
        editUrl(data.field);
        return false;
    });
    //添加分类
    form.on('submit(add_fid)', function (data) {
        addFID(data.field);
        return false;
    });
    //修改分类
    form.on('submit(edit_fid)', function (data) {
        editFID(data.field);
        return false;
    });

    //识别链接信息
    $("input#title").focus(function () {
        var titleval = $("input#title").val();
        var urlval = $("input#url").val();
        if (urlval !== "" && titleval == "") {
            layer.msg('链接信息识别中', {icon: 16});
            getUrlinfo(urlval);
        }
    });
    //添加分类弹窗
    $('#addCat').click(function () {
        layer.open({
            type: 1,
            scrollbar: false,
            title: false,
            closeBtn: 0,
            shadeClose: true,
            skin: 'addsiteBox',
            content: $('#addFidBox')
        });
    });

    // 修改分类弹窗
    $('span.editFid').click(function () {
        layer.open({
            type: 1,
            scrollbar: false,
            title: false,
            closeBtn: 0,
            shadeClose: true,
            skin: 'addsiteBox',
            content: $('#editFidBox')
        });
        var fid = $(this).data('fid');
        get_a_category(fid);
    });

    //查询单个链接信息
    function get_a_link(id) {
        $.get(get_api('read_one_link'), {
            lid: id
        }, function (data, status) {
            if (data.code == 1) {
                $('.addsite-main .list.type span.editfid-' + data.data.fid).addClass("hover").siblings().removeClass('hover');
                form.val('editsite', {
                    "lid": data.data.lid,
                    "url": data.data.url,
                    "title": data.data.title,
                    "description": data.data.description,
                    "fid": data.data.fid,
                    "property": (data.data.property == 1)
                });
            } else {
                layer.msg(data.msg, {icon: 5});
            }
        });
    }

    //查询单个分类信息
    function get_a_category(id) {
        $.post(get_api('read_one_category'), {
            cid: id
        }, function (data, status) {
            if (data.code == 1) {
                form.val('editfid', {
                    "cid": data.data.cid,
                    "name": data.data.name,
                    "font_icon": data.data.font_icon,
                    "description": data.data.description,
                    "property": (data.data.property == 1)
                });
            } else {
                layer.msg(data.msg, {icon: 5});
            }
        });
    };

});

//添加链接
function addUrl(data) {
    $.post(get_api('write_link', 'add'), {
        url: data.url,
        title: data.title,
        fid: data.fid,
        property: data.property,
        description: data.description,
    }, function (data, status) {
        if (data.code == 1) {
            layer.msg('添加成功！', {
                icon: 6,
                time: 600,
                end: function () {
                    window.location.reload();
                    return false;
                }
            });
        } else {
            layer.msg(data.msg, {icon: 5});
        }
    });
}

//修改链接
function editUrl(data) {
    $.post(get_api('write_link', 'edit2'), {
        lid: data.lid,
        fid: data.fid,
        url: data.url,
        title: data.title,
        property: data.property,
        description: data.description,
    }, function (data, status) {
        if (data.code == 1) {
            layer.msg('修改成功！', {
                icon: 6,
                time: 600,
                end: function () {
                    window.location.reload();
                    return false;
                }
            });
        } else {
            layer.msg(data.msg, {icon: 5});
        }
    });
}

//删除链接
function deleteUrl(id) {
    $.post(get_api('write_link', 'del'), {
        lid: id
    }, function (data, status) {
        if (data.code == 1) {
            layer.msg('删除成功！', {icon: 6, time: 600});
            $(".site-list #" + id).remove();
        } else {
            layer.msg(data.msg, {icon: 5});
        }
    });
};

//添加分类
function addFID(data) {
    $.post(get_api('write_category', 'add'), {
        name: data.name,
        font_icon: data.font_icon,
        property: data.property,
        description: data.description,
    }, function (data, status) {
        if (data.code == 1) {
            layer.msg('添加成功！', {
                icon: 6,
                time: 600,
                end: function () {
                    window.location.reload();
                    return false;
                }
            });
        } else {
            layer.msg(data.msg, {icon: 5});
        }
    });
}

//修改分类
function editFID(data) {
    $.post(get_api('write_category', 'edit'), {
        cid: data.cid,
        name: data.name,
        font_icon: data.font_icon,
        property: data.property,
        description: data.description,
    }, function (data, status) {
        if (data.code == 1) {
            layer.msg('修改成功！', {
                icon: 6,
                time: 600,
                end: function () {
                    window.location.reload();
                    return false;
                }
            });
        } else {
            layer.msg(data.msg, {icon: 5});
        }
    });
}

//识别链接信息
function getUrlinfo(url) {
    console.log(url);
    $.post(get_api('other_get_link_info'), {
        url: url
    }, function (data, status) {
        //如果添加成功
        layer.close(layer.index);
        if (data.code == 1) {
            if (data.data.title == null) {
                layer.msg('标题获取失败，请手动输入！', {icon: 5, time: 1000});
            }
            ;
            $("input#title").val(data.data.title);
            $("textarea#description").val(data.data.description);
        } else {
            layer.msg(data.msg, {icon: 5, time: 1000});
        }
    });
}

function get_api(method, type = null) {
    return './index.php?c=api&method=' + method + (type ? '&type=' + type : '') + '&u=' + u;
}