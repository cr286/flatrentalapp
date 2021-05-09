@extends('layouts.app')

@section('content')
{{-- @dd($coupons); --}}

    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">

<div class="mb-4">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <div class="text-2xl">Coupons</div>
        <a href="{{ route('coupon.create') }}" class="btn btn-primary">Add New coupon</a>
    </div>
    <table class="shadow-lg bg-white">
        <thead>
          <tr>
            <th class="bg-blue-100 border text-left px-8 py-4">Created by </th>
            <th class="bg-blue-100 border text-left px-8 py-4">CouponName</th>
            <th class="bg-blue-100 border text-left px-8 py-4">Last Coupon Date</th>
            <th class="bg-blue-100 border text-left px-8 py-4">Used</th>
            <th class="bg-blue-100 border text-left px-8 py-4">Action</th>
          </tr>
        </thead>
        <tbody>
            @if ($coupons->count())
            @foreach ($coupons as $coupon)
                <tr>

                  <td class="border px-8 py-4"> <a href="{{ route('coupon.create', $coupon->user) }}"
                      class="font-bold">{{ $coupon->user->name }}</a>
                  </td>
                  <td class="border px-8 py-4">{{ $coupon->couponName }}</td>
                  <td class="border px-8 py-4">{{ $coupon->validatedate }}</td>
                  <td class="border px-8 py-4">{{ $coupon->used }}</td>
                  <td class="border px-8 py-4">
 
                  <form action="{{ route('coupon.destroy', $coupon) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-blue-500">Delete</button>
                  </form>
                  {{-- @endcan --}}
                </td>
              </tr>
          @endforeach
        </tbody>
      </table>
      {{ $coupons->links() }}
      @else
      <p>There are no coupons</p>
      @endif


</div>



    </div>
</div>
@endsection