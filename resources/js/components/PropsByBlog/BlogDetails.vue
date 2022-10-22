<template>
    <div>
        <div class="card mb-4">
            <div class="card-body">
                <h5>{{blog_details.title}}</h5>
                <p>
                   {{blog_details.description}}
                </p>
            </div>
        </div>
        <comments  :blog_details="blog_details" :selected_comments="selected_comments" :post_comment="post_comment"></comments>
    </div>
</template>

<script>
import Comments from './Comments.vue';  
export default {
    props:['blog_details','selected_comments','post_comment'],
  components: { Comments },};
</script>

<style></style>
