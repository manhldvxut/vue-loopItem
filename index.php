<?php


include_once $_SERVER['DOCUMENT_ROOT'].'/assets/inc/global-config.php';
//下記のパス「demo」を変更
include_once $_SERVER['DOCUMENT_ROOT'].'/page/panda/item/assets/inc/config.php';

$nowURL = $_SERVER['HTTP_HOST'];
$pageURL = STORE_NAME.'.parco.jp';
$devURL = 'dev-'.STORE_NAME.'-parco.sc-concierge.jp';

//ドメインの判定
if ($nowURL === $pageURL || $devURL === $pageURL) {
  $productionFlag = true; //本番とdev
} else {
  $productionFlag = false; //上記以外
}

if ($productionFlag === true) {
  //basic include
  include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/page_include.php';
}

//ページ用の変数
$pege_title = 'PARCO_ya上野のパンダグッズコレクション | PARCO_ya上野';
$pege_description = 'PARCO_ya上野のパンダグッズをご紹介！PARCO_ya限定アイテムも！';
$pege_keywords = '';
$page_shareurl = 'https://'.STORE_NAME.'.parco.jp/page/panda/item/'; //必ずディレクトリ名を変更する

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/inc/tagmanager1.php';?>

<!-- meta -->
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/page/assets/inc/meta.php';?>
<!-- /meta -->

<!-- CSS -->
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/'.DIRNAME.'/assets/inc/css.php';?>
<!-- /CSS -->
</head>

<body class="<?php echo STORE_NAME; ?> page-tag" id="top">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/inc/tagmanager2.php';?>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/page/assets/inc/svgs.php';?>

<link rel="stylesheet" href="https://use.typekit.net/lvx8kxl.css">

<div class="wrapper" id="item-app">

<?php
/**
 * Header
 */
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/'.DIRNAME.'/assets/inc/header.php'; ?>


<?php
/**
 * Main contents
 */
?>
<main class="main-contents">

<?php /* ==========================================================
ヘッダー下バナー、youtubeなど
============================================================== */ ?>
<?php /* バナー */ ?>


<?php /* ==========================================================
タグ集約、ownlyなど
============================================================== */ ?>
<div class="contents-wrap" >

  <div class="veuJs" id="shoplist" v-cloak>
    <div class="panel current" id="id01">
      <div class="contents-block contents-blog newsevent">
        <div class="list" >
          <div class="ttl hidden">各ショップにてパルコヤ限定で販売中の<br class="sp-only">パンダグッズをご紹介！<br>一部商品はパルコオンラインストアでも<br class="sp-only">販売しております。</div>
          <div class="row m-15 sm-m-5 hidden">
            <div :class="[`jsLoadMore--${index + 1}`]" class="col-lg-4 p-15 sm-p-5 jsLoadMore" v-for="(item, index) in itemList" class="item opacity-link hidden">
              <div class="list__content">
                <div  @click="modalOpen(item.id)"  class="box-item">
                  <div class="restauran__info">
                    <div class="avatar"><img :src="'/<?php echo DIRNAME; ?>/assets/images/item/' + item.id  + '_img'+ '-01.jpg'" :alt="item.shop"></div>
                    <div class="logo"><img :src="'/<?php echo DIRNAME; ?>/assets/images/logo/' + item.id + '_logo.png'" alt="item.shop"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="more">
          <a href="" class="hover-btn">MORE 
            <svg class="more-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
              <g id="_" data-name="+" transform="translate(0.164 -0.16)">
                <g id="楕円形_14" class="changercolor" data-name="楕円形 14" transform="translate(-0.164 0.16)" fill="none" stroke="#454b50" stroke-width="1">
                  <circle cx="14" cy="14" r="14" stroke="none"/>
                  <circle cx="14" cy="14" r="13.5" fill="none"/>
                </g>
                <line class="changercolor" id="線_177" data-name="線 177" x2="11.219" transform="translate(8.226 14.766)" fill="none" stroke="#454b50" stroke-linecap="round" stroke-width="1"/>
                <line class="changercolor" id="線_178" data-name="線 178" x2="11.219" transform="translate(13.836 9.157) rotate(90)" fill="none" stroke="#454b50" stroke-linecap="round" stroke-width="1"/>
              </g>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>


  <!-- modal -->



  <div class="panda-footer ">
  <div class="panda-footer-container hidden">
    <div class="avatar left"><img class="" src="/<?php echo DIRNAME; ?>/assets/images/panda.svg"></div>
    <div class="avatar right"><img class="" src="/<?php echo DIRNAME; ?>/assets/images/panda02.svg"></div>
  </div>
</div>


<!-- /.contents-wrap --></div>


<?php /* ==========================================================
フッター上バナーなど
============================================================== */ ?>
<?php //include_once $_SERVER['DOCUMENT_ROOT'].'/page/assets/inc/foot-banner.php'; ?>

