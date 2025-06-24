@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">📖 Библиотека</h1>

        <div class="flex justify-between items-center mb-6">
            <p class="text-gray-600">
                Всего книг: <strong>{{ $total }}</strong>,
                Прочитано: <strong>{{ $readCount }}</strong>
            </p>
            <a href="{{ route('books.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                ➕ Добавить книгу
            </a>
        </div>

        <ul class="space-y-4">
            @foreach ($books as $book)
                <li class="bg-white shadow p-4 rounded flex justify-between items-start">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">"{{ $book->title }}"</h2>
                        <p class="text-sm text-gray-600">{{ $book->author }} ({{ $book->year }})</p>
                        @if($book->is_read)
                            <p class="text-green-600 mt-1">✅ Прочитано</p>
                        @endif
                    </div>

                    <div class="flex space-x-2">
                        <a href="{{ route('books.edit', $book) }}"
                           class="text-yellow-600 hover:underline">Редактировать ✍️</a>

                        <a href="{{ route('books.destroy', $book) }}"
                           data-confirm="{{ ('Вы уверены, что хотите удалить эту книгу?') }}"
                           data-method="DELETE"
                           class="text-red-600 hover:text-red-900 hover:underline"
                           rel="nofollow">Удалить 🗑️
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
