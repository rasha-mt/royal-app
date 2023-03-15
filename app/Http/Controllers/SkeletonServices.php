<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class SkeletonServices extends Controller
{
    public string $base_path = "https://symfony-skeleton.q-tests.com/api/v2";

    public function authClient(): array
    {
        $url = $this->base_path . "/token";

        $data = [
            'email'    => 'ahsoka.tano@q.agency',
            'password' => 'Kryze4President'
        ];

        try {
            $response = Http::accept('application/json')
                ->withOptions(['verify' => false])
                ->post($url, $data)
                ->throw()
                ->json();

            Cache::put('client', $response);
            Cache::put('client_name', $response['user']['first_name'] . ' ' . $response['user']['last_name']);
            Cache::put('token', $response['token_key']);

            return [
                "code"    => 200,
                "message" => "Login Successfully "
            ];

        } catch (\Exception $e) {
            return [
                "code"    => 403,
                "message" => "User not found or inactive or password not valid"
            ];
        }

    }

    public function fetchAllAuthors(): array
    {
        $url = $this->base_path . "/authors?orderBy=id";
        $token = Cache::get('token');

        try {
            $authors = Http::accept('application/json')
                ->withOptions(['verify' => false])
                ->withToken($token)
                ->get($url)
                ->throw()
                ->json();
            Cache::put('authors', $authors['items']);

            return $authors['items'];

        } catch (\Exception $e) {
            return [

            ];
        }
    }

    public function fetchAuthorById($authorId): object|null
    {
        $url = $this->base_path . "/authors/{$authorId}";
        $token = Cache::get('token');

        try {
            $author = Http::accept('application/json')
                ->withOptions(['verify' => false])
                ->withToken($token)
                ->get($url)
                ->throw()
                ->json();

            return (object) $author;

        } catch (\Exception $e) {
            return null;
        }
    }


    public function createBook($data): array
    {
        $url = $this->base_path . "/books";
        $token = Cache::get('token');
        $data = [
            "author"          =>
                [
                    "id" => (int) $data['author_id']
                ],
            "title"           => $data['title'],
            "release_date"    => now()->toDateTimeString(),
            "description"     => $data['description'],
            "isbn"            => "test",
            "format"          => "audio",
            "number_of_pages" => (int) $data['pages_number']
        ];

        try {
            Http::accept('application/json')
                ->withOptions(['verify' => false])
                ->withToken($token)
                ->post($url, $data)
                ->throw()
                ->json();

            return [
                "code"    => 200,
                "message" => "Added successfully"
            ];

        } catch (\Exception $e) {

            return [
                "code"    => 403,
                "message" => "Failed to Add Book "
            ];
        }
    }

    public function removeBook($id): array
    {
        $url = $this->base_path . "/books/{$id}";
        $token = Cache::get('token');

        try {
            Http::accept('application/json')
                ->withOptions(['verify' => false])
                ->withToken($token)
                ->delete($url)
                ->throw()
                ->json();

            return [
                "code"    => 200,
                "message" => "deleted successfully"
            ];

        } catch (\Exception $e) {
            return [
                "code"    => 403,
                "message" => "Error "
            ];
        }
    }

    public function removeAuthor($id): array
    {
        $url = $this->base_path . "/authors/{$id}";
        $token = Cache::get('token');

        try {
            Http::accept('application/json')
                ->withOptions(['verify' => false])
                ->withToken($token)
                ->delete($url)
                ->throw()
                ->json();

            return [
                "code"    => 200,
                "message" => "deleted successfully"
            ];

        } catch (\Exception $e) {
            return [
                "code"    => 403,
                "message" => "Error "
            ];
        }
    }
}