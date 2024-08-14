<script>
import { defineComponent, ref, reactive, toRefs } from "vue";


export default {
    // setup() {
    //     const data = reactive({
    //         email: '',
    //         password: '',
    //     })

    //     const errors = ref([])


    //     const login = () => {
    //         var app = this
    //         axios.post(`http://localhost:8000/api/auth/login`, data)
    //         .then(response => { 
    //             // if(response.status === 200) {
    //             //     alert('login success')
    //             // }
    //             console.log(this.$auth)
    //             console.log(response)
    //             localStorage.setItem('token', response.data.access_token)
    //         })
    //         .catch(e => {
    //             errors.value = e.response.errors
    //         })
    //         console.log(this.$auth.login())
            
    //     }
    //     return { data, login }
    // }

    data(){
      return {
        email: null,
        password: null,
        error: false
      }
    },
    methods: {
      login(){
        var app = this
        this.$auth.login({
            params: {
              email: app.email,
              password: app.password
            }, 
            rememberMe: true,
            redirect: {name: 'home'},
            fetchUser: true,
            staySignedIn: true,
            success: function () {},
            error: function () {},
        })    
        .then(response => { 
            // if(response.status === 200) {
            //     alert('login success')
            // }
            localStorage.setItem('token', response.data.access_token)
            this.update(response.data)

        })
        .catch(e => {
            errors.value = e.response.errors
        })   
      },
      update(data){
            this.$auth.user({
                email : data.email,
                name : data.name,
                role : data.role
            });
        }
    }
}





</script>




<template>
    <div class="container col-sm-4 mb-5">
        <form @submit.prevent="login()" method="post">
            <h1>Login</h1>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId"
                    placeholder="abc@mail.com" v-model="email" />
                <small id="emailHelpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="*********"
                    v-model="password" />
            </div>
            <button type="submit" class="btn btn-primary me-2">
                Submit
            </button>
            <a href="/register" class="btn btn-primary">Register</a>
        </form>
    </div>
</template>