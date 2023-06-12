<?php
//是否加载导航条
if ($theme_config['nav-bar'] == '1') { ?>
    <!--导航条-->
    <div class="sites-tabs-container d-flex align-items-end">
        <div class="d-flex flex-fill container-lg overflow-hidden text-nowrap"
             style=" margin-left: 10px; margin-right: 10px; max-width: calc(100% - 55px);">
            <div class="d-flex sites-tabs-btn">
                <?php foreach ($categorys as $category) { ?>
                    <a class="sites-tab-btn" href="javascript:void(0);"
                       onclick="point('<?php echo $category["id"]; ?>');"><?php echo $category["name"]; ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php
foreach ($categorys as $category) {
    $links = get_links($category['id']);
    $property = $category['property'] == 1 ? ' <i class="fa fa-lock" style = "color:#5FB878"></i> ' : '';
    ?>
    <ul class="mylist row link-space">
        <li id="group_<?php echo $category['id']; ?>" class="title">
            <?php if (empty($category['icon'])) { ?>
                <i class='<?php echo $category['font_icon']; ?>'></i>
            <?php } else { ?>
                <img class="icon" src="<?php echo get_category($category['icon']); ?>">
            <?php } ?>
            <span>&nbsp;<?php echo $category['name']; ?></span><?php echo $property; ?>
            <span class="description"><?php echo $category['description'] ?></span>
        </li>
        <div class="links-lists">
            <?php foreach ($links as $link) {
                $link['description'] = empty($link['description']) ? '作者很懒，没有填写描述。' : $link['description'];
                ?>
                <li class="col-3 col-sm-3 col-md-3 col-lg-1 url-card"> <?php echo $link['property'] == 1 ? '<div class="angle"></div>' : ''; ?>
                    <a rel="nofollow" href="<?php echo $link['url']; ?>" title="<?php echo $link['description']; ?>"
                       target="_blank"> <img src="<?php echo $link['ico']; ?>">
                        <span><?php echo $link['title']; ?></span> </a>
                </li>
            <?php } ?>
    </ul>
<?php } ?> 