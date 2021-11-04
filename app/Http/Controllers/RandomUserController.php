<?php

namespace App\Http\Controllers;

use App\Models\RandomUsers;
use Illuminate\Http\Request;

class RandomUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$rUsers = RandomUsers::paginate(10);
        
        return view('RandomUser.index', [
            'data' => RandomUsers::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        die('The request cannot be executed!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ((bool) $request->input('addUsers')) {
            $users = $this->getUsers();
            if ($this->insertUsers($users)) {
                return redirect()->back();
            }
        }
        
        #  return 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        die('The request cannot be executed!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        die('The request cannot be executed!');
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
        die('The request cannot be executed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        die('The request cannot be executed!');
    }

    public function getUsers(int $num = 10)
    {   
        return json_decode($this->curlGet('https://randomuser.me/api/?results=' . $num), true);
    }

    public function getPhotos($url)
    {
        return $this->curlGet($url); 
    }

    private function curlGet(string $url)
    {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_TIMEOUT => 4,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0
        ]);
        
        if( ! $result = curl_exec($ch)) {
            trigger_error(curl_error($ch));
        }
        
        curl_close($ch);
        
        return $result;        
    }

    public function insertUsers(array $users)
    {
        foreach($users['results'] as $user) {
            $data[] = [
                'name' => $user['name']['first'] . ' ' . $user['name']['last'],
                'age' => $user['dob']['age'],                     		
                'gender' => $user['gender'],
                'city' => $user['location']['city'],
                'country' => $user['location']['country'],
                'email' => $user['email'],
                'salt' => $user['login']['salt'],
                'passwsha256' => $user['login']['sha256'],
                'image_url' => $user['picture']['medium'],
                'image' => $this->getPhotos($user['picture']['medium'])
            ];
        }

        if (RandomUsers::insert($data)) {
            return true;
        }

        return false;
    }
}
