@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">November 2015</span>
                        <h5>Current Finances</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins currency1">{{ \Auth::user()->currentMoney }}</h1>
                        <div class="stat-percent font-bold text-info"><a href="/setmoney">Set Current Money</a></div>
                        <small>This Month</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">December 2015</span>
                        <h5>Projected Finances</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins currency1">{{ \Auth::user()->currentMoney }}</h1>
                        <div class="stat-percent font-bold text-info">30% <i class="fa fa-level-up"></i></div>
                        <small>Next Month</small>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">2015</span>
                        <h5>Monthly Income</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins currency1">{{ \Auth::user()->currentMoney }}</h1>
                        <div class="stat-percent font-bold text-info"><i class="fa fa-money fa-lg"></i></div>
                        <small>&nbsp;</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-warning pull-right">November 2015</span>
                        <h5>Spending</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stats-label">Food And Drink</small>
                                <h4>Rp. 50.000/day</h4>
                            </div>

                            <div class="col-xs-4">
                                <small class="stats-label">Entertainment</small>
                                <h4>Rp. 100.000/two week</h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stats-label">Internet</small>
                                <h4>Rp. 300.000/month</h4>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stats-label">Education</small>
                                <h4>Rp. 75.000/month</h4>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-flat btn-primary btn-block">More Info</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Plans</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Time Left</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for ($i = 1; $i <= 5; $i++)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>New Income</td>
                                        <td>New Job</td>
                                        <td>Rp. 300.000</td>
                                        <td>March {{ $i }}, 2016</td>
                                        <td>3 Month 20 Days</td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <button class="btn btn-primary btn-block">More Info</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection