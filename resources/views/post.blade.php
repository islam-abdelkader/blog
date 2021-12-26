<x-layout>
    <article>
        <h1>
            {{ $post->title }} {{-- this will no excute html code --}}
        </h1>
        <p>
            <a href="/categories/{{ $post->category->slug }}">
                {{ $post->category->name }}
            </a>
        </p>
        <div>
            {!! $post->body !!} {{-- this will excute html code --}}
        </div>
    </article>
    <a href="/posts">Back to Home</a>
</x-layout>
