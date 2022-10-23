<template>
    <div v-if="get_blog_details && get_blog_details.id">
        <div class="form-group">
            <label for="">Name</label>
            <input v-model="comment_body.name" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Comment</label>
            <textarea v-model="comment_body.description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button @click="click_body" class="btn btn-sm btn-success">Submit</button>
        </div>
    </div>
</template>

<script>
import { mapGetters,mapActions } from 'vuex'
export default {
    
    data:function(){
        return{
            comment_body:{
                blog_id:'',
                name:'',
                description:''
            },
        }
    },
    methods: {
        ...mapActions([
            'post_blog_comment'
        ]),
        click_body: function(){
            this.comment_body.blog_id = this.get_blog_details.id;
            this.post_blog_comment(this.comment_body);
            this.comment_body = {
                blog_id:'',
                name:'',
                description:''
            }
        }
    },
    computed:{
       
        ...mapGetters([
            'get_blog_details'
        ])
    }
};
</script>

<style></style>
