<template>
    <h1>Đây là trang home</h1>
    <h2>Chào mừng bạn đến với StudyHub</h2>
    <h3>Thông tin người dùng</h3>
    <p>Email: {{ user }}</p>
</template>

<script>

export default {
    data(){
        return {
            user: this.$auth.user()
        }
    },
    mounted(){
        this.user = this.$auth.user()
    }
}


</script>
