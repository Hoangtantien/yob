<div class="cs-modal-wrap">
    <div class="cs-modal" >
        <div class="cs-modal-header" style="width: 1200px">
            Danh sách huấn luyện viên
        </div>
        <div class="cs-modal-body">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên </th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Lương </th>
                        <th scope="col">Ảnh đại diện </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coaches as $key => $coach)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>
                            <td style="min-width:120px">{{ $coach->name }}</td>
                            <td>{{ $coach->phone }}</td>
                            <td>{{ $coach->email }}</td>
                            <td>{{ showPrice($coach->base_salary )}}</td>
                            <td><img src="{{ showImage($coach->avatar )}}" alt="" class="img-avatar"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
