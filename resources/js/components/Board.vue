<template>
  <div class="boardWrapper">
  </div>
</template>

<script>
import Story from './Story.vue';

export default {
    data () {
        return {
            provider: {
                context: null
            }
        }
    },

    provide () {
        return {
            provider: this.provider
        }
    },

    mounted () {
        this.provider.context = this.$refs['boardCanvas'].getContext('2d')

        this.$refs['boardCanvas'].width = this.$refs['boardCanvas'].parentElement.clientWidth
        this.$refs['boardCanvas'].height = this.$refs['boardCanvas'].parentElement.clientHeight
    },
    components: {
        Story
    }
}
</script>

<style>
.boardWrapper {
    height: 100%;
    width: 100%;
}
</style>