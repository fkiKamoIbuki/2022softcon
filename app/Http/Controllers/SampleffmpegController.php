<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FFMpeg;

class SampleffmpegController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // 変換前のファイル取得
        $media = FFMpeg::fromDisk('public')->open('kinniku.mp4');
        $mediaStreams = $media->getStreams()[0];

        // 再生時間を取得
        $durationInSeconds = $media->getDurationInSeconds();

        // コーデックを取得
        $codec = $mediaStreams->get('codec_name');

        // 解像度(縦)を取得
        $height = $mediaStreams->get('height');

        // 解像度(横)を取得
        $width = $mediaStreams->get('width');

        // ビットレートを取得
        $bit_rate = $mediaStreams->get('bit_rate');

        // SD画質に変換
        $media->addFilter(function ($filters) {
            $filters->resize(new \FFMpeg\Coordinate\Dimension(720, 480));
        })
        ->export()
        ->toDisk('public')
        ->inFormat(new \FFMpeg\Format\Video\X264('aac'))
        ->save('sample_SD.mp4');

        // 変換後のファイル取得
        $mediaSD = FFMpeg::fromDisk('public')->open('sample_SD.mp4');
        $mediaStreamsSD = $mediaSD->getStreams()[0];

        // 解像度(縦)を取得
        $height_SD = $mediaStreamsSD->get('height');

        // 解像度(横)を取得
        $width_SD = $mediaStreamsSD->get('width');

        // ビットレートを取得
        $bit_rate_SD = $mediaStreamsSD->get('bit_rate');

        // Viewで確認
        return view('home')->with([
            "durationInSeconds" => $durationInSeconds,
            "codec" => $codec,
            "height" => $height,
            "width" => $width,
            "bit_rate" => $bit_rate,
            "height_SD" => $height_SD,
            "width_SD" => $width_SD,
            "bit_rate_SD" => $bit_rate_SD,
        ]);
    }
}