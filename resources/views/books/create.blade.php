@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">➕ Добавить книгу</h1>

        {!! html()
            ->form('POST', route('books.store'))
            ->attribute('class', 'space-y-4 bg-white shadow p-6 rounded')
            ->open() !!}

        {{-- Название книги --}}
        {!! html()
            ->label('Название', 'title')
            ->class('block font-medium text-gray-700') !!}

        {!! html()
            ->text('title', old('title'))
            ->id('title')
            ->required()
            ->class('mt-1 w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500') !!}

        {{-- Автор --}}
        {!! html()
            ->label('Автор', 'author')
            ->class('block font-medium text-gray-700') !!}

        {!! html()
            ->text('author', old('author'))
            ->id('author')
            ->required()
            ->class('mt-1 w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500') !!}

        {{-- Год публикации --}}
        {!! html()
            ->label('Год публикации', 'year')
            ->class('block font-medium text-gray-700') !!}

        {!! html()
            ->number('year', old('year'))
            ->id('year')
            ->required()
            ->attribute('min', 1450)
            ->attribute('max', now()->year)
            ->class('mt-1 w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500') !!}

        {{-- Чекбокс: Прочитано --}}
        <div class="flex items-center">
            {!! html()
                ->checkbox('is_read')
                ->id('is_read')
                ->value(1)
                ->checked(old('is_read'))
                ->class('mr-2 rounded text-blue-600') !!}

            {!! html()
                ->label('Прочитано', 'is_read')
                ->class('text-gray-700') !!}
        </div>

        {{-- Кнопки: Назад и Сохранить --}}
        <div class="flex justify-between items-center">
            <a href="{{ route('books.index') }}" class="text-blue-500 hover:underline">Назад 👈</a>

            {!! html()
                ->button('Сохранить')
                ->type('submit')
                ->class('bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600') !!}
        </div>

        {!! html()->form()->close() !!}
    </div>
@endsection
