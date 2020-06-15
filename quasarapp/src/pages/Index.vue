<template>
  <div class="q-pa-md">
    <button @click="addPassport">dfssfs</button>
    <q-table
      :grid="$q.screen.xs"
      title="Treats"
      :data="data"
      :columns="columns"
      row-key="name"
      :filter="filter"
    >
      <template v-slot:top-right>
        <q-input borderless dense debounce="300" v-model="filter" placeholder="Search">
          <template v-slot:append>
            <q-icon name="search" />
          </template>
        </q-input>
      </template>
    </q-table>

  </div>
</template>

<script>
export default {
  name: 'PageIndex',
  data () {
    return {
      data:[''],
      filter: '',
      columns: [
        // {
        //   name: 'desc',
        //
        //   required: true,
        //   label: 'name',
        //   align: 'left',
        //   field: row => row.name,
        //   format: val => `${val}`,
        //   sortable: true
        // },
        { name: 'name', label: 'name', field: 'name', sortable: true },
        { name: 'surname', label: 'surname', field: 'surname', sortable: true },
        { name: 'series', align: 'center', label: 'series', field: 'series', sortable: true },
        { name: 'number', align: 'center', label: 'number', field: 'number', sortable: true },
        { name: 'organ', align: 'center', label: 'organ', field: 'organ', sortable: true },
      ],
      // data: [
      //   {
      //     name: 'Frozen Yogurt',
      //     calories: 159,
      //     fat: 6.0,
      //     carbs: 24
      //   },
      //   {
      //     name: 'Ice cream sandwich',
      //     calories: 237,
      //     fat: 9.0,
      //     carbs: 37
      //   },
      //   {
      //     name: 'Eclair',
      //     calories: 262,
      //     fat: 16.0,
      //     carbs: 23
      //   },
      //   {
      //     name: 'Cupcake',
      //     calories: 305,
      //     fat: 3.7,
      //     carbs: 67
      //   },
      //   {
      //     name: 'Gingerbread',
      //     calories: 356,
      //     fat: 16.0,
      //     carbs: 49
      //   },
      //   {
      //     name: 'Jelly bean',
      //     calories: 375,
      //     fat: 0.0,
      //     carbs: 94
      //   },
      //   {
      //     name: 'Lollipop',
      //     calories: 392,
      //     fat: 0.2,
      //     carbs: 98
      //   },
      //   {
      //     name: 'Honeycomb',
      //     calories: 408,
      //     fat: 3.2,
      //     carbs: 87
      //   },
      //   {
      //     name: 'Donut',
      //     calories: 452,
      //     fat: 25.0,
      //     carbs: 51
      //   },
      //   {
      //     name: 'KitKat',
      //     calories: 518,
      //     fat: 26.0,
      //     carbs: 65
      //   }
      // ]
    }
  },
  methods:{
    addPassport()
    {
      this.$axios.post('http://quasaarlaravel.s-host.net/api/passports', {name:'123',surname:'asdfsdfs',number:'231312',series:'DF',organ:'sfsdfsdfsfsf'})
        .then(response => {
          this.data = response.data;
        })
        .catch(e => {
          alert('error');
        })
    },
    getPassports()
    {
      this.$axios.get('http://quasaarlaravel.s-host.net/api/passports')
      .then((response) => {
        this.data = response.data;
      })
      .catch(e => {
        alert('error');
      })
    }
  },
  created() {
    this.getPassports();
  }
}
</script>
