<?php

class AssignmentsController extends \BaseController {

	/**
	 * Display a listing of assignments
	 *
	 * @return Response
	 */
	public function index()
	{
		$assignments = Assignment::all();

		return View::make('assignments.index', compact('assignments'));
	}

	/**
	 * Show the form for creating a new assignment
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('assignments.create');
	}

	/**
	 * Store a newly created assignment in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Assignment::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Assignment::create($data);

		return Redirect::route('assignments.index');
	}

	/**
	 * Display the specified assignment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$assignment = Assignment::findOrFail($id);

		return View::make('assignments.show', compact('assignment'));
	}

	/**
	 * Show the form for editing the specified assignment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$assignment = Assignment::find($id);

		return View::make('assignments.edit', compact('assignment'));
	}

	/**
	 * Update the specified assignment in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$assignment = Assignment::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Assignment::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$assignment->update($data);

		return Redirect::route('assignments.index');
	}

	/**
	 * Remove the specified assignment from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Assignment::destroy($id);

		return Redirect::route('assignments.index');
	}

}
