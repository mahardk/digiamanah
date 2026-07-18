<?php

namespace App\Observers;

use App\Models\Produk;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class ProdukObserver
{
    public function created(Produk $produk): void
    {
        $this->generateQrCode($produk);
    }

    public function updated(Produk $produk): void
    {
        if ($produk->isDirty('slug')) {
            $this->generateQrCode($produk);
        }
    }

    protected function generateQrCode(Produk $produk): void
    {
        $url = url('/produk/' . $produk->slug);

        $fileName = 'qrcodes/produk-' . $produk->id . '-' . $produk->slug . '.svg';

        $qrCode = QrCode::format('svg')
            ->size(300)
            ->generate($url);

        Storage::disk('public')->put($fileName, $qrCode);

        $produk->updateQuietly(['qr_code' => $fileName]);
    }

    public function deleted(Produk $produk): void
    {
        if ($produk->qr_code && Storage::disk('public')->exists($produk->qr_code)) {
            Storage::disk('public')->delete($produk->qr_code);
        }
    }
}