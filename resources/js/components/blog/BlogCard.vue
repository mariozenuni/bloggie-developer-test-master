<template>
    <div class="card h-100 p-4">
        <img
            class="img-fluid"
            alt="Blog Image"
            :src="blog.image_url"
        />
        <h4 class="mt-2">
            {{ blog.title }}
        </h4>

        <small class="block mb-auto">
            <template v-if="isFeatured">
                Featured at: {{ blog.featured_at | prettyDateTime }}
            </template>

            <template v-else>
                {{ blog.published_at | prettyDate }}
            </template>
        </small>

        <a
            class="btn btn-primary mt-4"
            :href="`/blog/${blog.slug}`"
        >
            View Blog
        </a>
    </div>
</template>

<script>
    export default {
        name: "BlogCard",
        props: {
            blog: {
                type: Object,
                required: true,
            },
            isFeatured: {
                type: Boolean,
                default: false,
            }
        }
    }
</script>
