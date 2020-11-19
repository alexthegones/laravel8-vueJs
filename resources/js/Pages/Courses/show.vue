<template>
    <app-layout>
        <template #header>{{ course.title }}</template>
        <div class="py-6">
            <iframe class="w-full h-screen" :src="course.episodes[this.currentKey].video_url" frameborder="0"></iframe>
            <div class="text-sm text-gray-500">{{ course.episodes[this.currentKey].description }}</div>
            <div class="mt-6 bg-gray-200 rounded shadow">
                <h3>Episodes :</h3>
                <ul v-for="(episode, index) in this.course.episodes">
                    <li class="mt-3">{{ episode.title }}
                        <button class="text-gray-500 focus:text-indigo-500 focus:outline-none" @click="switchEpisode(index)">Voir l'épisode
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
    components: {
        AppLayout

    },

    props: ['course'],

    data() {
        return {
            courseShow: this.course,
            currentKey: 0
        }
    },

    methods: {
        switchEpisode(index) {
            this.currentKey = index;

            window.scrollTo({
                top: 0,
                left: 0,
                behavior: 'smooth'
            });
        }
    },
    mounted() {
        // console.log(this.courses);
    }
}
</script>
