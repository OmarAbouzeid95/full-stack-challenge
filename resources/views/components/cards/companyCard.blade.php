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