<template lang="pug">
.flex-wrap
  .col-lg-6(v-for="(cat,index) in categories" :key="cat.id")
    div
      a.mb-4.d-block(:href="cat.link")
        img.img-fluid.rounded(:src="cat.acf.thumb" alt="Image" v-lazy="cat.acf.thumb")
      h2
        a(:href="cat.link") {{cat.name}}
      p {{cat.description}}

      //-子カテゴリーリスト
      ul.c-category__child-list(:id="`child-cats-id${index+1}`" :data-childcats="cat.acf.childcat_id")
        //-オラクルカード (local: 28, production: 5)
        li.c-category__child-list__item(v-for="childCat_2 in childCats_2" v-if="cat.id == '5'")
          a(:href="childCat_2.link") {{childCat_2.category_name.join()}}
        //-スピリチュアル (local: 35, production: 3)
        li.c-category__child-list__item(v-for="childCat_3 in childCats_3" v-if="cat.id == '3'")
          a(:href="childCat_3.link") {{childCat_3.category_name.join()}}
        //-タロット (local: 133, production: 4)
        li.c-category__child-list__item(v-for="childCat_4 in childCats_4" v-if="cat.id == '4'")
          a(:href="childCat_4.link") {{childCat_4.category_name.join()}}
        //-易 (local: 139, production: 7)
        li.c-category__child-list__item(v-for="childCat_5 in childCats_5" v-if="cat.id == '7'")
          a(:href="childCat_5.link") {{childCat_5.category_name.join()}}
        //-東洋占星術 (local: 144, production: 8)
        li.c-category__child-list__item(v-for="childCat_6 in childCats_6" v-if="cat.id == '8'")
          a(:href="childCat_6.link") {{childCat_6.category_name.join()}}
        //-西洋占星術 (local: 47, production: 9)
        li.c-category__child-list__item(v-for="childCat_7 in childCats_7" v-if="cat.id == '9'")
          a(:href="childCat_7.link") {{childCat_7.category_name.join()}}
        //-霊術占い (local: 64, production: 2)
        li.c-category__child-list__item(v-for="childCat_8 in childCats_8" v-if="cat.id == '2'")
          a(:href="childCat_8.link") {{childCat_8.category_name.join()}}
        //-風水 (local: 69, production: 11)
        li.c-category__child-list__item(v-for="childCat_9 in childCats_9" v-if="cat.id == '11'")
          a(:href="childCat_9.link") {{childCat_9.category_name.join()}}
        //-その他のカード (local: 83, production: 6)
        li.c-category__child-list__item(v-for="childCat_10 in childCats_10" v-if="cat.id == '6'")
          a(:href="childCat_10.link") {{childCat_10.category_name.join()}}
        //-その他占星術 (local: 89, production: 10)
        li.c-category__child-list__item(v-for="childCat_11 in childCats_11" v-if="cat.id == '10'")
          a(:href="childCat_11.link") {{childCat_11.category_name.join()}}
        //-その他占術 (local: 128, production: 12)
        li.c-category__child-list__item(v-for="childCat_12 in childCats_12" v-if="cat.id == '12'")
          a(:href="childCat_12.link") {{childCat_12.category_name.join()}}
          
      .c-button__wrap
        a.c-button--fill-purple(:href="cat.link") もっと見る
</template>

<style lang="scss" scoped>
</style>

<script>
const Prefs = require('../prefs');
const baseURL = Prefs.baseURL;
const catAPI = '/wp-json/wp/v2/categories';
const postAPI = Prefs.postAPI;
const catID = document.getElementById('categories');
const axios = Prefs.axios;

