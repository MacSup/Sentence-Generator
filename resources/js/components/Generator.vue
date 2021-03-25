<template>
    <div class="container pt-2 h-100">
        <header id="generator-nav" class="pb-3 mb-4 border-bottom">
        <a class="d-flex align-items-center text-dark text-decoration-none">
            <img src="favicon.ico" width="32" height="24" class="me-2"><title>GRIGRI</title>
            <span class="fs-4">GRIGRI</span>
        </a>
        </header>

        <div class="p-4 mb-4 bg-light rounded-3">
        <div class="container-fluid py-2">
            <h3 class="fw-bold">Générateur de Réponses Incongrues pour Gérer les Risques d’Internement</h3>
            <p class="col-md-12 fs-5">Fruit de plusieurs mois d’enquête à caractère auto-ethnographique et d’une triangulation fine et forte des données collectées, <br> le GRIGRI formule une réponse adaptée aux questions que vous pose votre intérieur confiné</p>
        </div>
        </div>

        <div id="generator-content" class="row mb-2 align-items-md-stretch">
            <div class="col-3 pt-4">
                <h5 class="text-center mb-2"> Comment utiliser le GRIGRI ? </h5>
                <p>
                    <ul>
                        <li>Cliquez sur le bouton "Generation"</li>
                        <li>Suivez les instructions</li>
                        <li>Cliquez sur le bouton "Submit"</li>
                    </ul>
                </p>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-4 rounded-3 border">

                <div id="story" class="col-10 offset-1 border" v-bind:style="{ 'background-color': generateBackgroundColor()}">
                        <form action="">
                            <textarea v-model="sentence" class="form-control p-4 fs-5" name="sentence" id="sentence" placeholder="Votre grigri" disabled>
                            </textarea>
                        </form>
                </div>
                </div>
            </div>
            <div class="col-2 offset-1">
                <div class="h-100 align-self-end p-4 rounded-3 align-items-bottom">

                    <div class="w-100 mb-4 btn-group-vertical">
                        <button 
                            type="button" 
                            class="btn btn-outline-primary"
                            v-on:click="submitNewSentence"
                        >Submit</button>
                    </div>
                    
                    <div class="w-100 mb-4 btn-group-vertical">
                        <button type="button" class="btn btn-outline-primary">Génération</button>
                        <button 
                            type="button" 
                            class="btn btn-outline-primary"
                            v-on:click="sentenceAutoGeneration"
                        >C</button>
                    </div>

                    <div class="w-100 mb-4 btn-group-vertical">
                        <button type="button" class="btn btn-outline-primary">Partagez</button>
                        <button type="button" class="btn btn-outline-primary">Enregistrez</button>
                        <button type="button" class="btn btn-outline-primary">Surprise du chef</button>
                    </div>

                    <div class="w-100 btn-group-vertical">
                        <button type="button" class="btn btn-outline-primary">Contribuez</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {

    data () {
        return {
            sentence: null,
            choices: {
                'adverbs': null,
                'adjectives': null,
                'situations': null,
                'objectives': null,
                'solutions': null
            },
            story : {
                adverb: 0,
                adjective: 0,
                situation: 0,
                objective: 0,
                solution: 0
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
        sentenceAutoGeneration() {
            let adverb = this.getRandomItem('adverb', this.choices.adverbs)
            let adjective = this.getRandomItem('adjective', this.choices.adjectives)
            let situation = this.getRandomItem('situation', this.choices.situations)
            let objective = this.getRandomItem('objective', this.choices.objectives)

            this.story.solution = this.choices.solutions[0].id;
            let solution = this.choices.solutions[0].content;

            this.sentence = this.generateSentence(adverb, adjective, situation, objective, solution);
        },

        getRandomItem(type, array) {
            let item = array[Math.floor(Math.random() * array.length)];
            console.log(item)
            this.story[type] = item.id;

            return item.content;
        },

        generateSentence(adverb, adjective, situation, objective, solution) {
            return `Ce que je trouve ${adverb} ${adjective}, c'est quand ${situation}; du coup, pour me ${objective}, ${solution}`
        },

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
        },

        generateBackgroundColor(){ 
            return "hsl(" + 360 * Math.random() + ',' +
                    (25 + 70 * Math.random()) + '%,' + 
                    (85 + 10 * Math.random()) + '%)'
        }
    }
}
</script>

<style>

</style>