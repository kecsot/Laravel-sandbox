<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeckRequest;
use App\Http\Requests\UpdateDeckRequest;
use App\Models\Deck;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DeckController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Deck::class);
    }

    public function index(): View
    {
        $decks = Deck::query()
            ->latest()
            ->get();

        return view('decks.index', compact('decks'));
    }

    public function create(): View
    {
        return view('decks.create');
    }

    public function store(StoreDeckRequest $request): RedirectResponse
    {
        $deck = new Deck([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);

        $success = $deck->save();
        if (!$success) {
            return redirect()->back()->withErrors(__('Store failed!'));
        }

        return redirect()->route('decks.index');
    }

    public function show(Deck $deck): View
    {
        return view('decks.show', compact('deck'));
    }

    public function edit(Deck $deck): View
    {
        return view('decks.edit', compact('deck'));
    }

    public function update(UpdateDeckRequest $request, Deck $deck): RedirectResponse
    {
        $deck->name = $request->get('name');
        $deck->description = $request->get('description');
        $success = $deck->save();
        if (!$success) {
            return redirect()->back()->withErrors(__('Update failed!'));
        }

        return redirect()->route('decks.index');
    }

    public function destroy(Deck $deck): RedirectResponse
    {
        $success = $deck->delete();
        if (!$success) {
            return redirect()->back()->withErrors(__('Delete failed!'));
        }

        return redirect()->route('decks.index');
    }
}
