<template>
<div class="container">
     <div class="card">
                <div class="card-header">User List</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="user in users" :key="user.id">
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            users: {},
        }
   },

    methods: {
        getUser(){
            axios.get('/api/v1/users').then((response)=>{ this.users = response.data })
            }
        },

    created() {
            this.getUser()
        }
}
</script>
