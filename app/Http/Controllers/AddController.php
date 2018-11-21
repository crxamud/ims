<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hash;
use \App\User;
use \App\Model\Supplier;
use \App\Model\Purchase;
use \App\Model\Category;
use \App\Model\Account;
use \App\Model\AccountsInfo;
use Validator;
use Session;
use \App\Model\Product;
use \App\Model\SubCategory;

class AddController extends Controller
{
   public function Main()
   {
   		return view('add.main');
   }

   public function create(Request $data){
    if($data->has('id')){
      $validate = Validator::make($data->all(),[
      'name' => 'required|min:3',
      'email' => 'required',
      'password' => 'required|min:6',
      'password_confirmation' => 'required|same:password',
    ]);
    if($validate->fails()){
      return redirect()->back()->withErrors($validate)->withInput();
    }else {
      $row = User::find($data->id);
      $row->name = $data->name;
      $row->email = $data->email;
      $row->password = Hash::make($data->password);
      $row->save();
    }
    }else{
    $validate = Validator::make($data->all(),[
      'name' => 'required|min:3',
      'email' => 'required|unique:users',
      'password' => 'required|min:6',
      'password_confirmation' => 'required|same:password',
    ]);
if($validate->fails()){
  return redirect()->back()->withErrors($validate)->withInput();
}else{

    User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);
}
}
    return redirect('/manage?table=User');
 }



   public function createSupplier(Request $req){

  $msg = array('suppliername.required' => "Fadlan, geli magaca supplier",
              'address.required' => 'Fadlan, address geli',
              'suppliername.min' => 'Magaca Supplier ka kama yaran karo 4 xaraf',
              'tel.required' => "Telka lagama tegi karo",
              'tel.min' => "Telku kama yaran karo 6 god karo");
    $rules = array(
              'suppliername' => 'required|min:4',
              'address' => 'required',
              'tel' => 'required|min:6',
              );
      $validate = Validator::make($req->all(),$rules,$msg);
      if($validate ->fails()){
        return redirect()->back()->withErrors($validate)->withInput();
      }else{
        if($req->has('id')){
          $record = Supplier::find($req->id);
          $record->name = $req->suppliername;
          $record->address = $req->address;
          $record->tell = $req->tel;
          $record->user_id = Auth::user()->id;
          $record->save();

        }else{
        Supplier::create([
          'name'=> $req->input('suppliername'),
          'address'=>$req->input('address'),
          'tell'=>$req->input('tel'),
          'user_id'=>Auth::user()->id,
          ]);
        }
  }
   	
     return redirect('/manage?table=Supplier');
 }

 public function createPurchase(Request $request)
 {
   if($request->has('id')){
         $row = Purchase::find($req->id);
        $row-> $request->name;
        $row-> $request->quantity;
        $row -> $request->unitPrice;
        $row-> $request->userid;
        $row->save();
   }else{
    Purchase::create([
      'name'=>$request->input('productname'),
      'quantity'=>$request->input('quantity'),
      'unitPrice' => $request->input('unitprice'),
      'total' => ($request->input('unitprice') * $request->input('quantity')),
      'userid'=>Auth::user()->id,
    ]);
   }

   return redirect('/manage?table=Purchase');
 }

public function createCategory(Request $data){
  $msg = array('name.required' => 'Fadlan, Geli Category Name',
                'name.min' => "Waxa uga yar wa 3 xaraf",
                'name.unique' => "Categorigaan horey ayow u jiray",);
  $rules = array('name'=>'required|min:3|unique:categories');
  $validate = Validator::make($data->all(),$rules,$msg);
  if($validate->fails()){
    return redirect()->back()->withErrors($validate)->withInput();
  }else{
    if($data->has('id')){
      $row = Category::find($data->id);
      $row->name = $data->name;
      $row->user_id = Auth::user()->id;
      $row->save();
      return redirect('/manage?table=Category');
    }
     Category::create([
      'name'=> $data->name,
      'user_id'=> Auth::user()->id,
  ]);

  }
 
  return redirect('/add?SubCategory=true');
}

public function creatAccount(Request $account){
  $cmsg  = array('account_no.unique' =>'Account kaan horaa loo diiwaan geliyey!',
                  'account_no.min' =>'Account kama yaran karo 6 number!',
                  'name.min' =>'Magacu kama yaraan karo 5 xaraf',
                  'name.required' =>'Magaca lagama tegi karo', 
                );

  $rules = array(
    'account_no'=>'required|min:6|unique:accounts',
    'name'=>'string|required|min:5',
    'user_id'=> 'numeric',
  );

  $validate = Validator::make($account->all(),$rules,$cmsg);

  if ($validate->fails()) {
    return redirect()->back()->withErrors($validate)
                        ->withInput();
  }
  else
  {

    if($account->has('id')){
      $r = Account::find($account->id);
      $r = $account->account_no;
      $r = $account->name;
      $r = $account->user_id;
      $r = $account->date;
      $r->save();
    }else
    {
    Account::create([
        'account_no' => $account->account_no,
        'name'=> $account->name,
        'user_id'=> Auth::user()->id,

    ]);
  }
}
  return redirect('/add?AccountsInfo=true');
}

