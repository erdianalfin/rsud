$(".owl-training").owlCarousel({
  loop: false,
  margin: 20,
  nav: true,
  navText: [
    "<i class='fas fa-chevron-left text-white'></i>",
    "<i class='fas fa-chevron-right text-white'></i>",
  ],
  dots: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 3,
    },
  },
});

$(".owl-news").owlCarousel({
  loop: false,
  margin: 20,
  nav: true,
  navText: [
    "<i class='fas fa-chevron-left text-white'></i>",
    "<i class='fas fa-chevron-right text-white'></i>",
  ],
  dots: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 4,
    },
  },
});

$(".owl-gallery").owlCarousel({
  loop: false,
  margin: 20,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 4,
    },
  },
});

$(".owl-video").owlCarousel({
  loop: false,
  margin: 20,
  nav: true,
  navText: [
    "<i class='fas fa-chevron-left text-white'></i>",
    "<i class='fas fa-chevron-right text-white'></i>",
  ],
  dots: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 3,
    },
  },
});