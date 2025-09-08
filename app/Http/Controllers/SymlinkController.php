<?php

namespace App\Http\Controllers;

class SymlinkController extends Controller
{
    public function index()
    {
        $target = storage_path('app/public');
        $link = public_path('storage');

        if (!file_exists($link)) {
            symlink($target, $link);
            return 'Symlink created successfully!';
        }

        return 'Symlink already exists.';
    }
}
