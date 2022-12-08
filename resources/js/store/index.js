import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
      articlePost: [],
      relatedArticle: [],
      comments: [],
      user: [],
      isLoggedIn: false,

      quoteOrigin: 'placeholder',
      quotePosition: 'bottom-center',
      quoteColor: '#00cc00',
      quoteProgress: 'auto',
      quoteDuration: '2500',
      quoteBorder: '#FFFFFF',
      quoteText: 'placeholder',
    },
    getters: {
      //
    },
    mutations: {
      addQuoteText(state, newQuote) {
        state.quoteText = newQuote
      },
      
      addQuoteOrigin(state, newOrigin) {
        state.quoteOrigin = newOrigin
      },

      addArticlePost(state, newPost) {
        state.articlePost = newPost
      },

      addRelatedArticle(state, newPost) {
        state.relatedArticle = newPost
      },

      addUser(state, newUser) {
        state.user = newUser
      },

      addIsLoggedIn(state, newPost) {
        state.isLoggedIn = newPost
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