public function accountsInfo(Request $request){
  //return $request;
   $cmsg  = array('accounts.required' =>'Fadlan, Waa inad Account doorataa!',
                  'type.required' =>'Fadlan, Dooro Nooca Lacagta',
                  'amount.required' =>'waxa ugu yar o ad gelin karto waa 1',
                  'description.required' =>'Fadlan, Faahfaahin Raaci',
                );


  $rules = array(
    'accounts'=>'required',
    'amount'=>'required|min:1',
    'description'=>'required',
  );

  $validate = Validator::make($request->all(),$rules,$cmsg);

  if ($validate->fails()) {
    return redirect()->back()->withErrors($validate)
                        ->withInput();
  }
  else
  {
    $balance;
    $Dr = 0;
    $Cr = 0;
    $acc = AccountsInfo::where("account_no",$request->accounts)->orderBy('id', 'desc')->first();
    if (!empty($acc)) {
      if ($request->type == "dr") {
         if (!empty($request->amount) || $request->amount>0) 
          {
            $balance = ($request->amount + $acc->Balance);
            $Dr = $request->amount;
            $Cr = 0;

          }
       } //end if of Dr
        else{
           if ($request->amount <= $acc->Balance) {
            $balance =  ($acc->Balance - $request->amount);
             $Dr = 0;
            $Cr = $request->amount;

          }
         else
          {
            Session::flash('message', 'Sorry unsufficient Balance'); 
           return redirect()->back()->withInput();
          } 
       } //end else of Cr

    }
    else{
      if($request->type == "dr"){
        if($request->amount > 0 && !empty($request->amount)){
          $Dr = $request->amount;
          $balance = $Dr;
        }
      }
      else{
         Session::flash('message', 'Sorry, First Must be deposited'); 
           return redirect()->back()->withInput();
      }
      // $balance = ($request->amount!=0?$request->amount:$request->amount);
    }
  
    AccountsInfo::create([
     'account_no'=> $request->accounts,
     'describtion'=>$request->description,
     'Dr'=>$Dr,
     'Cr'=>$Cr,
     'user_id'=>Auth::user()->id,
     'Balance'=>  $balance,

    ]);
  }

  return redirect('/manage?table=AccountsInfo');
 // return redirect('/manage?table=Category');
}

public function purchases(){
  return view('add.content.purchases');
}


public function subCategory(Request $request){
 $msg = array('category.required' => 'Fadlan, Dooro Category',
              'subname.required' => "fadlan, Qor Sub category",
              'subname.min' => "fadlan, Waxa ugu yar 3 xaraf",
               );
 $rules = array('category' =>'required' ,
                  'subname' => 'required|min:3');
 $validate = Validator::make($request->all(),$rules,$msg);
 if($validate->fails()){
  return  redirect()->back()->withErrors($validate)
                        ->withInput();
 }else{
  if($request->has('id')){
    $row = SubCategory::find($request->id);
    $row->cat_id = $request->category;
    $row->name = $request->subname;
    $row->user_id = Auth::user()->id;
    $row->save();

  }
  SubCategory::create([
    'cat_id'=>$request->category,
    'name'=> $request->subname,
    'user_id' => Auth::user()->id,
  ]);
 }

  return redirect('/manage?table=SubCategory');
}

public function generalload(Request $data)
{
      $table = '\App\Model\\'.$data->table;
      $result;
      if ($data->condtion) {
       $result = $table::where($data->condtion,$data->value)->get();
      }else{
        $result = $table::all();
      }
      return response()->json($result);
}



public function genenalSaver(Request $data)
{
  $valid =Validator::make($data->all(),[
      'selectaccount'=> "required",
       'supplier'=>'required',
  ]);

 $input = $data->all();
  $rules = [];
$msg = [];
foreach($input['category'] as $key => $val)
{
    $rules['category.'.$key] = 'required|min:1';
    $rules['subcategory.'.$key] = 'required|min:1';
    $rules['quantity.'.$key] = 'required|min:1';
    $rules['unitprace.'.$key] = 'required|min:1';
};
//$rules['selectaccount'] = 'required';
foreach($input['category'] as $key => $val)
{
    $msg['category.'.$key] = 'Fadlan, Waa inad Account doorataa!';
    $msg['subcategory.'.$key] = 'Fadlan, Dooro Nooca Lacagta';
    $msg['quantity.'.$key] = 'waxa ugu yar o ad gelin karto waa 1';
    $msg['unitprace.'.$key] = 'waxa ugu yar o ad gelin karto waa 1';
};
//$msg['selectaccount'] = "Fadlan, Account Dooro";
$inputs=[];
$validate = Validator::make($input,$rules,$msg);
  if ($validate->fails() || $valid->fails()) {
    if ($validate->fails()) {
      return response()->json($validate->messages());
    }
    return response()->json($valid->messages());
  }else{
    foreach ($input['category'] as $key => $value) {
       $inputs[]= array('cat_id' => $input['category'][$key],
                         'subcat_id' =>$input['subcategory'][$key],
                         'quantity' => $input['quantity'][$key],
                         'unit_price' => $input['unitprace'][$key],
                         'amount' => $input['total'][$key],
                         'supplier_id' => 2,
                         'account_no' =>31139742,
                         'user_id' => Auth::user()->id, );
    }
    Product::insert($inputs);

    $succ = new \stdClass;
    $succ->success = true;
    $succ->message = "Saved Successfully";
    return response()->json($succ,200);
   
 }
}

}
