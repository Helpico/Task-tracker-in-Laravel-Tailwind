@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
     @auth
      <form action="{{ route('posts') }}" method="POST" class="mb-6">
        @csrf
        <div class="mb-4">
          <label for="body" class="sr-only">Body</label>
          <textarea name="body" id="body" cols="30" rows="2" class="bg-gray-100
            border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
            placeholder="Post something!"></textarea>
           
            @error('body')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
            @enderror
        </div>
        <div>
          <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded font-medium">
            Post
          </button>
        </div>
      </form>
     @endauth 
      <div class="px-6">
      @if ($posts->count())
        @foreach($posts as $post)
        <div class="flex items-center mt-2 mb-4">
                  <div class="flex-shrink-0 h-10 w-10">
                    <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                      <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                      </svg>
                    </span>                
                  </div>
                  <div class="ml-10">
                    <div class="text-sm font-medium text-gray-900">
                    {{ $post->user->name }}
                    </div>
                    <p class="text-sm text-gray-500">
                      {{ $post->body }}
                    </p>

                    <div class="flex items-center">
                      <form action="" method="post" class="mr-1">
                          @csrf
                        <button type="submit" class="text-green-500 text-sm">Done</button>
                      </form>
                      <form action="" method="post" class="mr-1">
                          @csrf
                          <button type="submit" class="text-red-500 text-sm">Undone</button>
                      </form>
                    </div>
                  </div>
          </div>

          <!-- <div class="mb-4">
          
            <a href="#" class="font-bold">{{ $post->user->name }}</a>
            <span class="text-gray-600 text-sm">{{ $post->created_at }}</span>
            <p class="mb-2">{{ $post->body }}</p>
          </div> -->
        @endforeach
        {{ $posts->links() }}
      @else
        <p>There are no posts</p>
      @endif
      </div>
    </div>
  </div>
@endsection()