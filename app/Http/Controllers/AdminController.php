<?php
/**
 * Created by PhpStorm.
 * User: olehh
 * Date: 13.03.2019
 * Time: 21:04
 */

namespace App\Http\Controllers;


use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        //показать форму с добавлением вопроса
    }

    public function store(Request $request)
    {
        $id = Question::create($request->all());
        Answer::create($request->get('answer'));
    }

    public function edit($questionId)
    {
        return view('form');
    }

    public function update($questionId, Request $request)
    {

    }
}