<template>
    <div class="dropdown">
        <button class="btn btn-primary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <slot name="button"></slot>
        </button>
        <slot/>
    </div>
</template>

<script>
    export default {}
</script>
