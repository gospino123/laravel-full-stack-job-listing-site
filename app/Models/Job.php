<?php

namespace App\Models;
use Illuminate\Support\Arr;

class Job {
    public static function all(): array {
        return [
            [
                'title' => 'Director',
                'salary' => '60,000',
                'id' => 1,
            ],
            [
                'title' => 'Programmer',
                'salary' => '10,000',
                'id' => 2,
            ],
            [
                'title' => 'Teacher',
                'salary' => '40,000',
                'id' => 3,
            ],
        ];
    }

    public static function find(int $id): array {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);

        if (! $job) {
            abort(404);
        }

        return $job;
    }
}