import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
      articlePost: [],
      relatedArticle: [],
      comments: [],
    },
    getters: {
      //
    },
    mutations: {
      addArticlePost(state, newPost) {
        state.articlePost = newPost
      },

      addRelatedArticle(state, newPost) {
        state.relatedArticle = newPost
      },

      addArticleComment(state, newComment) {
        state.comments = newComment
      },

      deleteMarketPost(state, newID) {
        let i = state.marketpost.map(item => item.id).indexOf(newID);
        state.marketpost.splice(i, 1)
      }
    }
})

export default store;