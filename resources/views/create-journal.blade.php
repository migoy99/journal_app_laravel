@extends('layouts.main')

@section('content')
    <div class="mt-4 mx-20 content-center">
        <form method="POST" action="{{ route('savejournal') }}">
            @csrf
            <div class="mb-2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Your journal title
                </label>
                <input type="text" id="title" name="title"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="" required>
            </div>
            <div class="mb-6">

                <label for="contents" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Your journal content
                </label>
                <textarea name="contents" rows="15" id="contents" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="this supports markdown..." required></textarea>

            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Publish journal
            </button>
        </form>
    </div>
@endsection
