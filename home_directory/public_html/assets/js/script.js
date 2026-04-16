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
        autoplaySpeed: 5000
    });
    $('.featured-projects-slider').slick({
        autoplay: false,
        dots: false,
        arrows: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        fade: true,
        prevArrow: $('.prev-arrow'),
        nextArrow: $('.next-arrow'),
    });

    $("#mobi-hamburger-open").click(function() {
        event.stopPropagation();
        console.log("Hamburger clicked, adding 'active' class");
        $("#menu-main-menu").addClass("active");
    });
    
    $("#mobi-hamburger-close").click(function() {
        event.stopPropagation();
        console.log("Close clicked, removing 'active' class");
        $("#menu-main-menu").removeClass("active");
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
