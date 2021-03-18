<template>
    <div class="row justify-content-md-center">
        <div class="col-md-7 col-lg-8">
            
            <form class="needs-validation" novalidate>
                <div class="row justify-content-md-center g-3">

                    <div class="col-12">
                        <h2 class="text-center"> Ce que je trouve</h2>
                    </div>

                    <div class="col-5">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="col-5">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <h4 class="text-center">C'est quand</h4>
                    </div>

                    <div class="col-8">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                     <div class="col-12">
                        <h4 class="text-center">Du coup, pour</h4>
                    </div>

                    <div class="col-3">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="col-7">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>
    
</template>

<script>
export default {
    props: ['adverbs', 'adjectives', 'situations', 'situations', 'solutions'],

    data () {
        return {
            sentence: '',
            selectedAdverb: '',
            adverbs: [],
        }
    },

    methods: {
        createSentence(adverb, adjective, situation, objective, solution) {
            return  `Ce que je trouve ${adverb} ${adjective}, 
                c'est quand ${situation}.
                Du coup, pour ${objective}, ${solution}`;
        }
    },

    render () {
        
    }
}
</script>