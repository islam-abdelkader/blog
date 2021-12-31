<x-layout>
    <article>
        <h1>
            {{ $post->title }} {{-- this will no excute html code --}}
        </h1>
        <p>
            Writen By: <a href="/authors/{{ $post->author->user_name }}">
                {{ $post->user->name }}
            </a>
            in:
            <a href="/categories/{{ $post->category->slug }}">
                {{ $post->author->name }}
            </a>
        </p>
        <div>
            {!! $post->body !!} {{-- this will excute html code --}}
        </div>
    </article>
    <a href="/posts">Back to Home</a>
</x-layout>
