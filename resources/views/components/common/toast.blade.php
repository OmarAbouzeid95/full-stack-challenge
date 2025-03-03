<div 
    x-show="showToast"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="transform translate-y-8 opacity-0"
    x-transition:enter-end="transform translate-y-0 opacity-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="transform translate-y-0 opacity-100"
    x-transition:leave-end="transform translate-y-8 opacity-0"
    class="fixed bottom-4 right-4 bg-green-500 text-white text-[0.95rem] px-4 py-2 rounded-lg shadow-lg z-50"
  >
  <div class="flex items-center">
    <i data-lucide="circle-check" class="w-5 h-5 text-white mr-2"></i>
    <span x-text="toastMessage"></span>
  </div>
</div>