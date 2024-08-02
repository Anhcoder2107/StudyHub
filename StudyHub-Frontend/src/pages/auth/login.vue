<script>
import { defineComponent, ref, reactive, toRefs } from "vue";


export default {
    setup() {
    const data = reactive({
            email: '',
            password: '',
        })

    const errors = ref([])

    
    const login = () => {
            axios.post(`http://localhost:8000/api/login`, data)
            .then(response => { 
                if(response.status === 200) {
                    alert('Register success')
                }
            })
            .catch(e => {
                errors.value = e.response.errors
            })
        }
        return { data, login }
    }


}





</script>




<template>
    <div class="container col-sm-4 mb-5">
        <form  @submit.prevent="login()" method="post">
            <h1>Login</h1>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId"
                    placeholder="abc@mail.com" 
                    v-model="data.email"
                    />
                <small id="emailHelpId" class="form-text text-muted">Help text</small>
            </div>
    
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="*********"
                    v-model="data.password"
                />
            </div>
            <button type="submit" class="btn btn-primary me-2">
                Submit
            </button>
            <a href="/register" class="btn btn-primary">Register</a>
        </form>
    </div>
</template>