module.exports = {
  data(){
    return {
      categories: [],
      childCats_2: [],
      childCats_3: [],
      childCats_4: [],
      childCats_5: [],
      childCats_6: [],
      childCats_7: [],
      childCats_8: [],
      childCats_9: [],
      childCats_10: [],
      childCats_11: [],
      childCats_12: []
    }
  },
  created() {
    const parentID = catID.dataset.parentcats;
    axios.get(baseURL + catAPI + '?include=' + parentID + '&per_page=11&_embed').then(response => {
      this.categories = response.data;
    })
    .catch(error => {
      console.log('記事が取得できていません。');
    })
  },
  updated() {
    let childcatsID1 = document.getElementById('child-cats-id1'),
    childcatsID2 = document.getElementById('child-cats-id2'),
    childcatsID3 = document.getElementById('child-cats-id3'),
    childcatsID4 = document.getElementById('child-cats-id4'),
    childcatsID5 = document.getElementById('child-cats-id5'),
    childcatsID6 = document.getElementById('child-cats-id6'),
    childcatsID7 = document.getElementById('child-cats-id7'),
    childcatsID8 = document.getElementById('child-cats-id8'),
    childcatsID9 = document.getElementById('child-cats-id9'),
    childcatsID10 = document.getElementById('child-cats-id10'),
    childcatsID11 = document.getElementById('child-cats-id11'),

    childcatsDataID1 = childcatsID1.dataset.childcats,
    childcatsDataID2 = childcatsID2.dataset.childcats,
    childcatsDataID3 = childcatsID3.dataset.childcats,
    childcatsDataID4 = childcatsID4.dataset.childcats,
    childcatsDataID5 = childcatsID5.dataset.childcats,
    childcatsDataID6 = childcatsID6.dataset.childcats,
    childcatsDataID7 = childcatsID7.dataset.childcats,
    childcatsDataID8 = childcatsID8.dataset.childcats,
    childcatsDataID9 = childcatsID9.dataset.childcats,
    childcatsDataID10 = childcatsID10.dataset.childcats,
    childcatsDataID11 = childcatsID11.dataset.childcats;

    axios.all([
      axios.get(baseURL + postAPI + '?categories=' + childcatsDataID1 + '&_embed'),
      axios.get(baseURL + postAPI + '?categories=' + childcatsDataID2 + '&_embed'),
      axios.get(baseURL + postAPI + '?categories=' + childcatsDataID3 + '&_embed'),
      axios.get(baseURL + postAPI + '?categories=' + childcatsDataID4 + '&_embed'),
      axios.get(baseURL + postAPI + '?categories=' + childcatsDataID5 + '&_embed'),
      axios.get(baseURL + postAPI + '?categories=' + childcatsDataID6 + '&_embed'),
      axios.get(baseURL + postAPI + '?categories=' + childcatsDataID7 + '&_embed'),
      axios.get(baseURL + postAPI + '?categories=' + childcatsDataID8 + '&_embed'),
      axios.get(baseURL + postAPI + '?categories=' + childcatsDataID9 + '&_embed'),
      axios.get(baseURL + postAPI + '?categories=' + childcatsDataID10 + '&_embed'),
      axios.get(baseURL + postAPI + '?categories=' + childcatsDataID11 + '&_embed'),
    ])
    .then(axios.spread((
      childCats_2,
      childCats_3,
      childCats_4,
      childCats_5,
      childCats_6,
      childCats_7,
      childCats_8,
      childCats_9,
      childCats_10,
      childCats_11,
      childCats_12
    ) => {
      this.childCats_2 = childCats_2.data;
      this.childCats_3 = childCats_3.data;
      this.childCats_4 = childCats_4.data;
      this.childCats_5 = childCats_5.data;
      this.childCats_6 = childCats_6.data;
      this.childCats_7 = childCats_7.data;
      this.childCats_8 = childCats_8.data;
      this.childCats_9 = childCats_9.data;
      this.childCats_10 = childCats_10.data;
      this.childCats_11 = childCats_11.data;
      this.childCats_12 = childCats_12.data;
    }))
    .catch(error => {
      console.log('記事が取得できていません。');
    })
  }
};
</script>