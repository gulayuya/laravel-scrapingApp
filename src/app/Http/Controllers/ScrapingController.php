<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Weidner\Goutte\GoutteFacade as GoutteFacade;

class ScrapingController extends Controller
{
    public function index()
    {
        // スクレイピングするサイト
        $goutte = GoutteFacade::request('GET', 'https://www.amazon.co.jp/gp/bestsellers/electronics/3946818051?ref_=Oct_BSellerC_3946818051_SAll&pf_rd_p=7019a35e-d4ad-5da4-8fdd-f9f5c8ef9428&pf_rd_s=merchandised-search-10&pf_rd_t=101&pf_rd_i=3946818051&pf_rd_m=AN1VRQENFRJN5&pf_rd_r=61C7KYXHQFEAY80RGM67&pf_rd_r=61C7KYXHQFEAY80RGM67&pf_rd_p=7019a35e-d4ad-5da4-8fdd-f9f5c8ef9428');

        // 画像を取得するための配列を準備
        $images = array();

        // テキストを取得するための配列を準備
        $texts = array();

        // 画像のsrc部分を取得
        $goutte->filter('.a-spacing-small')->each(function ($node) use (&$images) {
            $images[] = $node->filter('img')->attr('src');
        });

        // テキストを取得
        $goutte->filter('.p13n-sc-truncate')->each(function ($node) use (&$texts) {
            $texts[] = $node->text();
        });

        $params = [
            'images' => $images,
            'texts' => $texts,
        ];

        return view('index', $params);
    }
}
