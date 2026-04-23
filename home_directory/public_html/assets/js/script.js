$(function () {
    $('.header-slider').slick({
        autoplay: true,
        dots: false,
        arrows: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 2000,
        fade: true,
        autoplaySpeed: 5000
    });
    $('.featured-slider').slick({
        autoplay: true,
        dots: false,
        arrows: false,
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        speed: 2000,
        fade: false,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });
    var $featuredProjectsSlider = $('.featured-projects-slider');
    if ($featuredProjectsSlider.length) {
        $featuredProjectsSlider.slick({
            autoplay: false,
            dots: false,
            arrows: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 500,
            fade: true,
        });
        $('.featured-projects .prev-arrow').on('click', function (e) {
            e.preventDefault();
            $featuredProjectsSlider.slick('slickPrev');
        });
        $('.featured-projects .next-arrow').on('click', function (e) {
            e.preventDefault();
            $featuredProjectsSlider.slick('slickNext');
        });
    }

    var $mobiMenu = $("#menu-main-menu");
    var $mobiToggle = $("#nav-mobi-toggle");
    function setMobiMenuOpen(open) {
        $mobiMenu.toggleClass("active", !!open);
        $("#nav-main").toggleClass("menu-open", !!open);
        if ($mobiToggle.length) {
            $mobiToggle.attr("aria-expanded", open ? "true" : "false");
            $mobiToggle.attr("aria-label", open ? "Close menu" : "Open menu");
        }
    }
    $mobiToggle.on("click", function (e) {
        e.stopPropagation();
        setMobiMenuOpen(!$mobiMenu.hasClass("active"));
    });
    $(document).on("keydown.mobiNav", function (e) {
        if (e.key === "Escape" && $mobiMenu.hasClass("active")) {
            setMobiMenuOpen(false);
            $mobiToggle.trigger("focus");
        }
    });
    $(window).on("resize.mobiNav", function () {
        if (window.innerWidth > 1000 && $mobiMenu.hasClass("active")) {
            setMobiMenuOpen(false);
        }
    });

    var $projectSlider = $(".project-gallery-slider");
    var $projectDotsHost = $(".project-gallery-dots-host");
    if ($projectSlider.length) {
        $projectSlider.slick({
            autoplay: true,
            autoplaySpeed: 8000,
            dots: true,
            arrows: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 400,
            pauseOnHover: true,
            draggable: true,
            appendDots: $projectDotsHost,
        });
        $(".project-gallery-nav-btn--prev").on("click", function () {
            $projectSlider.slick("slickPrev");
        });
        $(".project-gallery-nav-btn--next").on("click", function () {
            $projectSlider.slick("slickNext");
        });
    }

    var $awardsImageSlider = $(".gallery-awards-image-slider");
    var $awardsTextSlider = $(".gallery-awards-text-slider");
    if ($awardsImageSlider.length && $awardsTextSlider.length) {
        $awardsImageSlider.slick({
            autoplay: true,
            autoplaySpeed: 8000,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            infinite: true,
            centerMode: true,
            centerPadding: "14%",
            adaptiveHeight: true,
            asNavFor: ".gallery-awards-text-slider",
            responsive: [
                {
                    breakpoint: 920,
                    settings: {
                        centerPadding: "10%",
                    },
                },
                {
                    breakpoint: 720,
                    settings: {
                        centerMode: false,
                        centerPadding: "0px",
                    },
                },
            ],
        });
        $awardsTextSlider.slick({
            autoplay: true,
            autoplaySpeed: 8000,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            infinite: true,
            adaptiveHeight: true,
            asNavFor: ".gallery-awards-image-slider",
            prevArrow: $(".gallery-awards-slider-nav-btn--prev"),
            nextArrow: $(".gallery-awards-slider-nav-btn--next"),
        });
    }

    var $lightbox = $("#global-lightbox");
    var $lightboxImg = $("#global-lightbox-img");
    var lastLightboxTrigger = null;

    function openGlobalLightbox(src, heading, caption) {
        if (!src) {
            return;
        }
        lastLightboxTrigger = document.activeElement;
        $lightboxImg.attr("src", src);
        $lightboxImg.attr("alt", heading || "Gallery image");
        var $h = $("#global-lightbox-heading");
        var $c = $("#global-lightbox-caption");
        $h.text(heading || "");
        $h.prop("hidden", !heading);
        $c.text(caption || "");
        $c.prop("hidden", !caption);
        $lightbox.prop("hidden", false);
        $("body").addClass("global-lightbox-open");
        $(".global-lightbox-close").trigger("focus");
    }

    function closeGlobalLightbox() {
        $lightbox.prop("hidden", true);
        $lightboxImg.attr("src", "");
        $("body").removeClass("global-lightbox-open");
        if (lastLightboxTrigger && typeof lastLightboxTrigger.focus === "function") {
            lastLightboxTrigger.focus();
        }
    }

    $(document).on("click", ".js-lightbox-trigger", function (e) {
        e.preventDefault();
        var $t = $(this);
        openGlobalLightbox($t.data("fullSrc"), $t.data("heading"), $t.data("caption"));
    });

    $(".global-lightbox-close, .global-lightbox-scrim").on("click", function () {
        closeGlobalLightbox();
    });

    $(document).on("keydown", function (e) {
        if (e.key === "Escape" && !$lightbox.prop("hidden")) {
            closeGlobalLightbox();
        }
    });
});

  const animationObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
                // observer.unobserve(entry.target);
            }
        });
    }, { rootMargin: "0px" });

   const animatedElements = document.querySelectorAll(".animated-element");
   animatedElements.forEach(element => {
       animationObserver.observe(element);
   });

   const animationObserverOffset = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
                observer.unobserve(entry.target);
            }
        });
    }, { rootMargin: "-100px" });

   const animatedElementsOffset = document.querySelectorAll(".animated-element-offset");
   animatedElementsOffset.forEach(element => {
       animationObserverOffset.observe(element);
   });

   const animationObserverSelf = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 1 });

   const animatedElementsSelf = document.querySelectorAll(".animated-element-self");
   animatedElementsSelf.forEach(element => {
       animationObserverSelf.observe(element);
   });

   const animationObserverSelfOffset = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

   const animatedElementsSelfOffset = document.querySelectorAll(".animated-element-self-half");
   animatedElementsSelfOffset.forEach(element => {
       animationObserverSelfOffset.observe(element);
   });

  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop,
                behavior: 'smooth'
            });
        }
    });
});

(function () {
    var list = document.querySelector('.content-page--faq .faq-list');
    if (!list) {
        return;
    }
    list.addEventListener('click', function (e) {
        var btn = e.target.closest('.faq-q');
        if (!btn || !list.contains(btn)) {
            return;
        }
        var panelId = btn.getAttribute('aria-controls');
        var panel = panelId ? document.getElementById(panelId) : null;
        if (!panel) {
            return;
        }
        var isOpen = btn.getAttribute('aria-expanded') === 'true';
        list.querySelectorAll('.faq-q').forEach(function (b) {
            b.setAttribute('aria-expanded', 'false');
            var pid = b.getAttribute('aria-controls');
            if (pid) {
                var p = document.getElementById(pid);
                if (p) {
                    p.hidden = true;
                }
            }
        });
        if (!isOpen) {
            btn.setAttribute('aria-expanded', 'true');
            panel.hidden = false;
        }
    });
})();
