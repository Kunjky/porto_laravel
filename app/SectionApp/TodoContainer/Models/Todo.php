<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Todo
 *
 * This class represents a todo in the application.
 */
class Todo extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'task_name',
        'start_date',
        'end_date',
        'priority',
        'status',
    ];
}
