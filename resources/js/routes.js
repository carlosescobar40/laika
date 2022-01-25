const Home = () => import('./components/Home.vue')
const Dashboard = () => import('./components/Dashboard.vue')
const Login = () => import('./components/Login.vue')
const Logout = () => import('./components/Logout.vue')
const Register = () => import('./components/Register.vue')
const Mostrar_inf = () => import('./components/mostrarinf.vue')


//importamos los componentes para el product
const Mostrar = () => import('./components/product/Mostrar.vue')
const Crear = () => import('./components/product/Crear.vue')
const Editar = () => import('./components/product/Editar.vue')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'mostrarProducts',
        path: '/products',
        component: Mostrar
    },
    {
        name: 'crearProduct',
        path: '/crear',
        component: Crear
    },
    {
        name: 'editarProduct',
        path: '/editar/:id',
        component: Editar
    },

    {
        path: '/register',
        component: Register
    },
    {
        path: '/inf_movimiento',
        component: Mostrar_inf,
        name: 'Mostrar_infor'
    },
    {


        path: '/login',
        component: Login,
        name: 'Login'
    },

    {


        path: '/logout',
        component: Logout,
        name: 'Logout'
    },
   

    {
        path: "/dashboard",
        name: "Dashboard",
        component: Dashboard,
       beforeEnter: (to, form, next) =>{
           axios.get('/api/athenticated').then(()=>{
               next()
           }).catch(()=>{
               return next({ name: 'Login'})
           })
       }
   
      }
    
]