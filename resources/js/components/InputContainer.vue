<template>
    <div class="form-group">
        <label :for="id" class="form-label">{{title}}</label>
        <slot></slot>
        <div :id="idHelp" class="form-text text-muted">{{textHelp}}</div>
    </div>

</template>

<script>
    export default {
        props: {
            id: {
                type: String,
                required: true,
            }, 
            title: {
                type: String,
                required: true,
            },
            idHelp: {
                type: String,
                required: true,
            }, 
            textHelp: {
                type: String,
            },
        }
    }
</script>
