(function ($) {
    $(document).ready(function () {
        //搜索模块
        if ($("#search").length > 0) {
            intoSearch();
        }
        //粘性页脚
        stickFooter();
    });

    //粘性页脚
    $(window).resize(function () {
        setTimeout(stickFooter, 200);
    });

    function stickFooter() {
        $('.main-footer').attr('style', '');
        if ($('.main-footer').hasClass('text-xs')) {
            var win_height = jQuery(window).height(),
                footer_height = $('.main-footer').outerHeight(true),
                main_content_height = $('.main-footer').position().top + footer_height;
            if (win_height > main_content_height - parseInt($('.main-footer').css('marginTop'), 10)) {
                $('.main-footer').css({
                    marginTop: win_height - main_content_height
                });
            }
        }
    }

    //返回顶部
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 50) {
            $('#to-up').fadeIn(200);
            $('.big-header-banner').addClass('header-bg');
        } else {
            $('#to-up').fadeOut(200);
            $('.big-header-banner').removeClass('header-bg');
        }
    });
    $('#to-up').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
    });

    //搜索模块
    function intoSearch() {
        if (window.localStorage.getItem("snail_searchlist")) {
            $(".hide-type-list input#" + window.localStorage.getItem("snail_searchlist")).prop('checked', true);
            $(".hide-type-list input#m_" + window.localStorage.getItem("snail_searchlist")).prop('checked', true);
        }
        if (window.localStorage.getItem("snail_searchlistmenu")) {
            $('.s-type-list.big label').removeClass('active');
            $(".s-type-list [data-id=" + window.localStorage.getItem("snail_searchlistmenu") + "]").addClass('active');
        }
        toTarget($(".s-type-list.big"), false, false);
        $('.hide-type-list .s-current').removeClass("s-current");
        $('.hide-type-list input:radio[name="type"]:checked').parents(".search-group").addClass("s-current");
        $('.hide-type-list input:radio[name="type2"]:checked').parents(".search-group").addClass("s-current");
        $(".super-search-fm").attr("action", $('.hide-type-list input:radio:checked').val());
        $(".search-key").attr("placeholder", $('.hide-type-list input:radio:checked').data("placeholder"));
        if (window.localStorage.getItem("snail_searchlist") == 'type-zhannei') {
            $(".search-key").attr("zhannei", "true");
        }
    }

    $(document).on('click', '.s-type-list label', function (event) {
        $('.s-type-list.big label').removeClass('active');
        $(this).addClass('active');
        window.localStorage.setItem("snail_searchlistmenu", $(this).data("id"));
        var parent = $(this).parents(".s-search");
        parent.find('.search-group').removeClass("s-current");
        parent.find('#' + $(this).attr("for")).parents(".search-group").addClass("s-current");
        toTarget($(this).parents(".s-type-list"), false, false);
    });
    $('.hide-type-list .search-group input').on('click', function () {
        var parent = $(this).parents(".s-search");
        window.localStorage.setItem("snail_searchlist", $(this).attr("id").replace("m_", ""));
        parent.children(".super-search-fm").attr("action", $(this).val());
        parent.find(".search-key").attr("placeholder", $(this).data("placeholder"));
        if ($(this).attr('id') == "type-zhannei" || $(this).attr('id') == "m_type-zhannei") {
            parent.find(".search-key").attr("zhannei", "true");
        } else {
            parent.find(".search-key").attr("zhannei", "");
        }
        parent.find(".search-key").select();
        parent.find(".search-key").focus();
    });
    $(document).on("submit", ".super-search-fm", function () {
        var key = encodeURIComponent($(this).find(".search-key").val());
        if (key == "") {
            return false;
        } else {
            window.open($(this).attr("action") + key);
            return false;
        }
    });

    //搜索建议
    if ($("#search").attr("data") == 1 && $("#search").length > 0) {
        let hotList = 0;
        $('#search-text').keyup(function () {
            let keywords = $(this).val();
            if (keywords == '') {
                $('#word').hide();
                return
            }
            ;
            $.ajax({
                url: 'https://suggestion.baidu.com/su?wd=' + keywords,
                dataType: 'jsonp',
                jsonp: 'cb',
                success: function (res) {
                    $('#word').empty().show();
                    hotList = res.s.length;
                    if (hotList) {
                        $("#word").css("display", "block");
                        for (var i = 0; i < hotList - 1; i++) {
                            if (i === hotList - 1) {
                                $("#word").append('<li id=""><span>' + (i + 1) + "</span>" + res.s[i] + "</li>");
                            } else {
                                $("#word").append("<li><span>" + (i + 1) + "</span>" + res.s[i] + "</li>");
                            }
                            if (i === 0) {
                                $("#word ul li").eq(i).css({
                                    "border-top": "none"
                                });
                                $("#word ul span").eq(i).css({
                                    "color": "#fff",
                                    "background": "#f54545"
                                });
                            } else if (i === 1) {
                                $("#word ul span").eq(i).css({
                                    "color": "#fff",
                                    "background": "#ff8547"
                                });
                            } else if (i === 2) {
                                $("#word ul span").eq(i).css({
                                    "color": "#fff",
                                    "background": "#ffac38"
                                });
                            }
                        }
                    } else {
                        $("#word").css("display", "none");
                    }
                },
                error: function () {
                    $('#word').empty().show();
                    $('#word').hide();
                }
            });
        });

        //点击搜索数据复制给搜索框
        $(document).on('click', '#word li', function () {
            var word = $(this).text().replace(/^[0-9]/, '');
            $('#search-text').val(word);
            $('#word').empty();
            $('#word').hide();
            $('.submit').trigger('click');//触发搜索事件
        });
        $(document).on('click', '.page-container', function () {
            $('#word').empty();
            $('#word').hide();
        });
    }
})(jQuery);

function toTarget(menu, padding, isMult) {
    var slider = menu.children(".anchor");
    var target = menu.children(".hover").first();
    if (target && 0 < target.length) {

    } else {
        if (isMult) {
            target = menu.find('.active').parent();
        } else {
            target = menu.find('.active');
        }
    }
    if (0 < target.length) {
        if (padding) {
            slider.css({
                left: target.position().left + target.scrollLeft() + "px",
                width: target.outerWidth() + "px",
                opacity: "1"
            });
        } else {
            slider.css({
                left: target.position().left + target.scrollLeft() + (target.outerWidth() / 4) + "px",
                width: target.outerWidth() / 2 + "px",
                opacity: "1"
            });
        }
    } else {
        slider.css({
            opacity: "0"
        })
    }
}



