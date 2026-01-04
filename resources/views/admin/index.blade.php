@extends('layouts.admin')

@section('title', 'Dashboard | Happy Family Rwanda Organization')

@section('content')
<div class="container-fluid">

    <!-- KPI CARDS -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $programs }}</h3>
                    <p>Total Programs</p>
                </div>
                <div class="icon"><i class="fas fa-hands-helping"></i></div>
                <a href="#" class="small-box-footer">
                    Manage Programs <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $beneficiaries }}</h3>
                    <p>Total Beneficiaries</p>
                </div>
                <div class="icon"><i class="fas fa-users"></i></div>
                <a href="#" class="small-box-footer">
                    View Beneficiaries <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $activeProjects }}</h3>
                    <p>Active Projects</p>
                </div>
                <div class="icon"><i class="fas fa-project-diagram"></i></div>
                <a href="#" class="small-box-footer">
                    Project Status <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $staff }}</h3>
                    <p>Staff & Volunteers</p>
                </div>
                <div class="icon"><i class="fas fa-user-tie"></i></div>
                <a href="#" class="small-box-footer">
                    Manage Team <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- IMPACT & PROGRAM CHARTS -->
    <div class="row">
        <div class="col-md-8">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Monthly Program Impact</h3>
                </div>
                <div class="card-body">
                    <canvas id="impactChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Program Distribution</h3>
                </div>
                <div class="card-body">
                    <canvas id="programChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- RECENT ACTIVITIES & QUICK LINKS -->
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Recent Activities</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Activity</th>
                                <th>Program</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Loop recent activities here --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Quick Actions</h3>
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-app bg-info">
                        <i class="fas fa-plus"></i> New Program
                    </a>
                    <a href="#" class="btn btn-app bg-success">
                        <i class="fas fa-user-plus"></i> Add Beneficiary
                    </a>
                    <a href="#" class="btn btn-app bg-primary">
                        <i class="fas fa-users-cog"></i> Staff
                    </a>
                    <a href="#" class="btn btn-app bg-warning">
                        <i class="fas fa-file-alt"></i> Reports
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    new Chart(document.getElementById('impactChart'), {
        type: 'line',
        data: {
            labels: @json($months),
            datasets: [{
                label: 'Beneficiaries Reached',
                data: @json($impactData),
                borderWidth: 2,
                fill: true,
            }]
        }
    });

    new Chart(document.getElementById('programChart'), {
        type: 'doughnut',
        data: {
            labels: @json($programLabels),
            datasets: [{
                data: @json($programStats),
            }]
        }
    });
</script>
@endsection
