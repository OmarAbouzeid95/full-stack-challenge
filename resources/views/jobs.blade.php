
@extends('layout')

@section('content')

  <section class="px-6 lg:px-0 py-24 max-w-md md:max-w-3xl lg:max-w-5xl mx-auto text-base md:text-lg" x-data="jobs">
      <div class="flex justify-between items-center mb-8">
      <h1 class="font-bold text-2xl">Browse Latest Jobs</h1>
      <div>
      <span @click.prevent="toggleFilters"><i data-lucide="filter" x-show="!showFilters" x-cloak class="w-8 h-8 text-text-light-primary dark:text-text-dark-primary"></i></span>
      <span @click.prevent="toggleFilters"><i data-lucide="filter-x" x-show="showFilters" x-cloak class="w-8 h-8 text-text-light-primary dark:text-text-dark-primary"></i></span>
      </div>
      </div>

      <!-- search form -->
      <form class="mb-12 block text-md" @submit.prevent="filter" x-show="showFilters" x-cloak>
          <div class="md:flex md:items-center gap-4">
            <div class="mb-2 flex-grow">
              <label for="filter" class="block mb-2">Filter Jobs</label>
              <input name="filter" type="text" x-model="search" placeholder="e.g. Software Engineer" class="w-full px-2 py-1 rounded-md border border-gray-600 focus:outline-none text-text-light-secondary dark:text-text-dark-secondary">
            </div>
            <div class="mb-2 flex-grow">
              <label for="location" class="block mb-2">Location</label>
              <input name="location" type="text" x-model="location" placeholder="e.g. Toronto" class="w-full px-2 py-1 rounded-md border border-gray-600 focus:outline-none text-text-light-secondary dark:text-text-dark-secondary">
            </div>
          </div>
          <div class="flex w-full items-center gap-4">
            <div class="flex-grow">
                <label for="type" class="block mb-2">Type</label>
                <select name="type" x-model="type" class="w-full px-2 py-1 rounded-md border border-gray-600 focus:outline-none text-text-light-secondary dark:text-text-dark-secondary">
                  <option value="">Select Type</option>
                  <template x-for="type in jobTypes">
                    <option :value="type" x-text="type"></option>
                  </template>
                </select>
              </div>
            <div class="flex-grow">
              <label for="salary" class="block mb-2">Salary</label>
              <select name="salary" x-model="salary" class="w-full px-2 py-1 rounded-md border border-gray-600 focus:outline-none text-text-light-secondary dark:text-text-dark-secondary">
                <option value="">Salary Range</option>
                <template x-for="salary in salaries">
                  <option :value="salary" x-text="salary"></option>
                </template>
              </select>
            </div>
          </div>
          <input type="submit" value="Search" class="block mt-6 w-full md:w-[25%] px-4 py-2 text-white rounded-md bg-blue-500 hover:cursor-pointer"/>
      </form>

      <template x-if="error">
        <h1 class="text-xl text-center">Oops, Something went wrong please try again.</h1>
      </template>

      <template x-if="loading">
        <div class="w-full h-full flex items-center justify-center">
            <i data-lucide="loader-circle" class="block w-14 h-14 text-3xl animate-spin infinite"></i>
        </div>
      </template>

      <template x-if="!loading && !error">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
          <template x-for="job in jobs" :key="job.id" >
            <a
              :href="`jobs/${job.id}`"
              class="flex flex-col px-4 py-6 bg-light-secondary dark:bg-dark-secondary border-gray-50 dark:border-gray-200 rounded-md hover:shadow-md hover:dark:shadow-[#3b1f28] hover:dark:shadow-md transition-all duration-200 max-w-md md:max-w-sm lg:max-w-lg"
            > 
              <div class="flex items-center gap-4 mb-4">
                <img 
                  loading="lazy"
                  class="w-12 aspect-square rounded-md"
                  :src="job.company.logo"
                  :alt="`${job.company.name}'s logo`"
                />
                <div>
                  <h3 x-text="job.title" class="font-bold text-lg"></h3>
                  <h4 x-text="job.company.name" class="text-text-light-secondary dark:text-text-dark-secondary text-sm"></h4>
                </div>
              </div>
              <p x-text="job.description.slice(0,150)" class="mb-2 text-sm"></p>
              <div class="mt-6 justify-self-end flex items-center gap-4 text-xs sm:text-sm text-text-light-secondary dark:text-text-dark-primary">
                  <p class="bg-white dark:bg-dark-primary h-fit px-3 py-1 rounded-full">$<span x-text="job.salary"></span></p>
                  <p x-text="job.location" class="bg-white dark:bg-dark-primary h-fit py-1 px-3 rounded-full"></p>
                  <p x-text="job.type" class="bg-white dark:bg-dark-primary h-fit py-1 px-3 rounded-full"></p>
              </div>
            </a>
          </template>
        </div>
      </template>
  </section>

@endsection