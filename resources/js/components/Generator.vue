<template>
<div class="container">
        <section id="QCM">
                <div class="col-md-12 col-lg-12">
                    <div class="row justify-content-md-center">
                        <h2>Générateur</h2>
                        <p class="lead">Générer des phrases pour lutter contre les espaces insoutenables</p>
                    </div>
                    <hr class="my-4"></hr>
                    <form class="needs-validation" novalidate>
                        <div class="row justify-content-md-start g-3">
                            <div class="col-2">
                                <h4 class="row align-items-start"> Ce que je trouve :</h4>
                            </div>
                            <div class="col-5">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Choisir un adverbe</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Autre</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Choisir une situation</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Autre</option>
                                </select>
                            </div>

                            <div class="col-2 justify-content-strat">
                                <h4 class="row align-items-start">C'est quand : </h4>
                            </div>
                            <div class="col-10">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Choisir un complément</option>
                                    <option value="1">Rien</option>
                                    <option value="2">One</option>
                                    <option value="3">Two</option>
                                    <option value="4">Three</option>
                                    <option value="5">Autre</option>
                                </select>
                            </div>

                            <div class="col-2 justify-content-strat">
                                <h4 class="row align-items-start">Du coup, pour :</h4>
                            </div>

                            <div class="col-5">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Choisir une raison</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Autre</option>
                                </select>
                            </div>

                            <div class="col-5">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Choisir une solution</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Autre</option>
                                </select>
                            </div>
                        </div>
                    <hr class="my-4"></hr>
                    <button class="btn btn-primary btn-lg" type="submit">Générer ma phrase</button>
                    </form>
                </div>
        </section>     
</div>
</template>

<script>
import Story from './Story.vue'

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
    },

    components: {
        Story
    }
}
</script>

<style>

</style>