@extends('layouts.app')

@section('content')




@foreach ($data as $item)
<div class="container">
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="{{asset("storage/" . $item->link_materi)}}" allowfullscreen></iframe>
    </div>
</div>
@endforeach

<div class="container mt-3">

    <div class="card">
        <div class="card-title m-3">
            <h3>Kesimpulan Dari Materi Diatas</h3>
        </div>
    </div>

    <form action="{{route('submit.review')}}" method="post">
      @csrf
      <textarea cols="80" id="editor1" name="review_siswa" rows="10" data-sample-short>
    
    
      </textarea>
      @foreach ($data as $item)
      <input type="hidden" name="sub_materi_id" value="{{$item->id}}">
      @endforeach
       
      <button type="submit" class="btn btn-primary w-100 mt-3">Submit Review</button>
    </form>
</div>

@endsection

@section('js')
<script>
    CKEDITOR.replace('editor1', {
      // Define the toolbar groups as it is a more accessible solution.
      toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },

        {
          "name": "paragraph",
          "groups": ["list", "blocks"]
        },
        {
          "name": "document",
          "groups": ["mode"]
        },
       
        {
          "name": "styles",
          "groups": ["styles"]
        },
       
      ],
      // Remove the redundant buttons from toolbar groups defined above.
    //   removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
    });
  </script>
@endsection