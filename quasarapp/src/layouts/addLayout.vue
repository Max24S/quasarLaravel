<template>
  <div>
   <header-b></header-b>
    <div class="container">
      <h4 class="text-center">Добавление пасспорта</h4>
      <div class="form">
        <form action="" method="get">
          <div class="container-form">
            <div class="d-flex flex-column">
              <div class="item-form">
                <q-input  ref="surname" :rules="[ val => val && val.length > 0 || 'Поле должно быть заполненно']" v-model="lastname" label="Фамилия" />
              </div>
              <div class="item-form">
<!--                <label for="name">Имя</label>-->
<!--                <input v-model="name" type="text" name="name" id="name">-->
                <q-input  ref="name"  :rules="[ val => val && val.length > 0 || 'Поле должно быть заполненно']" v-model="name" label="Имя" />
              </div>
              <div class="item-form">
<!--                <label for="serial">Серия</label>-->
<!--                <input v-model="serial" type="text" name="serial" id="serial">-->
                <q-input  ref="serial"  :rules="[ val => val && val.length > 0 || 'Поле должно быть заполненно',val => val && val.length < 3|| 'Не больше 2 символов']" v-model="serial" label="Cерия" />
              </div>
              <div class="item-form">
<!--                <label for="number">Номер</label>-->
<!--                <input v-model="number" type="text" name="number" id="number">-->
                <q-input type="number"  ref="number"  :rules="[ val => val > 0 && val < 9999999 || 'Введите числа',val => val && val.length > 0 || 'Поле должно быть заполненно',val => val && val.length < 7|| 'Не больше 7 символов']" v-model="number" label="Номер" />
              </div>
              <div class="item-form">
<!--                <label for="organization">Организация</label>-->
<!--                <input v-model="organization" type="text" name="organization" id="organization">-->
                <q-input  ref="organization"  :rules="[ val => val && val.length > 0 || 'Поле должно быть заполненно']" v-model="organization" label="Организация" />
              </div>
              <div class="btn-forf">
                <button type="button" @click="addPassport" class="ok">Сохранить</button>
                <button type="button" @click="cancel" class="cancel">Отмена</button>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</template>
<script>
  import HeaderB from "../pages/Header";
export default {
  components: {
    HeaderB,
  },
  data: function () {
    return {
      lastname: '',
      name: '',
      serial: '',
      number: '',
      organization: ''
    }
  },

  methods: {
    // addNew () {
    //   this.$axios.post('http://quasaarlaravel.s-host.net/api/passports',
    //     {
    //       name: this.name,
    //       surname: this.lastname,
    //       number: this.number,
    //       series: this.serial,
    //       organ: this.organization
    //     }
    //   )
    //     .then(response => {
    //       this.data = response.data
    //       console.log(this.data)
    //       this.cancel()
    //     })
    //     .catch(function (error) {
    //       console.log(error)
    //     })
    // },
    addPassport()
    {
      this.$refs.name.validate();
      this.$refs.surname.validate();
      this.$refs.serial.validate();
      this.$refs.number.validate();
      this.$refs.organization.validate();
      if (!this.$refs.name.hasError&&!this.$refs.surname.hasError&&!this.$refs.serial.hasError&&!this.$refs.number.hasError&&!this.$refs.organization.hasError){
        let self = this;
        this.$axios.post('http://quasaarlaravel.s-host.net/api/passports',
          {
            name: self.name,
            surname:self.lastname,
            number: self.number,series: self.serial,organ: self.organization})
          .then(response => {
            this.data = response.data;
            this.cancel();
          })
          .catch(e => {
            alert('error')
          })
      }
      else {
      }

    },
    cancel () {
      this.$router.push({name: 'main'})
    }
  }
}

</script>

<style>
  form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  form input {
    margin-left: 50px;
  }
  .cancel,.ok{
    padding: 10px 10px;
    color: white;

  }
  .container-form{
    width: 85%;

  }
  .cancel{
    background: brown;
  }
  .ok{
    background: #696928;
  }
  .item-form{

  }
  .btn-forf{
    display: flex;
    justify-content: space-between;
    margin-top: 14px;
  }
</style>
