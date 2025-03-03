

@extends('layout')


@section('content')

<section class="py-26 px-6 flex items-center justify-center">
  <div>
    <h1 class="font-bold text-4xl mx-auto text-center mb-12">404</h1>
    <p class="text-xl max-w-lg mb-8 text-text-light-secondary dark:text-text-dark-secondary text-center">Oops, the page you're looking for doesn't exist</p>
    <a href="/jobs" class="block mx-auto w-fit bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 text-transparent bg-clip-text text-xl">View Job Listings</a>
  </div> 
</section>

@endsection
