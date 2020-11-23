<template>
    <app-layout>
        <template #header>{{ course.title }}</template>
        <div class="py-6">
            <iframe class="w-full h-screen p-7" :src="course.episodes[this.currentKey].video_url" frameborder="0"></iframe>
            <div class="text-sm text-gray-500">{{ course.episodes[this.currentKey].description }}</div>
            <div class="py-6">
                <progress-bar v-bind:watched-episodes="watched" :episodes="course.episodes"></progress-bar>
            </div>
            <div class="mt-6 bg-gray-200 p-6 rounded shadow">
                <h3>Episodes :</h3>
                <ul v-for="(episode, index) in this.course.episodes">
                    <li class="mt-3 flex justify-between items-center">
                        <div>
                            {{ episode.title }}
                            <button class="text-gray-500 focus:text-indigo-500 focus:outline-none"
                                    @click="switchEpisode(index)">Voir l'épisode
                            </button>
                        </div>
                        <progress-btn :episode-id="episode.id" :watched-episode="watched"></progress-btn>
                    </li>
                </ul>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import progressBtn from "@/Pages/Courses/progressBtn";
import progressBar from "@/Pages/Courses/progressBar";

export default {
    components: {
        AppLayout,
        progressBtn,
        progressBar
    },

    props: ['course', 'watched'],

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
