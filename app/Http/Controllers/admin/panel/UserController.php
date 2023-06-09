<?php

namespace App\Http\Controllers\admin\panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(User $user): View {

        $tableName = 'users';
        $columns = Schema::getColumnListing($tableName);
        $columnsToExclude = ['email_verified_at', 'password', 'remember_token', 'updated_at'];
        $filteredColumns = array_diff($columns, $columnsToExclude);
        $viewData = [
            'title' => 'Manage users',
            'users' => $user->get(),
            'columns' => $filteredColumns,
        ];

        return view('admin.panel.users', $viewData);

    }
}
