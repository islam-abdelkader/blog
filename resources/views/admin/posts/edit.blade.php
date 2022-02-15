<x-layout>
    <x-setting :heading="'Edit Post: '. $post->title">
        <form action="{{ route('admin.posts.update',$post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-form.input name="title" :value="old('title',$post->title)" />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" />
                </div>
                <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">

            </div>
            <x-form.textarea name="excerpt">{{ old('excerpt',$post->excerpt) }}</x-form.textarea>

            <x-form.textarea name="body">{{ old('body',$post->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category" />
                <select name="category_id" id="category" class="w-full p-3 rounded-xl">
                    <option value="" selected>Select Category</option>
                    @foreach (\App\Models\Category::all() as $category )
                    <option value="{{ $category->id }}" {{ old('category_id',$post->category_id)==$category->id ?
                        'selected' : '' }}
                        >
                        {{ ucwords($category->name) }}
                    </option>
                    @endforeach
                </select>
                <x-form.error name="category_id" />
            </x-form.field>
            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
