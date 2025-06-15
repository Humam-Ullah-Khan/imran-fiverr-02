@extends('sitelayout/master')



@section('content')
{{ Cookie::get('postedArticle') }}


<div class="OrderDetails pt-3 pb-3">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                @if (session()->has('message'))
                <div class="alert alert-success">

                    {{ session()->get('message') }}

                </div>
                @endif

               
                
                  <div class="ContentInfo pt-4 pb-4">

    <h1 class="text-black font-weight-bolder text-uppercase">Dashboard</h1>



  </div>

  

            </div>

        </div>

    </div>



    <div class="orderHistory">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <table class="table table-bordered table-striped myTable">

                        <thead>

                            <tr>

                                <th>Id</th>
                                <th>Order Id</th>

                                <th>Full Name</th>

                                <th>Type</th>

                                <th>Details</th>

                                <th>Amount</th>

                                <th>Status</th>

                                <th>Date</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @php
                            $i = 0;
                            @endphp
                            @foreach ($orderData as $data)
                            @php
                            $i++;
                            $CmsAdd = \App\Models\cmsModulesFront::first();
                            @endphp
                            <tr>

                                <td>{{ $i }}</td>
                                <td>DD-{{ $data->id }}</td>

                                <td>{{ $data->name }}</td>

                                <td>{{ $data->type }}</td>

                                <td>{{ $data->details }}</td>

                                <td>{{ $data->CurrencyType }} {{ $data->Amount }}</td>

                                <td>{{ $data->Estatus }}</td>

                                <td>{{ $data->created_at }}</td>







                                <td>

                                    @if ($data->Estatus == 'Pending')
                                    <a href="{{ url('order/edit/') }}/{{ $data->id }}"
                                        class="badge badge-primary">Update Job</a>
                                    @elseif($data->Estatus == 'Processing')
                                    <p class="badge badge-success">{{ $data->Estatus }}</p>
                                    @elseif($data->Estatus == 'Ready')
                                    <a href="{{ url('order/download/') }}/{{ $data->id }}"
                                        class="badge badge-warning">Download Attachment</a>
                                    @else
                                    @endif


                                    <a href="{{ url('order/paymore/') }}/{{ $data->id }}" class="badge badge-primary"><i
                                            class="fa-brands fa-stripe-s"></i></a>


                                </td>



                            </tr>
                            @endforeach



                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>
<div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transactionModalLabel">Transaction Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>TID</th>
                                    <th>Order ID</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Discount</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
            $(document).on('click', '#transaction', function() {
                var oid = $(this).data('oid');
                $.ajax({
                    url: '{{ url('order/transactions') }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'oid': oid
                    },
                    success: function(data) {
                        var html = '';
                        if (data.length == 0) {
                            html += '<tr><td colspan="3">No transactions found</td></tr>';
                        } else {
                            $.each(data, function(index, value) {
                                html += '<tr>';
                                html += '<td>' + value.id + '</td>';
                                html += '<td>' + value.job_id + '</td>';
                                html += '<td>' + value.stripe_status + '</td>';
                                html += '<td>' + value.amount + '</td>';
                                html += '<td>' + value.cusDiscountCode + '</td>';
                                html += '</tr>';
                            });
                        }
                        $('#transactionModal tbody').html(html);
                        $('#transactionModal').modal('show');
                    }
                });
            });
        });
</script>
@endsection