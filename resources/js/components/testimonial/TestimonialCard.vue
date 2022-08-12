<template>
    <div class="card h-100 p-4">
        <p class="text-center font-weight-bold">
            {{ testimonial.message }}
        </p>

        <small class="block mt-auto text-center">
                {{ testimonial.user_name }} | {{ testimonial.created_at | prettyDate }}
        </small>

        <div class="d-flex justify-content-center align-items-center mt-3">
            <i
                v-for="i in 5"
                class="fas fa-star mr-2"
                :class="{
                    'text-muted': (i > testimonial.rating),
                    'text-primary': (i <= testimonial.rating),
                }"
            />
        </div>
    </div>
</template>

<script>
    export default {
        name: "Testimonial",
        props: {
            testimonial: {
                type: Object,
                required: true,
            }
        }
    }
</script>
