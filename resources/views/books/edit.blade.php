@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">✏️ Редактировать книгу</h1>

        {!! html()
            ->form('PUT', route('books.update', $book)) // метод PUT для обновления
            ->attribute('class', 'space-y-6')
            ->open() !!}

        {{-- Название книги --}}
        {!! html()
            ->label('Название', 'title')
            ->class('block text-gray-700 font-semibold mb-1') !!}

        {!! html()
            ->text('title', old('title', $book->title))
            ->id('title')
            ->required()
            ->class('w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400') !!}

        {{-- Автор книги --}}
        {!! html()
            ->label('Автор', 'author')
            ->class('block text-gray-700 font-semibold mb-1 mt-4') !!}

        {!! html()
            ->text('author', old('author', $book->author))
            ->id('author')
            ->required()
            ->class('w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400') !!}

        {{-- Год публикации --}}
        {!! html()
            ->label('Год публикации', 'year')
            ->class('block text-gray-700 font-semibold mb-1 mt-4') !!}

        {!! html()
            ->number('year', old('year', $book->year))
            ->id('year')
            ->required()
            ->attribute('min', 1450)
            ->attribute('max', now()->year)
            ->class('w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400') !!}

        {{-- Прочитано ли --}}
        <div class="flex items-center space-x-2 mt-4">
            {!! html()
                ->checkbox('is_read')
                ->id('is_read')
                ->value(1)
                ->checked(old('is_read', $book->is_read))
                ->class('w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500') !!}

            {!! html()
                ->label('Прочитано', 'is_read')
                ->class('text-gray-700 font-semibold') !!}
        </div>

        {{-- Кнопки: Сохранить и Отмена --}}
        <div class="mt-6">
            {!! html()
                ->button('Сохранить изменения')
                ->type('submit')
                ->class('bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition') !!}

            <a href="{{ route('books.index') }}" class="ml-4 text-gray-600 hover:underline">
                Отмена
            </a>
        </div>

        {!! html()->form()->close() !!}
    </div>
@endsection
