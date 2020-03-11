import state from '../appState.js'

export default Vue.component('selectTarif', {
  props: ['planID'],
  
  template: '#selectTarif',
  data() {
    return {
      tarifs: window.mainData,
      showBlock: false,
      state
    }
  },

  computed: {
    planID_num() {
      return Number.parseInt(this.planID)
    },

    showTarifs() {
      // Sort tarifs by pay period ascending
      return this.tarifs[this.planID_num].tarifs.sort((a, b) => a.pay_period - b.pay_period)
    },
  },

  mounted() {
    this.state.headerText = this.tarifs[this.planID_num].title
    setTimeout(() => {
      this.showBlock = true
    }, this.state.showDelay);
  },

  methods: {
    monthNum(num) {
      let endWord = ''

      if (num >= 5 && num <= 19 || num === 0) {
        endWord = 'ев'
      } else {
        num = num % 10

        if (num >= 2 && num <= 4) {
          endWord = 'а'
        }
      }

      return num + ' месяц' + endWord
    },

    oneMonth(num) {
      return Number.parseInt(num) === 1
    },

    perMonth(price, num) {
      return Math.floor(price / num)
    },

    promoCount(price, numMonth) {
      return (this.showTarifs[0].price * numMonth) - price
    },
  }

})