<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LibraryController extends Controller
{
    private $index_view;
    private $create_view;
    private $edit_view;
    private $show_view;
    private $index_route;
    private $model_instance;
    private $success_message;
    private $error_message;
    private $update_success_message;
    private $update_error_message;

    public function __construct()
    {
        $this->index_view   = 'admin.libraries.index';
        $this->create_view  = 'admin.libraries.create';
        $this->show_view    = 'admin.libraries.show';
        $this->edit_view    = 'admin.libraries.edit';
        $this->index_route  = 'admin.libraries.index';

        $this->success_message = trans('admin.created_successfully');
        $this->update_success_message = trans('admin.update_success');
        $this->error_message = trans('admin.fail_while_create');
        $this->update_error_message = trans('admin.fail_while_update');

        $this->model_instance = Library::class;
    }

    private function StoreValidationRules()
    {
        return [
            'name' => 'required|string|min:3|max:100',
            'location' => 'sometimes|nullable|string',
        ];
    }

    private function UpdateValidationRules($id= null)
    {
        return [
            'name' => 'required|string|min:3|max:100',
            'location' => 'sometimes|nullable|string',
        ];
    }

    public function index()
    {
        $libraries=$this->model_instance::all();
        return view($this->index_view,compact('libraries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->create_view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate($this->StoreValidationRules());

        try {
            $object = $this->model_instance::create($validated_data);
            return redirect()->route($this->index_route)->with('success', $this->success_message);
        } catch (\Exception $ex) {
            dd($ex->getMessage());
            Log::error($ex->getMessage());
            return redirect()->route($this->index_route)->with('error', $this->error_message);
        }
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
        $library=$this->model_instance::find($id);
        return view ($this->edit_view,compact(['library']));
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
        $validated_data = $request->validate($this->UpdateValidationRules($id));

        try {
            $object = $this->model_instance::find($id);
            $updated_instance = $object->update($validated_data);
            return redirect()->route($this->index_route)->with('success', $this->update_success_message);
        } catch (\Exception $ex) {
            dd($ex->getMessage());
            Log::error($ex->getMessage());
            return redirect()->route($this->index_route)->with('error', $this->update_error_message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if ($request->ajax()) {
            $library = $this->model_instance::findOrFail($id);
            $deleted =  $library->delete();
            if ($deleted) {
                return response()->json(['status' => 'success', 'message' => 'deleted_successfully']);
            } else {
                return response()->json(['status' => 'fail', 'message' => 'fail_while_delete']);
            }
        }
        return redirect()->route($this->index_route);
    }
}
