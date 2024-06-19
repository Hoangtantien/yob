<!-- Modal -->
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="studentModalLabel">Danh sách học sinh</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <th scope="col">Chọn</th>
                        <th scope="col">Tên học sinh</th>
                        <th scope="col">Email</th>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <th>
                                    <input class="form-check-input" type="checkbox" value="{{ $student->id }}" id="flexCheckDefault" name="student_ids[]">
                                </th>
                                <th style="font-weight:400">
                                    {{ $student->name }}
                                </th>
                                <th style="font-weight:400">
                                    {{ $student->email }}
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
