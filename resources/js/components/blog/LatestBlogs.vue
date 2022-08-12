<template>
    <div class="bg-lighter py-5">
        <div class="container">
            <h3 class="mb-4 text-lg">
                Latest Blogs
            </h3>

            <div class="row">
                <div
                    v-for="blog in blogs"
                    class="col-4 mb-4"
                >
                    <blog-card :blog="blog" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import BlogCard from "./BlogCard";
    export default {
        name: "LatestBlogs",
        components: {BlogCard},
        data() {
            return {
                blogs: null,
            }
        },
        mounted() {
            this.loadBlogs();
        },
        methods: {
            loadBlogs() {
                axios.get(
                    '/api/blog/latest?limit=7',
                ).then(response => {
                    this.blogs = response.data;
                }).catch(e => {
                    console.error('Failed to load blog posts');
                });
            }
        }
    }
</script>
