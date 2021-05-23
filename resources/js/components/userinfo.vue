<template>
<div>
    <div class="d-flex card-footer align-items-baseline">
        <div>asked by:</div>
        <div class="px-2">
            <img :src="profile"
                               style="width: 35px" class="rounded-circle">
        </div>
        <div>
            <a :href="user.url" style="color: #1b1e21">
            {{user.username}}</a>
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        props: ['model'],
        data() {
            return {
                user: {},
                profile: {}
            }
        },
        mounted() {
            this.getUser();
        },
        methods: {
             getUser(){
                 axios.get('/q/'+ this.model.id +'/getuser')
                     .then((response)=>{
                         this.user = response.data.user
                         this.profile = response.data.profile
                     })
             }
         },
         created() {
             this.getUser()
         }
    }
</script>
