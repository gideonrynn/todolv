<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{
    //this will take everything that passes from the form into our endpoint
    //and then do *whatever we define*
    public function saveItem(Request $request) {
        //if you ever want to see in the log what it's passing in you can do this with the log
        //go to storage -> log -> laravel log
        \Log::info(json_encode($request->all()));

        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem->save();
//        return view('welcome', ['listItems' => ListItem::all()]);
        return redirect('/');
    }

    public function index() {

        return view('welcome', ['listItems' => ListItem::all()]);
//        instead of getting everything, we want to only get items that haven't been completed yet by default
//        return view('welcome', ['listItems' => ListItem::where('is_complete', 0)->get()]);
    }

    public function markComplete($id) {
        \Log::info($id);

        //laravel has an easy way to fetch things, use the model and the find method
        $listItem = ListItem::find($id);
        \Log::info($listItem);

        $listItem->is_complete = 1;
        $listItem->save();
        return redirect('/');
    }

}
