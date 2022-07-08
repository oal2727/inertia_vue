<template>
    <div class="container w-75 mt-5">
    <Link 
    href="/create"
    class="button is-primary" >{{title}}</Link>
    <table class="table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Name</th>
                <th>Description</th>
                <th></th>    
                <th></th>  
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item,index) in posts">
                <td>{{index+1}}</td>
                <td>{{item.title}}</td>
                <td>{{item.description}}</td>
                <td>
                    <button class="button is-warning"
                    @click="editPost(item.id)"
                    >Editar</button>  
                </td>
                <td>
                    <button class="button is-danger"
                    @click="deletePost(item.id)"
                    >Delete</button>  
                </td>
            </tr>
        </tbody>
        </table>
    </div>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue'
export default {
    props:['posts'],
    components: {
        Link,
    },
    data:function(){
        return{
            title:"Add Post",
        }
    },
    methods:{
        deletePost(id){
            // this.$toast.open('You did it!');
            if (confirm('Are you sure you want to delete this contact?')) {
                this.$inertia.delete(`/post/${id}`)
                .then(() => {
                    this.$toast.open('You did it!');
                })
            }
        },
        editPost(id){
            this.$inertia.get(`/post/${id}`)
        }
    }
}
</script>
