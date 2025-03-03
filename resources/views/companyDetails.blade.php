

@extends('layout')



@section('content')

<section class="min-h-screen px-6 lg:px-0 py-24 max-w-md md:max-w-3xl mx-auto text-base md:text-lg" x-data="{
  init() {
    this.loading = true;
    const id = window.location.href.split('/').pop();
    axios.get(`/api/companies/${id}`)
    .then(res => {
      this.company = res.data;
    })
    .catch(error => {
      this.error = error;
    })
    .finally(() => {
      this.loading = false
    })
  },
  enableEditing() {
    this.editing = true;
  },
  displayToast(message) {
      this.editing = false;
      this.toastMessage = message;
      this.showToast = true;

      setTimeout(() => {
          this.showToast = false;
      }, 2000);
  },
  showToast: false,
  toastMessage: '',
  loading: false,
  company: {},
  error: undefined,
  editing: true,
}">
  <template x-if="error">
    <h1 class="text-xl text-center">Oops, looks like this company doesn't exist or has been removed.</h1>
  </template>

  <template x-if="loading">
    <div>
      @include('components.common.loader')
    </div>
  </template>


  <template x-if="!loading && !error">
    <div>
      <div class="flex items-center justify-between gap-6 mb-4">
        <img 
          loading="lazy"
          class="w-12 aspect-square rounded-md"
          :src="company.logo"
          :alt="`${company.name}'s logo`"
        />
        <button class="bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 px-6 py-2 rounded-full text-white" @click="editing ? displayToast('Company details updated') : enableEditing" x-text="editing ? 'Save' : 'Edit'">
      </button>
      </div>
      <template x-if="!editing">
        <h3 class="font-bold text-xl text-md" x-text="company.name"></h3>
      </template>
      <template x-if="editing">
        <input class="font-bold text-xl text-md p-2 border border-gray-500 rounded-md" :value="company.name" />
      </template>
      <article class="mt-12">
        <h4 class="font-bold text-2xl mb-4">About</h4>
        <template x-if="!editing">
          <p x-text="company.about.repeat(3)"></p>
        </template>
        <template x-if="editing">
          <textArea :value="company.about.repeat(3)" class="w-full border border-gray-500 rounded-md p-2 min-h-44"></textArea>
        </template>  
      </article>
      <h4 class="font-bold text-2xl mt-10 mb-4" x-text="`Openings at ${company.name}`"></h4>
      <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <template x-for="job in company.job_postings" :key="job.id" >
            <a
              :href="`jobs/${job.id}`"
              class="flex flex-col px-4 py-6 bg-light-secondary dark:bg-dark-secondary border-gray-50 dark:border-gray-200 rounded-md hover:shadow-md hover:dark:shadow-[#3b1f28] hover:dark:shadow-md transition-all duration-200 max-w-md md:max-w-sm lg:max-w-lg"
            > 
              <div class="flex items-center gap-4 mb-4">
                <img 
                  class="w-12 aspect-square rounded-md"
                  :src="company.logo"
                  :alt="`${company.name}'s logo`"
                />
                <div>
                  <h3 x-text="job.title" class="font-bold text-lg"></h3>
                  <h4 x-text="company.name" class="text-text-light-secondary dark:text-text-dark-secondary text-sm"></h4>
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
    </div>
  </template>
  
  @include('components.common.toast')
</section>

@endsection()