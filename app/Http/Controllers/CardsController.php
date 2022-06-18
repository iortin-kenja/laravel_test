<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Http\Requests\CardFormRequest;

class CardsController extends Controller
{
    /* private static function getData() { // Temporarily using static data for learning purposes
        return [
            ['id' => 1, 'name' => 'Maxx C', 'type' => 'Monster'],
            ['id' => 2, 'name' => 'Monster Reborn', 'type' => 'Spell'],
            ['id' => 3, 'name' => 'Solemn Judgement', 'type' => 'Trap'],
            ['id' => 4, 'name' => 'Superdreadnought Rail Cannon Gustav Max', 'type' => 'Monster']
        ];
    } */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get
        
        return view('cards.index', [
            'cards' => Card::all(),
            'userInput' => '<script>alert("hello")</script>'    // TODO: Remeber to always sanitize user inputs (unlike what's happening here)
        ]); // 'cards.index' refers to the path 'cards/index.blade.php'
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardFormRequest $request)
    {
        $data = $request->validated();  // !!! KEEP IN MIND validate() VS validated() !!!
        /* $request->validate([
            'card-name' => 'required',
            'type' => 'required',
            'card-limit' => ['required', 'integer']
        ]); */
        
        Card::create($data);                        // Known as mass assignment...
        
        // Post
        /* $card = new Card();                      // ...which removes the need for 
                                                    // this particular block of code.
        $card->name = $data['card-name'];
        $card->type = $data['type'];
        $card->current_limit = $data['card-limit'];
        
        $card->save(); */
        
        return redirect()->route('cards.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)   // Parameter was originally $id; now $card
    {                                  // Added 'Card' as a type hint
        // Get
        
        /* if ($index === false) {     
            abort(404);
        } */
        
        return view('cards.show', [
            // 'card' => Card::findOrFail($card)  // findOrFail() automatically sends a 404 if it fails.
            'card' => $card
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        // Get
        return view('cards.edit', [
            // 'card' => Card::findOrFail($card)
            'card' => $card
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CardFormRequest $request, Card $card)
    {
        // Post(, put, patch)
        $data = $request->validated();  // !!! KEEP IN MIND validate() VS validated() !!!
        /* $request->validate([
             'card-name' => 'required',
             'type' => 'required',
             'card-limit' => ['required', 'integer']
         ]); */
        
        $card->update($data);           // Mass assignment (again, like in store())
        
        // $record = Card::findOrFail($card);
        
        /* $card->name = $data['card-name'];
        $card->type = $data['type'];
        $card->current_limit = $data['card-limit'];
        
        $card->save(); */
        
        return redirect()->route('cards.show', $card->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete
    }
}
