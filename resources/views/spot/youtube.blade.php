<form action="{{route('spot.postyoutube')}}" method="post" enctype="multipart/form-data">
    @csrf
    <link href="../../css/styles.css" rel="stylesheet" />
    <video controls autoplay muted class="img-thumbnail">
        <source src="{{$video}}">
    </video>
    <p><input type="text" name="title" placeholder="Enter Video Title" /></p>
    <p><textarea name="description" cols="30" rows="10" placeholder="Video description"></textarea></p>
    <p><input type="file" name="video" /></p>
    <button type="submit" name="submit">Submit</button>
</form>