<template>
  
</template>

<script>
export default {

    data () {
        return {
            'adverbs': null,
            'adjectives': null,
            'situations': null,
            'objectives': null,
            'solutions': null
        }
    },

    created () {
        this.fetchRandomSuggestions('adverbs');
        this.fetchRandomSuggestions('adjectives');
        this.fetchRandomSuggestions('situations');
        this.fetchRandomSuggestions('objectives');
        this.fetchRandomSuggestions('solutions');
    },

    methods: {
        fetchRandomSuggestions(type) {
            const uri = `api/${type}/random`;
            axios.get(uri)
                 .then(response => (
                     this[type] = response
                 ));
        }
    }
}
</script>

<style>

</style>