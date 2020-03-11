import state from '../appState.js'

export default Vue.component('tarifInfo', {
  props: ['planID', 'tarifID'],

  template: '#tarifInfo',
  data() {
    return {
      tarifs: window.mainData,
      showBlock: false,
      state
    }
  },

  computed: {
    currTarif() {
      return this.tarifs[this.planID].tarifs.find((el) => el.ID === this.tarifID)
    },

    perMonth() {
      return Math.floor(this.currTarif.price / this.currTarif.pay_period)
    },

    activeDateTo() {
      const timestamp = this.currTarif.new_payday.replace(/\+[0-9]*/, '')
      const date = new Date(timestamp * 1000)
      let d = date.getDate()
      let m = date.getMonth() + 1
      let y = date.getFullYear()

      d = d < 10 ? '0' + d : d
      m = m < 10 ? '0' + m : m

      return `${d}.${m}.${y}`
    },

    monthNum() {
      let num = this.currTarif.pay_period
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
  },

  mounted() {
    setTimeout(() => {
      this.showBlock = true
    }, this.state.showDelay);
  },

  methods: {
    selectTarif() {
      console.log(this.currTarif)
    }
  }

})