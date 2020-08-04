<?php

namespace App\Http\Controllers;
use \App\Feedback;
use \App\Filter;

use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$feedbacks = Feedback::all();
			$filters = Filter::all();
			$filter_feedbacks = [];
			$f = [];
			foreach($feedbacks as $feed) {
				$f[$feed->id] = [
					'author' => $feed->author,
					'position' => $feed->position,
					'description' => $feed->description,
					'filters' => $feed->filters,
					'text' => $feed->text,
					'image_little' => $feed->image_little,
					'image' => $feed->image,
				];
			}
			foreach($feedbacks as $feedback) {
				$filter_feedbacks[$feedback->id] = $feedback->filters;
			}
			$data = array('feedbacks' => $f, 'connections' => $filter_feedbacks, 'filters' => $filters);
			return response($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
