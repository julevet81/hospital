<?php

namespace App\Repository\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Models\Section;


class SectionRepository implements SectionRepositoryInterface
{
    protected $model;

    public function __construct(Section $section)
    {
        $this->model = $section;
    }

    public function index()
    {
        $sections = Section::all();
        //return $this->model->with('translations')->get();
        return view('dashboard.sections.index',  compact('sections'));
    }

    public function store($request)
    {
        Section::create([
            'name'=> $request->input('name'),
        ]);
        session()->flash('add');
        return redirect()->route('dashboard.sections.index');
    }

    public function update($request)
    {
        $section = Section::findOrFail($request->id);
        $section->update([
            'name' => $request->input('name'),
        ]);
        session()->flash('edit');
         // Redirect to the sections index page
         // You can also return a view or JSON response if needed
         // return view('dashboard.sections.index');
         // or
         // return response()->json(['message' => 'Section updated successfully']);
        return redirect()->route('dashboard.sections.index');
    }

    public function destroy($request)
    {
        $section = Section::findOrFail($request->id);
        $section->delete();
        session()->flash('delete');
        return redirect()->route('dashboard.sections.index');
    }

    public function getSectionById($id)
    {
        return $this->model->with('translations')->findOrFail($id);
    }

    public function createSection(array $data)
    {
        return $this->model->create($data);
    }

    public function updateSection($id, array $data)
    {
        $section = $this->getSectionById($id);
        $section->update($data);
        return $section;
    }

    public function deleteSection($id)
    {
        $section = $this->getSectionById($id);
        return $section->delete();
    }
}