const service = {
  getAddressByCep: function (cep) {
    return axios.get('/api/cep/' + cep)
  },
}

export default service