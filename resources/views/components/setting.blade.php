@props(['heading'])

<section class="py-8 mx-auto max-w-4xl">

    <h1 class="text-lg font-bold mb-8 pb-2 border-b">{{ $heading }}</h1>

    <div class="flex">

        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>

            <ul>
                <li>
                    <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.index') ? 'text-blue-500' : '' }}">
                        All Posts
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.posts.create') }}" class="{{ request()->routeIs('admin.posts.create') ? 'text-blue-500' : '' }}">
                        New Post
                    </a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>

    </div>
</section>
