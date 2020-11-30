import AllCustomer from '../components/AllCustomers.vue'
import AddCustomer from '../components/AddCustomer.vue'
import CustomerChannels from '../components/CustomerChannels.vue'

export const routes = [
  {
    name: 'home',
    path: '/',
    component: AllCustomer
  },
  {
    name: 'add',
    path: '/add',
    component: AddCustomer
  },
  {
    name: 'channels',
    path: '/channels/:id',
    component: CustomerChannels,
    props: {
      default: true
    }
  }
]