<!--添加链接-->
<div class="addsite-main" id="addsiteBox">
    <div class="title">添加链接</div>
    <form class="layui-form list-w">
        <div class="list">
            <span class="icon"><i class="iconfont icon-charulianjie"></i></span>
            <input type="text" class="text" name="url" id="url" required lay-verify="required|url"
                   lay-reqtext="请输入网址" placeholder="请输入完整的网址链接" autocomplete="off">
        </div>
        <div class="list">
            <span class="icon"><i class="iconfont icon-bianji"></i></span>
            <input type="text" class="text" name="title" id="title" required lay-verify="required"
                   lay-reqtext="请输入网址" placeholder="请输入标题" autocomplete="off">
        </div>
        <div class="list type">
            <input type="hidden" name="fid" id="fid" value="" lay-reqtext="请选择分类" required lay-verify="required"/>
            <?php foreach ($categorys as $category) { ?>
                <span class="fid"
                      data-fid="<?php echo $category['id'] ?>"><?php echo htmlspecialchars_decode($category['name']); ?></span>
            <?php } ?>
            <span class="kongs"></span>
            <span class="kongs"></span>
            <span class="kongs"></span>
        </div>
        <div class="list list-2">
            <div class="li">私有：<input type="checkbox" lay-skin="switch" lay-text="是|否" name="property" value="1">
            </div>
        </div>
        <div class="list">
            <textarea name="description" id="description" placeholder="请输入站点描述（选填）"></textarea>
        </div>
        <div class="list">
            <button lay-submit lay-filter="add_link">添加</button>
        </div>
    </form>
</div>

<!--修改链接-->
<div class="addsite-main" id="editsiteBox">
    <div class="title">修改链接</div>
    <form class="layui-form list-w" lay-filter="editsite">
        <input type="hidden" name="lid" id="lid" value="" required lay-verify="required"/>
        <div class="list">
            <span class="icon"><i class="iconfont icon-charulianjie"></i></span>
            <input type="text" class="text" name="url" id="url" required lay-verify="required|url"
                   placeholder="请输入完整的网址链接" autocomplete="off">
        </div>
        <div class="list">
            <span class="icon"><i class="iconfont icon-bianji"></i></span>
            <input type="text" class="text" name="title" id="title" required lay-verify="required"
                   placeholder="请输入标题" autocomplete="off">
        </div>
        <div class="list type">
            <input type="hidden" name="fid" id="fid" value="" required lay-verify="required"/>
            <?php foreach ($categorys as $category) { ?>
                <span class="fid editfid-<?php echo $category['id'] ?>"
                      data-fid="<?php echo $category['id'] ?>"><?php echo htmlspecialchars_decode($category['name']); ?></span>
            <?php } ?>
            <span class="kongs"></span>
            <span class="kongs"></span>
            <span class="kongs"></span>
        </div>
        <div class="list list-2">
            <div class="li">私有：<input type="checkbox" lay-skin="switch" lay-text="是|否" name="property" value="1">
            </div>
        </div>
        <div class="list">
            <textarea name="description" id="description" placeholder="请输入站点描述（选填）"></textarea>
        </div>
        <div class="list">
            <button lay-submit lay-filter="edit_link">修改</button>
        </div>
    </form>
</div>

<!--添加分类-->
<div class="addsite-main" id="addFidBox">
    <div class="title">添加分类</div>
    <form class="layui-form list-w" lay-filter="editsite">
        <div class="list">
            <span class="icon"><i class="iconfont icon-bianji"></i></span>
            <input type="text" class="text" name="name" id="name" required lay-verify="required"
                   placeholder="请输入分类名称" autocomplete="off">
        </div>
        <div class="list">
            <span class="icon"><i class="iconfont icon-shezhi1"></i></span>
            <input type="text" class="text" name="font_icon" id="font_icon" required placeholder="请输入或选择分类图标"
                   autocomplete="off">
        </div>
        <div class="list list-2">
            <div class="li">私有：<input type="checkbox" lay-skin="switch" lay-text="是|否" name="property" value="1">
            </div>
        </div>
        <div class="list">
            <textarea name="description" id="description" placeholder="请输入分类描述（选填）"></textarea>
        </div>
        <div class="list">
            <button lay-submit lay-filter="add_fid">添加</button>
        </div>
    </form>
</div>

<!--修改分类-->
<div class="addsite-main" id="editFidBox">
    <div class="title">修改分类</div>
    <form class="layui-form list-w" lay-filter="editfid">
        <input type="hidden" name="cid" id="cid" value="" required lay-verify="required"/>
        <div class="list">
            <span class="icon"><i class="iconfont icon-bianji"></i></span>
            <input type="text" class="text" name="name" id="name" required lay-verify="required"
                   placeholder="请输入分类名称" autocomplete="off">
        </div>
        <div class="list">
            <span class="icon"><i class="iconfont icon-shezhi1"></i></span>
            <input type="text" class="text" name="font_icon" id="font_icon" required placeholder="请输入或选择分类图标"
                   autocomplete="off">
        </div>
        <div class="list list-2">
            <div class="li">私有：<input type="checkbox" lay-skin="switch" lay-text="是|否" name="property" value="1">
            </div>
        </div>
        <div class="list">
            <textarea name="description" id="description" placeholder="请输入分类描述（选填）"></textarea>
        </div>
        <div class="list">
            <button lay-submit lay-filter="edit_fid">修改</button>
        </div>
    </form>
</div>
<script src="<?php echo $libs ?>/Other/ClipBoard.min.js"></script>
<script src="<?php echo $theme_dir ?>/js/admin.js?v=<?php echo $theme_ver; ?>" type="text/javascript"
        charset="utf-8"></script>