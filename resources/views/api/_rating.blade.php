<div class="icon_rating height_50">
    <span class="icon_footer col col_md col_sm" id="rating_name"><i class="fas circle">{{ $table_rating ?? 0 }}</i></span>
    <form action="{{ route('rating.show') }}" method="POST" enctype="multipart/form-data" id="rating">
        <button type="button" class="icon_footer col col_md col_sm block_non r_button" id="send"><i class="fas circle">go!</i></button>
        <input type="radio" value="1" name="rating" id="r1">
        <label for="r1"><i class="fas fa-star"></i></label>
        <input type="radio" value="2" name="rating" id="r2">
        <label for="r2"><i class="fas fa-star"></i></label>
        <input type="radio" value="3" name="rating" id="r3">
        <label for="r3"><i class="fas fa-star"></i></label>
        <input type="radio" value="4" name="rating" id="r4">
        <label for="r4"><i class="fas fa-star"></i></label>
        <input type="radio" value="5" name="rating" id="r5">
        <label for="r5"><i class="fas fa-star"></i></label>
        <input type="hidden" value="{{ $table_id }}" name="table_id">
        <input type="hidden" value="{{ $table_name }}" name="table_name">
        <input type="hidden" value="{{ $id }}" name="id_post">
        <input type="hidden" value="non" name="refresh"><br>
    </form>
</div>
