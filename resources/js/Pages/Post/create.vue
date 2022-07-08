<template >
        <div class="card w-50 m-auto">
                <div class="card-header">
                    <div class="card-header-title d-flex ">
                        <Link 
                        class="button is-primary" 
                        type="submit"
                        href="/"
                        >
                        List Posts
                        </Link>
                        <p class="ml-2">{{title}}</p>
                    </div>
                </div>
              <div class="card-content p-2">
                <form  @submit.prevent="submit">
                  <text-input
                    type="text"
                    placeholder="Input Title"
                    v-model="form.title"
                    />
                    <text-input
                    type="text"
                    placeholder="Input Description"
                     v-model="form.description"
                    />
                    <div class="box">
                        
                        <button class="mt-2 button is-primary" type="submit">
                        {{title}}
                        </button>
                    </div>
              </form>
              </div>
        </div>
</template>
<script>
import TextInput from "../../components/textinput"
import Button from "../../components/button"
import { Link } from '@inertiajs/inertia-vue'

export default {
    components: {
     TextInput,
     Button,
     Link
    },
    props:['post'],
    data:function(){
        return{
            form:{
                id:null,
                title:null,
                description:null
            },
            title:null
        }
    },
    created(){
        if(this.post != null){
            this.form = this.post
            this.title = "Update Post"
        }else{
            this.title= "Add Post"
        }
    },
    methods:{
        submit(){
            // console.log(this.form)
                this.$inertia.post('/post', this.form)
        }
    }
}
</script>
