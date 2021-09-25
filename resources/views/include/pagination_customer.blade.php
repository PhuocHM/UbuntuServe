<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Day of birth</th>
            <th>Phone number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Address info</th>
            <th>Gender</th>
            <th>CMT</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $key => $value)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $value->customer_name }}</td>
                <td>{{ $value->customer_dob }}</td>
                <td>{{ $value->customer_phone }}</td>
                <td>{{ $value->customer_email }}</td>
                <td>{{ $value->customer_address }}</td>
                <td>{{ $value->customer_address_info }}</td>
                <td>{{ $value->customer_gender }}</td>
                <td>{{ $value->customer_cmt }}</td>
                <td>
                    <button type="button" class="btn btn-block btn-outline-danger btn-xs" data-toggle="modal"
                        data-target="#xoakhachhang"
                        onclick="deleteCustomer({{ $value->id }},'{{ $value->customer_name }}')">Xóa</button>

                </td>
                <td>
                    <a href="{{ route('customer.edit', $value->id) }}"
                        class="btn btn-block btn-outline-warning btn-xs">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="float-right">
    {!! $customers->links() !!}
</div>
