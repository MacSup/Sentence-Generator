<template>
    <div v-if="render" id="carousel-stories" class="carousel slide" data-bs-ride="carousel">
        <div ref="inner" class="carousel-inner">
            <div v-for="story in stories" :key="story.id"
                class="carousel-item text-center"
                :class="isActiveItem(story.id)"
            >
                <img 
                    id="caroussel-img" 
                    v-bind:src="story.file"
                />
                
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-stories"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel-stories"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div v-else>
        <h2 class="mb-5 text-center"> C'est encore bien vide par ici, participez à l'étude pour ajouter des solutions </h2>
    </div>
</template>

<script>
export default {
    name: "Caroussel",

    data () {
        return {
            render: false,
            stories: []
        }
    },

    created () {
        this.getStories()
    },

    mounted () {
        this.$nextTick(() => {
            console.log(this.$refs['inner'])
        })
        
    },

    methods: {
        getStories() {
            axios.get('/api/sentences').then(response => {
                let data = response.data
                this.stories = data

                if (data.length > 0) {
                    this.render = true
                }
            });
        },

        isActiveItem(id) {
            if (id == this.stories[0].id) {
                return 'active'
            }

            return ''
        }
    }

}
</script>