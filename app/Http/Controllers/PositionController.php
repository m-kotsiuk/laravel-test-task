<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PositionController extends Controller
{

    public function index()
    {
        return view('positions.index');
    }


    public function create()
    {
        return view('positions.create');
    }


    public function store(PositionRequest $request)
    {
        Position::create([
            'name' => $request['name']
        ]);

        return redirect()
            ->route('positions.index')
            ->with('status', [
                'title' => 'Success',
                'description' => 'New position was successfully created.'
            ]);
    }


    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }



    public function update(PositionRequest $request, Position $position)
    {
        $position->update([
            'name' => $request['name']
        ]);

        return redirect()
            ->route('positions.index')
            ->with('status', [
                'title' => 'Success',
                'description' => 'Position is successfully updated.'
            ]);
    }

    public function destroy(Position $position)
    {
        if ($count = $position->employees()->count()) {
            return redirect()
                ->route('positions.index')
                ->with('status', [
                    'title' => 'Failure!',
                    'description' => "Unable to delete position. $count employees are still working on this position!"
                ]);
        }

        $position->delete();

        return redirect()
            ->route('positions.index')
            ->with('status', [
                'title' => 'Success',
                'description' => 'Position is successfully removed.'
            ]);
    }

    public function getAutoCompleteData(Request $request)
    {
        $positions = Position::select('id', 'name');

        if ($request->has('term')) {
            $positions->where('name', 'like', '%' . $request->input('term') . '%');
        }

        return  $positions->limit(20)->get();
    }


    public function getTables()
    {
        return DataTables::of(Position::query())
            ->addColumn('action', function (Position $position) {
                return view('components.table-controls', [
                    'editRoute' => route('positions.edit', compact('position')),
                    'deleteRoute' => route('positions.destroy', compact('position')),
                    'name' => $position->name
                ]);
            })
            ->editColumn('updated_at', function (Position $position) {
                return $position->updated_at->format('d.m.y');
            })
            ->make(true);
    }
}