</main>
<?php /* モーダル  */ ?>

<template v-for="(modal, index) in itemList">
<div :class="'modal-block js-modal modal-item-' + modal.id">

    <div class="modal-bg" @click="modalClose()"></div>

    <div class="modal-wrap">
      <button class="modal-close" @click="modalClose()"><img src="assets/images/btn-close.svg" alt="btn"></button>

        <div class="modal__content">

          <div class="modal-cont item-slider modal__item-slider js-itemslider">
            <div class="item-box row" v-for="(slideitem, index) in modal.items">

                <div class="img-wrap col-6 col-sm-12">
                  <div class="modal-logo text-center sp-only">
                    <img :src="'/<?php echo DIRNAME; ?>/assets/images/logo/' + modal.id + '_logo.png'" :alt="modal.shop">
                  </div>
                  <img :src="'/<?php echo DIRNAME; ?>/assets/images/item/' + modal.id + '_img-' + slideitem.itemid + '.jpg'" :alt="slideitem.title">

                </div>

                <div class="detail col-6 col-sm-12">
                    <div class="modal__detail">
                      <div class="modal-logo pc-only">
                        <img :src="'/<?php echo DIRNAME; ?>/assets/images/logo/' + modal.id + '_logo.png'" :alt="modal.shop">
                      </div>
                      <div class="shopFloor-info">
                        <span class="floor">{{modal.floor}}</span>
                        <span class="shopname">{{modal.shop}}</span>
                      </div>
                      <div class="productName-info">
                        <div class="productName" v-bind:class="{ 'productWidht' : slideitem.limit == '' }">{{slideitem.title}}</div>
                        <div class="limit" v-if="slideitem.limit != '' "><span>{{slideitem.limit}}</span></div>
                      </div>
                      <div class="price-info" v-bind:class="{ 'marginFix' : slideitem.limit == '' }" v-if="slideitem.price !=''">
                        {{slideitem.price}}
                        <span class="tax">（税込）</span>
                        <span class="tax" v-if="slideitem.title == 'がま口お散歩ポシェット（右）'">ご好評につき完売いたしました。</span>
                      </div>
                      <div class="price-info" v-bind:class="{ 'marginFix' : slideitem.limit == '' }" v-else="slideitem.title =='がま口お散歩ポシェット（右）'">
                        <span class="tax" v-if="slideitem.title == 'がま口お散歩ポシェット（右）'">ご好評につき完売いたしました。</span>
                      </div>

                      <div class="text-information" v-html="br(slideitem.description)">Information</div>
                      <div class="text-note" v-if="slideitem.note !='' ">{{slideitem.note}}</div>
                      <div class="onlineStore" v-if="modal.shopid !=''">
                        <a class="hover-btn" :href="modal.shopid" target="_blank">PARCO ONLINE STORE
                          <svg class="more-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                            <g id="_" data-name="+" transform="translate(0.164 -0.16)">
                              <g id="楕円形_14" class="changercolor" data-name="楕円形 14" transform="translate(-0.164 0.16)" fill="none" stroke="#454b50" stroke-width="1">
                                <circle cx="14" cy="14" r="14" stroke="none"/>
                                <circle cx="14" cy="14" r="13.5" fill="none"/>
                              </g>
                              <line class="changercolor" id="線_177" data-name="線 177" x2="11.219" transform="translate(8.226 14.766)" fill="none" stroke="#454b50" stroke-linecap="round" stroke-width="1"/>
                              <line class="changercolor" id="線_178" data-name="線 178" x2="11.219" transform="translate(13.836 9.157) rotate(90)" fill="none" stroke="#454b50" stroke-linecap="round" stroke-width="1"/>
                            </g>
                          </svg>
                        </a>
                      </div>

                    </div>
                <!-- /.detail --></div>
            </div>
          </div>

          <div class="news__dots">
          </div>
          
        </div>



        

    <div class="footer-close"><button class="modal-close-bottom opacity-link" @click="modalClose()"><img src="assets/images/close.svg"></button></div>
    <!-- /.modal-wrap --></div>

    


<!-- /.modal-block --></div>
</template>

<?php
/**
 * Footer
 */
?>


<?php include_once $_SERVER['DOCUMENT_ROOT'].'/page/assets/inc/footer.php'; ?>

</div>

<!-- Javascript -->
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/'.DIRNAME.'/assets/inc/js.php';?>
<script>
  const list = '/<?php echo DIRNAME; ?>/assets/data/shoplist.json';
  </script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
<script src="https://www.promisejs.org/polyfills/promise-7.0.4.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="/<?php echo DIRNAME; ?>/assets/js/lib/slick.min.js"></script>
<script src="/<?php echo DIRNAME; ?>/assets/js/item.js"></script>
<!-- /Javascript -->
</body>
</html>