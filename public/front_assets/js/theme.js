

$(window).on('load',function() {

    $('#preloader').fadeOut(400)

  let backtotop = $('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.addClass('active')
      } else {
        backtotop.removeClass('active')
      }
    }
    $(window).on('scroll',document, toggleBacktotop)
  }

 $(document).on('click', '.navbar .dropdown > a', function(e) {

    if ($('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      $(this).Sibling().toggleClass('dropdown-active')
    }
  })

  /**
   * Preloader
   */



})


  $('.hero-slider').slick({
    dots: false,
    infinite: true,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 2000,
  })

 /**
   * Animation on scroll
   */
 AOS.init({
    duration: 1000,
    easing: 'ease-in-out',
    offset: 0,
    once: true,
    mirror: false
  })








