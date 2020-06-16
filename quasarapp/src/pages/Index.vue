<template>
  <div class="q-pa-md">
    <div @click="showAdd" class="add_new">+</div>
    <div>
      <div>
        <q-input  ref="surname" :rules="[ val => val && val.length > 0 || 'Поле должно быть заполненно']" v-model="surname" label="Фамилия" />
        <q-input  ref="name"  :rules="[ val => val && val.length > 0 || 'Поле должно быть заполненно']"  v-model="name" label="Имя" />
      </div>
      <div v-if="show">
        <q-input
                 :rules="[ val => val && val.length > 0 || 'Please type something']" v-model="series" label="Серия" />
        <q-input v-model="number" label="Номер" />
        <q-input v-model="organization" label="Орган" />
      </div>
      <div class="btn-search">
        <q-btn @click="showFields" class="q-ma-sm reset"  :label="showBtn" />
        <q-btn @click="search" class="q-ma-sm reset"  label="Поиск" />
        <q-btn @click="reset" class="q-ma-sm reset"  label="Сбросить" />
      </div>
    </div>
    <q-table
      :grid="$q.screen.xs"
      title="Пасспорты"
      :data="data"
      :columns="columns"
      :hide-pagination="false"
      :pagination="initialPagination"
      row-key="name">
    </q-table>
  </div>
</template>

<script>


  export default {
    name: 'PageIndex',
    data () {
      return {
        initialPagination: {
          sortBy: 'desc',
          descending: false,
          // page: 2,
          rowsPerPage: 10
          // rowsNumber: xx if getting data from a server
        },
        name: '',
        surname: '',
        number: '',
        series: '',
        organization: '',
        show: false,
        showBtn: 'Расширить',
        filter: '',
        columns: [
          {
            name: 'Name',
            required: true,
            label: 'Name',
            align: 'left',
            field: row => row.name,
            format: val => `${val}`,
            sortable: true
          },
          { name: 'Surname', align: 'center', label: 'Surname', field: 'surname', sortable: true },
          { name: 'Series', align: 'center', label: 'Series', field: 'series', sortable: true },
          { name: 'Number', align: 'center', label: 'Number', field: 'number' },
          { name: 'Organization', label: 'Organization', field: 'organ' }
        ],
        data: [],
        dataFromDB: []
      }
    },
    created() {
      this.$axios.get('http://quasaarlaravel.s-host.net/api/passports')
        .then(response => {
          this.dataFromDB = response.data;
          this.data = response.data
          console.log(this.dataFromDB)
        })
        .catch(function (error) {
          console.log(error)
        });
    },
    methods: {
      reset() {
        this.data = this.dataFromDB;
        this.name = '';
        this.surname = '';
        this.series = '';
        this.number = '';
        this.organization = '';
      },
      showFields() {
        this.show = !this.show;
        if (this.show == false) {
          this.showBtn = 'Расширить'
        } else {
          this.showBtn = 'Скрыть'
        }
      },
      search() {
        this.$refs.name.validate();
        this.$refs.surname.validate();
        if (!this.$refs.name.hasError&&!this.$refs.surname.hasError){
          let arrByID = this.data.filter(this.filterSearch);
          this.data = arrByID;
        }
        else {
        }

      },
      filterSearch(item) {
        let searchInFirstName = (item.name != null) && (this.name.length != 0) &&(item.name.toLowerCase().indexOf(this.name.toLowerCase()) > -1);
        let searchInMiddleName = (item.surname != null) && (this.surname.length != 0) && (item.surname.toLowerCase().indexOf(this.surname.toLowerCase()) > -1);
        let searchInLastName = (item.series != null) && (this.series.length != 0) && (item.series.toLowerCase().indexOf(this.series.toLowerCase()) > -1);
        let searchInNumber =  (item.number != null) && (this.number != null) && (item.number == this.number);
        let searchInEmail =  (item.organization != null) && (this.organization != null) && (item.organization == this.organization);

        if (searchInFirstName || searchInMiddleName || searchInLastName || searchInNumber || searchInEmail) {
          return true;
        }
        return false;
      },
      showAdd () {
        this.$router.push({ name: 'addform' })
      }
    }
  }
</script>

<style>
.add_new {
  position: fixed;
  transform: translate(-50%);
  left: 86%;
  top: 79%;
  background: brown;
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  width: 75px;
  height: 75px;
  font-size: 50px;
  z-index: 100;
}
.btn-search
{
  display: flex;
  margin:0 auto;
}
  .reset
  {background: brown;
    font-size: 12px;color: white;
  }
</style>
