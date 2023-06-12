<div style="width: 100%;display: inline-block;">
    <!--左边轮播图/时间-->
    <div class="tools-left">
        <?php if (!empty($theme_config['ad_slider'])) { ?>
            <!--轮播图片-->
            <div id="container">
                <div id="sliderContainer">
                    <div id="prev" class="arrow"></div>
                    <div id="slider"><?php echo $theme_config['ad_slider']; ?></div>
                    <div id="pagination"></div>
                    <div id="next" class="arrow"></div>
                </div>
            </div>
        <?php } ?>
        <!--日期时间-->
        <div
            style="background-color: #00000094;backdrop-filter: blur(10px);-webkit-backdrop-filter: blur(10px);padding: 10px;border-radius: 10px;">
            <div id="clock" class="progress-clock">
                <button class="progress-clock__time-date" data-group="d" type="button"><small
                        data-unit="w">星期一</small><br><span data-unit="mo">1月 -</span><span data-unit="d">1</span>
                </button>
                <button class="progress-clock__time-digit" data-unit="h" data-group="h" type="button">12</button>
                <span class="progress-clock__time-colon">:</span>
                <button class="progress-clock__time-digit" data-unit="m" data-group="m" type="button">00</button>
                <span class="progress-clock__time-colon">:</span>
                <button class="progress-clock__time-digit" data-unit="s" data-group="s" type="button">00</button>
                <span class="progress-clock__time-ampm" data-unit="ap">上午</span>
                <svg class="progress-clock__rings" width="256" height="256" viewbox="0 0 256 256">
                    <defs>
                        <lineargradient id="pc-red" x1="1" y1="0.5" x2="0" y2="0.5">
                            <stop offset="0%" stop-color="hsl(343,90%,55%)"></stop>
                            <stop offset="100%" stop-color="hsl(323,90%,55%)"></stop>
                        </lineargradient>
                        <lineargradient id="pc-yellow" x1="1" y1="0.5" x2="0" y2="0.5">
                            <stop offset="0%" stop-color="hsl(43,90%,55%)"></stop>
                            <stop offset="100%" stop-color="hsl(23,90%,55%)"></stop>
                        </lineargradient>
                        <lineargradient id="pc-blue" x1="1" y1="0.5" x2="0" y2="0.5">
                            <stop offset="0%" stop-color="hsl(223,90%,55%)"></stop>
                            <stop offset="100%" stop-color="hsl(203,90%,55%)"></stop>
                        </lineargradient>
                        <lineargradient id="pc-purple" x1="1" y1="0.5" x2="0" y2="0.5">
                            <stop offset="0%" stop-color="hsl(283,90%,55%)"></stop>
                            <stop offset="100%" stop-color="hsl(263,90%,55%)"></stop>
                        </lineargradient>
                    </defs>
                    <g data-units="d">
                        <circle class="progress-clock__ring" cx="128" cy="128" r="74" fill="none" opacity="0.1"
                                stroke="url(#pc-red)" stroke-width="12"></circle>
                        <circle class="progress-clock__ring-fill" data-ring="mo" cx="128" cy="128" r="74" fill="none"
                                stroke="url(#pc-red)" stroke-width="12" stroke-dasharray="465 465"
                                stroke-dashoffset="465" stroke-linecap="round" transform="rotate(-90,128,128)"></circle>
                    </g>
                    <g data-units="h">
                        <circle class="progress-clock__ring" cx="128" cy="128" r="90" fill="none" opacity="0.1"
                                stroke="url(#pc-yellow)" stroke-width="12"></circle>
                        <circle class="progress-clock__ring-fill" data-ring="d" cx="128" cy="128" r="90" fill="none"
                                stroke="url(#pc-yellow)" stroke-width="12" stroke-dasharray="565.5 565.5"
                                stroke-dashoffset="565.5" stroke-linecap="round"
                                transform="rotate(-90,128,128)"></circle>
                    </g>
                    <g data-units="m">
                        <circle class="progress-clock__ring" cx="128" cy="128" r="106" fill="none" opacity="0.1"
                                stroke="url(#pc-blue)" stroke-width="12"></circle>
                        <circle class="progress-clock__ring-fill" data-ring="h" cx="128" cy="128" r="106" fill="none"
                                stroke="url(#pc-blue)" stroke-width="12" stroke-dasharray="666 666"
                                stroke-dashoffset="666" stroke-linecap="round" transform="rotate(-90,128,128)"></circle>
                    </g>
                    <g data-units="s">
                        <circle class="progress-clock__ring" cx="128" cy="128" r="122" fill="none" opacity="0.1"
                                stroke="url(#pc-purple)" stroke-width="12"></circle>
                        <circle class="progress-clock__ring-fill" data-ring="m" cx="128" cy="128" r="122" fill="none"
                                stroke="url(#pc-purple)" stroke-width="12" stroke-dasharray="766.5 766.5"
                                stroke-dashoffset="766.5" stroke-linecap="round"
                                transform="rotate(-90,128,128)"></circle>
                    </g>
                </svg>
            </div>
        </div>
    </div>
    <!--右框-知乎热榜/历史今天|60秒-->
    <div class="tools-right">
        <!--右上框S-->
        <div
            style="border-radius: 10px;padding-top: 1px;margin-bottom: 15px;/*box-shadow: 2px 2px 10px 0px rgba(0, 0, 0, 0.85);*/background: #ffffff61;padding-bottom: 10px;">
            <?php if (!empty($theme_config['fad'])) { ?>
                <!--滚动广告-->
                <div
                    style="background-color:#0000005e;border-radius:5px;/*box-shadow:0px 0px 5px #f200ff;*/padding:5px 5px 0px 5px;margin:8px 5px 0px 5px;/*padding-right: 5px;*/margin-right: 10px;margin-left: 10px;margin-top: 10px;margin-bottom: 0px;">
                    <marquee><b id="nr"><?php echo $theme_config['fad']; ?></b></marquee>
                </div>
            <?php }
            if (!empty($theme_config['txtad'])) { ?>
                <!--文字广告-->
                <div class="txtguanggao"><?php echo $theme_config['txtad']; ?></div>
            <?php }
            if (!empty($theme_config['ads_w'])) { ?>
                <!--图片广告-->
                <div class="module-adslist module-wrapper ads_w"><?php echo $theme_config['ads_w']; ?></div>
            <?php } ?>
        </div>
        <!--右上框E-->
        <!--右下框S-->
        <div class="tools">
            <!--知乎热榜-->
            <div class="post-5 post-list tools-box b2-radius" style="float: left;">
                <div class="post-modules-top">
                    <div class="modules-title-box"><h2 class="module-title">🔥 知乎热榜 🔥</h2></div>
                </div>
                <div class="hidden-line">
                    <ul class="b2_gap">
                        <?php
                        $zh = file_get_contents("https://api.zhihu.com/topstory/hot-list");
                        $zhihu = json_decode($zh, true);
                        foreach ($zhihu['data'] as $item) { ?>
                            <li class='grid-item post-list-item'>
                                <div class='item-in'>
                                    <div class='post-info'><h2><a
                                                href="https://www.zhihu.com/question/<?php echo $item['target']['id']; ?>"
                                                target='_blank'><?php echo $item['target']['title']; ?></a></h2></div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <?php
            if ($theme_config['data_source'] == 0) {
                header("Content-Type:text/json;charset=UTF-8");
                date_default_timezone_set("PRC");
                $url = "https://api.oick.cn/lishi/api.php";
                $ls = file_get_contents($url);
                $lishi = json_decode($ls, true);
                ?>
                <!--历史上的今天-->
                <div class="post-5 post-list tools-box b2-radius lishi" style="float: left;">
                    <div class="post-modules-top">
                        <div class="modules-title-box"><h2 class="module-title">🔥 历史上的今天 🔥</h2></div>
                    </div>
                    <div class="hidden-line">
                        <ul class="b2_gap">
                            <?php foreach ($lishi['result'] as $item) { ?>
                                <li class='grid-item post-list-item'>
                                    <div class='item-in'>
                                        <div class='post-info'><h2><?php echo $item['title']; ?></h2></div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } elseif ($theme_config['data_source'] == 1) { ?>
                <!--60秒读懂世界-->
                <div class="post-5 post-list tools-box b2-radius lishi" style="float: right;">
                    <div class="post-modules-top">
                        <div class="modules-title-box"><h2 class="module-title">🔥 60秒读懂世界 🔥</h2></div>
                    </div>
                    <div class="hidden-line">
                        <ul class="b2_gap">
                            <img class="aligncenter" style="width: 100%;border-radius: 0 0 10px 10px;"
                                 src="https://api.qqsuu.cn/api/dm-60s"/>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!--右下框E-->
    </div>
    <!--右框E-->
</div>