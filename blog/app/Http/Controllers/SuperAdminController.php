<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;

session_start();

class SuperAdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return redirect::to('/login.aspx')->send();
        }
        $admin_home = view('admin.pages.admin_home');
        return view('admin.admin_master')->with('admin_content', $admin_home);
    }

    public function add_category() {
        $add_category = view('admin.pages.add_category');
        return view('admin.admin_master')->with('admin_content', $add_category);
    }

    public function add_sub_category() {
        $category = DB::table('tbl_category')->where('publication_status',1)->select('category_id','category_name')->get();
      //  echo json_encode($category);
       // exit();
    //    $subcat = DB::table('tbl_subcategory')->get();
       // $sub_category = view('admin.pages.add_sub_category', ['category' => $category,'subcat'=>$subcat]);
         $sub_category = view('admin.pages.add_sub_category', ['category' => $category]);
        return view('admin.admin_master')->with('admin_content', $sub_category);
    }

    public function get_subCategory_by_categoryid($id) {     
        $data = DB::table('tbl_subcategory')->select('subcategory_id', 'subcategory_name')->where('category_id', $id)->get();
        if (!$data->isEmpty()) {                       
         echo json_encode($data);
        } else {
            echo json_encode(0);
        }
    }

    public function save_category(Request $request) {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_discription'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;

        DB::table('tbl_category')->insert($data);
        return redirect::to('/add_category.aspx');
    }

    public function logout() {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        Session::put('message', 'You are successfully Logout!');
        return redirect::to('/login.aspx');
    }

    public function test() {
        $test = view('admin.pages.test');
        return view('admin.admin_master')->with('admin_content', $test);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
