<template>
    <div class="container pt-2 h-100">
        
        <header id="generator-nav" class="pb-3 mb-4 border-bottom">
        <a class="d-flex align-items-center text-dark text-decoration-none">
            <img src="favicon.ico" width="32" height="24" class="me-2"><title>GRIGRI</title>
            <span class="fs-4">GRIGRI</span>
        </a>
        </header>

        <div id="generator-submit" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Générateur</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <p :class="dom.toast.class"> {{ dom.toast.message }} </p>
            </div>
        </div>
        

        <div class="p-4 mb-4 bg-light rounded-3">
            <div class="container-fluid py-2">
                <h3 class="fw-bold">Générateur de Réponses Incongrues pour Gérer les Risques d’Internement</h3>
                <p class="col-md-12 fs-5">Fruit de plusieurs mois d’enquête à caractère auto-ethnographique et d’une triangulation fine et forte des données collectées, <br> le GRIGRI formule une réponse adaptée aux questions que vous pose votre intérieur confiné</p>
            </div>
        </div>

        <div id="generator-content" class="row mb-2 align-items-md-stretch">
            <div class="col-4 pt-4">
                
                <h6 class="fw-bold mb-2">Comment utiliser le GRIGRI ?</h6>
                <p class="fw-lighter lh-1">
                    Cliquez sur "Generation" et suivez les instructions. <br>
                    Cliquez sur "Submit" pour soumettre votre réponse. <br>
                    Cliquez sur "Télécharger" pour recevoir votre réponse <br>
                </p>

                <h6 class="fw-bold mt-5 mb-2">Vous pensez ne rencontrer aucune situation problématique ?</h6>
                <p class="fw-lighter lh-1">
                    Faites confiance à l’IA spécifiquement développée au sein des laboratoires du CREPIS qui concevra un problème spécialement pour vous et vous offrira gratuitement la solution à adopter pour y remédier. <br>
                    Pour ce faire, cliquez sur "AI du GRIGRI".
                </p>

                <h6 class="fw-bold mt-5 mb-2">Toujours pas satisfait·e ?</h6>
                <p class="fw-lighter lh-1">
                    Aidez-nous à améliorer nos services en partageant votre expérience. <br>
                    Cliquez sur "Contribuez" et remplissez le formulaire à votre disposition. <br>
                    Cliquez sur "Submit" pour intégrer votre réponse à nos bases de données. <br>
                </p>


            </div>
            <div class="col-6">
                <div class="h-100 p-4 rounded-3">

                    <div id="story" class="col-10 offset-1 border">
                        <div id="story-content" class="h-100">
                            <form v-bind:style="{ 'background-color': dom.form.background }">
                                <textarea 
                                    v-model="sentence" 
                                    class="form-control p-5 fs-5" 
                                    name="sentence" 
                                    id="sentence" 
                                    :placeholder="dom.form.placeholder" 
                                    :disabled="dom.form.isTextAreaDisabled">
                                </textarea>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="h-100 align-self-end p-4 rounded-3 align-items-bottom">

                    <div class="w-100 mb-4 btn-group-vertical">
                        <button 
                            type="button" 
                            class="btn btn-outline-success"
                            v-on:click="sentenceSubmit"
                        >Submit</button>
                    </div>
                    
                    <div class="w-100 mb-4 btn-group-vertical">
                        <button 
                            type="button" 
                            class="btn btn-outline-primary"
                            data-bs-toggle="modal" 
                            data-bs-target="#generator-modal"
                            v-on:click="sentenceGeneration"
                        >Génération</button>
                        <button 
                            type="button" 
                            class="btn btn-outline-primary"
                            v-on:click="sentenceAutoGeneration"
                        >I.A.</button>
                    </div>

                    <div class="w-100 mb-4 btn-group-vertical">
                        <button 
                            type="button" 
                            class="btn btn-outline-info"
                            v-on:click="sentenceContribution"
                        >Contribuez</button>
                    </div>

                    <div class="w-100  btn-group-vertical">
                        <button type="button" class="btn btn-outline-danger" v-on:click="sentenceShare">Partagez</button>
                        <button type="button" class="btn btn-outline-danger" v-on:click="sentenceDownload">Téléchargez</button>
                        <!-- <button type="button" class="btn btn-outline-danger">Surprise du chef</button> -->
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="generator-modal" tabindex="-1" aria-labelledby="generator-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Génération</h5>
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
                                        <div class="col-12 mb-3">
                                            Choissiez votre situation :  
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
                                        <div class="col-12 mb-3">
                                            Choissiez votre état recherché :  
                                        </div>
                                        <div class="col-12">
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

        <div id="generator-error" class="alert alert-danger" role="alert">
            {{ dom.alert.message }}
        </div>

    </div>
</template>

<script>
import domConvertor from 'dom-to-image'
import { Tab, Modal, Toast } from 'bootstrap'

