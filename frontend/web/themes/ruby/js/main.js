// Nice Scroll
jQuery("html").niceScroll({cursorborder: "", cursorcolor: "#e54242", cursorwidth: "7px", cursorborderradius: "0px"});
jQuery(".header").niceScroll({cursorborder: "", cursorcolor: "#c73b3b", cursorwidth: "7px", cursorborderradius: "0px"});
hljs.initHighlightingOnLoad();
// Loader
// ======================
jQuery("body").queryLoader2({
    barColor: "#e54242",
    backgroundColor: "#e54242",
    percentage: false,
    barHeight: 3,
    completeAnimation: "fade",
    minimumTime: 200
});
// Portfolio Height
// ======================
var browser_height = jQuery(window).height();
var slidecheck = jQuery(window).width();
jQuery(window).load(function () {
    if (slidecheck > 992) {
        jQuery('.portfolioSlider').css({height: browser_height});
        jQuery('.portfolioSlides ul.slides li').css({height: browser_height});
    }
    else {
        jQuery('.portfolioSlider').css({height: browser_height - 80});
        jQuery('.portfolioSlides ul.slides li').css({height: browser_height - 80});
    }
});
// Layout Width 
var viewWidth = jQuery(window).width() - 292;
jQuery('.mainContent ').css('width', viewWidth + 'px');

// Show Hide Header
// ======================
jQuery('.hideHeader').click(function () {
    jQuery('.hideHeader').toggleClass('vertecClosed', 1);
    jQuery('.mainContent').toggleClass('vertecClosed', 1);
    jQuery('.header').toggleClass('vertecClosed', 1);
    setTimeout(function () {
        if (jQuery('body').find('.vertecClosed').length > 0) {
            var newWidth = jQuery(window).width();
            jQuery('.mainContent ').css('width', newWidth + 'px');
        }
        else {
            var viewWidth = jQuery(window).width() - 292;
            jQuery('.mainContent ').css('width', viewWidth + 'px');
        }
    }, 200);
    if (jQuery('body').find('.blogBox1').length > 0) {
        var container = jQuery('.blogContainer');
        setTimeout(function () {
            container.masonry()
        }, 800);
    }
    if (jQuery('body').find('.blogBox3').length > 0) {
        var container = jQuery('.blogContainer3');
        setTimeout(function () {
            container.masonry()
        }, 800);
    }

    if (jQuery('body').find('.portfolioBox').length > 0) {
        var container = jQuery('.portfolioContainer');
        setTimeout(function () {
            container.masonry()
        }, 800);
    }

    if (jQuery('body').find('.portfolio-item-3').length > 0) {
        var container = jQuery('.portfolio-3-wrapper');
        setTimeout(function () {
            container.masonry()
        }, 800);
    }

    setTimeout(function () {
        var itemWidth = $('.mainContent').width() - 50;
        jQuery("#foo3").trigger('configuration', {'width': itemWidth});
        jQuery("#foo3").trigger('updateSizes');
    }, 800);

    jQuery('.nicescroll-rails').toggleClass('vertecHide');
});

// Responsive
var w = jQuery(window).width();
jQuery(document).ready(function () {
    jQuery(window).resize(function () {
        var nw = jQuery(window).width();
        if (w != nw) {
            location.reload();
        }
    });
});
// Sidebar
var aSide = jQuery('.dl-menu').outerHeight();
jQuery('.dl-menuwrapper ').css('height', aSide + 'px');
// Mobile Menu
jQuery(document).ready(function () {
    "use strict";
    jQuery('.mobileClick').click(function () {
        jQuery('.header').toggleClass('vertecClosed', 200);
    });
});

jQuery(document).ready(function () {
    "use strict";
    jQuery('.closeMobile').click(function () {
        jQuery('.header').toggleClass('vertecClosed', 200);
    });
});

