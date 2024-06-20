<!-- Modal -->
<div class="modal fade" id="coachModal" tabindex="-1" aria-labelledby="coachModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="coachModalLabel">Danh sách huấn luyện viên</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <th scope="col">Chọn</th>
                        <th scope="col">Tên huấn luyện viên</th>
                        <th scope="col">Email</th>
                    </thead>
                    <tbody>
                        @foreach ($coachs as $coach)
                            <tr>
                                <th>
                                    <input class="form-check-input" type="checkbox" value="{{ $coach->id }}" id="flexCheckDefault" name="coach_ids[]"
                                    @if(in_array($coach->id, old('student_ids', $selected_coaches ?? []))) checked @endif
                                    >
                                </th>
                                <th style="font-weight:400">
                                    {{ $coach->name }}
                                </th>
                                <th style="font-weight:400">
                                    {{ $coach->email }}
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
