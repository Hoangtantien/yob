<div class="modal fade" id="coach_achievement" tabindex="-1" aria-labelledby="coach_achievementLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:1000px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="coach_achievementLabel">Danh sách huấn luyện viên</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <th>
                            Chọn
                        </th>
                        <th>
                            Tên
                        </th>
                        <th>
                            Số điện thoại
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Ngày đạt thành tích
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @php
                                $achievementUser = $achievementUsers->where('id', $user->id)->first();
                            @endphp
                            <tr>
                                <td>
                                    <input class="form-check-input user-checkbox" type="checkbox"
                                        value="{{ $user->id }}" name="user_ids[]"
                                        {{ $achievementUser ? 'checked' : '' }}>
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <input type="date" class="form-control date-achieved" name="date_achieved[]"
                                        {{ $achievementUser ? '' : 'disabled' }}
                                        value="{{ $achievementUser ? $achievementUser->pivot->date_achieved : '' }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var checkboxes = document.querySelectorAll('.user-checkbox');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var isChecked = this.checked;
                var dateInput = this.closest('tr').querySelector('.date-achieved');
                dateInput.disabled = !isChecked;
                if (!isChecked) {
                    dateInput.value = '';
                }
            });
        });
    });
</script>
