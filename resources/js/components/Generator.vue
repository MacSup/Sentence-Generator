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
                            <textarea 
                                v-model="sentence" 
                                class="form-control p-5 fs-5" 
                                name="sentence" 
                                id="sentence" 
                                placeholder="Votre grigri" 
                                v-bind:disabled="isTextAreaDisabled">
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
                        <button 
                            type="button" 
                            class="btn btn-outline-primary"
                            data-bs-toggle="modal" 
                            data-bs-target="#generator-modal"
                        >Génération</button>
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
                        <button 
                            type="button" 
                            class="btn btn-outline-primary"
                            v-on:click="sentenceContribution"
                        >Contribuez</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="generator-modal" tabindex="-1" aria-labelledby="generator-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Génération</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <ul class="nav nav-tabs mb-4" id="tabGenerator" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a 
                                        class="nav-link active" 
                                        id="tab-1" 
                                        data-bs-toggle="tab" 
                                        data-bs-target="#feeling-content" 
                                        type="button" 
                                        role="tab" 
                                        aria-controls="feeling-content" 
                                        aria-selected="true"
                                    >Emotion</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a 
                                        class="nav-link" 
                                        id="tab-2" 
                                        data-bs-toggle="tab" 
                                        data-bs-target="#situation-content" 
                                        type="button" 
                                        role="tab" 
                                        aria-controls="situation-content" 
                                        aria-selected="false"
                                    >Situation</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a 
                                        class="nav-link" 
                                        id="tab-3" 
                                        data-bs-toggle="tab" 
                                        data-bs-target="#action-content" 
                                        type="button" 
                                        role="tab" 
                                        aria-controls="action-content" 
                                        aria-selected="false"
                                    >Etat recherché</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a 
                                        class="nav-link" 
                                        id="tab-4" 
                                        data-bs-toggle="tab" 
                                        data-bs-target="#solution-content" 
                                        type="button" 
                                        role="tab" 
                                        aria-controls="solution-content" 
                                        aria-selected="false"
                                    >Solution</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="feeling-content" role="tabpanel" aria-labelledby="tab-1">
                                    <div class="row align-items-center">
                                        <div class="col-12 mb-3">
                                            Choissiez votre émotion :  
                                        </div>

                                        <div class="col-6">
                                            <div class="form-check" v-for="adverb in choices.adverbs" :key="adverb.id">
                                                <input class="form-check-input" type="checkbox" :value="adverb.id" v-model="answer.adverb">
                                                <label class="form-check-label">
                                                    {{ adverb.content }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check" v-for="adjective in choices.adjectives" :key="adjective.id">
                                                <input class="form-check-input" type="checkbox" :value="adjective.id" v-model="answer.adjective">
                                                <label class="form-check-label">
                                                    {{ adjective.content }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-4">
                                            Ce que je trouve {{ selectedAdverb + ' ' + selectedAdjective }}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="situation-content" role="tabpanel" aria-labelledby="tab-2">
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                        <div class="col-12">
                                            <div class="form-check" v-for="situation in choices.situations" :key="situation.id">
                                                <input class="form-check-input" type="checkbox" :value="situation.id" v-model="answer.situation">
                                                <label class="form-check-label">
                                                    {{ situation.content }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-4">
                                            c'est quand {{ selectedSituation }}
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="action-content" role="tabpanel" aria-labelledby="tab-3">
                                    <div class="row">
                                        <div class="col-2">

                                        </div>
                                        <div class="col-10">
                                            <div class="form-check" v-for="objective in choices.objectives" :key="objective.id">
                                                <input class="form-check-input" type="checkbox" :value="objective.id" v-model="answer.objective">
                                                <label class="form-check-label">
                                                    {{ objective.content }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-4">
                                            du coup, pour {{ selectedObjective }}
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="solution-content" role="tabpanel" aria-labelledby="tab-4">
                                    <div class="row">

                                        <div class="col-12 mt-4">
                                            {{ selectedSolution }}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button 
                        type="button" 
                        class="btn"
                        :class="modalButtonClass"
                        v-on:click="buttonModalAction(modalButtonText)"
                    >{{ modalButtonText }}</button>
                </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
var bootstrap = require('bootstrap')

export default {

    data () {
        return {
            isTextAreaDisabled: true,
            isAnswered: false,
            sentence: null,
            answer: {
                adverb: [],
                adjective: [],
                situation: [],
                objective: [],
                solution: []
            },
            choices: {
                adverbs: [],
                adjectives: [],
                situations: [],
                objectives: [],
                solutions: []
            },
            story: {
                adverb: 0,
                adjective: 0,
                situation: 0,
                objective: 0,
                solution: 0
            },
            
            
        }
    },

    computed: {
        // Text display
        selectedAdverb () {
            return this.getElementContent('adverb')
        },

        selectedAdjective () {
            return this.getElementContent('adjective')
        },

        selectedSituation () {
            return this.getElementContent('situation')
        },

        selectedObjective () {
            return this.getElementContent('objective')
        },

        selectedSolution () {
            return this.getElementContent('solution')
        },

        // Button change
        modalButtonClass () {
            if (this.isAnswered) {
                return 'btn-success'
            }
            return 'btn-primary'
        },
        modalButtonText () {
            if (this.isAnswered) {
                return 'Terminer'
            }
            return 'Suivant'
        }
    },

    watch: {
        answer: {
            handler: function () {
                let len = [];
                Object.values(this.answer).forEach(element => {
                    len.push(element.length);
                });

                let zIdx = len.find(el => el == 0);

                if (typeof zIdx == "undefined") {
                    this.isAnswered = true;
                }
            },
            deep: true
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
        // Page actions
        sentenceAutoGeneration() {
            let adverb = this.getRandomItem('adverb', this.choices.adverbs)
            let adjective = this.getRandomItem('adjective', this.choices.adjectives)
            let situation = this.getRandomItem('situation', this.choices.situations)
            let objective = this.getRandomItem('objective', this.choices.objectives)

            this.story.solution = this.choices.solutions[0].id;
            let solution = this.choices.solutions[0].content;

            this.sentence = this.generateSentence(adverb, adjective, situation, objective, solution);
        },

        sentenceContribution() {
            this.isTextAreaDisabled = false;
            this.sentence = this.generateSentence('{adverbe}', '{adjectif}', '{situation}', '{objectif}', '{solution}');
        },

        sentenceDownload() {

        },

        sentenceShare() {

        },

        // Modal actions
        buttonModalAction (text) {
            switch (text) {
                case 'Suivant':
                    this.changeModalTabPage()
                    break;
                case 'Terminer':
                    this.closeModal()
                    break;
            }
        },

        changeModalTabPage () {
            let actualTab = document.querySelector("#tabGenerator li a[aria-selected=true]")

            let tabId = actualTab.id;
            let id = parseInt(tabId.slice(4));

            if (id == 4) {
                id = 0
            }

            let nextTab = document.querySelector('#tabGenerator li a#tab-' + (id + 1))

            let tab = new bootstrap.Tab(nextTab)
            tab.show()
        },

        closeModal () {
            let modal = bootstrap.Modal.getInstance(document.getElementById('generator-modal'))
            modal.toggle()

            this.story.adverb = this.answer.adverb[0]
            this.story.adjective = this.answer.adjective[0]
            this.story.situation = this.answer.situation[0]
            this.story.objective = this.answer.objective[0]
            this.story.solution = this.answer.solution[0]

            this.sentence = this.generateSentence(
                this.selectedAdverb, 
                this.selectedAdjective, 
                this.selectedSituation, 
                this.selectedObjective,
                this.selectedSolution
            );
        },

        // Api calls
        getRandomItem(type, array) {
            let item = array[Math.floor(Math.random() * array.length)];
            console.log(item)
            this.story[type] = item.id;

            return item.content;
        },

        setSolutionItem() {
            this.answer.solution.push(this.choices.solutions[0].id)
        },

        fetchRandomSuggestions(type, number) {
            const uri = `api/${type}/random/${number}`;
            axios.get(uri).then(response => {
                if (response.status == 200) {
                    this.choices[type] = response.data;

                    if (type == "solutions") {
                        this.answer.solution.push(response.data[0].id)
                    }
                }
            });
        },

        submitNewSentence() {
            axios.post('/story')
        },

        // Inner page methods
        generateSentence(adverb, adjective, situation, objective, solution) {
            return `Ce que je trouve ${adverb} ${adjective}, c'est quand ${situation}; du coup, pour ${objective}, ${solution}`
        },

        generateBackgroundColor () { 
            return "hsl(" + 360 * Math.random() + ',' +
                    (25 + 70 * Math.random()) + '%,' + 
                    (85 + 10 * Math.random()) + '%)'
        },

        // "Private" methods
        getElementContent (type) {
            let id = this.answer[type][0];

            if (typeof id !== "undefined") {
                let element = this.choices[type + 's'].find(el => el.id == id);
                return element.content
            }

            return ''
        }
    }
}
</script>

<style>

</style>