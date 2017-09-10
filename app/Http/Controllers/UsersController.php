<?php
namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Get all users data.
     *
     * @return void
     */
    public function index()
    {
        $limit = 5;

        $users = Users::orderBy('created_at', 'desc')->paginate(5);

        if($users)
        {
            $res['success'] = true;
            $res['messages'] = $users;

            return response($res);
        }
        else
        {
            $res['success'] = false;
            $res['messages'] = "Cannot find users.";

            return response($res);
        }
    }

    /**
     * Get single data by requested id
     *
     * @param String id
     */
    public function single($id)
    {
        // Get single user
        $user = Users::find($id);

        if($user)
        {
            $res['success'] = true;
            $res['messages'] = $user;

            return response($res);
        }
        else
        {
            $res['success'] = false;
            $res['messages'] = "Cannot find users.";

            return response($res);
        }
    }

    /**
     * Posting user data
     *
     *
     */
    public function posting(Request $request)
    {
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $address = $request->input('address');
        $email = $request->input('email');
        $contact = $request->input('contact');

        $posted = Users::create([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'address' => $address,
            'email' => $email,
            'contact' => $contact
        ]);

        if($posted)
        {
            $res['success'] = true;
            $res['messages'] = "Data has been saved";

            return response($res);
        }
        else
        {
            $res['success'] = false;
            $res['messages'] = "Failed to save the data";

            return response($res);
        }
    }

    /**
     * Delete user data
     *
     * @param String id
     */
    public function delete($id)
    {
        // Check user id
        $userExist = Users::find($id);

        if($userExist)
        {
            $user = Users::find($id);

            if($user->delete())
            {
                $res['success'] = true;
                $res['messages'] = 'Data deleted';

                return response($res);
            }
            else
            {
                $res['success'] = false;
                $res['messages'] = 'Failed to delete data';

                return response($res);
            }
        }
        else
        {
            $res['success'] = false;
            $res['messages'] = 'User not found';

            return response($res);
        }
    }

    /**
     * Update users data
     *
     * @param String id
     */
    public function update(Request $request, $id)
    {
        // Check user id
        $userExist = Users::find($id);

        if($userExist)
        {
            // Update user
            $updated = Users::find($id);
            $updated->firstName = $request->input('firstName');
            $updated->lastName = $request->input('lastName');
            $updated->address = $request->input('address');
            $updated->email = $request->input('email');
            $updated->contact = $request->input('contact');

            if($updated->save())
            {
                $res['success'] = true;
                $res['messages'] = 'Data has been updated';

                return response($res);
            }
            else
            {
                $res['success'] = false;
                $res['messages'] = 'Failed to update data';

                return response($res);
            }
        }
        else
        {
            $res['success'] = false;
            $res['messages'] = 'User not found';

            return response($res);
        }
    }
}
