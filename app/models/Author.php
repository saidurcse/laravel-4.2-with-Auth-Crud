<?php
class Author extends Eloquent
{
    //protected $fillable = array('email', 'password');

    static public function getData()
    {
        /*return DB::table('authors')->get();*/

        return  DB::table('login_crud')
            ->select('*')
            ->orderBy('first_name', 'asc')
            ->take(10)
            ->get();

    }

    static public function view($id)
    {
        /*return DB::table('authors')->get();*/

        return  DB::table('login_crud')
            ->where('id',$id)
            ->select('*')
            ->orderBy('first_name', 'asc')
            ->take(10)
            ->get();

    }

    static public function insertData($data)
    {
        /*return DB::table('authors')->get();*/

        //print_r($data);
        return DB::table('login_crud')->insert(
            array
            (
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'updated_at' => date('Y-m-d H:i;s')
            )
        );

    }

    static public function updateData($data)
    {
        return DB::table('login_crud')
            ->where('id', $data['id'])
            ->update(
                array(
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'updated_at' => date('Y-m-d H:i;s')
                ));
    }

    static public function deleteData($data)
    {
        return DB::table('login_crud')->where('id', $data['id'])->delete();
    }

    static public function login($data)
    {
        $user = DB::table('login_crud')
            ->where('email',$data['email'])
            ->where('password',$data['password'])
            ->first();

        if(!empty($user)) {
            return $user->id;
        } else
        {
            return 0;
        }
    }
}

?>