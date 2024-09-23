<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\scrollNotice\ScrollNoticeRequest;
use App\Models\Admin\ScrollNotice;
use Illuminate\Http\Request;

class ScrollNoticeController extends Controller
{
    public function __construct()
    {
        $this->data = array(
            'title'             => 'Scroll Notice',
            'controller'        => 'ScrollNoticeController',
            'controller_route'  => 'scroll-notice',
            'primary_key'       => 'id',
        );
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['module']                 = $this->data;
        $title                          = $this->data['title'];
        $page_name                      = 'scrollNotice.add-edit';
        $data['row']                    = ScrollNotice::find(1);

        echo $this->admin_after_login_layout($title, $page_name, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScrollNoticeRequest $request)
    {
        $content = $request->input('content');


        try {
            $status = ScrollNotice::where('id', 1)->update(['content' => $content]);

            if ($status) {
                return redirect()->back()->with('success_message', 'Data saved successfully');
            } else {
                return redirect()->back()->with('error_message', 'Data save unsuccessful');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(?string $id)
    {
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ?string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
