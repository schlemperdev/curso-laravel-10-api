<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\CreateSupportDTO;
use App\DTOs\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Services\SupportServices;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportServices $service
    ) {}

    public function index(Request $request)
    {
        $supports = $this->service->paginate(
            page: $request->get('page', 1),
            perPage: $request->get('per_page', 10),
            filter: $request->filter,
        );

        return view('admin.supports.index', compact('supports'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request)
    {
        $this->service->new(
            CreateSupportDTO::fromRequest($request)
        );

        return redirect()->route('supports.index');
    }

    public function show(string $id)
    {
        if (! $support = $this->service->findOne($id)) {
            return redirect()->back();
        }

        return view('admin.supports.show', compact('support'));
    }

    public function edit(string $id)
    {
        if (! $support = $this->service->findOne($id)) {
            return redirect()->back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request)
    {
        $support = $this->service->update(
            UpdateSupportDTO::fromRequest($request)
        );

        if (!$support) {
            return redirect()->back();
        }

        return redirect()->route('supports.index');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
