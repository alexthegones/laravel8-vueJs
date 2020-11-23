<template>
    <div>
        <div class="bg-gray-200 p-8 w-full rounded">
            <h3>Progression:</h3>
            <div class="bg-green-500 text-white rounded text-center transition-width duration-500"
                 v-bind:style="'width:' + pourcentage + '%' ">{{
                pourcentage
                }} %
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['watchedEpisodes', 'episodes'],

    data() {
        return {
            watchedEpisode: this.watchedEpisodes
        }
    },

    computed: {
        pourcentage() {
            let filteredEpisode = this.episodes.filter(courseEp => {
                return this.watchedEpisode.find(watchedEp => {
                    return watchedEp.id === courseEp.id
                })

            })
            return Math.ceil(filteredEpisode.length / this.episodes.length * 100);
        }
    },
    mounted() {
        eventBus.$on('progress', data => this.watchedEpisode = data);
    }
}
</script>
