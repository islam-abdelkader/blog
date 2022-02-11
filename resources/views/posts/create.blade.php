<x-layout>
    <section class="px-6 py-8">
        <x-panel>
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">title</label>
                    <input type="text" name="title" id="title" class="border border-gray-400 p-2 w-full"
                        value="{{ old('title') }}">
                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">excerpt</label>
                    <textarea name="excerpt" id="excerpt"
                        class="border border-gray-400 p-2 w-full">{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                    <textarea name="body" id="body"
                        class="border border-gray-400 p-2 w-full">{{ old('body') }}</textarea>
                    @error('body')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="category_id"
                        class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category )
                        <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}
                            >
                            {{ ucwords($category->name) }}
                        </option>
                        @endforeach
                    </select>
                    @error('body')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6 text-center">
                    <x-btn-submit>Publish</x-btn-submit>
                </div>
            </form>
        </x-panel>
    </section>
</x-layout>
