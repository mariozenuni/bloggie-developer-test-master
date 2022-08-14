<template>
    <div class="bg-gradient-primary py-5">
        <div class="container">
            <h3 class="mb-4 text-lg text-white">
                Featured Blogs
            </h3>

            <div class="row">
                <div
                    v-for="blog in blogs"
                    class="col-4 mb-4"
                    :key="blog.slug"
                >
                    <blog-card
                        :blog="blog"
                        :isFeatured="true"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import BlogCard from "./BlogCard";
    export default {
        name: "FeaturedBlogs",
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
                    '/api/blog/featured?limit=3'
                ).then(response => {
                    this.blogs = response.data;
                }).catch(e => {
                    console.error('Failed to load blog posts');
                });
            }
        }
    }
</script>
