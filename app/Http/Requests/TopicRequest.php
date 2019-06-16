<?php

namespace App\Http\Requests;

class TopicRequest extends Request
{
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':

            // UPDATE
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'body'        => 'required|min:3',
                        'title'       => 'required|min:2',
                        'category_id' => 'required|numeric',
                    ];
                }
            case 'GET':
            case 'DELETE':
            default:
                {
                    return [];
                }
        }
    }

    public function messages()
    {
        return [
            'title.min' => '标题必须至少两个字符',
            'body.min'  => '文章内容必须至少三个字符',
        ];
    }
}
