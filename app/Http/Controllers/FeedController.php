<?php

namespace App\Http\Controllers;

use App\Models\Feeds;
use Illuminate\Http\Request;

class FeedController extends Controller
{

    public function show(Feeds $feed)
    {

        // return view('feed.show', [
        //     'feed' => $feed,
        // ]);
        return view('feed.show', compact('feed'));
    }
    public function store()
    {

      $validated =  request()->validate([
            "content" => "required|min:3|max:240",
        ]);

        // $feeds = Feeds::create(
        //     [
        //         'content' => request()->get('content', ''),
        //     ]


        // );
        // dump(request()->all());
        // dd($validated);

        $validated['user_id'] = auth()->id();

        Feeds::create($validated); // last one 
        // dump($feeds::all()); 
        // $feeds->save();
        // dump(request()); 
        return redirect()->route('home')->with('success', 'feed created Successfully');
    }


    public function edit(Feeds $feed)
    {
        if(auth()->id() !== $feed->user_id) {
            abort(404);

        }
        $editing = true;
        return view('feed.show', compact('feed', 'editing'));
    }
    public function update(Feeds $feed)
    {
        if(auth()->id() !== $feed->user_id) {
            abort(404);
            

        }
        $validated =  request()->validate([
            "content" => "required|min:3|max:240",
        ]);

        $feed->update($validated); // last one 

        // $feed->content = request()->get("content", "");
        // $feed->save();
        return redirect()->route('feed.show', $feed->id)->with('success', 'feed updated Successfully');
    }
    public function destroy(Feeds $id)
    {
        if(auth()->id() !== $id->user_id) {
            abort(404);

        }
        //   $feeds =  Feeds::where('id', $id)->firstOrFail() ;
        //   $feeds->delete();

        $id->delete();

        return redirect()->route('home')->with('success', 'feed deleted Successfully');
    }
}
