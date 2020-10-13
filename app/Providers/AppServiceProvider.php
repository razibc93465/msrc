<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;
use App\Department;
use App\Notification;
use App\Semester;
use App\Course;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('name', 'BITM');
        View::composer('admin.includes.menu', function($view) {
            $publishedDepartments = Department::where('publicationStatus', 1)->get();
            $view->with('publishedDepartments', $publishedDepartments);
        });
        
        View::composer('admin.home.homeContent', function($view) {
//            $notifications = Notification::where('publicationStatus', 1)->get();
            
            $notifications = DB::table('notifications')
                ->join('departments', 'notifications.deptId', '=', 'departments.id')
                ->select('notifications.*', 'departments.deptName')
                ->get();
            
            $view->with('notifications', $notifications);
        });
        
         View::composer('frontEnd.home.homeContent', function($view) {
            $publishedDepartments = Department::where('publicationStatus', 1)->get();
            $view->with('publishedDepartments', $publishedDepartments);
        });
        
//         View::composer('frontEnd.semCourse.semCourseView', function($view) {
//         //   $courses = Course::where('publicationStatus', 1)->get();
//            //$view->with('publishedDepartments', $publishedDepartments);
//             $courses = DB::table('courses')            
//                ->join('departments', 'courses.deptId', '=', 'departments.id')
//                ->join('semesters', 'courses.semId', '=', 'semesters.id')
//                ->select('courses.*')
//                ->get();
//             $view->with('courses', $courses);
//        });
        
        
        
        
    }
}
