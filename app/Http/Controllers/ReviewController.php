<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, int $saunaFacilityId)
    {
        // dd('store', $request->all());
        // ログイン中のユーザを取得
        $user = Auth::user();
        // dd($user);
        $review = new Review;
        $review->user_id = $user->id;
        $review->sauna_facility_id = $saunaFacilityId;
        $review->visit_date = $request->visit_date;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();

        return redirect()->route('saunaFacilities' ,[
            'saunaFacilityId' => $saunaFacilityId,
        ]);
    }

    public function showComments($saunaFacilityId, $reviewId)
    {
        // dd([
        //         'saunaFacilityId' => $saunaFacilityId,
        //         'reviewId' => $reviewId
        //     ]);
        // 指定された口コミを取得
        $review = Review::with('comments.user')->findOrFail($reviewId);

        return view('user.review_show', [
            'review' => $review,
            'saunaFacilityId' => $saunaFacilityId,
        ]);
    }
}
