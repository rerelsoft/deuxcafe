<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}");
        }

        return abort(404);
    }
    
    public function type()
    {
        return view("type.index");
    }
    
    public function menu()
    {
        $menu = [];
        return view("menu.index", compact('menu'));
    }

    public function kategori()
    {
        $kategori = [];
        return view("kategori.index", compact('kategori'));
    }

    public function pelanggan()
    {
        $pelanggan = [];
        return view("pelanggan.index", compact('pelanggan'));
    }

    public function pemesanan()
    {
        $pemesanan = [];
        return view("pemesanan.index", compact('pemesanan'));
    }

    public function profile()
    {
        return view("pages.profile-static");
    }

    public function signin()
    {
        return view("pages.sign-in-static");
    }

    public function signup()
    {
        return view("pages.sign-up-static");
    }
}
