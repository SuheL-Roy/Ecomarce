<template>
<div>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3" v-for="item in get_blog_list" :key="item.id">
                <!-- <div @click="show_my_name" style="cursor:pointer" class="card-body"> -->
                <div @click="fetch_blog_details(item)" style="cursor:pointer" class="card-body">
                    <h5>{{item.title}}</h5>
                    <p>
                       {{item.description}} 
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <blog-details></blog-details>
        </div>
    </div>
</div>
</template>

<script>

import BlogDetails from "./BlogDetails.vue";
import { mapGetters,mapActions } from 'vuex'
export default {
    components: {
        BlogDetails
    },
    data: function(){
        return{
        }
    },
    methods: {
        ...mapActions([
            'fetch_blog_details'
        ]),
 
    },
    computed:{
        ...mapGetters([
           'get_blog_list'
        
        ])
    }
};
</script>

<style></style>
