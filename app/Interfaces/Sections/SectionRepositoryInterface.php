<?php
namespace App\Interfaces\Sections;

interface SectionRepositoryInterface
{
    public function index();
    public function getSectionById($id);

    public function store($request);
    public function update($request);
    public function destroy($request);
    public function createSection(array $data);
    public function updateSection($id, array $data);
    public function deleteSection($id);
}