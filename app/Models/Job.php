<?php

namespace App\Models;

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
}