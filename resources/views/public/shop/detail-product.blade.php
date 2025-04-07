<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Product Detail</h5>
    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><span class="fa fa-x"></span></button>
</div>
<div class="modal-body">

</div>
<div class="modal-footer" style=" padding: 0;">
    <marquee width="100%" direction="left" height="25px">
        All rights reserved | This template is made with by {{ Env('APP_NAME') }}
    </marquee>
</div>
{{-- <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('js/mixitup.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script> --}}
<script>
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function() {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
</script>
