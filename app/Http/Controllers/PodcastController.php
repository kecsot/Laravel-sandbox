<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePodcastRequest;
use App\Http\Requests\UpdatePodcastRequest;
use App\Models\Podcast;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class PodcastController extends Controller
{

    public function index()
    {
        $podcasts = Podcast::all();
        return view('podcasts.index', compact('podcasts'));
    }

    public function create()
    {
        return view('podcasts.create');
    }

    public function store(StorePodcastRequest $request)
    {
        $podcast = new Podcast([
            'name' => $request->get('name'),
        ]);
        $isSuccess = $podcast->save(); // TODO: php code standard? , check

        return redirect()->route('podcasts.index');
    }

    public function show(Podcast $podcast)
    {
        return view('podcasts.show', compact('podcast'));
    }

    public function edit(Podcast $podcast)
    {
        return view('podcasts.edit', compact('podcast'));
    }

    public function update(UpdatePodcastRequest $request, Podcast $podcast)
    {
        $podcast->name = $request->get('name');
        $isSuccess = $podcast->save(); // TODO: php code standard? , check

        return redirect()->route('podcasts.index');
    }

    public function destroy(Podcast $podcast)
    {
        $podcast->delete();

        return redirect()->route('podcasts.index');
    }
}
