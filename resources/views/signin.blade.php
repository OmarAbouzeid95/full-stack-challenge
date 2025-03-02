
@extends('layout')


@section('content')

  <section class="my-16 px-6" x-data="{
    username: '',
    password: '',
    error: '',
    signIn() {
      this.error = '';
      if(this.username === 'admin' && this.password === 'admin') {
        this.$store.global.role = 'admin';
        window.location.href = '/companies'
      } else if(this.username !== 'admin') {
        this.$store.global.role = 'user';
        window.location.href = '/jobs';
      } else {
        this.error = 'Incorrect username or password.'; 
      }
    }
  }">
    <h2 class="text-2xl max-w-md mx-auto font-semibold mb-8">Sign In to Your Account</h2>

    <form x-data @submit.prevent="signIn" class="max-w-md mx-auto text-[0.95rem] px-6 py-8 bg-light-secondary dark:bg-dark-secondary border-gray-50 dark:border-gray-200 rounded-md hover:shadow-md hover:dark:shadow-[#3b1f28] hover:dark:shadow-md transition-all duration-200">
      <p class="text-red-600 text-center" x-text="error" x-show="error !== ''" x-cloak></p>
      <div class="my-3">
          <label for="username" class="block mb-1">Username</label>
          <input name="username" type="text" x-model="username" class="w-full border border-gray-500 py-1 px-2 rounded-md focus:outline-none">
      </div>
      <div class="my-3">
          <label for="password" class="block mb-1">Password</label>
          <input name="password" type="password" x-model="password" class="w-full border border-gray-500 py-1 px-2 rounded-md focus:outline-none">
      </div>
      <input type="submit" value="Sign in" class="block mt-8 w-full rounded-md py-3 text-white bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">
    </form>
  </section>
@endsection
