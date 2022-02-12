@auth
<x-panel>
    <form action="{{ route('comments.store',$post->slug)}}" method="post">
        @csrf
        <header class="flex item-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="user avatar" width="40" height="40"
                class="rounded-full">
            <h2 class="ml-4">want to participate?</h2>
        </header>
        <x-form.field>
            <textarea name="body" id="" rows="5" class="w-full text-sm focus:outline-none focus:ring"
                placeholder="Quick, thing of something to say!"></textarea>
                <x-form.error name="body"/>
        </x-form.field>
        <footer class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <x-form.button>Post</x-form.button>
        </footer>
    </form>
</x-panel>
@else
<p class="font-semibold">
    <a href="{{ route('register.create') }}" class="hover:underline">Register</a> or
    <a href="{{ route('login.create') }}" class="hover:underline">Login</a> to Leave a comment!
</p>
@endauth
