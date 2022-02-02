const home = () =>import ( '../components/App.vue')
const AllProducts = () =>import ( '../components/AllProduct.vue')
const CreateProduct = () =>import ( '../components/CreateProduct.vue')
const EditProduct = () =>import ( '../components/EditProduct.vue')
 

export default [
    {
        path: '/',
        component: AllProducts,
        name: 'home',
    },
    {
        path: '/create',
        component: CreateProduct,
        name: 'create',
    },
    {
        path: '/eidt/:id',
        component: EditProduct,
        name: 'edit',
    },
]
