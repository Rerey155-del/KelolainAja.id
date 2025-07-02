<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Custompackage;

class PaketController extends Controller
{
    // Tampilkan daftar paket berdasarkan kategori
    public function showPackagesByCategory($category)
    {
        // Tangani kategori khusus: Custom
        if (strtolower($category) === 'custom') {
            return $this->showCustomPackages();
        }

        // Ambil paket dari tabel packages
        $packages = Package::where('category', $category)->get();

        if ($packages->isEmpty()) {
            return abort(404, 'Paket tidak ditemukan');
        }

        // Pilih view berdasarkan kategori
        switch ($category) {
            case 'Media Sosial':
                return view('components.package_media_sosial', compact('packages'));
            case 'Desain':
                return view('components.package_desain', compact('packages'));
            default:
                return abort(404, 'Kategori tidak ditemukan');
        }
    }

    // Khusus menampilkan custom packages
    public function showCustomPackages()
    {
        $customPackages = Custompackage::all();

        if ($customPackages->isEmpty()) {
            return abort(404, 'Custom packages tidak ditemukan');
        }

        return view('components.package_custom', compact('customPackages'));
    }

    // Tampilkan detail paket, baik dari tabel packages atau custompackages
    public function show($id, $type = null)
    {
        if ($type === 'custom') {
            $paket = Custompackage::find($id);
        } else {
            $paket = Package::find($id);

            // Jika tidak ketemu di packages, coba di custompackages (optional fallback)
            if (!$paket) {
                $paket = Custompackage::find($id);
            }
        }

        if (!$paket) {
            return abort(404, 'Paket tidak ditemukan');
        }

        return view('layout.packageDescription', compact('paket'));
    }

}
