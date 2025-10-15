@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <div class="p-3">
        <a href="{{ route('obituary.create') }}" class="btn btn-primary mb-3">+ Thêm Cáo Phó</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Ngày sinh</th>
                    <th>Ngày mất</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($obituaries as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->date_of_birth }}</td>
                        <td>{{ $item->date_of_death }}</td>
                        <td>
                            <a href="{{ route('obituary.edit', $item->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <form action="{{ route('obituary.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Xóa cáo phó này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $obituaries->links() }}
    </div>
@endsection