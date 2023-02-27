<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Feedback;
class FeedbackController extends Controller
{
    public function list(){
        $feedback = Feedback::all();
        return view('admin.feedback.list', [
            'title' => "QUẢN LÝ GÓP Ý",
            'feedbacks' => $feedback,
        ]);
    }
}
