import Vue from './lib/vue.min' // Vue.js
import VueLazyload from 'vue-lazyload' // Vue-Lazyload

// コンポーネント
import CategoryList from './components/category-list.vue' // 親カテゴリーリスト
import CategoryArchive from './components/category-archive.vue' // 子カテゴリーリスト
import FortuneJourneyArchive from './components/the-fortune-journey-list.vue' // 占術ジャーニーリスト
import Single from './components/single.vue' // 記事詳細
import SingleFortuneJourney from './components/single-the-fortune-journey.vue' // 占術ジャーニー記事詳細

// VueLazyLoadのインスタンス
Vue.use(VueLazyload,{
  preLoad: 1.3,
  attempt: 1
})
// 親カテゴリーリストのインスタンス
const CategoryListCom = new Vue({
  el: '#categories',
  components: {
    'category-list': CategoryList
  }
})
// 子カテゴリーリストのインスタンス
const CategoryArchiveCom = new Vue({
  el: '#category',
  components: {
    'category-archive': CategoryArchive
  }
})
// 記事詳細のインスタンス
const SingleCom = new Vue({
  el: '#post',
  components: {
    'single': Single
  }
})