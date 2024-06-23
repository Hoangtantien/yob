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
                        <th scope="col">Email</th>
                        <th scope="col">Ảnh đại diện </th>
                        <th scope="col">Ngày đạt thành tích</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>
                            <td style="min-width:120px">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><img src="{{ showImage($user->avatar )}}" alt="" class="img-avatar"></td>
                            <td>
                                @if ($user->pivot)
                                {{ $user->pivot->date_achieved ?? 'Chưa có thông tin' }}
                            @else
                                Chưa có thông tin
                            @endif
                            </td>
                          

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
