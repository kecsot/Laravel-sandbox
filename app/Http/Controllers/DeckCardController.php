<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeckCardRequest;
use App\Http\Requests\UpdateDeckCardRequest;
use App\Models\Card;
use App\Models\Deck;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DeckCardController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Card::class);
        $this->authorizeResource(Deck::class);
    }

    public function index(Deck $deck): View
    {
        $cards = $deck->cards()
            ->latest()
            ->get();

        return view('decks.cards.index', compact('cards'));
    }

    public function create(Deck $deck): View
    {
        return view('decks.cards.create', compact('deck'));
    }

    public function store(StoreDeckCardRequest $request, Deck $deck): RedirectResponse
    {
        $card = new Card([
            'name' => $request->get('name'),
            'deck_id' => $deck->id
        ]);
        $success = $card->save();
        if (!$success) {
            return redirect()->back()->withErrors(__('Store failed!'));
        }

        return redirect()->route('decks.show', $deck);
    }

    public function show(Deck $deck, Card $card): View
    {
        return view('decks.cards.show', compact('card'));
    }

    public function edit(Deck $deck, Card $card): View
    {
        return view('decks.cards.edit', compact('deck', 'card'));
    }

    public function update(UpdateDeckCardRequest $request, Deck $deck, Card $card): RedirectResponse
    {
        $card->name = $request->get('name');
        $success = $card->save();
        if (!$success) {
            return redirect()->back()->withErrors(__('Update failed!'));
        }

        return redirect()->route('decks.show', $deck);
    }

    public function destroy(Deck $deck, Card $card): RedirectResponse
    {
        $success = $card->delete();
        if (!$success) {
            return redirect()->back()->withErrors(__('Delete failed!'));
        }

        return redirect()->route('decks.show', $deck);
    }
}
