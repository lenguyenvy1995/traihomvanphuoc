@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Danh sách Cáo Phó</h5>
        <a class="btn btn-primary" href="{{ route('obituary.create') }}">+ Thêm Cáo Phó</a>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped mb-0">
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
            @forelse($items as $item)
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

    <div class="card-footer">{{ $items->links() }}</div>
</div>
@endsection