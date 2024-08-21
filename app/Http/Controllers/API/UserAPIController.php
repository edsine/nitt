<?php

namespace App\Http\Controllers\API;

use Response;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateUserAPIRequest;
use App\Http\Requests\API\UpdateUserAPIRequest;
use App\Http\Requests\API\UpdateProfileAPIRequest;
use App\Http\Requests\API\UpdateProfileImageAPIRequest;
use App\Http\Requests\API\UpdateUserPasswordAPIRequest;

/**
 * Class UserAPIController
 * @package App\Http\Controllers\API
 */

class UserAPIController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     * GET|HEAD /users
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read user')) {
            return $this->sendError('Permission Denied', 403);
        }

        $users = $this->userRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(UserResource::collection($users), 'Users retrieved successfully');
    }

    /**
     * Store a newly created User in storage.
     * POST /users
     *
     * @param CreateUserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserAPIRequest $request)
    {
        if (!checkPermission('create user')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();
        $role = $input['role'];
        $input['password'] = bcrypt($input['password']);

        // $profile_image = $request->file('profile_image');
        // $file_name = '';
        // $path_folder = public_path('storage/profile_images');

        // if ($profile_image != '') {
        //     $validator = Validator::make(
        //         $request->all(),
        //         [
        //             'profile_image' => 'required',
        //             'profile_image.*' => 'required|profile_image|mimes:jpeg,png,jpg|max:2048'
        //         ]
        //     );

        //     if ($validator->fails()) {
        //         return $this->sendResponse($validator->errors(), 'validation');
        //     }

        //     $file_name = rand() . '.' . $profile_image->getClientOriginalExtension();
        //     $profile_image->move($path_folder, $file_name);
        // }

        // $input['profile_image_path'] = $file_name;
        $user = $this->userRepository->create($input);
        $user->syncRoles([$role]);

        return $this->sendResponse($user->toArray(), 'User saved successfully');
    }

    /**
     * Display the specified User.
     * GET|HEAD /users/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read user')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        return $this->sendResponse($user->toArray(), 'User retrieved successfully');
    }

    /**
     * Update the specified User in storage.
     * PUT/PATCH /users/{id}
     *
     * @param int $id
     * @param UpdateUserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserAPIRequest $request)
    {
        if (!checkPermission('update user')) {
            return $this->sendError('Permission Denied', 403);
        }

        if ($id == 1) {
            return $this->sendError('Cannot edit system user', 403);
        }

        $input = $request->all();
        $role = $input['role'];

        // $profile_image = $request->file('profile_image');
        // $file_name = '';
        // $path_folder = public_path('storage/profile_images');

        // if ($profile_image != '') {
        //     $validator = Validator::make(
        //         $request->all(),
        //         [
        //             'profile_image' => 'required',
        //             'profile_image.*' => 'required|profile_image|mimes:jpeg,png,jpg|max:2048'
        //         ]
        //     );

        //     if ($validator->fails()) {
        //         return $this->sendResponse($validator->errors(), 'validation');
        //     }

        //     $file_name = rand() . '.' . $profile_image->getClientOriginalExtension();
        //     $profile_image->move($path_folder, $file_name);
        // }

        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        // $path_to_old_image = $path_folder . "/" . $user->profile_image_path;
        // deleteImageWithPath($path_to_old_image);

        // $input['profile_image_path'] = $file_name;
        $user = $this->userRepository->update($input, $id);
        $user->syncRoles([$role]);

        return $this->sendResponse($user->toArray(), 'User updated successfully');
    }

    /**
     * Update the specified User in storage.
     * PUT/PATCH /users/update_profile/{id}
     *
     * @param int $id
     * @param UpdateProfileAPIRequest $request
     *
     * @return Response
     */
    public function updateProfile($id, UpdateProfileAPIRequest $request)
    {
        $input = $request->all();

        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $user = $this->userRepository->update($input, $id);

        return $this->sendResponse($user->toArray(), 'User updated successfully');
    }

    /**
     * Update the specified User in storage.
     * PUT/PATCH /users/update_profile_image/{id}
     *
     * @param int $id
     * @param UpdateProfileImageAPIRequest $request
     *
     * @return Response
     */
    public function updateProfileImage($id, UpdateProfileImageAPIRequest $request)
    {

        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $profile_image = $request->file('profile_image');
        if ($profile_image == null) {
            return $this->sendError('An error occured');
        }

        $path_folder = public_path("storage/profile_images");
        $old_image_path = $path_folder . "/" . $user->profile_image_path;
        deleteImageWithPath($old_image_path);

        $file_name = rand() . '.' . $profile_image->getClientOriginalExtension();
        $profile_image->move($path_folder, $file_name);
        $user->profile_image_path = $file_name;
        $user->save();


        return $this->sendResponse($user->toArray(), 'Profile image updated successfully');
    }

    /**
     * Update the specified User password in storage.
     * PUT/PATCH /users/change_password/{id}
     *
     * @param int $id
     * @param UpdateUserPasswordAPIRequest $request
     *
     * @return Response
     */
    public function changePassword(UpdateUserPasswordAPIRequest $request)
    {

        $user = Auth::user();
        $user_id = $user->id;

        $password = $request->get('password');

        /** @var User $user */
        $user = $this->userRepository->find($user_id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $user = $this->userRepository->update(['password' => bcrypt($password)], $user_id);

        return $this->sendResponse($user->toArray(), 'User password updated successfully');
    }

    /**
     * Remove the specified User from storage.
     * DELETE /users/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete user')) {
            return $this->sendError('Permission Denied', 403);
        }

        if ($id == 1) {
            return $this->sendError('Cannot delete system user', 403);
        }

        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $user->delete();

        return $this->sendSuccess('User deleted successfully');
    }
}
