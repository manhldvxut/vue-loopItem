var intViewportWidth = window.innerWidth;
$(function() {

    // more
    scrollAddClass();
     $(window).scroll(function () {

        scrollAddClass()
      })

     setTimeout(function(){ 

        $('.header__title').addClass('showLL')

     }, 100);


    setTimeout(function(){ 
        
        if(intViewportWidth <= 768){
            $(".jsLoadMore").slice(0, 6).show();
            $(".more a").on("click", function(e){
                e.preventDefault();
                $(".jsLoadMore:hidden").slice(0, 6).slideDown();
                if($(".jsLoadMore:hidden").length == 0) {
                  $(".more a").remove()
                }
            });
        }else{
            $(".jsLoadMore").slice(0, 8).show();
            $(".more a").on("click", function(e){
                e.preventDefault();
                console.log(1)
                $(".jsLoadMore:hidden").slice(0, 8).slideDown();
                if($(".jsLoadMore:hidden").length == 0) {
                  $(".more a").remove()
                }
            });
        }

    }, 300);

    

    // ページトップボタン
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
                $('.pft__pageTop').fadeIn();
        } else {
                $('.pft__pageTop').fadeOut();
        }
    });

    // ページスクロール
    $('a.scroll').click(function() {
        // スクロールの速度
        var speed = 400; // ミリ秒で記述
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $('body,html').animate({
            scrollTop: position
        }, speed, 'swing');
        return false;
    });

    setTimeout(function(){ 
        imgLazyLoad()
    }, 3000);
    // Lazyload実行
    


    // moreボタン処理
    var taglist = $('.taglist');
    taglist.each(function() {
        var tagitem = $(this).find('.taglist__item');
        const tagitemMore = '.js-tag-more';
        const tagitemShow = '.taglist__item'
        // console.log(tagitem.length);

        if(tagitem.length > 6) {
            $(tagitemMore).css('display','block')
            $(document).on('click', tagitemMore, function(e) {
                e.preventDefault();
                tagitem.css('display','block')
                $(tagitemMore).css('display','none')
                $(tagitemShow).css('display','block')

                imgLazyLoad();
            });
            // console.log('hoge');
        } else {
            tagitemMore.css('display','none')
            // console.log('hoge2');
        }

    });


    // 値書き開閉
    $(window).on('load', function(){
        var salelistTitle = $('.salelist__title');
        var salelistTitleFlg;
        salelistTitle.on('click', function(e) {
            e.preventDefault();
            if($(this).is('.is-open')) {
                $(this).removeClass('is-open');
                $(this).next().slideUp();
            } else {
                $(this).addClass('is-open');
                $(this).next().slideDown();
            }
        });
    });


    // 値書き（値がない時消す）
    $('.salelist').each(function() {
      if ($(this).find('.salelist__shop').length) {
        $(this).css('display', 'block');
      } else {
        $(this).css('display', 'none');
      }
    });
});


// Lazyload処理
function imgLazyLoad(){
    $('img.lazy').lazyload({
        effect : "fadeIn",
        effect_speed: 300
    });
}

function btn(){
    modalOpen = '.js-modalopen', //モーダルを開く
    $(document).on('click', modalClose, function() {
      $('body').removeAttr('style');
      $(document).find('.slick-initialized').slick('unslick'); //モーダル内スライダーストップ
      $(document).find(modal).fadeOut();
    });
}


// scroll
function scrollAddClass(){
  $('.hidden').each(function() {
    let elemPos = $(this).offset().top;
    let scroll = $(window).scrollTop();
    let windowHeight = $(window).height();

    if ($(window).innerWidth() >= 769) {
      if (scroll > elemPos - windowHeight + 250) {
        $(this).addClass('showElement');
      } // PC
    }else{
      if (scroll > elemPos - windowHeight + 10) {
        $(this).addClass('showElement');
      } // Sp
    }
  });
}
