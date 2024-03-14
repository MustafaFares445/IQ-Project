<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ScoreController extends Controller
{
    public function index(): JsonResponse
    {
        $scores = Score::where('userId' , auth()->guard('sanctum')->user()->id)->orderByDesc()->get();

        return $this->successResponse(data:  $scores , message: 'The Data successfully retrieved');
    }

    public function store(Request $request): JsonResponse
    {
       $request->validate([
           'score' => ['required' , 'numeric']
       ]);

        $iq = self::score($request->get('score'));

       $score =  Score::crete([
           'userId' => auth()->guard('sanctum')->user()->id,
            'iq' => $iq,
            'name' => self::name($iq),
        ]);

        return $this->successResponse(data:  $score , message: 'The Data successfully retrieved');
    }

    private static function name(int $iq): string
    {
        if ($iq >= 95) return "موهوب";
        if ($iq >= 90 && $iq <= 94) return "متفوق";
        if ($iq >= 75 && $iq <= 89) return "متوسط مرتفع";
        if ($iq >= 50 && $iq <= 74) return "متوسط";
        if ($iq >= 25 && $iq <= 49) return "أقل من متوسط";
        if ($iq >= 5 && $iq <= 9) return "على حدود التخلف";
        if ($iq >= 5 && $iq <= 9) return "تخلف بسيط";

         return "تخلف شديد";
    }
    private static function score(int $score): int
    {
        $age = auth()->user()->age;

        if ($age >= 16 && $age <= 20) {
            if ($score == 30)  return 95;
            if ($score == 29)  return 90;
            if ($score == 28)  return 75;
            if ($score == 27)  return 50;
            if ($score == 25)  return 25;
            if ($score == 19)  return 10;
            if ($score == 15)  return 5;
        }

        if ($age > 20 && $age <= 24) {
            if ($score == 31)  return 95;
            if ($score == 30)  return 90;
            if ($score == 29)  return 75;
            if ($score == 28)  return 50;
            if ($score == 26)  return 25;
            if ($score == 20)  return 10;
            if ($score == 16)  return 5;
        }

        if ($age > 24 && $age <= 28) {
            if ($score == 31)  return 95;
            if ($score == 30)  return 90;
            if ($score == 29)  return 75;
            if ($score == 28)  return 50;
            if ($score == 26)  return 25;
            if ($score == 21)  return 10;
            if ($score == 16)  return 5;
        }

        if ($age > 28 && $age <= 32) {
            if ($score == 32)  return 95;
            if ($score == 31)  return 90;
            if ($score == 30)  return 75;
            if ($score == 29)  return 50;
            if ($score == 28)  return 25;
            if ($score == 22)  return 10;
            if ($score == 17)  return 5;
        }

        if ($age > 32 && $age <= 36) {
            if ($score == 32)  return 95;
            if ($score == 31)  return 90;
            if ($score == 30)  return 75;
            if ($score == 29)  return 50;
            if ($score == 28)  return 25;
            if ($score == 13)  return 10;
            if ($score == 18)  return 5;
        }

        if ($age > 36 && $age <= 40) {
            if ($score == 33)  return 95;
            if ($score == 32)  return 90;
            if ($score == 31)  return 75;
            if ($score == 30)  return 50;
            if ($score == 29)  return 25;
            if ($score == 24)  return 10;
            if ($score == 19)  return 5;
        }

        if ($age > 40 && $age <= 44) {
            if ($score == 33)  return 95;
            if ($score == 32)  return 90;
            if ($score == 31)  return 75;
            if ($score == 30)  return 50;
            if ($score == 29)  return 25;
            if ($score == 24)  return 10;
            if ($score == 19)  return 5;
        }
        if ($age > 44 && $age <= 48) {
            if ($score == 34)  return 95;
            if ($score == 33)  return 90;
            if ($score == 32)  return 75;
            if ($score == 31)  return 50;
            if ($score == 30)  return 25;
            if ($score == 25)  return 10;
            if ($score == 20)  return 5;
        }
        if ($age > 48 && $age <= 52) {
            if ($score == 35)  return 95;
            if ($score == 34)  return 90;
            if ($score == 32)  return 75;
            if ($score == 31)  return 50;
            if ($score == 30)  return 25;
            if ($score == 25)  return 10;
            if ($score == 20)  return 5;
        }

        if ($age > 52 && $age <= 56 ) {
            if ($score == 34)  return 95;
            if ($score == 33)  return 90;
            if ($score == 31)  return 75;
            if ($score == 30)  return 50;
            if ($score == 28)  return 25;
            if ($score == 17)  return 10;
            if ($score == 14)  return 5;
        }

        if ($age > 56 && $age <= 60) {
            if ($score == 34)  return 95;
            if ($score == 33)  return 90;
            if ($score == 31)  return 75;
            if ($score == 30)  return 50;
            if ($score == 28)  return 25;
            if ($score == 17)  return 10;
            if ($score == 14)  return 5;
        }

        if ($age > 60 && $age <= 64) {
            if ($score == 30)  return 95;
            if ($score == 29)  return 90;
            if ($score == 27)  return 75;
            if ($score == 24)  return 50;
            if ($score == 17)  return 25;
            if ($score == 14)  return 10;
            if ($score == 12)  return 5;
        }

        if ($age > 64 && $age <= 68) {
            if ($score == 28)  return 95;
            if ($score == 27)  return 90;
            if ($score == 25)  return 75;
            if ($score == 21)  return 50;
            if ($score == 16)  return 25;
            if ($score == 12)  return 10;
            if ($score == 10)  return 5;
        }

        return  10;
    }
}
