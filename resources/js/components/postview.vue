<template>
</template>

<script>
export default {

    props:['post'],
    computed: {
        preview () {
            return md.render(
                this.body
            )
        }
    },
    mounted() {
        autosize(document.querySelector('textarea'))
    }
}
</script>
