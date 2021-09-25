@if (count($employee_list) == 0)
    <tr>
        <td colspan="5" style="color:red">Không có bản ghi nào</td>
    </tr>
@else
    @foreach ($employee_list as $key => $employee)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->password }}</td>
            <td>{{ $employee->role_name }}</td>
        </tr>
    @endforeach
@endif
