<template>
    <div>
        <select name="" id="" v-model="selectedAdverb">
            <option v-for="abverb in abverbs" v-bind:key v-bind:value="abverb.id">
                {{ adverb.content }}
            </option>
        </select>
            
        <select name="" id="" v-model="selectedAdjective"></select>
        <select name="" id="" v-model="selectedSituation"></select>
        <select name="" id="" v-model="selectedObjective"></select>

    </div>
    
</template>

<script>
export default {
    inject: ['provider'],
    props: ['id', 'story'],

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
        // Since the parent canvas has to mount first, it's *possible* that the context may not be
        // injected by the time this render function runs the first time.
        if(!this.provider.context) return;
        const ctx = this.provider.context;

        // Keep a reference to the box used in the previous render call.
        const oldBox = this.oldBox
        // Calculate the new box. (Computed properties update on-demand.)
        const newBox = this.calculatedBox

        ctx.beginPath();
        // Clear the old area from the previous render.
        ctx.clearRect(oldBox.x, oldBox.y, oldBox.w, oldBox.h);
        // Clear the area for the text.
        ctx.clearRect(newBox.x, newBox.y - 42, newBox.w, 100);

        // Draw the new rectangle.
        ctx.rect(newBox.x, newBox.y, newBox.w, newBox.h);
        ctx.fillStyle = this.color;
        ctx.fill();

        // Draw the text
        ctx.fillStyle = '#000'
        ctx.font = '28px sans-serif';
        ctx.textAlign = 'center';
        ctx.fillText(Math.floor(this.value), (newBox.x + (newBox.w / 2)), newBox.y - 14)
    }
}
</script>