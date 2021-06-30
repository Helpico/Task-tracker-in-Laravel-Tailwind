@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-2 sm:rounded-lg sm:shadow-sm sm:shadow-lg">

                <img class="mx-auto mt-6 h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" 
                    method="POST" action="{{ route('posts.update', ['post'=>$post]) }}">
                    {{method_field('PUT')}}
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="body" class="block text-indigo-600 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Edit the Task?') }}:
                        </label>
                        <textarea id="body" name="body" cols="30" rows="2" 
                            autocomplete="email" required autofocus class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('body') border-red-500 @enderror" 
                            >{{ $post->body }}
                        </textarea>
                        
                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                    <div class="flex flex-wrap">
                      
                      <button type="submit" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <!-- Heroicon name: solid/lock-closed -->
                            <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </span>
                        {{ __('Save') }}
                      </button>

                        @if (Route::has('register'))
                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            {{ __("Return back to ") }}
                            <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('posts') }}">
                                {{ __('the List of Tasks') }}  
                            </a>?
                        </p>
                        @endif
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
