<template>
    <div>
        <div class="card">
            <div class="card-body">
                <CommentsAdd :post_comment="post_comment" :blog_details="blog_details"></CommentsAdd>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <ul>
                    <li
                        class="d-flex flex-wrap align-content-center my-3"
                        v-for="item in selected_comments"
                        :key="item.id"
                    >
                        <img
                            src="https://png.pngtree.com/png-vector/20191101/ourmid/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg"
                            style="height: 65px; padding: 5px"
                            alt=""
                            srcset=""
                        />
                        <div class="ml-4 py-2" style="flex: 1">
                            <h6>{{ item.name }}</h6>
                            <p>
                                {{ item.description }}
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import CommentsAdd from "./CommentsAdd.vue";
export default {
    props: ["selected_comments","post_comment","blog_details"],
    components: { CommentsAdd }
};
</script>

<style></style>
