@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Income Details</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="get" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <label class="control-label">{{ $incomes[0]->description }}</label>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Amount</label>
                                <div class="col-sm-10">
                                    @if($incomes[0]->currency == "mainCurrency")
                                        <label class="control-label currency1">{{ $incomes[0]->amount }}</label>
                                    @else
                                        <label class="control-label currency2">{{ $incomes[0]->amount }}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Frequency</label>
                                <div class="col-sm-10">
                                    <label class="control-label" style="text-transform:capitalize">{{ $incomes[0]->frequency }}</label>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Next Payment Date</label>
                                <div class="col-sm-10">
                                    <label class="control-label">{{ $nextPayment[$incomes[0]->id] }}</label>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Type</label>
                                <div class="col-sm-10">
                                    <label class="control-label" style="text-transform:capitalize">{{ $incomes[0]->type }}</label>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a href="/income/edit/{{ $incomes[0]->id }}" class="btn btn-primary">Edit</a>
                                    <a href="/income/delete/{{ $incomes[0]->id }}" class="btn btn-primary">Delete</a>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link href="{{ url('inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ url('selectric/selectric.css') }}" rel="stylesheet">
    <link href="{{ url('inspinia/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ url('inspinia/css/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('inspinia/css/plugins/dataTables/dataTables.responsive.css') }}" rel="stylesheet">
    <link href="{{ url('inspinia/css/plugins/dataTables/dataTables.tableTools.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs/jq-2.1.4,dt-1.10.9,af-2.0.0,b-1.0.3,cr-1.2.0,fc-3.1.0,fh-3.0.0,kt-2.0.0,r-1.0.7,rr-1.0.0,sc-1.3.0,se-1.0.1/datatables.min.css"/>
    <style type="text/css">
        .form-control{
            height:38px !important;
        }
        .tableIncome thead tr th {
            background: #1AB394;
            color: #fff;
            border-color: rgba(0,0,0,0.1);
        }
    </style>
@endsection

@section('script')
    <script src="{{ url('inspinia/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ url('selectric/jquery.selectric.js') }}"></script>
    <script src="{{ url('inspinia/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/r/bs/dt-1.10.9,af-2.0.0,b-1.0.3,cr-1.2.0,fc-3.1.0,fh-3.0.0,kt-2.0.0,r-1.0.7,rr-1.0.0,sc-1.3.0,se-1.0.1/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            if($("#salaryType").val() == "custom"){
                $('#customTypeName').removeClass('animated');
                $('#customTypeName').removeClass('fadeOut');
                $('#customTypeName').addClass('animated');
                $('#customTypeName').addClass('fadeIn');
            }
            else{
                $('#customTypeName').removeClass('animated');
                $('#customTypeName').removeClass('fadeIn');
                $('#customTypeName').addClass('animated');
                $('#customTypeName').addClass('fadeOut');
            }
            $('select').selectric();
            $('#salaryType').on('change', function() {
                if($(this).val() == "custom"){
                    $('#customTypeName').removeClass('animated');
                    $('#customTypeName').removeClass('fadeOut');
                    $('#customTypeName').addClass('animated');
                    $('#customTypeName').addClass('fadeIn');
                }
                else{
                    $('#customTypeName').removeClass('animated');
                    $('#customTypeName').removeClass('fadeIn');
                    $('#customTypeName').addClass('animated');
                    $('#customTypeName').addClass('fadeOut');
                }
              });
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
            $('.input-group.date').datepicker({
                startDate: "{{ date('m/d/Y')}}",
                todayBtn: "linked",
                todayHighlight: true
            });
            $('.tableIncome').DataTable({
                "fnCreatedRow": function() {
                    $(".currency1").currency({ region: '{{ \Auth::user()->mainCurrency }}', thousands: ".", decimal: ",", decimals: 0 });
                    $(".currency2").currency({ region: '{{ \Auth::user()->secondaryCurrency }}', thousands: ".", decimal: ",", decimals: 0 });
                },
                "paging": true,
                "fixedHeader": true,
                "lengthChange": false,
                "pageLength": 10,
                "searching": true,
                "ordering": false,
                "bSort": false,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });   
        });
    </script>
@endsection