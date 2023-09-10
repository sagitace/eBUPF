@extends('admin-components.admin-layout')

@section('content')

<div class="container-fluid mt-2">
    <div class="adminbox p-0">
        <div class="d-flex px-3 pt-4">
            <div class="d-flex membership-app-header1-mpl text-dark">
                <img src="{{asset('icons/MPL-mini.svg')}}" alt="" width="50px">
                <p style="padding-left: 10px; padding-top: 5px"><span class="fw-bold " style="font-size: 1.2rem; margin-right: 10px;">Multi-Purpose Loan</span> <span class="fw-bold fs-7">Applications</span></p>
            </div>

            <div class="membership-app-header2">
                <div class="lh-1" style="padding: 15px 0 0 15px;">
                    <p class="fw-bold">1 Pending</p>
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-sm-6">
                                <p style="margin-right: 20px; font-size: 0.7rem; width: 100%;" class="text-success">2 Approved</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-danger" style="font-size: 0.7rem; width: 100%">1 Denied</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-group px-3 gap-2 mt-4">
            <div class="form-group fg-admin" style="width: 150px; position: relative;">
                <select id="monthSelect" class="form-control bg-white border-0 fw-semibold">
                    <option value="All">Month</option>
                    <option value="">January</option>
                    <option value="">February</option>
                    <option value="">March</option>
                    <option value="">April</option>
                    <option value="">May</option>
                    <option value="">June</option>
                    <option value="">July</option>
                    <option value="">August</option>
                    <option value="">September</option>
                    <option value="">October</option>
                    <option value="">November</option>
                    <option value="">December</option>
                </select>
            </div>
            <div class="form-group fg-admin" style="width: 150px; position: relative;">
                <select id="daySelect" class="form-control bg-white border-0 fw-semibold">
                    <option value="All">Day</option>
                </select>
            </div>
            <div class="form-group fg-admin" style="width: 150px; position: relative;">
                <select id="typeSelect" class="form-control bg-white border-0 fw-semibold">
                    <option value="All">All Loan</option>
                    <option value="BUCS">New Loan</option>
                    <option value="CBEM">Renewal</option>
                    <option value="unit3">Additional</option>
                </select>
            </div>
            <button id="applyFilterBtn" class="btn btn-primary " style="">Apply Filter</button>
        </div>
        <div class="row g-0 mt-2 mx-3">
            <div class="col d-flex justify-content-end gap-3">
                <span class="filter-option active" data-filter="all">All Applications</span>
                <span class="filter-option" data-filter="approved">Approved</span>
                <span class="filter-option" data-filter="denied">Denied</span>
            </div>
        </div>
        

        <div class="table-responsive pb-5">
            {{-- <div class="custom-table-for-admin"> --}}

                <table class="table admin-table table-striped" id="myTable">
                    <thead style="border-bottom: 2px solid black">
                        <style>
                             th{
                                font-size: small !important;
                            }
                        </style>
                        <tr>
                            <th>Loan ID</th>
                            <th>Principal Borrower</th>
                            <th>Unit</th>
                            <th>Date of Request</th>
                            <th>Amt. Requested</th>
                            <th class="text-secondary">Staff</th>
                            <th class="text-secondary">Loan Analyst</th>
                            <th class="text-secondary">Exe. Director</th>
                            <th class="text-secondary">Check</th>
                            <th>Final</th>
                            <th>Action</th>
                            <th>Approval</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-row" data-status="approved">
                            <td>102030</td>
                            <td><a href="#" class="fw-bold text-dark" style="text-decoration: none;">Juan Dela Cruz Jr.</a></td>
                            <td>BUCS</td>
                            <td>04-23-2023</td>
                            <td>200,000</td>
                            <td class="text-center"><i class="bi bi-circle-fill text-primary"></i></td>
                            <td class="text-center"><i class="bi bi-circle-fill text-primary"></i></td>
                            <td class="text-center"><i class="bi bi-circle-fill text-primary"></i></td>
                            <td class="text-center"><i class="bi bi-circle-fill text-primary"></i></td>
                            <td>
                                {{-- <span class="final-approved">Approved</span> --}}
                                <span class="final-denied">Denied</span>
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-add-status" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Add Status
                                </button>
                                @include('admin-views.admin-loan-applications.modal-add-status')
                            </td>
                            <td class="text-center">
                                <div class="three-dots">
                                    <i class="bi bi-three-dots fs-4 icon"></i>
                                    <div class="three-dots-buttons">
                                        <button class="approve-btn">Approve</button>
                                        <button class="deny-btn">Deny</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                   
                    </tbody>
                </table>
            {{-- </div> --}}
        </div>
    </div>
</div>
<script>
    // Generate days of the month
    var daySelect = document.getElementById("daySelect");
    var option = document.createElement("option");
    option.value = "All";
    option.text = "1";
    daySelect.add(option);

    for (var i = 2; i <= 31; i++) {
        option = document.createElement("option");
        option.value = i.toString();
        option.text = i.toString();
        daySelect.add(option);
    }
    document.addEventListener('DOMContentLoaded', function() {
        var filterOptions = document.querySelectorAll('.filter-option');
        var tableRows = document.querySelectorAll('.table-row');

        filterOptions.forEach(function(option) {
            option.addEventListener('click', function() {
                var filterValue = this.getAttribute('data-filter');

                // Remove active class from other options
                filterOptions.forEach(function(filterOption) {
                    filterOption.classList.remove('active');
                });

                // Add active class to clicked option
                this.classList.add('active');

                tableRows.forEach(function(row) {
                    if (filterValue === 'all') {
                        row.style.display = 'table-row';
                    } else {
                        row.style.display = row.getAttribute('data-status') === filterValue ? 'table-row' : 'none';
                    }
                });
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const icon = document.querySelector('.icon');
        const buttons = document.querySelector('.buttons');
        const approveBtn = document.querySelector('.approve-btn');
        const denyBtn = document.querySelector('.deny-btn');

        icon.addEventListener('click', function() {
            buttons.style.display = 'block';
        });

        approveBtn.addEventListener('click', function() {
            // Handle approve button click
            console.log('Approved');
            buttons.style.display = 'none';
        });

        denyBtn.addEventListener('click', function() {
            // Handle deny button click
            console.log('Denied');
            buttons.style.display = 'none';
        });
    });
</script>
@include('admin-components.admin-dataTables')
@endsection