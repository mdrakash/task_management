<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Throwable;

class TaskController extends Controller
{
    use ApiResponse;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('assigned_users:id,name')->get();

        return TaskResource::collection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        DB::beginTransaction();
        try {
            // Create the task
            $task = Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'due_date' => Carbon::parse($request->due_date)->format('Y-m-d'), // Parse to Y-m-d format
                'created_by' => Auth::id(),
            ]);

            // Assign users to the task if any
            if ($request->filled('assigned_users_ids')) {
                $task->assigned_users()->attach($request->assigned_users_ids);
                // Load the assigned users
                $task->load('assigned_users:id,name');
            }

            DB::commit();

            return new TaskResource($task);
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        DB::beginTransaction();
        try {
            // Authorize the action
            Gate::authorize('update', $task);

            // Update the task with only the fields from the request
            $task->fill($request->only('title', 'description', 'status', 'due_date'));

            // Update the 'updated_by' field
            $task->update(['updated_by' => Auth::id()]);

            // Assign users to the task if any
            if ($request->filled('assigned_users_ids')) {
                $task->assigned_users()->sync($request->assigned_users_ids);
                // Load the assigned users
                $task->load('assigned_users:id,name');
            }

            DB::commit();

            return new TaskResource($task);
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        DB::beginTransaction();
        try {
            // Authorize the action
            Gate::authorize('delete', $task);

            // Detach any assigned users if necessary
            $task->assigned_users()->detach();

            // Delete the task
            $task->delete();

            DB::commit();

            return response()->noContent();
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
