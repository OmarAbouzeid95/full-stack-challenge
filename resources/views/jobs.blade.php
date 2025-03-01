
@extends('layout')

@section('content')

  <section class="px-6 lg:px-0 py-24 max-w-md md:max-w-3xl lg:max-w-5xl mx-auto text-base md:text-lg" x-data="{
    init() {
        axios.get('/api/job-postings').then((res) => {
            this.jobs = res.data.data;
            this.pageNumber++;
        });
    },
    pageNumber: 1,
    jobs: [],
}">
      <h1 class="font-bold text-2xl mb-12">Search Jobs</h1>

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
                src="https://www.reshot.com/preview-assets/icons/UKWGS8QJBT/pinterest-UKWGS8QJBT.svg"
                alt="some alt"
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
  </section>

@endsection