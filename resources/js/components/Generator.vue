<template>
  
</template>

<script>
export default {

    data () {
        return {
            choices: {
                'adverbs': null,
                'adjectives': null,
                'situations': null,
                'objectives': null,
                'solutions': null
            }
            
        }
    },

    created () {
        this.fetchRandomSuggestions('adverbs', 5);
        this.fetchRandomSuggestions('adjectives', 5);
        this.fetchRandomSuggestions('situations', 5);
        this.fetchRandomSuggestions('objectives', 5);
        this.fetchRandomSuggestions('solutions', 1);
    },

    methods: {
        fetchRandomSuggestions(type, number) {
            const uri = `api/${type}/random/${number}`;
            axios.get(uri).then(response => {
                if (response.status == 200) {
                    this['choices'][type] = response.data;
                }
            });
        },

        submitNewSentence() {
            axios.post('/story')
        }
    }
}
</script>

<style>

</style>