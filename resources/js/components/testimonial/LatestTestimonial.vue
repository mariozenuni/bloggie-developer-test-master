<template>
    <div class="bg-lighter py-5">
        <div class="container">
            <h3 class="mb-4 text-lg">
                Latest Testimonials
            </h3>

            <div class="row">
                <div
                    v-for="testimonial in testimonials" 
                    class="col-4 mb-4"
                    :key = "testimonial.latest"
                >
                    <testimonial-card :testimonial="testimonial" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import TestimonialCard from "./TestimonialCard.vue";
    export default {
        name: "LatestTestimonial",
        components: {TestimonialCard},
        data() {
            return {
                testimonials: null,
            }
        },
        mounted() {
            this.loadTestimonials();
        },
        methods: {
            loadTestimonials() {
                axios.get(
                    '/api/testimonial/latest?limit=3',
                ).then(response => {
                    this.testimonials = response.data;
                }).catch(e => {
                    console.error('Failed to load testimonial reviews');
                });
            }
        }
    }
</script>
