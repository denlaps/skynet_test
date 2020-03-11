<script type="text/x-template" id="selectTarif">
  <div class="container">
    <router-link 
      tag="figure" 
      :to="{ name: 'tarifInfo', params: { planID: planID_num, tarifID: tarif.ID } }"
      v-for="(tarif, key) in showTarifs" 
      :key="key"
      class="whiteBlock"
      :class="{ 'show': showBlock }"
      style="cursor: pointer;"
    >
      <h2>{{ monthNum(tarif.pay_period) }}</h2>
      <hr>
      <figcaption>
        <i class="arrow"></i>
        <p>
          <b>{{ perMonth(tarif.price, tarif.pay_period) }} &#8381;/мес</b>
        </p>
        <p>
          <span>разовый платеж - {{ tarif.price }} &#8381;</span>
          <span v-if="!oneMonth(tarif.pay_period)">скидка - {{ promoCount(tarif.price, tarif.pay_period) }} &#8381;</span>
        </p>
      </figcaption>
    </router-link>
  </div>
</script>