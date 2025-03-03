
@extends('layout')

@section('content')

  <section class="min-h-screen px-6 lg:px-0 py-24 max-w-md md:max-w-3xl lg:max-w-5xl mx-auto text-base md:text-lg" x-data="jobs">
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
          <input type="submit" value="Search" class="block mt-6 w-full md:w-[25%] px-4 py-2 text-white rounded-md bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 hover:cursor-pointer"/>
      </form>

      @include('components.common.errorMessage')

      <template x-if="jobs.length === 0 && !loading">
        <h1 class="text-xl text-center">Oops, We couldn't find anything that matches your search.</h1>
      </template>


      <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <!-- skeleton loaders -->
        <!-- <template x-show="isLoading" x-for="item in salaries" :key="item">
          <div class="h-[228px] md:h-[260px] lg:h-[232px] px-4 py-6 bg-gray-200 dark:bg-dark-secondary border-gray-50 dark:border-gray-200 rounded-md hover:shadow-md hover:dark:shadow-[#3b1f28] hover:dark:shadow-md transition-all duration-200 max-w-md md:max-w-sm lg:max-w-lg animate-pulse">
          </div>
        </template> -->
        <!-- actual content -->
          <template x-show="jobs.length > 0" x-for="job in jobs" :key="job.id" >
            @include('components.cards.jobCard')
          </template>
      </div>

      <div x-intersect:enter="fetchJobs()"></div>
  </section>

@endsection