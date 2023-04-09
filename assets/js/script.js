// ページトップボタン
var topBtn = $('.js-pagetop');
topBtn.hide();

// ページトップボタンの表示設定
$(window).scroll(function () {
  if ($(this).scrollTop() > 70) {
    // 指定px以上のスクロールでボタンを表示
    topBtn.fadeIn();
  } else {
    // 画面が指定pxより上ならボタンを非表示
    topBtn.fadeOut();
  }
});

// ページトップボタンをクリックしたらスクロールして上に戻る
topBtn.click(function () {
  $('body,html').animate({
    scrollTop: 0
  }, 300, 'swing');
  return false;
});

// スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動。ヘッダーの高さ考慮。)
$(document).on('click', 'a[href*="#"]', function () {
  let time = 400;
  let header = $('header').innerHeight();
  let target = $(this.hash);
  if (!target.length) return;
  let targetY = target.offset().top - header;
  $('html,body').animate({ scrollTop: targetY }, time, 'swing');
  return false;
});


// メインビジュアルスライダー（front-page.php）
const slider1 = new Swiper('.p-mv-slider', {
  initialSlide: 0,
  loop: true,
  effect: 'fade',
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  speed: 500,
  slidesPerView: 1,
});


// 制作実績スライダー（front-page.php）
const slider2 = new Swiper('.p-top-works-slider', {
  initialSlide: 0,
  loop: true,
  effect: 'slide',
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  speed: 2000,
  slidesPerView: 1,
  pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
    clickable: true,
  },
});

// 制作実績スライダー（single-works.php）
// メイン
const works_slider_main = new Swiper('.p-single-works-main-slider', {
  slidesPerView: 1,
  centeredSlides: true,
  loop: true,
  loopedSlides: 6, //スライドの枚数と同じ値を指定
    autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  speed: 1000,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});
// サムネイル
const works_slider_thumbnail = new Swiper('.p-single-works-sub-slider', {
  slidesPerView: 'auto',
  spaceBetween: 12,
  centeredSlides: true,
  loop: true,
  slideToClickedSlide: true,
  breakpoints: {
    '768': {
      centeredSlides: false,
      slidesPerView: 6
    },
  }
});
// メインとサムネイルを紐付け
works_slider_main.controller.control = works_slider_thumbnail;
works_slider_thumbnail.controller.control = works_slider_main;



  // ハンバーガーメニュー
  $('.js-hamburger-btn').click(function () {
    $(this).toggleClass('open');
    if($(this).hasClass('open')){
      $('.js-drawer').fadeIn();
    }else{
      $('.js-drawer').fadeOut();
    }
  })

  $(window).on('load resize', function(){
    var wid = $(window).width();
    if (wid >= 768) {
      $('.js-drawer').css('display','block');
    } else {
      $('.js-drawer').css('display','none');
    }
  });

// スクロールしたらヘッダーの色が変わる
$(function () {
  $(window).on('scroll', function () {
    if ($('.p-header').height()  < $(this).scrollTop()) {
        $('.js-header').addClass('bg-color-change');
        $('.p-header__logo').addClass('color-change');
        // $('.p-header-nav__item a').addClass('color-change');
    } else {
        $('.js-header').removeClass('bg-color-change');
        $('.p-header__logo').removeClass('color-change');
        // $('.p-header-nav__item a').removeClass('color-change');
    }
  });
  
});