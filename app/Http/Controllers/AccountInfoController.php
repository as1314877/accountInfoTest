<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Account_info;
use Log;

class AccountInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Account_info::paginate(5);
        // return redirect()->to('/index')->with('account_infos', $accountInfos);
        return view('home', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account_info.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info("in1");
        $request->validate([
            'account' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'email' => 'required',
        ],
        [
            'account.required' => '請輸入帳號!',
        ]);
        Log::info("in2");
        // Log::info($res);
        dd($request);
        Log::info("in3");
        // $account = new Account_info;
        // $account->account = $request->account;
        // $account->name = $request->name;
        // $account->gender = $request->gender;
        // $account->birthday = $request->birthday;
        // $account->email = $request->email;
        // $account->remark = $request->remark;
        // $account->save();

        // return redirect()->to('/');
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
    public function edit($account)
    {

        $result = $this->findByAccount($account);
        Log::info($result);
        return view('account_info.edit', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(Request $request)
    {
        // dd($request->all());
        // $data = $request->all();
        // $data = $request->all();
        $data = $request->input('updateData');
        Log::info($data);

        // $request->input('updateData')->validate([
        //     'name' => 'required',
        //     'gender' => 'required',
        //     'birthday' => 'required',
        //     'email' => 'required',
        // ]);
        $account = $this->findByAccount($data["editAccount"]);
        Log::info("account:".$account);
        $account->name = $data["editName"];
        $account->gender = $data["editGender"];
        $account->birthday = $data["editBirthday"];
        $account->email = $data["editEmail"];
        $account->remark = $data["editRemark"];
        $results = $account->save();
        Log::info($results);
        return $results;
        // return redirect()->route('account_info.edit', [$account->account])->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $data = $request->input('deleteData');
        Log::info($data);

        $result = $this->findByAccount($data["deleteAccount"]);
        $result = $result->delete();

        Log::info($result);
        return $result;
    }

    public function findByAccount($account){
        return Account_info::where('account', $account)->firstOrFail();
    }

    public function searchByAccount(Request $request){
        Log::info("searchByAccount IN:");
        $data = $request->input('searchData');
        Log::info($data);
        $resAccount = Account_info::where('account', $data['account'])->get();
        Log::info($resAccount);
        return $resAccount;
        // return redirect()->to('account_info/search')->with('resAccount', $resAccount);
        // return redirect('account_info.search', compact('resAccount'));
    }


}