// Header Animation
$(function () {
    $('#dl-menu').dlmenu({
        animationClasses: {classin: 'dl-animate-in-5', classout: 'dl-animate-out-5'}
    });
});
$(function () {
    $('#dl-menu2').dlmenu({
        animationClasses: {classin: 'dl-animate-in-3', classout: 'dl-animate-out-4'}
    });
});

// Blog Masonry Style 1
// ======================
if (jQuery('body').find('.blogBox1').length > 0) {
    jQuery(document).ready(function () {
        "use strict";
        var nav = jQuery('.blogCategory');
        var container = jQuery('.blogContainer');
        container.imagesLoaded(function () {
            container.masonry({
                isAnimated: true,
                itemSelector: '.blogBox1',
                columnWidth: '.blogSizer',
                gutter: 33,
                isResizable: true
            });
        });
        container.masonry();
        // Filter for Portfolio
        jQuery('.blogCategory a').click(function (e) {
            var menuactive = jQuery(this).attr('href');
            var category = jQuery(this).attr('href').replace('#', '');
            nav.find('li').removeClass('active');
            /* Portfolio menu remove active */
            nav.find('li.slug-' + category).addClass('active');
            container.find('.blogBox1').removeClass('hidden');
            container.find('.blogBox1:not(.' + category + ')').addClass('hidden');

            container.masonry({
                isAnimated: true,
                itemSelector: '.blogBox1:not(.hidden)',
                columnWidth: '.blogSizer',
            });

            container.masonry();
            container.find('.' + category).show(500);
            container.find('.blogBox1:not(.' + category + ')').hide(500);
            location.hash = category;
            e.preventDefault();

        });

        if (location.hash != '') {
            jQuery('a[href="' + location.hash + '"]').trigger('click');
        }
    });
}

// Blog Masonry Style 3
// ======================
if (jQuery('body').find('.blogContainer3').length > 0) {
    jQuery(document).ready(function () {
        "use strict";
        var container = jQuery('.blogContainer3');
        container.imagesLoaded(function () {
            container.masonry({
                isAnimated: true,
                gutter: 0,
                itemSelector: '.blogBox3',
                columnWidth: '.blogBox3',
                isResizable: true
            });
        });
    });
}

// Portfolio Masonry Style
// ======================
if (jQuery('body').find('.portfolioBox').length > 0) {
    jQuery(document).ready(function () {
        "use strict";
        var nav = jQuery('.portfolioFilterSide');
        var container = jQuery('.portfolioContainer');
        container.imagesLoaded(function () {
            container.masonry({
                isAnimated: false,
                gutter: 0,
                itemSelector: '.portfolioBox',
                columnWidth: '.portfolioSizer',
                isResizable: true
            });
        });
        container.masonry();
        // Filter for Portfolio
        jQuery('.portfolioFilterSide a').click(function (e) {
            var menuactive = jQuery(this).attr('href');
            var category = jQuery(this).attr('href').replace('#', '');
            nav.find('li').removeClass('active');
            /* Portfolio menu remove active */
            nav.find('li.slug-' + category).addClass('active');
            container.find('.portfolioBox').removeClass('hidden');
            container.find('.portfolioBox:not(.' + category + ')').addClass('hidden');

            container.masonry({
                isAnimated: true,
                itemSelector: '.portfolioBox:not(.hidden)',
                columnWidth: '.portfolioSizer',
            });

            container.masonry();
            container.find('.' + category).show(500);
            container.find('.portfolioBox:not(.' + category + ')').hide(500);
            location.hash = category;
            e.preventDefault();

        });

        if (location.hash != '') {
            jQuery('a[href="' + location.hash + '"]').trigger('click');
        }
    });
}

