@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post Something"></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                </div>
                
            </form>
            <div class="text-black px-4 py-2 rounded text-2xl">
                Posts
            </div>
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4">
                        <a href="" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        <p class="mb-2">{{ $post->body }}</p>
                    </div> 
                @endforeach
                {{ $posts->links() }}
            @else
                <p>There are no posts</p>
            @endif
            
            
        </div>
        
    </div>
    <!--@foreach ($posts as $post)
                    <div>
                        <div class="flex justify-between px-4 py-2">
                            <div class="">
                                {{ $post->body }}
                            </div>
                            <div>
                                <a href="{{ route('posts.edit', [$post->id]) }}" class="bg-green-500 text-white px-4 py-2 rounded font-medium">edit</a>
                                <form action="{{ route('posts.destroy', [$post->id]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded font-medium">delete</button>
                                </form>
                            </div>  
                        </div> 
                    </div>                
                @endforeach-->
                
@endsection