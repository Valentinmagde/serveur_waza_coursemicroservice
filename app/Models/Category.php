<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Category extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'title', 
        'description'
    ];

    /**
     * Get the course that owns the category.
     */
    public function category()
    {
        return $this->hasOne(Course::class);
    }
    // -----------------------------------------------------------------------------------------------------
    // @ Public methods
    // -----------------------------------------------------------------------------------------------------

    /**
     * Get course by id
     * 
     * @param courseId
     * @return course
     */
    public static function getById($categoryId)
    {
        try {
            $course = Category::find($categoryId);
            return $course;
        } catch (\Exception $e) {
            $error = $e->getMessage();
            return $error;
        }
    }

    /**
     * Get all courses
     */
    public static function getAll()
    {
        try {
            $courses = Course::all();
            return $courses;
        } catch (\Exception $e) {
            $error = $e->getMessage();
            return $error;
        }
    }

    /**
     * Store a course
     * 
     * @param course
     * @return course
     */
    public static function storeCourse($request)
    {
        try {
            // Persist course data in database
            $course = Course::create($request->all());
            return $course;
        } catch (\Exception $e) {
            $error = $e->getMessage();
            return $error;
        }
    }
}