// Portfolio Style 3
// ======================
if (jQuery('body').find('.portfolio-3-wrapper').length > 0) {
    jQuery(function (jQuery) {
        var nav = jQuery('.portfolio-style-3-filter');
        var container = jQuery('.portfolio-3-wrapper');
        container.imagesLoaded(function () {
            container.masonry({
                isAnimated: true,
                itemSelector: '.portfolio-item-3:not(.hidden)',
                columnWidth: '.grid-sizer',
                gutter: 30,
            });
        });
        container.masonry();
        // Filter for Portfolio
        jQuery('.portfolio-style-3-filter a').click(function (e) {
            var menuactive = jQuery(this).attr('href');
            var category = jQuery(this).attr('href').replace('#', '');
            nav.find('li').removeClass('active');
            /* Portfolio menu remove active */
            nav.find('li.slug-' + category).addClass('active');
            container.find('.portfolio-item-3').removeClass('hidden');
            container.find('.portfolio-item-3:not(.' + category + ')').addClass('hidden');

            container.masonry({
                isAnimated: true,
                itemSelector: '.portfolio-item-3:not(.hidden)',
                columnWidth: '.grid-sizer',
            });

            container.masonry();
            container.find('.' + category).show(500);
            container.find('.portfolio-item-3:not(.' + category + ')').hide(500);
            location.hash = category;
            e.preventDefault();

        });

        if (location.hash != '') {
            jQuery('a[href="' + location.hash + '"]').trigger('click');
        }
    });
}

// Blog Home Page Slider
// ======================
jQuery(window).load(function () {
    if (jQuery('body').find('#foo3').length > 0) {
        var width = $(window).width();
        var itemWidth = $('.mainContent').width() - 50;
        if (width <= 480) {
            var heightslid = 120;
            var heightitem = 120;
        }
        else {
            var heightslid = "variable";
            var heightitem = "auto";
        }
        jQuery("#foo3").carouFredSel({
            onWindowResize: "throttle",
            responsive: true,
            width: itemWidth,
            height: heightslid,
            items: {
                width: itemWidth,
                height: heightitem,
                visible: {
                    min: 1,
                    max: 1
                }
            },

            auto: false,
            prev: {
                button: ".html_carousel .prev",
                key: "left"
            },
            next: {
                button: ".html_carousel .next",
                key: "right"
            },
            scroll: {
                fx: "crossfade",
                easing: "linear"
            },
            onCreate: function () {
                if (width <= 480) {
                    jQuery('#foo3 .slide').css('height', 120 + 'px');
                }
            }
        });
    }
});

// Portfolio 2 Full Height
// ======================
jQuery(window).load(function () {
    if (jQuery('body').find('.portfolioSlider').length > 0) {
        jQuery('.portfolioSlides').flexslider({
            directionNav: true,
            controlNav: false,
            animation: "slide",
            itemWidth: 218,
            slideshow: false,
            animationLoop: true,
            itemMargin: 0,
            minItems: 1,
            maxItems: 5,
            move: 1,
        });
    }
});


