 <table class="table">
     <thead>
         <tr>
             <th>STT</th>
             <th>Tên khách hàng</th>
             <th>Checkin</th>
             <th>Đặt trước</th>
             <th>Ghi chú</th>
             <th>Số phòng</th>
         </tr>
     </thead>
     <tbody>
         {{-- {{ dd($booking) }} --}}
         @foreach ($booking as $key => $value)
             <tr>
                 <td>{{ ++$key }}</td>
                 <td>{{ $value->customer->customer_name }}</td>
                 <td>{{ $value->checkin_time }}</td>
                 <td>{{ $value->checkin_amount }}</td>
                 <td>{{ $value->note }}</td>
                 <td>{{ $value->room->room_name }}</td>
                 <td>
                     <button type="button" class="btn btn-block btn-outline-danger btn-xs" data-toggle="modal"
                         data-target="#xoakhachhang"
                         onclick="deleteBooking({{ $value->id }},'{{ $value->customer->customer_name }}')">Xóa</button>

                 </td>
                 <td>
                     <a href="{{ route('booking.edit', $value->id) }}"
                         class="btn btn-block btn-outline-warning btn-xs">Edit</a>
                 </td>
             </tr>
         @endforeach
     </tbody>
 </table>
 <div class="float-right">
     {{ $booking->links() }}
 </div>
