<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Models\Theater;
use App\Models\Models\ArrangeMovie;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ArrangeMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Theater $theater)
    {
        $q = $request->input('q');

        $active = 'Theaters';

        $arrangeMovies = ArrangeMovie::where('theater_id', $theater->id)
                                            ->with('movies')
                                            ->whereHas('movies', function($query) use ($q){
                                                $query->where('title', 'like', "%$q%");
                                            })
                                            ->paginate();
        
        $request = $request->all();


        return view('dashboard/arrange_movie/list', [
            'arrangeMovies' => $arrangeMovies,
            'theater' => $theater,
            'request' => $request,
            'active' => $active
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Theater $theater, Movie $movies)
    {
        $active = 'Theaters';

        $movies = Movie::get();

        return view('dashboard/arrange_movie/form', [
            'url' => 'dashboard.theaters.arrange.movie.store',
            'button' => 'Create',
            'theater' => $theater,
            'movies' => $movies,
            'active' => $active
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ArrangeMovie $arrangeMovie)
    {
        $validator = Validator::make($request->all(), [
            'studio'        => 'required',
            'theater_id'    => 'required',
            'movie_id'      => 'required',
            'price'         => 'required',
            'rows'          => 'required',
            'columns'       => 'required',
            'schedules'     => 'required',
            'status'        => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->route('dashboard.theaters.arrange.movie.create', $request->input('theater_id'))
                    ->withErrors($validator)
                    ->withInput();
        } else {

            $seats = [
                'rows'      => $request->input('rows'),
                'columns'   => $request->input('columns')
            ];

            $arrangeMovie->theater_id    = $request->input('theater_id');
            $arrangeMovie->movie_id      = $request->input('movie_id');
            $arrangeMovie->studio        = $request->input('studio');
            $arrangeMovie->price         = $request->input('price');
            $arrangeMovie->status        = $request->input('status');
            $arrangeMovie->seats         = json_encode($seats);
            $arrangeMovie->schedules     = json_encode($request->input('schedules'));
            $arrangeMovie->save();

            return redirect()
                    ->route('dashboard.theaters.arrange.movie', $request->input('theater_id'))
                    ->with('message', __('messages.store', ['title' => $request->input('studio')]));
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\ArrangeMovie  $arrangeMovie
     * @return \Illuminate\Http\Response
     */
    public function show(ArrangeMovie $arrangeMovie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\ArrangeMovie  $arrangeMovie
     * @return \Illuminate\Http\Response
     */
    public function edit(ArrangeMovie $arrangeMovie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\ArrangeMovie  $arrangeMovie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArrangeMovie $arrangeMovie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\ArrangeMovie  $arrangeMovie
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArrangeMovie $arrangeMovie)
    {
        //
    }
}
