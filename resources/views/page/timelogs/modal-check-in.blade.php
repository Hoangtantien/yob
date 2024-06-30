<div class="modal fade" id="checkinModal" tabindex="-1" role="dialog" aria-labelledby="checkinModalLabel"
    aria-hidden="true">
    <form action="{{ route('timelog.store-check-in') }}" class="modal-dialog" role="document" method="post">
        @csrf
        <div class="modal-content" style="width:800px">
            <div class="modal-header">
                <h5 class="modal-title" id="checkinModalLabel">Chấm công</h5>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group my-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text btn btn-outline-primary" for="inputGroupSelect01">Danh sách lớp</div>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" style="flex: 1" name="class_id">
                                <option selected class="text-center">---Chọn lớp dạy---</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" class="text-center">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="input-group my-4">
                            <div class="input-group-prepend">
                                <label class="input-group-text btn btn-outline-primary" for="inputGroupSelect01"> Danh sách ca</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" style="flex: 1" name="short_session_id">
                                <option selected class="text-center">---Chọn ca dạy---</option>
                                @foreach ($short_session as $session)
                                    <option value="{{ $session->id }}" class="text-center">{{ $session->name }} ({{ $session->start_time }} -> {{ $session->end_time }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Lưu</button>
              </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {

    });
</script>