jQuery('.portfolioSlides .slides li').hover(
    function () {
        jQuery(this).toggleClass("open");
    },
    function () {
        jQuery(this).toggleClass("open");
    }
);
// TOGGLE
// ======================
jQuery(document).ready(function () {
    jQuery('.toggle').each(function () {
        var tis = $(this);
        tis.click(function () {
            tis.next('div').slideToggle(400, "easeInCirc", function () {
                tis.toggleClass('title-active');
            });
        });
    });
});
// Accordion
// ======================
jQuery(document).ready(function () {
    jQuery('.panel-title').each(function () {
        var tis = $(this);
        tis.click(function () {
            if (tis.hasClass("panel-title-active")) {
                jQuery(".panel-title-active").removeClass("panel-title-active");
            }
            else {
                jQuery(".panel-title-active").removeClass("panel-title-active");
                tis.toggleClass('panel-title-active');
            }
        });
    });
});
// PROGRESS BAR
(function ($) {

    var defaultsettings = {
        'bgColor': '#4b4b4b',
        'fgColor': '#e54242',
        'size': 100,
        'donutwidth': 10,
        'textsize': 27,
    }

    var methods = {
        init: function (options) {

            var initcanvas = true;

            if (typeof(options) == "object") {
                this.donutchartsettings = $.extend({}, defaultsettings, options);

                // autoscale donutwidth and textsize
                if (options["size"] && !options["donutwidth"])
                    this.donutchartsettings["donutwidth"] = options["size"] / 4;
                if (options["size"] && !options["textsize"])
                    this.donutchartsettings["textsize"] = options["size"] / 10;
            }
            else {
                if (typeof(this.donutchartsettings) == "object")
                    initcanvas = false;
                else
                    this.donutchartsettings = defaultsettings;
            }

            if (initcanvas) {
                $(this).css("position", "relative");
                $(this).css("width", this.donutchartsettings.size + "%");
                $(this).css("height", this.donutchartsettings.size + "%");
                $(this).html("<canvas width='" + this.donutchartsettings.size + "' height='" + this.donutchartsettings.size + "'></canvas><div style='position:absolute;top:0;left:0;line-height:" + this.donutchartsettings.size + "px;text-align:center;width:" + this.donutchartsettings.size + "px;font-family:Oswald,serif;font-size:" + this.donutchartsettings.textsize + "px;font-weight:normal;'></div>");

                var canvas = $("canvas", this).get(0);

                // excanvas support
                if (typeof(G_vmlCanvasManager) != "undefined")
                    G_vmlCanvasManager.initElement(canvas);

                var ctx = canvas.getContext('2d');
                methods.drawBg.call(ctx, this.donutchartsettings);
            }

        },

        drawBg: function (settings) {
            this.clearRect(0, 0, settings.size, settings.size);
            this.beginPath();
            this.fillStyle = settings.bgColor;
            this.arc(settings.size / 2, settings.size / 2, settings.size / 2, 0, 2 * Math.PI, false);
            this.arc(settings.size / 2, settings.size / 2, settings.size / 2 - settings.donutwidth, 0, 2 * Math.PI, true);
            this.fill();
        },

        drawFg: function (settings, percent) {

            var ratio = percent / 100 * 360;
            var startAngle = Math.PI * -90 / 180;
            var endAngle = Math.PI * (-90 + ratio) / 180;

            this.beginPath();
            this.fillStyle = settings.fgColor;
            this.arc(settings.size / 2, settings.size / 2, settings.size / 2, startAngle, endAngle, false);
            this.arc(settings.size / 2, settings.size / 2, settings.size / 2 - settings.donutwidth, endAngle, startAngle, true);
            this.fill();
        },
    };

    $.fn.donutchart = function (method) {
        return this.each(function () {

            methods.init.call(this, method);

            if (method == "animate") {

                var percentage = $(this).attr("data-percent");
                var canvas = $(this).children("canvas").get(0);
                var percenttext = $(this).children("div");
                var dcs = this.donutchartsettings;

                if (canvas.getContext) {
                    var ctx = canvas.getContext('2d');
                    var j = 0;

                    function animateDonutChart() {
                        j++;

                        methods.drawBg.call(ctx, dcs);
                        methods.drawFg.apply(ctx, [dcs, j]);
                        percenttext.text(j + "%");

                        if (j >= percentage)
                            clearInterval(animationID);
                    }

                    var animationID = setInterval(animateDonutChart, 20);
                }
            }
        })
    }
})(jQuery);

$("#donutchart1").donutchart("animate");
$("#donutchart2").donutchart("animate");
$("#donutchart3").donutchart("animate");
$("#donutchart4").donutchart("animate");
$("#donutchart5").donutchart("animate");
$("#donutchart6").donutchart("animate");
$("#donutchart7").donutchart("animate");
$("#donutchart8").donutchart("animate");
$("#donutchart9").donutchart("animate");
$("#donutchart10").donutchart("animate");
$("#donutchart11").donutchart("animate");
$("#donutchart12").donutchart("animate");

// Pretty Photo
// ====================== 
jQuery(document).ready(function () {
    if (jQuery('body').find('.prettyPhoto').length > 0) {
        jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
            theme: "light_square"
        });
    }
});
