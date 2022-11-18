import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
      marketpost: [],

      loadingTime: 2000,
      loadingType: 'circles',
      loadingText: 'Loading...',
      loadingColor: 'rgb(126, 211, 33)',
      // loadingBgcolor: '#7a76cb'

      quoteOrigin: 'placeholder',
      quotePosition: null,
      quoteColor: '#7d33ff',
      quoteProgress: 'auto',
      quoteDuration: '3000',
      quoteBorder: '#FFFFFF',
      quoteText: 'placeholder',

      formatLang: 'id-ID',
      formatStyle: 'decimal',
      formatCurrency: 'IDR',

      detailCountResult: '0'
    },
    getters: {
      // Property-Style Access
      formattedCost: state => {
        return new Intl.NumberFormat(state.formatLang, {
          style: state.formatStyle, 
          currency: state.formatCurrency
        }).format(state.detailCountResult)
      },
      // Method-Style Access
      formattedCostByMethod: (state) => (rupiah) => {
        return new Intl.NumberFormat(state.formatLang, {
          style: state.formatStyle, 
          currency: state.formatCurrency
        }).format(rupiah)
      }
    },
    mutations: {
      addQuoteText(state, newQuote) {
        state.quoteText = newQuote
      },
      addQuoteOrigin(state, newOrigin) {
        state.quoteOrigin = newOrigin
      },
      addCountedNumber(state, newNumber) {
        state.detailCountResult = newNumber
      },
      addMarketPost(state, newPost) {
        state.marketpost = newPost
      },

      deleteMarketPost(state, newID) {
        let i = state.marketpost.map(item => item.id).indexOf(newID);
        state.marketpost.splice(i, 1)
      }
    }
})

export default store;