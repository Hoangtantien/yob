<div class="cs-modal-wrap">
    <div class="cs-modal">
        <div class="cs-modal-header">
            Chi tiết sân
        </div>
        <div class="cs-modal-body">
            <div class="row mb-4" style="justify-content: space-between">
                <div class="col-6 row">
                    <div class="col-6 cs-modal-span">
                        Tên sân
                    </div>
                    <div class="col-6 cs-modal-content">
                        {{ $court->name }}
                    </div>
                </div>
                <div class="col-6 row">
                    <div class="col-6 cs-modal-span">
                        Mô tả sân
                    </div>
                    <div class="col-6 cs-modal-content">
                        {{ $court->description }}
                    </div>
                </div>
            </div>
            <div class="row mb-4" style="justify-content: space-between">
                <div class="col-6 row">
                    <div class="col-6 cs-modal-span">
                        Thời gian mở 
                    </div>
                    <div class="col-6 cs-modal-content">
                        {{ $court->open_time }}
                    </div>
                </div>
                <div class="col-6 row">
                    <div class="col-6 cs-modal-span">
                        Thời gian đóng 
                    </div>
                    <div class="col-6 cs-modal-content">
                        {{ $court->close_time }}
                      
                    </div>
                </div>
            </div>
            <div class="row mb-4" style="justify-content: space-between">
                <div class="col-6 row">
                    <div class="col-6 cs-modal-span">
                        Địa chỉ
                    </div>
                    <div class="col-6 cs-modal-content">
                        {{ $court->address }}

                    </div>
                </div>
                <div class="col-6 row">
                    <div class="col-6 cs-modal-span">
                        Số điện thoại
                    </div>
                    <div class="col-6 cs-modal-content">
                        {{ $court->phone }}

                    </div>
                </div>
            </div>
            <div class="row mb-4" style="justify-content: space-between">
                <div class="col-6 row">
                    <div class="col-6 cs-modal-span">
                        Loại sân
                    </div>
                    <div class="col-6 cs-modal-content">
                        {{ $court->getType() }}
                    </div>
                </div>
                <div class="col-6 row">
                    <div class="col-6 cs-modal-span">
                        Ảnh sân bóng
                    </div>
                    <div class="col-6 cs-modal-content">
                        <img src="{{ showImage($court->img) }}" alt="" class="img-response">
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
    $(".cs-modal-wrap").on("click", function(e) {
        if (!$(e.target).closest('.cs-modal').length) {
            $(this).hide();
        }
    });
});
</script>