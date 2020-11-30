<template>
  <div>
    <h3 class="text-left">Novo usuário</h3>
    <form @submit.prevent="addCustomer">

      <div class="row">
        <div class="col-md-6">

          <div class="form-group">
            <label>Nome *</label>
            <input type="text" class="form-control" v-model="customer.name">
          </div>
          <div class="form-group">
            <label>Email *</label>
            <input type="text" class="form-control" v-model="customer.email">
          </div>
          <div class="form-group row">
            <div class="col-10">
              <label>Cep * </label>
              <input type="text" class="form-control col-4" v-model="customer.cep"
                     v-mask="'#####-###'" maxlength="9">
            </div>
            <div class="col">
              <button class="btn btn-primary" :disabled="loading" @click.prevent="findAddress">Buscar</button>
            </div>
          </div>

          <div v-if="loadingCep">
            <p>Procurando endereço </p>
            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
                   aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
            </div>
          </div>

          <div class="form-group">
            <label>Endereço</label>
            <input type="text" class="form-control" v-model="customer.address">
          </div>
          <h3>Canais de contato</h3>
          <div class="form-group">
            <label>Whatsapp/Telefone</label>
            <input type="text" class="form-control" v-model="customer.channels.whatsapp"
                   v-mask="'(##) #####-####'" maxlength="15">
          </div>
          <div class="form-group">
            <label>Instagram</label>
            <input type="text" class="form-control" v-model="customer.channels.instagram">
          </div>
          <div class="form-group">
            <label>Facebook</label>
            <input type="text" class="form-control" v-model="customer.channels.facebook">
          </div>
          <div class="form-group">
            <label>Twitter</label>
            <input type="text" class="form-control" v-model="customer.channels.twitter"
                   placeholder="">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" :disabled="loading">Salvar</button>
            <div class="spinner-border text-primary" role="status" v-if="loading">
              <!--              <span class="sr-only">Loading...</span>-->
            </div>
          </div>

        </div>

        <div class="col-md-6">
          <div class="alert alert-danger" role="alert" v-if="errors.length > 0">
            <h4>Por favor corrija o seguinte:</h4>
            <p v-for="error in errors">{{ error }}</p>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import Users from '../services/users'
import Cep from '../services/cep'

export default {
  data () {
    return {
      loadingCep: false,
      loading: false,
      errors: [],
      customer: {
        name: '',
        email: '',
        cep: '',
        address: '',
        channels: {
          whatsapp: '',
          instagram: '',
          facebook: '',
        }
      }
    }
  },
  methods: {
    addCustomer () {
      this.loading = true
      this.errors = []

      Users.createCustomer(this.customer)
          .then(response => {
            this.loading = false
            this.$router.push({ name: 'home' })
          })
          .catch(error => {
            if (error.response.status === 400) {
              return this.errors.push(error.response.data.message)
            }

            if (error.response.status === 422) {
              let errorsData = error.response.data.errors
              Object.keys(errorsData).forEach(key => {
                errorsData[key].forEach((r) => {
                  this.errors.push(r)
                })
              })
            }
          })
          .finally(() => this.loading = false)
    },
    findAddress () {
      if (!this.customer.cep) {
        return alert('informe o CEP')
      }

      this.loadingCep = true
      this.errors = []
      this.customer.address = ''

      Cep.getAddressByCep(this.customer.cep).then(r => {
        this.customer.address = r.data
      }).catch((error) => {
        this.errors.push(error.response.data.message)
      }).finally(() => this.loadingCep = false)
    }
  }
}
</script>