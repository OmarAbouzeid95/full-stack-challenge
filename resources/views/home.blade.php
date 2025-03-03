
@extends('layout')

@section('content')
  <section class="py-26 px-6 flex items-center justify-center">
    <div class="animate-fade-in">
      <h1 class="font-bold text-5xl mx-auto text-center mb-12">Welcome to <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">WiseJobs</span></h1>
      <p class="text-xl max-w-lg mb-8 text-text-light-secondary dark:text-text-dark-secondary text-center">Find your dream job from top companies or discover talented candidates who can help your business grow.</p>
      <a href="/jobs" class="block mx-auto w-fit bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 text-white rounded-full px-6 py-4 text-xl">Job Listings</a>
    </div> 
  </section>
@endsection