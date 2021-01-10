(function($) {
    "use strict";
	
	
    // WINDOW.LOAD FUNCTION start
    $(window).load(function() {
		
        // preloader
        $("#preloader").fadeOut(1400);
        $("#preloader-status").delay(300).fadeOut("slow");
		
        // elements.Timeout
        setTimeout(function() {
            $(".introduction").delay(2200).css({
                display: "none"
            }).fadeIn(1000);
			$("#particles-holder").delay(2200).css({
                display: "none"
            }).fadeIn(1000);
            $("#customizer, .corner").delay(2400).css({
                display: "none"
            }).fadeIn(1000);
        }, 0);
        setTimeout(function() {
            $(".transparent-borders").removeClass("OFF");
        }, 1600);
        setTimeout(function() {
            $(".logo, #menu").removeClass("top-position");
        }, 2200);
        setTimeout(function() {
            $(".launcher, .social-icons-wrapper").removeClass("bottom-position");
        }, 2200);
        setTimeout(function() {
            $(".line-left").removeClass("left-position");
        }, 2200);
        setTimeout(function() {
            $(".line-right").removeClass("right-position");
        }, 2200);
		
        // hero scale IN
        $(".hero-bg").addClass("hero-bg-show");
	
    });
    // WINDOW.LOAD FUNCTION end
	
	
    // DOCUMENT.READY FUNCTION start
	
    // kenburnsy
    $("#kenburnsy-bg").kenburnsy({
        fullscreen: true
    });
	
    // countdown setup start
    $("#countdown").countdown({
        date: "11 May 2020 12:00:00", // countdown target date settings
        format: "on"
    }, function() {});
	
    // fire
    // fire home
    $("#fire-home").on("click", function(e) {
        e.preventDefault();
        $(".current").removeClass("current").fadeOut(1200, function() {
            $("#home").fadeIn(2200).addClass("current");
        });
    });
	
    // fire about
    $("#fire-about").on("click", function(e) {
        e.preventDefault();
        $(".current").removeClass("current").fadeOut(1200, function() {
            $("#about").fadeIn(2200).addClass("current");
        });
    });
	
    // fire services
    $("#fire-services").on("click", function(e) {
        e.preventDefault();
        $(".current").removeClass("current").fadeOut(1200, function() {
            $("#services").fadeIn(2200).addClass("current");
        });
    });
	
    // fire photos
    $("#fire-photos").on("click", function(e) {
        e.preventDefault();
        $(".current").removeClass("current").fadeOut(1200, function() {
            $("#photos").fadeIn(2200).addClass("current");
        });
    });
	
    // fire contact
    $("#fire-contact").on("click", function(e) {
        e.preventDefault();
        $(".current").removeClass("current").fadeOut(1200, function() {
            $("#contact").fadeIn(2200).addClass("current");
        });
    });
	
    // menu active state
    $("a.menu-state").on("click", function() {
        $("a.menu-state").removeClass("active");
        $(this).addClass("active");
    });
	
    // YTPlayer
    $(function() {
        $(".player").mb_YTPlayer();
    });
	
    // Vimeofy
    $('#videoContainment-vimeo').vimeofy({
        'url': 'https://vimeo.com/105001064', // Vimeo VIDEO URL
        'color': '#00D8D8',
        'autoplay': true,
        'loop': true,
        'delay': 5000
    });
	
    // contact form
    $("form#form").submit(function() {
        $("form#form .error").remove();
        var s = !1;
        if ($(".requiredField").each(function() {
            if ("" === jQuery.trim($(this).val())) $(this).prev("label").text(), $(this).parent().append('<span class="error">This field is required</span>'), $(this).addClass(
                "inputError"), s = !0;
            else if ($(this).hasClass("email")) {
                var r = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                r.test(jQuery.trim($(this).val())) || ($(this).prev("label").text(), $(this).parent().append('<span class="error">Invalid email address</span>'), $(this).addClass(
                    "inputError"), s = !0);
            }
        }), !s) {
            $("form#form input.submit").fadeOut("normal", function() {
                $(this).parent().append("");
            });
            var r = $(this).serialize();
            $.post($(this).attr("action"), r, function() {
                $("form#form").slideUp("fast", function() {
                    $(this).before('<div class="success">Your email was sent successfully.</div>');
                });
            });
        }
        return !1;
    });
	
    // newsletter form
    $("form#subscribe").submit(function() {
        $("form#subscribe .subscribe-error").remove();
        var s = !1;
        if ($(".subscribe-requiredField").each(function() {
            if ("" === jQuery.trim($(this).val())) $(this).prev("label").text(), $(this).parent().append('<span class="subscribe-error">Please enter your Email</span>'),
                $(this).addClass("inputError"), s = !0;
            else if ($(this).hasClass("subscribe-email")) {
                var r = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                r.test(jQuery.trim($(this).val())) || ($(this).prev("label").text(), $(this).parent().append('<span class="subscribe-error">Please enter a valid Email</span>'), $(
                    this).addClass("inputError"), s = !0);
            }
        }), !s) {
            $("form#subscribe input.submit").fadeOut("normal", function() {
                $(this).parent().append("");
            });
            var r = $(this).serialize();
            $.post($(this).attr("action"), r, function() {
                $("form#subscribe").slideUp("fast", function() {
                    $(this).before('<div class="subscribe-success">Thank you for subscribing.</div>');
                });
            });
        }
        return !1;
    });
	
    // magnificPopup
    $(".popup-photo").magnificPopup({
        type: "image",
        gallery: {
            enabled: true,
            tPrev: "",
            tNext: "",
            tCounter: "%curr% / %total%"
        },
        removalDelay: 300,
        mainClass: "mfp-fade"
    });
	
    // owlCarousel FIN slides
    $(".fin-slides").owlCarousel({
        navigation: false,
        pagination: false,
        transitionStyle: "fade", // fade, backSlide, goDown, fadeUp
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: 5000
    });
	
    // owlCarousel PHOTOS slides
    $(".photos-gallery-slider").owlCarousel({
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: false,
        items: 2,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [979, 2],
        autoHeight: false,
        navigation: true,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });
	
    // owlCarousel HERO slider SPLIT
    $(".hero-slider-split").owlCarousel({
        autoPlay: true,
        navigation: false,
        pagination: false,
        slideSpeed: 300,
        paginationSpeed: 800,
        singleItem: false,
        items: 2,
        autoHeight: true
    });
	
	// owlCarousel HERO slider ZOOM
	$(".hero-slider-zoom").owlCarousel({
	    autoPlay: true,
	    navigation: false,
	    pagination: false,
	    transitionStyle: "fadeUp", // fade, backSlide, goDown, fadeUp
	    slideSpeed: 300,
	    paginationSpeed: 400,
	    singleItem: true,
	    items: 1,
	    autoHeight: true
	});
	
    // signup form
    $(".ex-modal-launcher").on("click", function(e) {
        e.preventDefault();
        $(this).toggleClass("open");
        $(".ex-modal").toggleClass("show");
    });
	
	// rainyDay - define IMG background
	$("body").append('<img id="background" src="img/background/rainyDay-bg.jpg" alt="background" crossorigin="anonymous"><div id="cholder"><canvas id="canvas"></canvas></div>');
	
    // DOCUMENT.READY FUNCTION end
		
		
    // MOBILE DETECT start
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };
    // MOBILE DETECT end


})(jQuery);


// rainyDay
function demo() {
    var engine = new RainyDay("canvas", "background", window.innerWidth, window.innerHeight);
    engine.gravity = engine.GRAVITY_NON_LINEAR;
    engine.trail = engine.TRAIL_DROPS;
    engine.rain([
        engine.preset(0, 2, 500)
    ]);
    engine.rain([
        engine.preset(3, 3, 0.88),
        engine.preset(5, 5, 0.9),
        engine.preset(6, 2, 1),
    ], 100);
}


// styleswitch [for demonstration purposes only]
$(document).ready(function() {
    $(".corner").on("click", function() {
        $("#customizer").toggleClass("s-open");
    });

    function swapStyleSheet(sheet) {
        document.getElementById("general-css").setAttribute("href", sheet);
    }
});


// GOOGLE ANALYTICS [for demonstration purposes only]
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-3033286-18']);
_gaq.push(['_trackPageview']);
(function() {
    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
})();