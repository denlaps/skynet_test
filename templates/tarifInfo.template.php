<script type="text/x-template" id="tarifInfo">
  <div class="container">
    <figure class="whiteBlock tarifInfo" :class="{ 'show': showBlock }">
      <h2>Тариф "{{ currTarif.title }}"</h2>
      <hr>
      <figcaption>
        <p>
          <b>
            Период оплаты - {{ monthNum }}<br>
            {{ perMonth }} &#8381;/мес
          </b>
        </p>
        <p>
          <span>разовый платёж - {{ currTarif.price }} &#8381;</span>
          <span>со счёта спишется - {{ currTarif.price }} &#8381;</span>
        </p>
        <p style="color: #aaa;">
          <span>вступит в силу - сегодня</span>
          <span>активен до - {{ activeDateTo }}</span>
        </p>
      </figcaption>
      <hr>
      <button @click="selectTarif" class="greenBtn">Выбрать</button>
    </figure>
  </div>
</script>