export default {

    data () {
        return {
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
            story: null,
            mode: 'auto',
            dom: {
                form: {
                    isTextAreaDisabled: true,
                    placeholder: 'Votre grigri',
                    background: ''
                },
                alert: {
                    message: ''
                },
                toast: {
                    message: '',
                    class: ''
                }
            }
            
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
                console.log(zIdx)

                if (typeof zIdx == "undefined") {
                    this.isAnswered = true;
                }
            },
            deep: true
        }
    },

    async created () {
        await this.fetchAllSuggestions()
        this.dom.background = this.generateBackgroundColor()
    },

    methods: {
        // Page actions
        async sentenceSubmit() {
            if (this.mode == 'contribute') {
                await this.parseContribution()
            }

            await this.submitNewSentence()

            this.resetAnswers()
            this.toogleFormEdition()
        },

        sentenceGeneration() {
            this.mode = "manual"
            this.resetAnswers()
            this.toogleFormEdition()

            this.openModal()
        },

        async sentenceAutoGeneration() {
            this.mode = "auto"
            this.resetAnswers()
            this.toogleFormEdition()

            let adverb = this.getRandomItem('adverb', this.choices.adverbs)
            let adjective = this.getRandomItem('adjective', this.choices.adjectives)
            let situation = this.getRandomItem('situation', this.choices.situations)
            let objective = this.getRandomItem('objective', this.choices.objectives)

            this.answer.solution[0] = this.choices.solutions[0].id 
            let solution = this.choices.solutions[0].content

            this.sentence = this.generateSentence(adverb, adjective, situation, objective, solution)

            await this.fetchAllSuggestions()
            this.generateBackgroundColor()
        },

        sentenceContribution() {
            this.mode = "contribute"
            this.resetAnswers()

            this.dom.form.isTextAreaDisabled = false
            this.dom.form.placeholder = this.generateSentence('{adverbe}', '{adjectif}', '{situation}', '{objectif}', '{solution}')
        },

        async sentenceDownload() {
            if (this.story == null) {
                this.displayGeneratorAlert('Télécharger')
            }

            let id = this.story.id
            await this.requestDownload(id)
        },

        sentenceShare() {
            if (this.story == null) {
                this.displayGeneratorAlert('Partager')
            }
        },

        // Modal actions
        openModal() {
            let modal = Modal.getInstance(document.getElementById('generator-modal'))
            modal.toggle()

            let tabNode = document.querySelector('#tabGenerator li a');
            let tab = new Tab(tabNode)
            tab.show()
        },

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

            let tabId = actualTab.id
            let id = parseInt(tabId.slice(4))

            if (id == 3) {
                id = 0
            }

            let nextTab = document.querySelector('#tabGenerator li a#tab-' + (id + 1))

            let tab = new Tab(nextTab)
            tab.show()
        },

        closeModal () {
            let modal = Modal.getInstance(document.getElementById('generator-modal'))
            modal.toggle()

            this.sentence = this.generateSentence(
                this.selectedAdverb, 
                this.selectedAdjective, 
                this.selectedSituation, 
                this.selectedObjective,
                this.selectedSolution
            );

            this.isAnswered = false;
        },

        // Api calls
        async fetchAllSuggestions() {
            await this.fetchRandomSuggestions('adverbs', 5);
            await this.fetchRandomSuggestions('adjectives', 5);
            await this.fetchRandomSuggestions('situations', 5);
            await this.fetchRandomSuggestions('objectives', 5);
            await this.fetchRandomSuggestions('solutions', 1);
        },

        async fetchRandomSuggestions(type, number) {
            const uri = `api/${type}/random/${number}`;
            await axios.get(uri).then(response => {
                if (response.status == 200) {
                    this.choices[type] = response.data;

                    if (type == "solutions") {
                        this.answer.solution[0] = response.data[0].id
                    }
                }
            });
        },

        async submitNewSentence() {
            await this.generateSVGfromDOM()

            let blob = localStorage.getItem('story')

            var form = new FormData()

            form.append('snapshot', blob)

            if (this.answer.adverb[0] == null
                || this.answer.adjective[0] == null
                || this.answer.situation[0] == null
                || this.answer.objective[0] == null
                || this.answer.solution[0] == null
            ) {
                console.warn('Not undefined')
                return
            }

            form.append('adverb', this.answer.adverb[0])
            form.append('adjective', this.answer.adjective[0])
            form.append('situation', this.answer.situation[0])
            form.append('objective', this.answer.objective[0])
            form.append('solution', this.answer.solution[0])

            await axios.post('/api/sentences', form)
                .then((response) => {
                    this.story = response.data
                    this.displaySubmitToast(response.status)
                })
                .catch((err) => {
                    console.error(err)
                    this.displaySubmitToast(err.response.status)
                })

            localStorage.removeItem('story');
        },

        async submitAContribution(parts) {
            let keys = Object.keys(parts)
            for (let el of keys) {
                
                await axios.post(`api/${el}s/contribute`, {
                    content: parts[el].content
                }).then(response => {
                        this.answer[el][0] = response.data.id
                    }).catch(err => {
                        console.error('api : error', err)
                    })
            }
        },

        async requestDownload(id) {
            let url = `/api/sentences/${id}/download`
            window.open(url)
        },

        // Inner page methods
        generateSentence(adverb, adjective, situation, objective, solution) {
            return `Ce que je trouve ${adverb} ${adjective}, c'est quand ${situation} Du coup, pour ${objective}, ${solution}`
        },

        generateBackgroundColor () {
            this.dom.form.background = "hsl(" + 360 * Math.random() + ',' +
                    (25 + 70 * Math.random()) + '%,' + 
                    (85 + 10 * Math.random()) + '%)'
        },

        toogleFormEdition () {
            this.dom.form.placeholder = "Votre grigri"
            this.dom.form.isTextAreaDisabled = true
        },

        displayGeneratorAlert(action) {
            this.dom.alert.message = `Action ${action} impossible ! Veuillez soumettre une proposition avant`
            alert = document.querySelector('#generator-error')
            alert.style.display = 'block';
            
            setTimeout(() => {
                alert.style.display = 'none';
            }, 1000)
        },

        displaySubmitToast(code) {
            let toastNode = document.querySelector("#generator-submit")
            let toast = new Toast(toastNode)

            switch (code) {
                case 201:
                    this.dom.toast.message = "Merci ! Soumission acceptée"
                    this.dom.toast.class = "text-success"
                    toast.show()
                    break;
                case 422:
                    this.dom.toast.message = "Aie ! Soumission impossible"
                    this.dom.toast.class = "text-warning"
                    toast.show()
                    break;
                case 429:
                    this.dom.toast.message = "Doucement ! Attend un peu avant de recommencer"
                    this.dom.toast.class = "text-warning"
                    toast.show()
                    break;
                case 500:
                    this.dom.toast.message = "Oupss ! Une erreur est survenue"
                    this.dom.toast.class = "text-error"
                    toast.show()
            }
        },

        // "Private" methods
        getRandomItem(type, array) {
            let item = array[Math.floor(Math.random() * array.length)];
            this.answer[type][0] = item.id;

            console.log(` test : ${item.content}`)
            return item.content;
        },

        getElementContent (type) {
            let id = this.answer[type][0];

            if (typeof id !== "undefined") {
                let element = this.choices[type + 's'].find(el => el.id == id);
                return element.content
            }

            return ''
        },

        resetAnswers() {
            this.answer.adverb = []
            this.answer.adjective = []
            this.answer.situation = []
            this.answer.objective = []

            this.sentence = ""
        },

        async generateSVGfromDOM() {
            let container = document.createElement('div');
            container.id = 'story-container'

            let storyNode = document.getElementById('story-content')

            function filter (node) {
                return (node.tagName !== 'i');
            }

            await domConvertor.toSvg(storyNode, {filter: filter})
                .then((dataURL) => {
                    let svgTag = dataURL.search('<svg ')
                    localStorage.setItem('story', dataURL.slice(svgTag))
                })
                .catch((err) => {
                    console.error('oops, something went wrong!', err);
                })
        },

        async parseContribution() {
            let feelingPart = 'ce que je trouve'
            let feelingIdx = this.sentence.search(feelingPart)

            let situationPart = `, c'est quand `
            let situationIdx = this.sentence.search(situationPart)

            let objectivePart = `Du coup, pour `
            let objectiveIdx = this.sentence.search(objectivePart)

            let feelings = ((this.sentence.slice(feelingIdx + feelingPart.length, situationIdx)).trim()).split(" ")

            if (feelings.length != 2) {
                console.error('Feeling : error on length')
                return
            }

            let adverb = feelings[0].trim()
            let adjective = feelings[1].trim()

            let situation = (this.sentence.slice(situationIdx + situationPart.length, objectiveIdx)).trim()

            if (!situation.endsWith('.')) {
                solution += '.'
            }

            let status = ((this.sentence.slice(objectiveIdx + objectivePart.length)).trim()).split(',')

            if (status.length != 2) {
                console.error('Status : error on length')
                return
            }

            let objective = status[0].trim()
            let solution = status[1].trim()

            if (!solution.endsWith('.')) {
                solution += '.'
            }

            let parts = {
                'adverb': {
                    content: adverb
                },
                'adjective': {
                    content: adjective
                },
                'situation': {
                    content: situation
                },
                'objective': {
                    content: objective
                },
                'solution': {
                    content: solution
                }
            }

            await this.submitAContribution(parts)

        }
    }
}
</script>

<style>

</style>