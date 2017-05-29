<template>
    <div class="alert alert-success" role="alert" v-show="isVisible">{{ body }}</div>
</template>
<script>
    export default {
        data() {
            return {
                isVisible: false
            }
        },
        props:['body']
    }
</script>