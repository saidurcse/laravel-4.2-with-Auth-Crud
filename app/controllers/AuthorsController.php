<?php
class AuthorsController extends BaseController
{

    public function login()
    {
        return View::make('authors.login')
            ->with('title','Admin Login');

    }

    public function loginAuthor()//register process form
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|alphaNum|min:3'
        );

        // create custom validation messages ------------------
        $messages = array(
            'required' => 'The :attribute is really really really important.',
            'same'  => 'The :others must match.'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails())
        {
            $messages = $validator->messages();
            return Redirect::to('/')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }
        else
        {
            $input = Input::all();
            $id = Author::login($input);

            if($id)
            {
                Session::put('id', $id);
                return Redirect::to("authors/$id")->with("message", "Welcome  Admin");
            } else
            {
                return Redirect::to("/")->with("error_message", "Login Failed. Please try again");
            }
        }
    }

    public function index()
    {

        $data = Author::getData();
        return View::make('authors.index')
            ->with('title','Author List')
            ->with(compact('data'));

    }

    public function view($id)
    {
        $this->checkLog();

        $data = Author::view($id);
        return View::make('authors.view')
            ->with(compact('data'))
            ->with('title','Author Information');

    }

    public function newAuthor()
    {
        $this->checkLog();
        return View::make('authors.new')
            ->with('title','Add New Admin');

    }
    public function saveAuthor()//register the admin
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'first_name'=> 'alpha|min:2',
            'last_name'=> 'alpha|min:2',
            'email'    => 'required|email|unique:login_crud',
            'password' => 'required|alphaNum|min:3'
        );

        // create custom validation messages ------------------
        $messages = array(
            'required' => 'The :attribute is really really really important.',
            'same'  => 'The :others must match.'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules, $messages);



        if ($validator->fails())
        {
            $messages = $validator->messages();
            return Redirect::to('authors/newAuthor')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }
        else
        {
            $userdata = array
            (
                'first_name' => Input::get('first_name'),
                'last_name' => Input::get('last_name'),
                'email' 	=> Input::get('email'),
                'password' 	=> Hash::make(Input::get('password'))
            );
            $data = Author::insertData($userdata);
            return Redirect::to('authors')->with('message', 'Insert Data Successfully');
        }

    }

    public function updateAuthor()
    {
        $id=Input::get('id');

        $data = Author::view($id);
        return View::make('authors.update')
            ->with(compact('data'))
            ->with('title','update Information');
    }

    public function saveinfo()//Update data
    {
        $input = Input::all();
        $data = Author::updateData($input);
        $id = $input['id'];

        if($data)
        {
            return Redirect::to("authors/$id")->with("message", "Update Data Successfully");
        } else
        {
            return Redirect::to("authors/$id")->with("error_message", "Update Data Failed");
        }

    }

    public function deleteAuthor()
    {
        $input = Input::all();

        $data = Author::deleteData($input);
        $id = $input['id'];

        if($data)
        {
            return Redirect::to("authors")->with("message", "Delete Data Successfully");
        } else
        {
            return Redirect::to("authors/$id")->with("error_message", "Delete Data Failed");
        }

    }


    public function checkLog()
    {
        $id = Session::get('id');
        if($id)
        {
            return true;
        } else
        {

            return Redirect::to("/")->with("error_message", "Login Failed. Please try again");
        }

    }

    public function logout()
    {
        Session::flush();
        return Redirect::to("/")->with("error_message", "Logout Successfully.");

    }
}
?>