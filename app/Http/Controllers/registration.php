<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registermodel;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Hash;

class registration extends Controller
{
    public function index()
    {
        return view("registerform");
    }

    public function dropzonestore(Request $request)
    {
        $image = $request->file('file');
        foreach ($image as $images) {
            $imagename = uniqid() . "." . $images->getClientOriginalExtension();
            $images->move(public_path('dropzone'), $imagename);
        }
        return $imagename;
    }
    
    public function dropzone_view()
    {
        return view("dropzone");
    }

    public function removefile(Request $request)
    {
        $image = $request['removeimageName'];
        $imagepath=public_path('dropzone/');
        unlink($imagepath.$request['removeimageName']);
        return $image;
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'gender' => 'required',
            'password' => 'required',
        ]);

        $users = new registermodel();
        // dd($request->all());
        $users->name = $request['name'];
        $users->email = $request['email'];
        $users->phone = $request['phone'];
        $users->dob = $request['date'];
        $users->hobbie = implode(",", $request['hobbie']);
        $users->gender = $request['gender'];
        $users->image = $request['image'];
        $users->password = Hash::make($request['password']);
        $users->save();
        return redirect()->route('user_view');
    }



    public function user_view()
    {
        // $user = registermodel::all();
        // $data=compact('user');
        // return view('users_view')->with($data);
        return view('users_view');
    }

    public function user_list()
    {
        $user = registermodel::all();
        foreach ($user as $row) {
            $action = "<a href=" . route('user_edit', $row->id) . " class='btn btn-info'>Edit</a>";
            $action .= '<a href=' . route("user_delete", $row->id) . ' class="btn btn-danger">Delete</a>';
            $date = date('d-M-Y', strtotime($row->dob));
            $imagepath = asset('image/' . $row->image);
            $image = '<img src="' . $imagepath . '" height="50px" width="50px">';
            $data[] = array(
                $row->id,
                $row->name,
                $row->email,
                $row->phone,
                $date,
                $row->gender,
                $image,
                $action
            );
        }
        echo json_encode($data);
    }

    public function user_delete($id)
    {
        $user = registermodel::find($id);

        if (!is_null($user)) {
            $user->delete();
        }
        return redirect()->route('user_view');
    }

    public function user_edit($id)
    {
        $user = registermodel::find($id);
        // dd($user);
        if (!is_null($user)) {
            return view('edit_view', [
                'user' => $user,
                'hobbie' => explode(',', $user->hobbie),
                'image' => explode(',', $user->image)
            ]);
        }
        return redirect()->route('user_view');
    }

    public function user_update($id, Request $request)
    {
        $user = registermodel::find($id);
        if (!is_null($user)) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'date' => 'required',
                'gender' => 'required',
            ]);

            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->dob = $request['date'];
            $user->hobbie = implode(',', $request['hobbie']);
            $user->gender = $request['gender'];
            $user->save();
            return redirect()->route('user_view');
        } else {
            return redirect()->route('user_view');
        }
    }
}
