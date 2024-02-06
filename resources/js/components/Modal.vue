<template>
    <div class="modal fade" :id="id" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">{{ title }}</h5>
                    <button type="button" @click="close" class="close btn btn-primary" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <slot name="alert"></slot>
                    <slot name="body"></slot>
                </div>
                <div class="modal-footer">
                    <slot name="footer"></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Modal",
        props: {
            id: {
                type: String,
                required: true,
            }, 
            title: {
                type: String,
                required: true,
            },
        },
        emits: ["onClose"],
        methods: {
            close(event) {
                if (event.target.attributes["aria-hidden"])
                    this.$emit("onClose", true);
            },
        }
    }
</script>
