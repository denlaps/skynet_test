import state from '../appState.js'

export default Vue.component('selectPlan', {
  template: '#selectPlan',
  data() {
    return {
      tarifs: window.mainData,
      showBlock: false,
      state
    }
  },

  mounted() {
    setTimeout(() => {
      this.showBlock = true
    }, this.state.showDelay);
  },

  methods: {
    lineColor(speed) {
      const currColor = speed <= 50 ? '#70603e' :
        speed <= 100 ? '#0075d9' :
        speed <= 200 ? '#e74807' : ''

      return {
        'background-color': currColor
      }
    },

    perMonth(el) {
      return Math.floor(el.price / el.pay_period)
    },

    minMaxPrice(tarifs) {
      if(tarifs.length === 0) {
        return false;
      }

      const startVal = this.perMonth(tarifs[0])

      let price = {
        min: startVal,
        max: startVal
      }

      tarifs.forEach(el => {
        // Finding min and max value
        const currVal = this.perMonth(el)

        price.min = Math.min(currVal, price.min)
        price.max = Math.max(currVal, price.max)
      })

      return price.min + ' - ' + price.max
    }
  }

})