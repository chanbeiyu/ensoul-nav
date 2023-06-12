var bodyH = $('.index-main').height();
var winH = $(window).height() - 100;
if (bodyH > winH) {
    $('footer').addClass('show');
}
;
$.ajaxSetup({cache: true});

//搜索栏已开启时初始化
if ($("#search").length > 0) {
    searchChange();
    keyClick();
}


//搜索引擎切换
function searchChange() {
    //尝试读取本都储存的搜索引擎
    var search_id = localStorage.getItem("baisu2_search");
    if (search_id != null) {
        $('.search-btn').html($('#' + search_id).html());
        $('.search-btn').attr('data-url', $('#' + search_id).data('url'));
        $('#search').attr('placeholder', $('#' + search_id).text());
    }
    $(".search-change").click(function () {
        $('.search-lists').toggleClass('hide');
    });
    $(".search-lists .list").click(function () {
        var souurl = $(this).data('url');
        var text = $(this).html();
        var search_id = $(this).attr('id');
        $('.search-btn').html(text);
        $('.search-btn').attr('data-url', souurl);
        $('.search-lists').addClass('hide');
        $('#search').attr('placeholder', $(this).text());
        localStorage.setItem("baisu2_search", search_id);
    });
    $(".search-btn").click(function () {
        var url = $(this).attr('data-url');
        var kw = $('#search').val();
        if (kw !== "") {
            window.open(url + kw);
        } else {
            layer.msg('未输入搜索框关键词！', {time: 1000});
        }
    });
}

//回车键、本地搜索
function keyClick() {
    $('body').keyup(function (e) {
        if (e.keyCode === 13) {
            var isFocus = $("#search").is(":focus");
            if (true == isFocus) {
                console.log(isFocus);
                var url = $('.search-btn').attr('data-url');
                var kw = $('#search').val();
                if (kw !== "") {
                    window.open(url + kw);
                } else {
                    layer.msg('未输入搜索框关键词！', {time: 1000});
                }
            }
        }
    });
    $("#search").focus(function (data, status) {
        $('.search-lists').addClass('hide');
    });
    $("#search").blur(function (data, status) {
        if ($("#search").val() == '') {
            $(".site-name").removeClass("hidden");
        }
        ;
    });
    if (search_bookmark == 1) {
        var h = holmes({
            input: '#search',
            find: '.urllist',
            placeholder: '<div class="empty">未搜索到匹配结果！</div>',
            mark: false,
            hiddenAttr: true,
            class: {
                visible: 'visible',
                hidden: 'hidden'
            },
            onFound(el) {
                $(".site-name").addClass("hidden");
            },
            onInput(el) {
                $(".site-name").addClass("hidden");
            },
            onVisible(el) {
                $(".site-name").removeClass("hidden");
            },
            onEmpty(el) {
                $(".site-name").removeClass("hidden");
            }
        });
    }

}

//锚点
$("a.catlist").click(function () {
    var offset = ($(window).width() < 1200 ? 70 : 5);
    $("html, body").animate({scrollTop: $($(this).attr("href")).offset().top - offset + "px"}, 500);
});

//返回顶部
$('.scroll_top').click(function () {
    $('html,body').animate({scrollTop: '0px'}, 500);
});
$(window).scroll(function () {
    if ($(window).scrollTop() >= 100) {
        $(".scroll_top").fadeIn(1000);
    } else {
        $(".scroll_top").stop(true, true).fadeOut(1000);
    }
});

//手机端
$(".navbar").click(function () {
    $(".m-navlist-w").slideToggle();
    $(this).toggleClass("hover");
});
$(".m-navlist a.list").click(function () {
    $(".m-navlist-w").slideUp();
});


// 是否加载时钟
if ($("#nowTime").length > 0) {
    $.getScript("./templates/home/baisu-two/js/lunar.js", function () {
        CurrentTime();
        $('.date-main').click(function () {
            window.open('https://wannianli.tianqi.com');
        });
    });

}

function getNow(Mytime) {
    return Mytime < 10 ? '0' + Mytime : Mytime;
}

function CurrentTime() {
    var myDate = new Date();
    //获取当前年份
    var year = myDate.getFullYear();
    //获取当前月份
    var month = myDate.getMonth() + 1;
    //获取当前日期
    var date = myDate.getDate();
    var nowDate = year + ' 年 ' + getNow(month) + " 月 " + getNow(date) + " 日";
    $('#nowYmd').text(nowDate);
    //获取农历
    var lunarD = Lunar.fromDate(myDate);
    var lunarNowDate = lunarD.getYearInGanZhi() + '年' + lunarD.getMonthInChinese() + "月" + lunarD.getDayInChinese();
    $('#nowLunar').text(lunarNowDate);
    //获取星期
    var nowWeek = lunarD.getWeekInChinese();
    $('#nowWeek').text('星期' + nowWeek);
    //获取当前小时数(0-23)
    var h = myDate.getHours();
    //获取当前分钟数(0-59)
    var m = myDate.getMinutes();
    //获取当前秒数(0-59)
    var s = myDate.getSeconds();
    var nowTime = getNow(h) + ':' + getNow(m) + ":" + getNow(s);
    $('#nowTime').text(nowTime);
    setTimeout("CurrentTime()", 1000); //设定定时器，循环运行
}