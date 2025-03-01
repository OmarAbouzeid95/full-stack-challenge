  <nav
    x-data="nav"
    class=
      "shadow-md fixed top-0 left-0 right-0 bg-light-primary dark:bg-dark-primary z-50">
    <div class="relative flex items-center justify-between h-16 px-6 lg:px-0 max-w-5xl mx-auto">
      <h2 class="font-bold text-2xl">WiseJobs</h2>
      <div class="absolute flex items-center gap-4 z-50 right-4 lg:hidden">
        <span @click="$store.global.toggleTheme()" class="text-gray-100 hover:cursor-pointer" x-show="$store.global.theme === 'dark'"><i data-lucide="moon"></i></span>
        <span @click="$store.global.toggleTheme()" class="text-gray-950 hover:cursor-pointer" x-show="$store.global.theme !== 'dark'"><i data-lucide="sun"></i></span>
        <div class="menu-icon">
          <input
            class="menu-icon__cheeckbox"
            type="checkbox"
            :checked="open"
            @click="toggle"
          />
          <div>
            <span class="bg-gray-950 dark:bg-gray-100"></span>
            <span class="bg-gray-950 dark:bg-gray-100"></span>
          </div>
        </div>
      </div>
      <div class="hidden lg:flex lg:items-center gap-8">
          <span @click="$store.global.toggleTheme()" class="text-gray-100 hover:cursor-pointer" x-show="$store.global.theme === 'dark'"><i data-lucide="moon"></i></span>
          <span @click="$store.global.toggleTheme()" class="text-gray-950 hover:cursor-pointer" x-show="$store.global.theme !== 'dark'"><i data-lucide="sun"></i></span>
          <template x-for="link in links" :key="link.href">
            <a 
            :href="link.href"
            class="text-lg"
            x-text="link.name">
            </a>
          </template>
      </div>
    </div>
    <!-- menu overlay -->
    <div
      x-show="open"
      x-cloak
      class="fixed z-10 inset-0 bg-black/30 bg-opacity-50 transition-opacity"
      @click="toggle"></div>
    <!-- nav menu -->
    <div
      class="fixed z-40 inset-y-0 right-0 w-[60%] md:w-[40%] transform bg-light-primary dark:bg-dark-primary"
      x-cloak
      x-show="open"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="transform translate-x-full"
      x-transition:enter-end="transform translate-x-0"
      x-transition:leave="transition ease-in duration-300"
      x-transition:leave-start="transform translate-x-0"
      x-transition:leave-end="transform translate-x-full"
      >
      <div class="flex items-center justify-between h-16 px-6 shadow-md"></div>
        <!-- menu items -->
        <template class="p-6 h-full flex flex-col gap-6" x-for="link in links" :key="link.href">
            <a 
              :href="link.href"
              class="text-lg border-red-500"
              x-text="link.name">
            </a>
          </template>
        </template>
    </div>
  </nav>