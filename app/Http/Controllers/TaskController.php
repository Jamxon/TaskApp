<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Task::where('user_id', Auth::id());

        // Holat bo'yicha filtr
        if ($request->has('status') && $request->status != '') {
            if ($request->status === 'completed') {
                $query->where('completed', true);
            } elseif ($request->status === 'incomplete') {
                $query->where('completed', false);
            }
        }

        // Qidirish bo'yicha filtr
        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->orWhere('id', 'like', '%' . $request->search . '%');
        }

        $tasks = $query->get();

        return view('tasks.index', compact('tasks'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Yangi Task saqlash
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'completed' => false,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Vazifa muvaffaqiyatli qo‘shildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        // `user_id` tekshiruvi
        if ($task->user_id !== Auth::id()) {
            abort(403); // Ruxsatsiz kirish
        }

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Taskni yangilash
    public function update(Request $request, $id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Vazifa muvaffaqiyatli yangilandi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // `user_id` tekshiruvi
        if ($task->user_id !== Auth::id()) {
            abort(403); // Ruxsatsiz kirish
        }
        if ($task->delete()){
            return redirect()->route('tasks.index')->with('success', 'Vazifa muvaffaqiyatli yakunlandi.');
        } else {
            return redirect()->route('tasks.index')->with('success', 'Vazifa muvaffaqiyatli yakunlanmadi.');
        }
    }

    public function toggleStatus(Task $task)
    {
        // `user_id` tekshiruvi
        if ($task->user_id !== Auth::id()) {
            abort(403); // Ruxsatsiz kirish
        }
        $task = Task::findOrFail($task->id);
        $task->completed = !$task->completed;

        if ($task->save()) {
            if ($task->completed) {
                return redirect()->route('tasks.index')->with('success', 'Vazifa muvaffaqiyatli yakunlandi.');
            } else {
                return redirect()->route('tasks.index')->with('success', 'Vazifa muvaffaqiyatli yakunlanmadi.');
            }
        } else {
            return redirect()->route('tasks.index')->with('success', 'Vazifa muvaffaqiyatli yakunlanmadi.');
        }
    }
}
