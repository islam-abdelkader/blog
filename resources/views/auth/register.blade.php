<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 p-6 bg-gray-100 border border-gray-200 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form action="{{ route('register.store') }}" method="post">
                @csrf

                <x-form.input name="name"/>

                <x-form.input name="email" type="email"/>

                <x-form.input name="password" type="password"/>
                <x-form.input name="password_confirmation" type="password"/>

                <x-form.button>Register</x-form.button>

            </form>
        </main>
    </section>
</x-layout>
