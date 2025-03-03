<a
  :href="`jobs/${job.id}`"
  class="flex flex-col px-4 py-6 bg-light-secondary dark:bg-dark-secondary border-gray-50 dark:border-gray-200 rounded-md hover:shadow-md hover:dark:shadow-[#3b1f28] hover:dark:shadow-md transition-all duration-200 max-w-md md:max-w-sm lg:max-w-lg"
> 
  <div class="flex items-center gap-4 mb-4">
    <img 
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