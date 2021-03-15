<template>
  
</template>

<script>
export default {
    props: ['id', 'story'],

    data () {
        return {
            sentence: ''
        }
    },

    methods: {
        createSentence(adverb, adjective, situation, objective, solution) {
            return  `Ce que je trouve ${adverb} ${adjective}, 
                c'est quand ${situation}.
                Du coup, pour ${objective}, ${solution}`;
        }
    }
}
</script>