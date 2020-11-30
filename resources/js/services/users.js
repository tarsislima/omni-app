import axios from 'axios'

const service = {
  getCustomers: function () {
    return axios.get('/api/users')
  },
  getCustomer: function (id) {
    return axios.get('/api/users/' + id)
  },
  createCustomer: function (data) {
    return axios.post('/api/users', data)
  }
}

export default service