<x-layout>
    <section class="py-8 mx-auto max-w-md">

        <h1 class="mb-4 font-bold text-lg">Publish New Post</h1>

        <x-panel>
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title" />

                <x-form.input name="thumbnail" type="file" />

                <x-form.textarea name="excerpt" />

                <x-form.textarea name="body" />

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
                    <x-form.button>Publish</x-form.button>
                </div>
            </form>
        </x-panel>
    </section>
</x-layout>
