<template>
    <div>
        <div class="card mb-4">
            <div class="card-body">
                <h5>{{get_blog_details.title}}</h5>
                <p>
                   {{get_blog_details.description}}
                </p>
            </div>
        </div>
        <comments></comments>
    </div>
</template>

<script>
import Comments from './Comments.vue';  
import { mapGetters } from 'vuex'
export default {
  components: { Comments },
    computed:{
        ...mapGetters([
            'get_blog_details'
        ])
    }
  };
</script>

<style></style>
