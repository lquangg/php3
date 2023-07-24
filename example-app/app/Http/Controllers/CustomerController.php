<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    //Nơi viết code
    // Cú pháp : public function tên_pt(){};
    public function index(){
        // dd dùng debug code
        dd("Heloo world");
    }
    public function hcn($cd,$cr){
        $cv = 2 * ( $cd + $cr);
        $s = $cd * $cr;
        dd("Chu vi hình chữ nhật là : $cv
        Diện tích hình chữ nhật là : $s");
    }
    public function customer(){
        //Cách để truy cập dữ liệu trong database
        //Lấy toàn bộ dữ liệu trong bảng

        // $customers = DB::table('customer')->get();
        // dd($customers);

        // Lấy 1 số trường
        // $customers = DB::table('customer')
        //     ->select('name')
        //     ->get();
        // dd($customers);
        // $customer = DB::table('customer')
        //     ->where('name','Minh')
        //     ->first();
        // có bao nhiêu điều kiện thì có bính nhiêu where

        // Điều kiện gần đúng
        //     $customer = DB::table('customer')
        //     ->where('name','like','%inh%')
        //     ->get();
        // dd($customer);

        //Đếm số bản ghi
        // $countCustomer = DB::table('customer')->count();
        // dd($countCustomer); // Tổng số bản ghi ở trong bảng

        // Xóa bản ghi theo điều kiện
        // $deleteCustomer = DB::table('customer')->where('id',3)->delete();
        // dd($deleteCustomer); trả về 0 hoặc 1

        $update = DB::table('customer')
            ->where('id',1)
            ->update(['gender'=> 1,'name'=>'Minh']);
        dd($update);
    }
    //request hứng dữ liệu ở db
    public function list(Request $request){
        $title = "Danh sách";
        // $name = 'Vũ Tuấn Minh';
        // $email = "minh@gmail.com";
        // $phone = "0123456789";
        // $adress = "Hà Nội";
        // $gender = 1;
        //Hiển thị ra view blade
        // return view('customer.index',compact('title','name','email','phone','adress','gender'));

        // $customers=DB::table('customer')->get();
        $customers = Customer::all();
        if($request -> post() && $request->search_name){
            $customers=DB::table('customer')
             ->where('name','like','%'.$request->search_name.'%')
             ->get();
        }
         return view('customer.index',compact('title','customers'));
    }
    public function add_customer(Request $request){
        $title = "Thêm khách";

        if($request ->isMethod('post')){

            //lấy dữ liệu mà request gửi lên
            $params = $request->post();
            unset($params['_token']);
            unset($params['them']);

            if($request->hasFile('image') && $request->file('image')->isValid()){

                $request->image = uploadFile('hinh',$request->file('image'));
            }

            // dd($params);
            // DB::table('customer')->insert($params);
            $customer  = new Customer();
            $customer->name= $request->name;
            $customer->email= $request->email;
            $customer->sdt= $request->sdt;
            $customer->address= $request->address;
            $customer->date_of_birth= $request->date_of_birth;
            $customer->gender= $request->gender;
            $customer->image= $request->image;


            // thực hiện công việc lưu
            $customer->save();
            if( $customer->save()){
              Session::flash('success','Thêm khách hàng thành công');
            //   return redirect()->router('search');
            return view('customer.index',compact('title'));
            }else{
                Session::flash('error','Thêm khách hàng lỗi');
            }
        }
        return view('customer.add',compact('title'));
    }
    public function edit_customer ( CustomerRequest $request, $id ) {
        $title = "Edit Customer";

        // Tìm kiếm thông tin chi tiết của 1 bản ghi theo id
        $detail = Customer::find($id);
        if($request->isMethod('post')){
            $update = Customer::where('id',$id)->update($request->except('_token'));
            //giống unset
        }

        return view('customer.edit', compact('title', 'detail'));
    }
    public function delete_customer($id){
        if($id){
            $deleted = Customer::where('id',$id)->delete();
            if($deleted){
                Session::flash('success','xóa khách hàng thành công');

                return redirect()->route('search');
                }else{
                    Session::flash('error','Thêm khách hàng lỗi');
                    return redirect()->route('search');
                }
        }
    }
}
