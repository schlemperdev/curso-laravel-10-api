<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();

        return view('admin.supports.index', compact('supports'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(Request $request, Support $support)
    {
        $support['status'] = 'open';
        $support->create($request->all());

        return redirect()->route('supports.index');
    }

    public function show($id, Support $support)
    {
        if (! $support = $support->find($id)) {
            return redirect()->back();
        }

        return view('admin.supports.show', compact('support'));
    }

    public function edit($id, Support $support)
    {
        if (! $support = $support->find($id)) {
            return redirect()->back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(Request $request, Support $support, $id)
    {
        if (! $support = $support->find($id)) {
            return redirect()->back();
        }

        $support->update($request->only([
            'subject', 'message',
            ])
        );
        return redirect()->route('supports.index');
    }

    public function destroy(Support $support, $id)
    {
        if (! $support = $support->find($id)) {
            return redirect()->back();
        }

        $support->delete();

        return redirect()->route('supports.index');
    }
}
