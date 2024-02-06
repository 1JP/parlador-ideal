<template>
    <img :src="'img/produto.png'" :class="classes" :alt="description">
</template>

<script>
    export default {
        props: {
            class: {
                type: String,
                required: true,
            },
            alt: {
                type: String,
                default: '...',
            }
        },
        computed: {
            classes() {
                return this.class;
            },
            description(){
                return this.alt;
            }
        }
    }
</script>
