<template>
    <app-layout>
        <template #header>Liste des formations</template>
        <div class="py-6" v-for="course in courses">
            <div class="mx-8 bg-gray-200 rounded shadow p-3">
                <div class="text-sm text-gray-500">Mise en ligne par {{ course.user.name }}</div>
                <div class="flex justify-between items-center">
                    <div class="text-4xl">{{ course.title }}</div>
                    <div class="text-sm">{{ course.episodes_count }} épisodes</div>
                </div>
                <div class="text-sm text-gray-500">{{ course.description }}</div>
                <a :href="'course/' + course.id" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-3 inline-block">Voir la formation</a>
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

    props: ['courses'],

    data() {
        return {
            courses: this.courses
        }
    },

    mounted() {
        console.log(this.courses);
    }
}
</script>
