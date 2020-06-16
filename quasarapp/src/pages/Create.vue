<template>
    <div>
      <div class="container">
        <h1 class="text-center">Добавление пасспорта</h1>
        <div class="form">
          <form action="" method="get">
            <div class="d-flex flex-column">
              <div>
              <label for="lastname">Фамилия</label>
              <input type="text" name="lastname" id="lastname">
              </div>
              <div>
              <label for="name">Имя</label>
              <input type="text" name="name" id="name">
              </div>
              <div>
              <label for="serial">Серия</label>
              <input type="text" name="serial" id="serial">
              </div>
              <div>
              <label for="number">Номер</label>
              <input type="text" name="number" id="number">
              </div>
              <label for="organization">Организация</label>
              <input type="text" name="organization" id="organization">
              <div class="d-flex flex-row mt-2">
                <button class="btn btn-primary mr-2">Сохранить</button>
                <button class="btn btn-secondary">Отмена</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  name: 'Create'
}
</script>

<style>
  form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
</style>
