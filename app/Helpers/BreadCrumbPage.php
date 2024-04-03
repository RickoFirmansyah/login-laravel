<?php
class BreadCrumbPage
{
    public static function init($firstBreadcrumb = '')
    {
        // Mendapatkan URL saat ini
        $currentUrl = url()->current();

        // Menghapus protokol HTTP dan alamat IP dari currentUrl
        $currentUrl = preg_replace('/^(?:https?:)?\/\/[^\/]+/', '', $currentUrl);

        // Menghapus segmen pertama dari currentUrl jika sesuai dengan firstBreadcrumb
        if (!empty($firstBreadcrumb)) {
            $currentUrl = preg_replace('/^\/?' . preg_quote($firstBreadcrumb, '/') . '\//', '', $currentUrl, 1);
        }


        // Explode currentUrl berdasarkan '/'
        $urlSegments = array_filter(explode('/', $currentUrl), function($val){
            return $val !== '';
        });

        // Variabel untuk menyimpan breadcrumb
        $breadcrumbs = [];

        // Variabel untuk menyimpan URL yang terakumulasi
        $accumulatedUrl = '';

        // Looping setiap segmen URL
        foreach ($urlSegments as $segment) {
            // Tambahkan segmen ke URL yang terakumulasi
            $accumulatedUrl .= $segment.'/';
            // dd($accumulatedUrl);
            // Tambahkan breadcrumb
            $breadcrumbs[] = [
                'link' => substr(url()->to($accumulatedUrl),0),
                'name' => ucwords(str_replace('-', ' ', $segment)),
            ];
        }

        return $breadcrumbs;
    }
}

