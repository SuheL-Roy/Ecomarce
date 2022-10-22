<template>
    <div v-if="blog_details && blog_details.id">
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
export default {
    props:['blog_details',"post_comment"],

    data:function(){
        return{
            comment_body:{
                blog_id:this.blog_details.id,
                name:'',
                description:''
            },
        }
    },
    methods: {
        click_body: function(){
            this.comment_body.blog_id = this.blog_details.id;
            this.post_comment(this.comment_body);
            this.comment_body = {
                blog_id:'',
                name:'',
                description:''
            }
        }
    }
};
</script>

<style></style>
