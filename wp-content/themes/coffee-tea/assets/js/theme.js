jQuery(function($) {
    "use strict";

    // Superfish menu initialization
    $('.main-menu > ul').superfish({
        delay: 500,
        animation: { opacity: 'show', height: 'show' },
        speed: 'fast'
    });

    // Navbar Fixed function
    function navbarFixed() {
        if ($('.main-header.is-sticky-on').length) {
            $(window).on('scroll', function() {
                var scroll = $(window).scrollTop();
                if (scroll >= 295) {
                    $(".main-header.is-sticky-on").addClass("header-fixed");
                } else {
                    $(".main-header.is-sticky-on").removeClass("header-fixed");
                }
            });
        }
    }

    // Navbar focus/blur toggle class
    $('.navbar-menubar.responsive-menu .navbar-nav').find('a').on('focus blur', function() {
        $(this).parents('ul, li').toggleClass('focus');
    });

    // Navbar toggler click event
    $(".navbar-toggler").on("click", function(n) {
        if ($(this).attr('aria-expanded') === 'false') {
            $(".navbar-menubar").removeClass('active');
            $(".navbar-toggler:not(.navbar-toggler-close)").focus();
        } else {
            $(".navbar-menubar").addClass('active');
            $(".navbar-toggler.navbar-toggler-close").focus();
            n.preventDefault();

            var o = document.querySelector(".navbar-menu");
            if (!o) return false;

            let e = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
            let m = document.querySelector(".navbar-toggler-close");
            let u = o.querySelectorAll(e);
            let r = u[u.length - 1];

            function l() {
                for (var el = this; el && -1 === el.className.indexOf("navbar-menu"); el = el.parentElement) {
                    if (el.tagName.toLowerCase() === "li") {
                        el.className = el.className.includes("focus") ? el.className.replace("focus", "") : el.className + " focus";
                    }
                }
            }

            for (let a = 0; a < u.length; a++) {
                u[a].addEventListener("focus", l, true);
                u[a].addEventListener("blur", l, true);
            }

            document.addEventListener("keydown", function(e) {
                if (e.key === "Tab" || e.keyCode === 9) {
                    if (e.shiftKey) {
                        if (document.activeElement === m) {
                            r.focus();
                            e.preventDefault();
                        }
                    } else {
                        if (document.activeElement === r) {
                            m.focus();
                            e.preventDefault();
                        }
                    }
                }
            });
        }
    });

    // Add dropdown icon button and remove attributes
    var coffee_tea_dropdownToggle = $('.navbar-nav.main-nav .dropdown > a.nav-link');
    coffee_tea_dropdownToggle.after('<button type="button" class="dropdown-icon"></button>');
    coffee_tea_dropdownToggle.removeAttr('data-bs-toggle data-bs-target aria-expanded data-bs-name aria-haspopup');

    // Dropdown icon click event
    $(document).on('click', '.navbar-nav.main-nav .dropdown > button.dropdown-icon', function() {
        $(this).parent(".menu-item").toggleClass("show");
        $(this).next(".sub-menu").slideToggle();
    });

    // Resize event for desktop menu
    function coffee_tea_desktopmenu() {
        if (window.matchMedia("(min-width: 992px)").matches) {
            $('.sub-menu.collapse').removeAttr('style');
        }
    }
    $(window).on('resize', coffee_tea_desktopmenu);

    // Dropdown link click event
    $(document).on('click', '.navbar-nav.main-nav .dropdown > a', function() {
        location.href = this.href;
    });

    // Scroll to top button
    var btn = $('#scrolltop');
    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('scroll');
        } else {
            btn.removeClass('scroll');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, '300');
    });

    // Loading screen fade out
    window.addEventListener('load', function() {
        $(".loading").delay(2000).fadeOut("slow");
    });

    // Sticky header
    $(window).scroll(function() {
        var sticky = $('.sticky-header'),
            scroll = $(window).scrollTop();

        if (scroll >= 100) sticky.addClass('fixed-header');
        else sticky.removeClass('fixed-header');
    });

    // Initialize navbarFixed function
    navbarFixed();
});

// slider
jQuery(document).ready(function($) {
    // Initialize the main owl-carousel slider
    var isRTL = $('html').attr('dir') === 'rtl';
    var mainSlider = $('#main-slider').owlCarousel({
        loop: false,
        margin: 0,
        nav: true,
        dots: false,
        autoplay: false,
        items: 1,
        rtl: isRTL
    });

    // Initialize the abt-cat owl-carousel
    var isRTL = $('html').attr('dir') === 'rtl';
    var abtCatSlider = $('.abt-cat').owlCarousel({
        loop: false,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: false,
        items: 5,
        center: true,
        rtl: isRTL
    });

    // Add click event handler to abt-cat slider items
    $('.abt-cat .item').on('click', function() {
        var index = $(this).data('slide-index');
        mainSlider.trigger('to.owl.carousel', [index, 300, true]);
    });

    // Synchronize abt-cat with main-slider on change
    function updateActiveClass(currentIndex) {
        $('.abt-cat .item').removeClass('active-image');
        $('.abt-cat .item').eq(currentIndex).addClass('active-image');
    }

    mainSlider.on('changed.owl.carousel', function(event) {
        var current = event.item.index;
        updateActiveClass(current);
    });

    // Initialize active class on load
    mainSlider.on('initialized.owl.carousel', function(event) {
        var current = event.item.index;
        updateActiveClass(current);
    });

    // Trigger initialization
    mainSlider.trigger('refresh.owl.carousel');
});

jQuery('document').ready(function(){
    var owl = jQuery('#product_cat_slider .owl-carousel');
      owl.owlCarousel({
      margin: 20,
      nav: true,
      autoplay: true,
      lazyLoad: false,
      autoplayTimeout: 3000,
      loop: true,
      dots: false,
      responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        900: {
            items: 4
        },
        1200: {
            items: 6
        }
      },
      autoplayHoverPause: true,
      mouseDrag: true,
      rtl: jQuery('body').hasClass('rtl') // Check if the body has the class "rtl"
    });
  });
  

// product icon
document.addEventListener('DOMContentLoaded', function() {
    var productImages = document.querySelectorAll('.product-images');
    productImages.forEach(function(image) {
        var icon = image.querySelector('.icon');
        if (!icon) {
            image.classList.add('no-icon');
        }
    });
});