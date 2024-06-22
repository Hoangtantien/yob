<div class="cs-modal-wrap">
    <div class="cs-modal">
        <div class="cs-modal-header">
            Danh sách học sinh
        </div>
        <div class="cs-modal-body">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên </th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Học phí</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $key => $student)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>
                            <td style="min-width:120px">{{ $student->name }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ showPrice($student->fee )}}</td>
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
