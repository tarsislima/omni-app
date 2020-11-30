<template>
  <div>
    <div class="row ">
      <div class="col-9">
        <h3 class="text-left">Clientes</h3>
      </div>
      <div class="col text-right">
        <router-link :to="{name: 'add'}" class="btn btn-primary">Novo usuário</router-link>
      </div>
    </div>
    <div class="progress" v-if="loading">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
           aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
    </div>
    <table class="table table-bordered">
      <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="customer in customers" :key="customer.id">
        <td>{{ customer.id }}</td>
        <td>{{ customer.name }}</td>

        <td>{{ customer.email }}</td>
        <td>
          <div class="btn-group" role="group">
            <router-link :to="{name: 'channels', params: { id: customer.id }}" class="btn btn-primary">Canais abertos
            </router-link>
          </div>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>

import users from '../services/users'

export default {
  data () {
    return {
      loading: false,
      customers: []
    }
  },
  created () {
    this.loading = true
    users.getCustomers()
        .then(response => {
          this.customers = response.data
        }).finally(() => this.loading = false)
  },
  methods: {}
}
</script>