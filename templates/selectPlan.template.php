<script type="text/x-template" id="selectPlan">
  <div class="container">
    <figure
      v-for="(tarif, key) in tarifs" 
      :key="key"
      class="whiteBlock"
      :class="{ 'show': showBlock }"
    >
      <h2>Тариф "{{ tarif.title }}"</h2>
      <hr>
      <router-link tag="figcaption" :to="{ name: 'selectTarif', params: {planID: key} }" style="cursor: pointer;">
        <u v-if="tarif.speed" :style="lineColor(tarif.speed)">{{ tarif.speed }} Мбит/с</u>
        <i class="arrow"></i>
        <p><b>{{ minMaxPrice(tarif.tarifs) }} &#8381;/мес</b></p>
      </router-link>
      <hr>
      <div class="whiteBlock__under">
        <a :href="tarif.link" target="_blank">узнать подробнее на сайте www.sknt.ru</a>
      </div>
    </figure>
  </div>
</script>