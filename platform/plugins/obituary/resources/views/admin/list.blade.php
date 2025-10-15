@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Danh sách Cáo Phó</h4>
            <a href="{{ route('obituary.create') }}" class="btn btn-primary">+ Thêm mới</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Slug</th>
                    <th>Ngày sinh</th>
                    <th>Ngày mất</th>
                    <th width="160">Hành động</th>
                </tr>
                </thead>
                <tbody>
                @forelse($obituaries as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>{{ $item->date_of_birth }}</td>
                        <td>{{ $item->date_of_death }}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('obituary.edit', $item->id) }}">Sửa</a>
                            <form class="d-inline" method="POST" action="{{ route('obituary.destroy', $item->id) }}">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Xóa bản ghi này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-4">Chưa có dữ liệu</td></tr>
                @endforelse
                </tbody>
        </table>
    </div>
@endsection