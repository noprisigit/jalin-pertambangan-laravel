<?php

namespace App\Helpers;

class FlashMsg
{
    public static function create_success(string $attribute)
    {
        return __(ucwords($attribute) . ' berhasil ditambahkan');
    }

    public static function create_failed(string $attribute)
    {
        return __('Terjadi kesalahan pada saat menambahkan ' . strtolower($attribute));
    }

    public static function update_success(string $attribute)
    {
        return __(ucwords($attribute) . ' berhasil diperbarui');
    }

    public static function update_failed(string $attribute)
    {
        return __('Terjadi kesalahan pada saat memperbarui ' . strtolower($attribute));
    }

    public static function delete_success(string $attribute)
    {
        return  __(ucwords($attribute) . ' berhasil dihapus');
    }

    public static function delete_failed(string $attribute)
    {
        return __('Terjadi kesalahan pada saat menghapus ' . strtolower($attribute));
    }

    public static function save_success(string $attribute)
    {
        return __(ucwords($attribute) . ' berhasil disimpan');
    }

    public static function save_failed(string $attribute)
    {
        return __('Terjadi kesalahan pada saat menyimpan ' . strtolower($attribute));
    }

    public static function sent_success(string $attribute)
    {
        return __(ucwords($attribute) .  ' berhasil dikirimkan');
    }

    public static function sent_failed(string $attribute)
    {
        return __('Terjadi kesalahan pada saat mengirimkan ' . strtolower($attribute));
    }
}
