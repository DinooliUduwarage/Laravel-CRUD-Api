<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return everything by default
       // return parent::toArray($request);

        //return only selected field
        return[
            'id'=> $this->id,
            'title'=> $this->title,
            'body'=>$this->body
        ];
    }
    public function with($request){
        return[
            //you could get database field as this
            'Author'=> 'Dinooli Uduwarage',
            'Author_id'=> $this->id,
            'author_url'=>url('http://traversymedia.com')
        ];

        //https://jsonapi.org/
        //https://medium.com/@dinotedesco/using-laravel-5-5-resources-to-create-your-own-json-api-formatted-api-2c6af5e4d0e8
    }

}
