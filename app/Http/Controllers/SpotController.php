<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use App\Models\User;
use App\Models\Spot;
use App\Models\Comment;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Youtube;

class SpotController extends Controller
{
    public function getSignup()
    {
        return view('spot.signup');
    }

    public function postSignup(Request $request){
        #バリデーション
        $this->validate($request,[
          'name' => 'required',
          'email' => 'email|required|unique:users',
          'password' => 'required|min:4',
        ]);
       
        // DBインサート
        $user = new User([
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'password' => bcrypt($request->input('password')),
        ]);
       
        // 保存
        $user->save();
       
        // リダイレクト
        return redirect()->route('spot.index');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('spot.index');
    }

    public function getSignin()
    {
        return view('spot.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request,[
        'email' => 'email|required',
        'password' => 'required|min:4'
        ]);
 
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
        return redirect()->route('spot.index');
        }
        return redirect()->back();
    }

    public function support()
    {
        return view('spot.support');
    }

    public function index(){
        $images = Spot::has('comment')->orderBy('id','desc')->get();
        $videos = Spot::has('video')->orderBy('id','desc')->get();
        return view('spot.index', ['images' => $images,'videos' => $videos]);
    }

    public function  gallery(Request $request){
        $images = Comment::where('spot_id',$request->spot_id)->get();
        $spots = Spot::where('id',$request->spot_id)->get();
        return view('spot.gallery', ['images' => $images,'spots' => $spots]);
    }

    public function  posts(){
        return view('spot.posts');
    }

    public function  postposts(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'comment' => 'required',
            'image' => 'required',
        ],
        [
            'name.required' => 'スポット名を入力してください。',
            'comment.required' => 'コメントを入力してください。',
            'image.required'  => '画像を入力してください。',
        ]);

        if(is_null($request->address)){
            $lat = $request->lat;
            $lng = $request->lng;
        }else{
            $p = urlencode($request->address);
            $xml = simplexml_load_file("http://www.geocoding.jp/api/?q=$p");
            $lng = $xml->coordinate->lng;
            $lat = $xml->coordinate->lat;
        }

        $spot = new Spot;
        $spot->spot_name = $request->input('name');
        $spot->user_id = auth()->id();
        $spot->address_lat = $lat;
        $spot->address_lng = $lng;
        $spot->save();

        $comment = new Comment;
        $comment->comment = $request->input('comment');
        $comment->spot_id = Spot::max('id');
        $comment->user_id = auth()->id();
        $comment->pic_content = base64_encode(file_get_contents($request->image));
        $comment->save();

        return redirect()->route('spot.index');
    }

    public function  addposts(Request $request){
        $spot_id = $request;
        return view('spot.addposts',$spot_id);
    }

    public function  postaddposts(Request $request){
        $validated = $request->validate([
            'comment' => 'required',
            'image' => 'nullable',
        ],
        [
            'comment.required' => 'コメントを入力してください。',
        ]);

        $comment = new Comment;
        $comment->comment = $request->input('comment');
        $comment->spot_id = $request->input('spot_id');
        $comment->user_id = auth()->id();
        if(isset($request->image)){
            $comment->pic_content = base64_encode(file_get_contents($request->image));
        }else{
            $comment->pic_content = null;
        }
        $comment->save();

        return redirect()->route('spot.gallery',['spot_id' => $request->spot_id]);
    }

    public function viewvideo(Request $request){
        $video = Video::where('spot_id',$request->spot_id)->get();
        $spots = Spot::where('id',$request->spot_id)->get();
        return view('spot.video', ['videos' => $video,'spots' => $spots]);
    }                                 
    public function video(Request $request){
        return view('spot.postvideo',['spot_id' => $request->spot_id]);
    }                                 

    public function  postvideo(Request $request){
        $validated = $request->validate([
            'image1' => 'required',
        ],
        [
            'image1.required' => '画像を選択してください。',
        ]);
        for($i = 1;$i <= 5;$i++){
            $request->file('image'.$i)->storeAs('/public','image'.$i.'.JPG');
            // var_dump($request->{'image'.$i});
        }
        if($request->music == 1){
            $cmd = 'ffmpeg -r 0.2 -i ../storage/app/public/image%1d.JPG -i ../storage/app/public/music1.mp3 -vcodec libx264 -pix_fmt yuv420p -r 30 ../storage/app/public/out.mp4';
        }elseif($request->music == 2){
            $cmd = 'ffmpeg -r 0.2 -i ../storage/app/public/image%1d.JPG -i ../storage/app/public/music2.mp3 -vcodec libx264 -pix_fmt yuv420p -r 30 ../storage/app/public/out.mp4';
        }elseif($request->music == 3){
            $cmd = 'ffmpeg -r 0.2 -i ../storage/app/public/image%1d.JPG -i ../storage/app/public/music3.mp3 -vcodec libx264 -pix_fmt yuv420p -r 30 ../storage/app/public/out.mp4';
        }
        else{
            $cmd = 'ffmpeg -r 0.2 -i ../storage/app/public/image%1d.JPG -b:v 3000k -c:v h264 -pix_fmt yuv420p -r 30 ../storage/app/public/out.mp4';
        }
        // ffmpeg -r 0.5 -i ../storage/app/public/image%1d.png sample.mp4
        exec($cmd);
        // $i = 1;
        // foreach($request as $image){
        //     $request->file('image'.$i)->storeAs('/public','image'.$i.'.png');
        //     $i++;
        // }

        $video = new Video;
        $video->spot_id = $request->input('spot_id');
        $video->user_id = auth()->id();
        $criatevideo = Storage::get('public/out.mp4');
        $video->video_content = base64_encode($criatevideo);
        $video->save();
        
        $filePath = 'public/out.mp4';
        $fileName = 'out.mp4';
        
        $mimeType = Storage::mimeType($filePath);
        $headers = [['Content-Type' => $mimeType]];
        
        if(!is_null($request->title)){
            $getvideo = Storage::get('public/out.mp4');
            $postvideo = new UploadedFile(storage_path("app/public/out.mp4"),$getvideo);
            $video = Youtube::upload($postvideo->getPathName(), [
                'title'       => $request->input('title'),
                'description' => $request->input('description')
            ]);
        }

        Storage::delete('public/out.mp4');
        // return redirect()->route('spot.gallery',['spot_id' => $request->spot_id]);
        // return redirect()->route('spot.viewvideo',['spot_id' => $request->spot_id]);
        return redirect()->route('spot.viewvideo',['spot_id' => $request->spot_id]);
    }

    // public function store(Request $request)
    // {
    //     $image = new Image();
    //     $uploadImg = $request->image;
    //     if($uploadImg->isValid()) {
    //         $filePath = $uploadImg->store('public');
    //         $image->image = str_replace('public/', '', $filePath);
    //     }
    //     $image->save();
    //     return redirect('/');
    // }

    public function  boot(){
        return view('spot.after');
    }

    public function  youtube(){
        return view('spot.youtube');
    }

    public function postyoutube(Request $request)
    {
        // $video = Youtube::upload($request->file('video')->getPathName(), [
        //     'title'       => $request->input('title'),
        //     'description' => $request->input('description')
        // ]);
        $video = Youtube::upload($request->file('video')->getPathName(), [
            'title'       => $request->input('title'),
            'description' => $request->input('description')
        ]);
  
        // return "Video uploaded successfully. Video ID is ". $video->getVideoId();
        return redirect()->route('spot.index')->with('successMessage', '投稿が完了しました');
    }

    // public function  posttamesi(Request $request){
    //     $video = new Video;
    //     $video->spot_id = $request->input('spot_id');
    //     $video->user_id = auth()->id();
    //     $video->video_content = base64_encode(file_get_contents($request->image1));
    //     $video->save();
    // }
}