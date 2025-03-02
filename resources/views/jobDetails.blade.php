
@extends('layout')


@section('content')

  <section class="px-6 lg:px-0 py-24 max-w-md md:max-w-3xl mx-auto text-base md:text-lg" x-data="{
    init() {
      const id = window.location.href.split('/').pop();
      const urlParams = new URLSearchParams(window.location.search);
      if(urlParams.get('edit')) {
        this.editable = true
      }
      axios.get(`/api/job-postings/${id}`)
      .then(res => {
        this.job = res.data;
      })
      .catch(error => {
        this.error = error;
      })
      .finally(() => {
        this.loading = false
      })
    },
      displayToast(message) {
      this.toastMessage = message;
      this.showToast = true;
      
      setTimeout(() => {
      this.showToast = false;
      }, 2000);
    },
    showToast: false,
    toastMessage: '',
    loading: true,
    editable: false,
    job: {},
    error: undefined
  }">
    <template x-if="error">
      <h1 class="text-xl text-center">Oops, looks like this job doesn't exist or has been removed.</h1>
    </template>

    <template x-if="loading">
      <div>
        @include('components.common.loader')
      </div>
    </template>


    <template x-if="!loading && !error">
      <div>
        <div class="flex items-center gap-6 mb-4">
          <img 
            loading="lazy"
            class="w-12 aspect-square rounded-md"
            :src="job.company.logo"
            :alt="`${job.company.name}'s logo`"
          />
          <template x-if="!editable">
            <h3 class="font-bold text-md" x-text="job.company.name"></h3>
          </template>
          <template x-if="editable">
          <input class="text-md font-bold pr-2 border border-gray-500 rounded-md p-2" :value="job.title"></input>
          </template>
        </div>
        <h4 class="text-text-light-secondary dark:text-text-dark-secondary text-xl font-bold mb-4" x-text="job.title"></h4>
        <div class="flex items-center gap-2 text-text-light-secondary dark:text-text-dark-secondary my-4">
        <template x-if="!editable">
          <p class="text-sm pr-2 border-r border-[#364153] dark:border-[#dadada]" x-text="job.location"></p>
        </template>
        <template x-if="editable">
          <input class="text-sm pr-2 border border-gray-500 rounded-md p-2" :value="job.location"></input>
        </template>
        <template x-if="!editable">
          <p class="text-sm" x-text="job.type"></p>
        </template>
        <template x-if="editable">
          <select class="text-sm pr-2 border border-gray-500 rounded-md p-2" :value="job.type">
            <option >Remote</option>
            <option >Hybrid</option>
            <option >In-person</option>
          </select>
        </template>
        </div>

          <button class="bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 px-6 py-2 rounded-full text-white" x-text="editable ? 'Save' : 'Apply'" @click="editable ? displayToast('Job post updated successfully') : displayToast('Applied successfully')">
          </button>

        <article class="mt-12">
          <h4 class="font-bold text-2xl mb-4">Job Description</h4>
          <template x-if="!editable">
            <p x-text="job.description.repeat(10)"></p>
          </template>
          <template x-if="editable">
          <textArea :value="job.description.repeat(10)" class="w-full border border-gray-500 rounded-md p-2 min-h-72"></textArea>
        </template>  
        </article>
      </div>
    </template>

    <div 
      x-show="showToast"
      x-cloak
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="transform translate-y-8 opacity-0"
      x-transition:enter-end="transform translate-y-0 opacity-100"
      x-transition:leave="transition ease-in duration-300"
      x-transition:leave-start="transform translate-y-0 opacity-100"
      x-transition:leave-end="transform translate-y-8 opacity-0"
      class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50"
    >
    <div class="flex items-center">
      <i data-lucide="circle-check" class="w-5 h-5 text-white mr-2"></i>
      <span x-text="toastMessage"></span>
    </div>
  </div>
  </section>

@endsection