<?php
foreach ($categorys as $category) {
    $fid = $category['id'];
    $links = get_links($fid);
    //如果分类是私有的
    $property = ($category['property'] == 1 ? '<i class="fa fa-lock" style = "color:#5FB878;margin: 0 5px 0 8px;"></i>' : '');
    ?>
    <ul class="mylist row">
        <li id="group_<?php echo $category['id']; ?>" class="title">
            <?php if (empty($category['icon'])) { ?>
                <i class='<?php echo $category['font_icon']; ?>'></i>
            <?php } else { ?>
                <img class="icon" src="<?php echo get_category($category['icon']); ?>">
            <?php } ?>
            <span><?php echo $category['name']; ?></span><?php echo $property; ?>
        </li>
        <?php
        foreach ($links as $link) {
            $link['description'] = empty($link['description']) ? '作者很懒，没有填写描述。' : $link['description'];
            $property = ($link['property'] == 1 ? 'class="property"' : '');
            ?>
            <li class="col-3 col-sm-3 col-md-3 col-lg-1">
                <a rel="nofollow" href="<?php echo $link['url']; ?>" title="<?php echo $link['description']; ?>"
                   target="_blank">
                    <img <?php echo $property; ?> src="<?php echo $link['ico']; ?>">
                    <span><?php echo $link['title']; ?></span>
                </a>
            </li>
        <?php } ?>
    </ul>
<?php } ?>