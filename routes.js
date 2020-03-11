import selectPlan from './components/selectPlan.component.js'
import selectTarif from './components/selectTarif.component.js'
import tarifInfo from './components/tarifInfo.component.js'
import state from './appState.js'

const routes = [{
    name: 'selectPlan',
    path: state.pathname,
    component: selectPlan,
    meta: {
      title: 'Выберите тарифный план'
    }
  },
  {
    name: 'selectTarif',
    path: state.pathname + 'plan/:planID',
    component: selectTarif,
    props: true
  },
  {
    name: 'tarifInfo',
    path: state.pathname + 'plan/:planID/tarif/:tarifID',
    component: tarifInfo,
    props: true,
    meta: {
      title: 'Выбор тарифа'
    }
  }
]

export default new VueRouter({
  routes,
  mode: 'history'
})

