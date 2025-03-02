
@extends('layout')


@section('content')

  <section class="px-6 lg:px-0 py-24 max-w-md md:max-w-3xl mx-auto text-base md:text-lg" x-data="{
    init() {
      const id = window.location.href.split('/').pop();
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
    loading: true,
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
          <h3 class="font-bold text-md" x-text="job.company.name"></h3>
        </div>
        <h4 class="text-text-light-secondary dark:text-text-dark-secondary text-xl font-bold mb-4" x-text="job.title"></h4>
        <div class="flex items-center gap-2 text-text-light-secondary dark:text-text-dark-secondary my-4">
          <p class="text-sm pr-2 border-r border-[#364153] dark:border-[#dadada]" x-text="job.location"></p>
          <p class="text-sm" x-text="job.type"></p>
        </div>
        <div class="flex items-center gap-4 my-4">
          <button class="bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 px-6 py-2 rounded-full text-white">
            Apply
          </button>
        </div>
        <article class="mt-12">
          <h4 class="font-bold text-2xl mb-4">Job Description</h4>
          <p x-text="job.description.repeat(10)"></p>
        </article>
      </div>
    </template>
  </section>

@endsection