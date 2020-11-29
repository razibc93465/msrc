<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Notification;
use DB;


class NotificationController extends Controller
{
     public function createNotification() {
        $departments = Department::where('publicationStatus', 1)->get();
        return view('admin.notification.createNotification', ['departments' => $departments]);
    }

    public function storeNotification(Request $request) {
        $this->validate($request, [
            'notificationTitle' => 'required',
            'notificationDescription' => 'required',
            'nImage' => 'required',
        ]);
        $notificationImage = $request->file('nImage');
        $imageName = $notificationImage->getClientOriginalName();
        $uploadPath = 'public/notificationImage/';
        $notificationImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName;
        $this->saveNotificationInfo($request, $imageUrl);
        return redirect('/notification/add')->with('message', 'Notification info saved successfully');
    }

    protected function saveNotificationInfo(Request $request, $imageUrl) {
        $notification = new Notification();
        $notification->deptId = $request->deptId;
        $notification->notificationTitle = $request->notificationTitle;
        $notification->notificationDescription = $request->notificationDescription;
        $notification->nImage = $imageUrl;
        $notification->publicationStatus = $request->publicationStatus;
        $notification->save();
    }

    public function manageNotification() {
        $notifications = DB::table('notifications')
                ->join('departments', 'notifications.deptId', '=', 'departments.id')
                ->select('notifications.*', 'departments.deptName')
                ->get();
        return view('admin.notification.manageNotification', ['notifications' => $notifications]);
 //       return view('admin.home.homeContent', ['notifications' => $notifications]);
    }

    public function editNotification($id) {
        $departments = Department::where('publicationStatus', 1)->get();
        $notificationById = Notification::where('id', $id)->first();
        return view('admin.notification.editNotification', ['notificationById' => $notificationById, 'departments' => $departments]);
    }

    public function updateNotification(Request $request) {
        $imageUrl = $this->imageExistStatus($request);
        $notification = Notification::find($request->id);

        $notification->deptId = $request->deptId;
        $notification->notificationTitle = $request->notificationTitle;
        $notification->notificationDescription = $request->notificationDescription;
        $notification->nImage = $imageUrl;
        $notification->publicationStatus = $request->publicationStatus;
        $notification->save();
        return redirect('/notification/manage')->with('message', 'Notification info updated successfully');
    }

    private function imageExistStatus($request) {
        $notificationById = Notification::where('id', $request->id)->first();
        $notificationImage = $request->file('nImage');
        if ($notificationImage) {
            unlink($notificationById->nImage);
            $imageName = $notificationImage->getClientOriginalName();
            $uploadPath = 'public/notificationImage/';
            $notificationImage->move($uploadPath, $imageName);
            $imageUrl = $uploadPath . $imageName;
        } else {
            $imageUrl = $notificationById->nImage;
        }
        return $imageUrl;
    }

    public function deleteNotification($id) {
        $notification = Notification::find($id);
        $notification->delete();
        return redirect('/notification/manage')->with('message', 'Notification info deleted successfully');
    }
    
}
