<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // عرض قائمة الوسوم
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    // عرض نموذج لإنشاء وسم جديد
    public function create()
    {
        return view('admin.tags.create');
    }

    // تخزين وسم جديد في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags|max:255',
        ]);

        Tag::create($request->all());

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    // عرض نموذج لتحرير وسم موجود
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.edit', compact('tag'));
    }

    // تحديث وسم موجود في قاعدة البيانات
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:tags,name,' . $id . '|max:255',
        ]);
        $tag = Tag::findOrFail($id);
        $tag->update($request->all());

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    // حذف وسم موجود من قاعدة البيانات
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
