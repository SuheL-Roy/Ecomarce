<template>
<div>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3" v-for="item in blog_list" :key="item.id">
                <div @click="get_blog_details(item)" style="cursor:pointer" class="card-body">
                    <h5>{{item.title}}</h5>
                    <p>
                       {{item.description}} 
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <blog-details :post_comment="post_comment" :selected_comments="selected_comments" :blog_details="blog_details" ></blog-details>
        </div>
    </div>
</div>
</template>

<script>

import BlogDetails from "./BlogDetails.vue";
export default {
    components: {
        BlogDetails
    },
    data: function(){
        return{
            blog_list:[
               {
                id: 1,
                title:'this is blog1',
                description:'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque odio perferendis voluptatibus quo. Vitae delectus  Vitae delectus porro numquam itaque perferendis dolorem cum ut a'
               },
               {
                id: 2,
                title:'this is blog2',
                description:'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque odio perferendis voluptatibus quo. Vitae delectus  Vitae delectus porro numquam itaque perferendis dolorem cum ut a'
               },
               {
                id: 3,
                title:'this is blog3',
                description:'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque odio perferendis voluptatibus quo. Vitae delectus  Vitae delectus porro numquam itaque perferendis dolorem cum ut a'
               },
               {
                id: 4,
                title:'this is blog4',
                description:'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque odio perferendis voluptatibus quo. Vitae delectus  Vitae delectus porro numquam itaque perferendis dolorem cum ut a'
               },
               {
                id: 5,
                title:'this is blog5',
                description:'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque odio perferendis voluptatibus quo. Vitae delectus  Vitae delectus porro numquam itaque perferendis dolorem cum ut a'
               }

            ],
            blog_details:{
                title:'',
                description:'',
            },
            comments:[
                {
                    id: 1,
                    blog_id:1,
                    name:'jon',
                    description:"blog1 comments Lorem ipsum dolor sit amet consectetur adipisicing elit",
                },
                {
                    id: 2,
                    blog_id:2,
                    name:'Ani',
                    description:"blog2 comments Lorem ipsum dolor sit amet consectetur adipisicing elit",
                },
                {
                    id:3,
                    blog_id:3,
                    name:'gomez',
                    description:"blog3 comments Lorem ipsum dolor sit amet consectetur adipisicing elit",
                },
                {
                    id:4,
                    blog_id:4,
                    name:'jon abram',
                    description:"blog4 comments Lorem ipsum dolor sit amet consectetur adipisicing elit",
                },
                {
                    id:5,
                    blog_id:5,
                    name:'jon abram',
                    description:"blog5 comments Lorem ipsum dolor sit amet consectetur adipisicing elit",
                }

                
            ],
            selected_comments: [],
        }
    },
    methods: {
        get_blog_details: function(blog){
           this.blog_details = blog;
           this.get_comments(blog.id);
        },
        get_comments: function(blog_id){
            this.selected_comments = this.comments.filter((item)=>item.blog_id === blog_id);
        },
        post_comment: function(comment){
            comment.id = this.comments.length + 1;
            this.comments.unshift(comment);
            this.get_comments(comment.blog_id);
            console.log(comment);
        }
        
    }
};
</script>

<style></style>
