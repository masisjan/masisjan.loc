<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="close clearfix">
            <i class="fas fa-times-circle modalX"></i>
        </div>
        <p class="color_green">{{ session()->get('message') }}</p><br>
        <div class="center">
            <a href="{{ asset('/masisjan/help') }}">
                <img src="{{asset('image/app/help.jpg')}}" class="img_map" alt="help">
            </a>
            <h3><a href="{{ asset('/masisjan/help') }}">ՕԳՆԵԼ</a></h3>
        </div>
    </div>
</div>
<script>
    window.addEventListener('load', function() {
        let modal = document.querySelector(".modalX");
        modal.addEventListener("click", function () {
            document.querySelector("#myModal").style.display = "none";
        });
    });
</script>
