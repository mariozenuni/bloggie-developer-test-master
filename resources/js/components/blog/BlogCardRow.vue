<template>
    <div class="card w-100 p-4">
        <div class="row">
            <div class="col-3">
                <img
                    class="img-fluid"
                    alt="Blog Image"
                    :src="blog.image_url"
                />
            </div>
            <div class="col-9">
                <h4 class="mt-2">
                    {{ blog.title }}
                </h4>

                <p>
                    {{ blog.main_content.substr(0, 80).trim() }}...
                </p>
                 <p>
                    {{ blog.additional_content.substr(0, 80).trim()}}...
                </p>

                <small class="block w-100">
                    <template v-if="isFeatured">
                        Featured at: {{ blog.featured_at | prettyDateTime }}
                    </template>

                    <template v-else>
                        {{ blog.published_at | prettyDate }}
                    </template>
                </small>

                <div>
                    <a
                        class="btn btn-primary mt-4"
                        :href="`/blog/${blog.id}`"
                    >
                        View Blog
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BlogCardRow",
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
