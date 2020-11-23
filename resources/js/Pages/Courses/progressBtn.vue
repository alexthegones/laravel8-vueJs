<template>
    <div>
        <button class="bg-green-500 px-2 py-2 text-white rounded" @click="toggleProgress()" v-bind:class="classObject">
            {{ this.isWatchedEp ? 'Terminé' : 'Continuer ?' }}
        </button>
    </div>
</template>

<script>
export default {
    props: ['episodeId', 'watchedEpisode'],

    data() {
        return {
            watchedEp: this.watchedEpisode,
            isWatchedEp: false
        }
    },

    methods:
        {
            toggleProgress() {
                axios.post('/progress', {
                    episodeId: this.episodeId
                })
                    .then(response => {
                        if (response.status === 200) {
                            this.isWatchedEp = !this.isWatchedEp
                            eventBus.$emit('progress', response.data)
                        }
                    })
                    .catch(error => console.log(error));
            },
            isWatched() {
                return !!this.watchedEpisode.find(element => element.id === this.episodeId);
            }
        },
    computed:
        {
            classObject: function () {
                 return this.isWatchedEp ? 'bg-green-500' : 'bg-blue-500';
            }

        },
    mounted() {
        this.isWatchedEp = this.isWatched();
    }
}
</script>
