<? require_once 'main.data.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SkyNet</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="app">
    <header v-if="showHeader" :class="{ 'show': titleShow }">
      <button v-if="!firstPage" @click="goBack" class="goBack">
        <i class="arrow"></i>
      </button>
      <h1>{{ pageTitle }}</h1>
    </header>
    <main>
      <router-view />
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>

  <? include_once 'components.php'; ?>

  <script type="module">
    function monthNum(num) {
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
    }

    window.mainData = <?=json_encode($data['tarifs']);?>;

    import state from './appState.js'
    import router from './routes.js'

    Vue.use(VueRouter)

    router.beforeEach((to, from, next) => {
      window.scrollTo(0, 0)
      next()
    })

    const app = new Vue({
      el: '#app',
      data: {
        tarifs: mainData,
        titleShow: false,
        state
      },
      router,

      computed: {
        firstPage() {
          return this.$route.name === 'selectPlan'
        },

        pageTitle() {
          return this.$route.meta.title ? this.$route.meta.title : 
          this.state.headerText ? `Тариф "${this.state.headerText}"` : ''
        },

        showHeader() {
          return this.pageTitle !== ''
        }
      },

      mounted() {
        setTimeout(() => {
          this.titleShow = true
        }, 0);

        window.addEventListener('scroll', this.freezeScroll)

        setTimeout(() => {
          window.removeEventListener('scroll', this.freezeScroll)
        }, 800);
      },

      methods: {
        freezeScroll() {
          window.scrollTo(0, 0)
        },

        goBack() {
          this.$router.go(-1);
        }
      }
    })
  </script>
</body>
</html>