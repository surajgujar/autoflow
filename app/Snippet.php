<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Snippet extends Model {

    public $guarded = ["id","created_at","updated_at"];
    public $table = "snippet";
    public static function findRequested()
    {
        $query = Snippet::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('snippet_name') and $query->where('snippet_name','like','%'.\Request::input('snippet_name').'%');
        \Request::input('serialize_condition') and $query->where('serialize_condition',\Request::input('serialize_condition'));
        \Request::input('category') and $query->where('category',\Request::input('category'));
        \Request::input('status') and $query->where('status',\Request::input('status'));
        \Request::input('created_at') and $query->where('created_at',\Request::input('created_at'));
        \Request::input('updated_at') and $query->where('updated_at',\Request::input('updated_at'));
        
        // sort results
        \Request::input("sort") and $query->orderBy(\Request::input("sort"),\Request::input("sortType","asc"));

        // paginate results
        return $query->paginate(15);
    }

    public static function validationRules( $attributes = null )
    {
        $rules = [
            'snippet_name' => 'required|string|max:255',
            'serialize_condition' => 'required',
            'category' => 'required|in:command',
            'status' => 'required|in:1',
        ];

        // no list is provided
        if(!$attributes)
            return $rules;

        // a single attribute is provided
        if(!is_array($attributes))
            return [ $attributes => $rules[$attributes] ];

        // a list of attributes is provided
        $newRules = [];
        foreach ( $attributes as $attr )
            $newRules[$attr] = $rules[$attr];
        return $newRules;
    }

}
