<script>
import { defineComponent, ref, reactive, toRefs } from "vue";


export default {
    setup() {
    const data = reactive({
            email: '',
            name: '',
            role: '',
            password: '',
            confirm_password: ''
        })

    const errors = ref([])

    
    const register = () => {
            axios.post(`http://localhost:8000/api/auth/register`, data)
            .then(response => { 
                if(response.status === 200) {
                    alert('Register success')
                    window.location.href = '/login'
                }
            })
            .catch(e => {
                errors.value = e.response.errors
            })
        }
        return { data, register }
    }


}

</script>




<template>
    <div class="container col-sm-4 mb-5">
        <form @submit.prevent="register()" method="post">
            <h1>Register</h1>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId"
                    placeholder="abc@mail.com" 
                    v-model="data.email"
                    />
                <small id="emailHelpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Tên</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="NameHelpId"
                    placeholder="Nguyen Van A"
                    v-model="data.name"
                    />
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Số Điện Thoại</label>
                <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phoneHelpId"
                    placeholder="0123456789"
                    />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Vai Trò</label>
                <select class="form-select form-select-md" name="role" id="role" v-model="data.role">
                    <option value="0" selected>Học Sinh</option>
                    <option value="1">Giáo Viên</option>
                </select>
            </div>


            <div class="mb-3">
                <label for="password" class="form-label">Mật Khẩu</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="" 
                    v-model="data.password"
                />
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Xác Nhận Mật Khẩu</label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                    placeholder="" />
            </div>

            <button type="submit" class="btn btn-primary me-3">
                Submit
            </button>

            <a href="/login" class="btn btn-primary">Login</a>
        </form>
    </div>
</template>
