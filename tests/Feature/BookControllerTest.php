<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex(): void
    {
        $response = $this->get(route('books.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $response = $this->get(route('books.create'));
        $response->assertOk();
    }

    public function testEdit(): void
    {
        $book = Book::factory()->create();

        $response = $this->get(route('books.edit', $book));
        $response->assertOk();
        $response->assertSee($book->title);
    }

    public function testUpdate(): void
    {
        $book = Book::factory()->create();

        $newData = [
            'title' => 'Updated Book',
            'author' => 'Updated Author',
            'year' => 2010,
            'is_read' => true,
        ];

        $response = $this->put(route('books.update', $book), $newData);

        $response->assertRedirect(route('books.index'));

        $this->assertDatabaseHas('books', array_merge(['id' => $book->id], $newData));
    }

    public function testDestroy(): void
    {
        $book = Book::factory()->create();

        $response = $this->delete(route('books.destroy', $book));
        $response->assertRedirect(route('books.index'));

        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }

    public function testMarkBookAsRead(): void
    {
        $book = Book::factory()->create(['is_read' => false]);

        $this->put(route('books.update', $book), [
            'title' => $book->title,
            'author' => $book->author,
            'year' => $book->year,
            'is_read' => true,
        ]);

        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'is_read' => true,
        ]);
    }
}
