

@extends('layout')


@section('content')

<section class="px-6 lg:px-0 py-24 max-w-md md:max-w-3xl lg:max-w-5xl mx-auto text-base md:text-lg" x-data="companies">


  <h1 class="font-bold text-2xl mb-10">Browse WiseJobs Companies</h1>

  <template x-if="error">
    <h1 class="text-xl text-center">Oops, Something went wrong please try again.</h1>
  </template>

  <template x-if="loading">
    <div class="w-full h-full flex items-center justify-center">
        <i data-lucide="loader-circle" class="block w-14 h-14 text-3xl animate-spin infinite"></i>
    </div>
  </template>

  <template x-if="!loading && !error && companies.length > 0">
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
      <template x-for="company in companies" :key="company.id" >
        <a
          :href="`company/${company.id}`"
          class="flex flex-col px-4 py-6 bg-light-secondary dark:bg-dark-secondary border-gray-50 dark:border-gray-200 rounded-md hover:shadow-md hover:dark:shadow-[#3b1f28] hover:dark:shadow-md transition-all duration-200 max-w-md md:max-w-sm lg:max-w-lg"
        > 
          <div class="flex items-center gap-4 mb-4">
            <img 
              class="w-12 aspect-square rounded-md"
              :src="company.logo"
              :alt="`${company.name}'s logo`"
            />
            <div>
              <h3 x-text="company.name" class="font-bold text-lg"></h3>
            </div>
          </div>
          <p x-text="company.about.slice(0,150)" class="mb-2 text-sm"></p>
        </a>
      </template>
    </div>
  </template>
</section>

@endsection('content')