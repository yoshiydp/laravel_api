<template lang="pug">
div
  //-ページタイトル
  .site-section-cover.overlay.inner-page.bg-light(:style="'backgroundImage: url(' + categories.acf.thumb + ')'")
    .container
      .row.align-items-center.justify-content-center.text-center
        .col-lg-10
          .box-shadow-content
            .block-heading-1
              h1.mb-4 {{categories.name}}
              p {{categories.description}}
  
  //-パンくずリスト
  .c-breadcrumb
    ul.c-breadcrumb__list
      li.c-breadcrumb__list__item
        a(href="/") トップ
      li.c-breadcrumb__list__item {{categories.name}}
  
  //-メインコンテンツ
  .site-section
    .container
      .row

        //-カテゴリーリスト
        .col-lg-4(v-for="archive in archives" :key="archive.id")
          div
            a.mb-4.d-block(:href="archive.link")
              img.img-fluid.rounded(:src="archive._embedded['wp:featuredmedia'][0]['media_details']['sizes']['large'].source_url" alt="Image" v-lazy="archive._embedded['wp:featuredmedia'][0]['media_details']['sizes']['large'].source_url")
            h2
              a(:href="archive.link") {{archive.category_name.join()}}
            div(v-html="archive.excerpt.rendered")
            //-ボタンコンポーネント
            .c-button__wrap
              a.c-button--fill-purple(:href="archive.link") もっと見る
</template>

<script>
const Prefs = require('../prefs');
const baseURL = Prefs.baseURL;
const catAPI = '/wp-json/wp/v2/categories/';
const postAPI = Prefs.postAPI;
const catID = document.getElementById('category');
const axios = Prefs.axios;

module.exports = {
  data(){
    return {
      categories: [],
      archives: []
    }
  },
  created() {
    const currentID = catID.dataset.catid;
    const childID = catID.dataset.childcatid;
    axios.all([
      axios.get(baseURL + catAPI + currentID + '?_embed'),
      axios.get(baseURL + postAPI + '?categories=' + childID + '&per_page=100&_embed')
    ])
    .then(axios.spread((
      categories,
      archives
    ) => {
      this.categories = categories.data;
      this.archives = archives.data;
    }))
    .catch(error => {
      console.log('記事が取得できていません。');
    })
  }
};
</script>