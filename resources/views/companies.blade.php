

@extends('layout')


@section('content')

<section class="min-h-screen px-6 lg:px-0 py-24 max-w-md md:max-w-3xl lg:max-w-5xl mx-auto text-base md:text-lg" x-data="companies">


  <h1 class="font-bold text-2xl mb-10">Browse WiseJobs Companies</h1>

  @include('components.common.errorMessage')

  <template x-if="loading">
    <div class="w-full h-full flex items-center justify-center">
        <i data-lucide="loader-circle" class="block w-14 h-14 text-3xl animate-spin infinite"></i>
    </div>
  </template>

  <template x-if="!loading && !error && companies.length > 0">
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
      <template x-for="company in companies" :key="company.id" >
        @include('components.cards.companyCard')
      </template>
    </div>
  </template>
</section>

@endsection('content')