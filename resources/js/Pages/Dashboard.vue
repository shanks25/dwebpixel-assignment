<script setup lang="ts">
import Hero from "@/Components/Dashboard/Hero.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Icon from "@/Components/Icon.vue";

// Define props to accept jobs data
defineProps({
  jobs: Array, // Accept jobs data as an array
});

function formatDate(date: string): string {
  const createdAt = new Date(date);
  const now = new Date();
  const diffInSeconds = Math.floor(
    (now.getTime() - createdAt.getTime()) / 1000
  );

  if (diffInSeconds < 60) {
    return "less than a minute ago";
  }
  const diffInMinutes = Math.floor(diffInSeconds / 60);
  if (diffInMinutes < 2) {
    return `${diffInMinutes} minute ago`;
  }
  if (diffInMinutes < 60) {
    return `${diffInMinutes} minutes ago`;
  }
  const diffInHours = Math.floor(diffInMinutes / 60);
  if (diffInHours < 24) {
    return `${diffInHours} hours ago`;
  }
  const diffInDays = Math.floor(diffInHours / 24);
  return `${diffInDays} days ago`;
}
</script>

<template>

  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <!-- Hero -->
    <Hero />

    <!-- Job List -->
    <div class="bg-white">
      <div class="container p-5">
        <!-- TODO: Add job list here -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div v-for="job in jobs" :key="job.id"
            class="bg-white rounded-xl border shadow-md p-5 flex flex-col justify-between jobCard">
            <div class="flex flex-col gap-2">
              <div class="grid grid-cols-12">
                <div class="col-span-2">
                  <img v-bind:src="job.company_logo" alt="Event image" class="w-full h-10 md:h-20 pr-2 rounded-md">
                </div>
                <div class="col-span-6">
                  <h3 class="text-lg font-semibold">{{ job.title }}</h3>
                  <p class="text-gray-500 text-sm">{{ job.company_name }}</p>
                </div>
                <div class="col-span-4">
                  <!-- Loop over extra info array -->
                  <span v-for="(skill, index) in job.skills" :key="index"
                    class="inline-block bg-gray-300 rounded mx-1 px-2 py-0.5 text-xs font-semibold text-gray-800">
                    {{ skill.name }}


                  </span>
                </div>
              </div>

              <div class="flex gap-4 mb-2 text-gray-500 text-sm">
                <span class="border-r border-gray-300 pr-3 inline-flex">
                  <Icon :name="'briefcase'" class="size-4 mr-1" />
                  {{ job.experience }}
                </span>
                <span class="border-r pr-3 inline-flex">
                  <Icon :name="'rupee'" class="size-4 mr-1" />
                  {{ job.salary }}
                </span>
                <span class="inline-flex">
                  <Icon :name="'location'" class="size-4 mr-1" />
                  {{ job.location }}
                </span>
              </div>
              <div class="flex items-start gap-2 text-gray-600 text-sm">
                <Icon :name="'file'" class="size-4 flex-shrink-0 mt-0.5" />
                <span class="truncate-2-lines flex-1">
                  {{ job.description }}
                </span>
              </div>
              <div class="flex gap-2 mt-2">
                <!-- Loop over job skills -->
                <span v-for="(info, index) in job.extra_info.split(',')" :key="index"
                  class="inline-block px-1 py-0.5 text-xs font-medium text-gray-700">{{ info
                  }}</span>

              </div>
              <p class="text-gray-500 text-end text-sm mt-2">
                {{ formatDate(job.created_at) }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>
.truncate-2-lines {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  /* Show only 2 lines */
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
  /* Show ellipsis when text overflows */
}
</style>