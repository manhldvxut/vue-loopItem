/* itemList
------------------------------------------------------------------------------------------------------------------------*/
const pageApp = new Vue({
    el: "#item-app",
    data: {
      itemList: []
    },
    created: async function() {
        let res = await axios
                            .get('/page/panda/item/assets/data/item.json')
                            .then( res => { 
                              this.itemList.push(...res.data); // アイテム読み込み
                            })
                            .catch(function(err){
                              console.log(err);
                            })
    },
    methods: {
        // 通常改行
        br: function(text) {
          return String(text).replace(/\r?\n/g,'<br>');
        },
        // modal open
        modalOpen: function(id) {
          $('.js-modal').hide(); //モーダルリセット
          let target = '.modal-item-' + id;
          $(target).fadeIn(400);

          itemSlider(target);
        },
        // modal close
        modalClose: function() {
          $('.js-modal').fadeOut(400);
          setTimeout(function(){
            $(document).find('.slick-initialized').slick('unslick');
          },400)
        }
    }
  });



  /*  itemSlider スライダー（主にモーダル内の画像用）
------------------------------------------------------------------------------------------------------------------------*/
function itemSlider(target) {
    const slider = $(document).find(target + ' .js-itemslider');
    let sliderCont = slider.children('*').length;

    // スライダーの枚数が1より多い場合に発火
    if (sliderCont > 1) {
        slider.slick({
            slidesToShow: 1,
            speed: 500,
            infinite: true,
            prevArrow: '<div class="slick-arrow prev"><button class="slick-prev opacity-link"><img src="assets/images/arrow.svg" alt="prev item"></button></div>',
            nextArrow: '<div class="slick-arrow next"><button class="slick-next opacity-link"><img src="assets/images/arrow.svg" alt="next item"></button></div>',
            dots: true,
        });
    }
}

