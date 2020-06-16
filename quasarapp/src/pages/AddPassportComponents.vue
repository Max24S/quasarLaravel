<template>
<div>
  <div class="form__search">
    <div class="form_group">
      <label for="name">Имя</label>
      <input type="text"  v-model="name" id="name">
    </div>
    <div class="form_group">
      <label for="surname">Фамилия</label>
      <input type="text"  v-model="surname" id="surname">
    </div>
    <div class="form_group">
      <label for="surname">Серия</label>
      <input type="text" v-model="series" id="seria">
    </div>
    <div class="form_group">
      <label for="surname">Номер</label>
      <input type="text" v-model="number"  id="num">
    </div>
    <div class="form_group">
      <label for="surname">Орган</label>
      <input type="text" v-model="organ"  id="organ">
    </div>
    <div class="label__open" >
      <span @click="addPass">Сохранить</span>
      <span @click="close">Отменить</span>
    </div>
  </div>
</div>
</template>

<script>
    export default {
        name: "AddPassportComponents",
      data(){
          return {
            name: "",
            organ: "",
            surname: "",
            number: "",
            series: "",
            all: [],
          }
      },
      methods: {
        addPass(){
          this.$axios.post('http://quasaarlaravel.s-host.net/api/passports', {
            name:  this.name,
            organ: this.organ,
            surname: this.surname,
            number: this.number,
            series: this.series,
          })
          .then( r => this.all = r.data)
          this.$emit('close')
        },
        close(){
          this.$emit('close')
        }
      }
    }
</script>

<style >
.label__open span {
  margin-right: 20px;
}
</style>
