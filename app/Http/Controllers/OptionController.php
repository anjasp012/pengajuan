<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Projek;
use App\Models\Tipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class OptionController extends Controller
{
    public function projekList(Request $request)
    {
        return $this->extendedIndex($request, Projek::query());
    }

    public function produkByProjek(Projek $projek)
    {
        $data = Cache::remember('produkByProjek' . $projek->id_projek, 60 * 5, function () use ($projek) {
            return Produk::where('id_projek', $projek->id_projek)->get();
        });
        return $data;
    }

    public function tipeByProjek(Projek $projek)
    {
        $data = Cache::remember('tipeByProjek' . $projek->id_projek, 60 * 5, function () use ($projek) {
            return Tipe::where('id_projek', $projek->id_projek)->get();
        });
        return $data;
    }

    public function hargaProduk(Produk $produk)
    {
        return $produk;
    }

    public function generalManagerProjek(Projek $projek)
    {
        return $projek->generalManager()->firstOrFail();
    }

    public function managerProjek(Projek $projek)
    {
        // dd($produk->manager()->get());
        return $projek->manager()->get();
    }
}
