<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;


class QuizController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function quizzes()
    {
       
        $quizzesWithPhotos = Quiz::where('status', 1)
            ->whereNotNull('photo_path')
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        $remainingQuizzesCount = 8 - $quizzesWithPhotos->count();

        if ($remainingQuizzesCount > 0) {
            $quizzesWithDescriptions = Quiz::where('status', 1)
                ->whereNull('photo_path')
                ->whereNotNull('description')
                ->orderBy('created_at', 'desc')
                ->take($remainingQuizzesCount)
                ->get();

            $quizzes = $quizzesWithPhotos->merge($quizzesWithDescriptions);
        } else {
            $quizzes = $quizzesWithPhotos;
        }

        return view("quizzes", compact('quizzes'));
    }

    public function createOrEdit($id = null)
    {
        $quiz = $id ? Quiz::findOrFail($id) : new Quiz();
        return view('create_or_edit', compact('quiz'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'grade' => 'required|numeric|min:0|max:100',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $status = $request->has('status') && $request->input('status') == 'on';

        $quiz = new Quiz([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $status,
            'grade' => $request->input('grade'),
        ]);

        if ($request->hasFile('image')) {
            $imageName = 'image_' . $quiz->name . '.' . $request->image->getClientOriginalExtension();
            $uploadPath = 'public/images'; 
            $request->image->storeAs($uploadPath, $imageName);
            $quiz->image_path = $imageName;
        }
        $quiz->save();

        return redirect()->route('quizzes.index')->with('status', 'Quiz created successfully!');
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'grade' => 'required|numeric|min:0|max:100',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $status = $request->has('status') && $request->input('status') == 'on';

        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $status,
            'grade' => $request->input('grade'),
        ];

        if ($request->hasFile('image')) {
            $imageName = 'image_' . $data['name'] . '.' . $request->image->getClientOriginalExtension();
            $uploadPath = 'public/images';
            $request->image->storeAs($uploadPath, $imageName);
            $data['image_path'] = $imageName;
        }

        $quiz->update($data);

        return redirect()->route('quizzes.index')->with('status', 'Quiz updated successfully!');
    }
}
