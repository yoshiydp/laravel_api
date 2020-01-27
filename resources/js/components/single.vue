<template lang="pug">
div
  //-ページタイトル
  .site-section-cover.overlay.inner-page.bg-light(:style="'backgroundImage: url(' + post_data._embedded['wp:featuredmedia'][0].source_url + ')'")
    .container
      .row.align-items-center.justify-content-center.text-center
        .col-lg-10
          .box-shadow-content
            .block-heading-1
              h1.mb-4 {{post_data.title.rendered}}
  
  //-パンくずリスト
  .c-breadcrumb
    ul.c-breadcrumb__list
      li.c-breadcrumb__list__item
        a(href="/") トップ
      li.c-breadcrumb__list__item
        a(:href="'/' + post_data.acf.parent_cat.slug") {{post_data.acf.parent_cat.name}}
      li.c-breadcrumb__list__item {{post_data.title.rendered}}
  
  //-メインコンテンツ
  section.site-section
    .container
      .row

        //-記事本文の出力要素
        section.entry.col-md-8.mx-auto.blog-content(v-html="post_data.content.rendered")

        //-この占術におすすめの先生
        .col-md-8.mx-auto
          section.s-feature--first
            h5.s-feature__title この占術、みん電占いで
              span.br-sp 占えます！
            //-みん電占いカード
            .c-recommend-card
              .c-recommend-card__wrap
                a(href!="https://sp.minden.jp/lp?utm_source=mindenzukan&utm_medium=referral" target="_blank")
                .c-recommend-card__thumb
                  img(src="https://uranaizukan.minden.jp/wp-content/themes/uranaizukan/assets/images/minden-logo.png")
                .c-recommend-card__text
                  p.c-recommend-card__text__title 【{{post_data.title.rendered}}】が得意な占い師に占ってもらいたい！
                  ol.c-recommend-card__text__list
                    li 占いのお店までいかなくてもOK
                    li 24時間、電話ですぐ占える
                    li 初回は最大50％割引
                    li 当たると評判の占い師が占ってくれる
                  .c-recommend-card__button-wrap
                    button.c-button--fill-pink みん電占いはこちら

        //-この占術におすすめの先生
        .col-md-8.mx-auto(v-if="post_data.acf.select_shaman")
          section.s-feature
            h5.s-feature__title この占術におすすめの
              span.br-sp 「みん電」の占い師
            //-占い師リストコンポーネント
            .c-recommend-card(v-for="shaman_data in shaman_datas")
              .c-recommend-card__wrap
                a(:href!="'https://sp.minden.jp/shaman/prof/' + shaman_data.acf.profile_link + '?utm_source=mindenzukan&utm_medium=referral'" target="_blank")
                .c-recommend-card__thumb--circle
                  img(:src="shaman_data._embedded['wp:featuredmedia'][0].source_url" v-lazy="shaman_data._embedded['wp:featuredmedia'][0].source_url")
                .c-recommend-card__text
                  p.c-recommend-card__text__name {{shaman_data.title.rendered}}
                    span 先生（{{shaman_data.acf.name_kana}}）
                  p.c-recommend-card__text__comment(v-html="shaman_data.excerpt.rendered")
                  .c-recommend-card__button-wrap
                    button.c-button--fill-yellow この占い師に占ってもらう

        //-〜の他の記事を見る
        .container.mx-auto.mt-6(v-if="post_data.acf.select_same_cat")
          section.s-feature
            h5.s-feature__title {{post_data.acf.parent_cat.name}}の他の記事を見る
            .row
              
              //-記事リスト
              .col-lg-3(v-for="parentCat in parentCats")
                div
                  a.mb-4.d-block(:href="parentCat.link")
                    img.img-fluid.rounded(:src="parentCat._embedded['wp:featuredmedia'][0]['media_details']['sizes']['large'].source_url" alt="Image" v-lazy="parentCat._embedded['wp:featuredmedia'][0]['media_details']['sizes']['large'].source_url")
                  h2
                    a(:href="parentCat.link") {{parentCat.title.rendered}}
            .s-feature__button-wrap
              a.c-button--fill-purple(:href="'/' + post_data.acf.parent_cat.slug") {{post_data.acf.parent_cat.name}}の記事一覧へ

        //-その他の占術の記事を見る
        .container.mx-auto.mt-6(v-if="post_data.acf.select_other_cat")
          section.s-feature
            h5.s-feature__title その他の占術の記事を見る

            .row
              //-記事リスト
              .col-lg-3(v-for="otherCat in otherCats")
                div
                  a.mb-4.d-block(:href="otherCat.link")
                    img.img-fluid.rounded(:src="otherCat.acf.thumb" alt="Image" v-lazy="otherCat.acf.thumb")
                  h2
                    a(:href="otherCat.link") {{otherCat.name}}
</template>

<style lang="scss" scoped>
</style>

<script>
const Prefs = require('../prefs');
const baseURL = Prefs.baseURL;
const postAPI = '/wp-json/wp/v2/posts/';
const shamanAPI = '/wp-json/wp/v2/shaman?include=';
const catAPI = '/wp-json/wp/v2/categories?include=';
const postID = document.getElementById('post');
const axios = Prefs.axios;

module.exports = {
  data(){
    return {
      post_data: [],
      shaman_datas: [],
      parentCats: [],
      otherCats: []
    }
  },
  created() {
    const postDataID = postID.dataset.postid;
    const shamanDataID = postID.dataset.selectShaman;
    const sameCatDataID = postID.dataset.selectSameCat;
    const otherCatDataID = postID.dataset.selectOtherCat;
    axios.all([
      axios.get(baseURL + postAPI + postDataID + '?_embed'),
      axios.get(baseURL + shamanAPI + shamanDataID + '&_embed'),
      axios.get(baseURL + '/wp-json/wp/v2/posts?include=' + sameCatDataID + '&per_page=4&_embed'),
      axios.get(baseURL + catAPI + otherCatDataID + '&per_page=4&_embed')
    ])
    .then(axios.spread((
      post_data,
      shaman_datas,
      parentCats,
      otherCats
    ) => {
      this.post_data = post_data.data;
      this.shaman_datas = shaman_datas.data;
      this.parentCats = parentCats.data;
      this.otherCats = otherCats.data;
    }))
    .catch(error => {
      console.log('記事が取得できていません。');
    })
  }
};
</script>