<?php

namespace App\Client;
use Illuminate\Support\Facades\Http;

class SymfonySkeletonApi
{
    const ENDPOINT = 'https://symfony-skeleton.q-tests.com';

    public function login(string $email, string $password)
    {
        $response = Http::withoutVerifying()->post(self::ENDPOINT . '/api/v2/token', [
            'email' => $email,
            'password' => $password,
        ]);

        return $response->throw()->json();
    }

    public function listAuthors($token, $page=1, $limit=20, $orderBy='id',$direction='ASC')
    {
        $response = Http::withoutVerifying()->withHeaders([
            'Authorization' => $token,
        ])->get(self::ENDPOINT . '/api/v2/authors' . "?orderBy=$orderBy&direction=$direction&limit=$limit&page=$page");
        return $response->throw()->json();
    }

    public function newAuthor($token, $data)
    {
        $response = Http::withoutVerifying()->withHeaders([
            'Authorization' => $token,
        ])->post(self::ENDPOINT . '/api/v2/authors', $data);
        return $response->throw()->json();
    }

    public function viewAuthor($token, int $id)
    {
        $response = Http::withoutVerifying()->withHeaders([
            'Authorization' => $token,
        ])->get(self::ENDPOINT . '/api/v2/authors/' . $id);
        return $response->throw()->json();
    }

    public function deleteAuthor($token, int $id)
    {
        $response = Http::withoutVerifying()->withHeaders([
            'Authorization' => $token,
        ])->delete(self::ENDPOINT . '/api/v2/authors/' . $id);
        return $response->throw()->json();
    }

    public function newBook($token, $data)
    {
        $response = Http::withoutVerifying()->withHeaders([
            'Authorization' => $token,
        ])->post(self::ENDPOINT . '/api/v2/books', $data);
        return $response->throw()->json();
    }
}
