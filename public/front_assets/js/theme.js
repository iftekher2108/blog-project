
$(window).on("load", function () {
    $("#preloader").fadeOut(400);
    let o = $(".back-to-top");
    if (o) {
        const e = () => {
            window.scrollY > 100
                ? o.addClass("active")
                : o.removeClass("active");
        };
    $(window).on("scroll", document, e);
    }

    $(document).on("click", ".navbar .dropdown > a", function (o) {
        $("#navbar").classList.contains("navbar-mobile") &&
            (o.preventDefault(),
            $(this).Sibling().toggleClass("dropdown-active"));
    });

    $('.mobile-nav-toggle').click(function() {
        $('#navbar ul').toggle(300);
    })

})
$(".hero-slider").slick({
        dots: true,
        arrows:true,
        infinite: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
    })

    AOS.init({
        duration: 1e3,
        easing: "ease-in-out",
        offset: 0,
        once: !0,
        mirror: !1,
    });


