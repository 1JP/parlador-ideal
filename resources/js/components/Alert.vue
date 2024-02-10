<template>
    <div :class="style" role="alert">
        <p class="text-dark">{{ title }}</p>
        <hr v-if="details.message">
        <p class="text-dark" v-if="details.message">{{ details.message }}</p>
        <br>
        <ul v-if="details.data">
            <li class="text-dark text-start" v-for="e, key in details.data" :key="key">{{ e[0] }}</li>
        </ul>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
</template>

<script>
    export default { 
        props: {
            type: {
                type: String,
                required: true,
            }, 
            title: {
                type: String,
                required: true,
            },
            details: {
                type: Object,
                required: true,
            }
        },

        computed: {
            style() {
                return 'alert alert-'+this.type+' alert-dismissible';
            }
        }
    }
</script>
