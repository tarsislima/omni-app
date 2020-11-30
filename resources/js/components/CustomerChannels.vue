<template>
  <div>
    <div class="row ">
      <div class="col-10">
        <h3>Cliente: {{ customer.name }}</h3>
      </div>
      <div class="col text-right">
        <router-link :to="{name: 'home'}" class="btn btn-primary">Voltar</router-link>
      </div>
    </div>

    <div class="progress" v-if="loading">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
           aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
    </div>

    <div class="row ">
      <div class="col-10">
        <h4 class="text-left"><b>Canais</b></h4>
      </div>

    </div>
    <hr>
    <div class="" v-if="customer.channels.length == 0">
      <h2>Nenhum canal informado!</h2>
    </div>
    <div v-for="channel in customer.channels">
      <h3>{{ channel.channel.name }} <i>{{ channel.identifier }}</i></h3><br>

      <h4>Mensagens</h4>
      <table class="table table-bordered">
        <thead>
        <tr>
          <th>Titulo</th>
          <th>Mensagem</th>
          <th>Data hora</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="message in channel.messages" :key="message.id">
          <td>{{ message.title }}</td>
          <td>{{ message.message }}</td>
          <td>{{ message.created_at }}</td>

        </tr>
        </tbody>
      </table>

    </div>

  </div>
</template>

<script>

import users from '../services/users'

export default {
  props: ['id'],
  data () {
    return {
      loading: false,
      customer: {
        name: '',
        channels: []
      },
    }
  },
  mounted () {
    this.loading = true
    users.getCustomer(this.$route.params.id)
        .then(response => {
          this.customer = response.data
        }).finally(() => this.loading = false)
  },
  methods: {}
}
</script>