@if($posts->count())
    <div class="container container_md container_sm news_h clearfix">
        <h3 class="margin_15_0 margin_left_3">Վերջին նորությունները</h3>
        @foreach($posts as $post)
            <a href="{{ route('news.show', $post->id) }}">
                <div class="col col_4 col_md col_6_md">
                    @if($post->image)
                        <img src="{{ asset('storage/uploads/image/posts/'. $post->image) }}" class="input-container p_b_img" alt="">
                    @else
                        <img src="{{ asset('image/app/default-post.jpg') }}" class="input-container p_b_img" alt="">
                    @endif
                    <h3 class="padding_lr_15"> {{ $post->title }} </h3>
                </div>
            </a>
        @endforeach
    </div>
@endif
