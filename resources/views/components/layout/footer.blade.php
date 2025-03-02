<footer class="bg-light-secondary dark:bg-dark-secondary py-10" x-data="nav">
  <div class="max-w-5xl mx-auto p-6 lg:px-0">
    <div class="w-full flex justify-between items-center mb-6">
      <h2 class="font-bold text-2xl">WiseJobs</h2>
    </div>
    <div class="flex flex-col md:flex-row md:gap-6 items-start gap-2 pb-6 border-b border-b-gray-600">
      <template x-for="link in links" :key="link.href">
            <a 
            :href="link.href"
            class="text-lg"
            x-text="link.name">
            </a>
          </template>
    </div>
    <p class="text-sm pt-8 md:text-center">
      Copyright © 2025 wisejobs.com
    </p>
  </div>
</footer>