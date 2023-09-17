@extends('member-components.member-layout')

@section('content')

<main>
    <div class="container mt-lg-5 mt-3 ms-lg-0 ms-1">
            <!-- This is where you can put your main content -->
                <div class="row ms-1">

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-12">
                                <div class="card" style="border-radius: 10px; border: 0.50px #ACACAC solid">
                                    <div style="position: relative;">
                                        <img class="w-100" style="height: 100px; border-radius: 10px;" src="assets/core-feature-bg.png" />
                                        <p class="text-white" style="position: absolute; top: 47%; left: 50%; transform: translate(-50%, -50%);">php <span class="fs-5 fw-bold">{{ $principalAmount }}
                                        </span></p>
                                        <p class="text-white" style="position: absolute; top: 65%; left: 50%; transform: translate(-50%, -50%); font-size: 10px;">Total Outstanding Balance</p>
                                    </div>

                                    @if ($loans->isEmpty())
                                        <div class="d-flex justify-content-center align-items-center pt-5 pb-5 mt-5 mb-5">
                                            You currently don't have active loans. Apply Now!
                                        </div>
                                    @else

                                        {{-- Display active Multi-Purpose Loan --}}
                                        @if ($mplLoans != null)
                                            <div style="border-radius: 10px; border: 1px solid #DCDCDC; background: #FFF; margin: 12px 20px 12px;" class="card  g-0">
                                                <div class="row mt-2 g-0">
                                                    <div class="col-8  g-0">
                                                        <div class="row h-100 g-0">
                                                            <div class="col-3 ps-2 d-flex justify-content-center ">
                                                                <img class="img-fluid" src="icons/MPL-mini.svg" alt="mpl mini" width="40px">
                                                            </div>
                                                            <div class="col-9 ">
                                                                <p class="myline-height">
                                                                    <span class="text14-design">Multi-Purpose Loan </span><br> <span class="text13-design">{{$mplLoans->created_at->format('F j, Y')}} - {{$mplLoans->created_at->addYears($mplLoans->term_years)->format('F j, Y')}}</span>
                                                                </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-4 ">
                                                        <p class="text13-design m-0">Outstanding Balance</p>
                                                        <p class="text14-design"><span class="text12-design">Php </span>{{ $mplLoans->principal_amount }}</p>
                                                    </div>
                                                </div>
                                                <div class="row mt-2 mb-2">
                                                    <div class="col-sm-7 ">
                                                        <span class="text11-design text11-move fw-bold">Monthly Amortization </span> <span class="text12-design">wala pa</span>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <span class="text11-design fw-bold">{{$mplLoans->term_years * 12}}</span> <span class="text12-design">months to pay</span>
                                                    </div>
                                                </div>

                                            </div>
                                        @endif

                                        @if($hslLoans != null)

                                            <div style="border-radius: 10px; border: 1px solid #DCDCDC; background: #FFF; margin: 12px 20px 12px;" class="card  g-0">
                                                <div class="row mt-2 g-0">
                                                    <div class="col-8  g-0">
                                                        <div class="row h-100 g-0">
                                                            <div class="col-3 ps-2 d-flex justify-content-center ">
                                                                <img class="img-fluid" src="icons/HSL-mini.svg" alt="mpl mini" width="40px">
                                                            </div>
                                                            <div class="col-9 ">
                                                                <p class="myline-height">
                                                                    <span class="text14-design">Housing Loan </span><br> <span class="text13-design">{{$hslLoans->created_at->format('F j, Y')}} - {{$hslLoans->created_at->addYears($hslLoans->term_years)->format('F j, Y')}}</span>
                                                                </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-4 ">
                                                        <p class="text13-design m-0">Outstanding Balance</p>
                                                        <p class="text14-design"><span class="text12-design">Php </span>{{ $hslLoans->principal_amount }}</p>
                                                    </div>
                                                </div>
                                                <div class="row mt-2 mb-2">
                                                    <div class="col-sm-7 ">
                                                        <span class="text11-design text11-move fw-bold">Monthly Amortization </span> <span class="text12-design">wala pa</span>
                                                    </div>

                                                    <div class="col-sm-5">
                                                        <span class="text11-design fw-bold">{{$hslLoans->term_years * 12}}</span> <span class="text12-design">months to pay</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif


                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div style="background: white; border-radius: 10px; border: 0.50px #ACACAC solid;">
                                    <div class="container">
                                        <div class="row my-2">
                                            <div class="col-md-4">
                                                <p class="fs-6 fw-bold ">Loan Application</p>
                                            </div>
                                            <div class="col-md-8 gap-2 d-flex justify-content-end">


                                                <a href="/member/mpl-application-form/" type="button" class="btn border text-start d-flex shadow-sm grow-on-hover">
                                                    <img class="img-fluid" src="icons/MPL-mini.svg" alt="mpl mini" width="30px">
                                                    <div class="ps-2">
                                                        <h6 style="font-size: small">Apply</h6>
                                                    <strong>Multi-Purpose Loan</strong>
                                                    </div>
                                                </a>

                                                <a href="/member/hsl-application-form/" type="button" class="btn border text-start d-flex shadow-sm grow-on-hover">
                                                    <img class="img-fluid" src="icons/HSL-mini.svg" alt="mpl mini" width="30px">
                                                    <div class="ps-2">
                                                        <h6 style="font-size: small">Apply</h6>
                                                    <strong>Housing Loan</strong>
                                                    </div>
                                                </a>

                                                {{-- css class - btn-apply-mpl --}}
                                                {{-- css class -  btn-apply-hsl --}}
                                           </div>
                                        </div>
                                        @if($inActiveLoan == null)
                                            <div style="background: white; border-radius: 20px; border: 0.50px #DCDCDC solid; margin-bottom: 20px;
                                            padding: 50px 0;" class="d-flex justify-content-center align-items-center">
                                                You don't have any pending loans.
                                            </div>
                                        @else
                                            <div style="padding-left: 10px; background: white; border-radius: 20px; border: 0.50px #DCDCDC solid; margin-bottom: 20px; padding-bottom: 15px;">
                                                <div class="row mt-2 g-0">
                                                    <div class="col-3">
                                                        <p class="text16-design m-0"><i class="bi bi-circle-fill me-1" style="color: grey"></i>Being Processed</p>
                                                        <p class="text17-design">
                                                            @if($inActiveLoan->loan_type_id == 1)
                                                                Multi-Purpose Loan
                                                            @else
                                                                Housing Loan
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="text16-design">{{$inActiveLoan->created_at->format('F j, Y')}}</p>
                                                    </div>


                                                    <div class="col-4">
                                                        <p class=" text15-design m-0">Request</p>
                                                        <p class=" fw-bold text17-design "><span class="fw-light">Php </span>{{ $inActiveLoan->principal_amount }}</p>
                                                    </div>


                                                    <div class="col-2">
                                                        <p class="text15-design m-0"> Years to Pay</p>
                                                        <p class="text17-design">{{ $inActiveLoan->term_years }}</p>
                                                    </div>
                                                </div>
                                                <div class="row g-0">
                                                    <div class="col-6">
                                                        <p style="font-size:small; margin: 0;">Co-Borrower</p>
                                                        <div class="row g-0">
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <img class="rounded-circle" src="{{ asset('storage/' .$inActiveLoan->co_borrower_profile_picture)}}" alt="Co-Borrower Profile Picture" style="height: 2.5rem; width: 2.5rem;">
                                                            </div>
                                                            <div class="col-9 myline-height ">
                                                                <span class="fw-bold fs-7">{{ $inActiveLoan->co_borrower_firstname }} {{ $inActiveLoan->co_borrower_middle_initial }} {{ $inActiveLoan->co_borrower_lastname }} </span> <br> <span style="font-size: 14px;">{{$inActiveLoan->co_borrower_unit_code}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <a href="#" type="button" class="btn status-btn">View Status</a>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 transactions">
                        <div style="border-radius: 10px; border: 1px solid #AAA; background: #FFF; height: 100%">
                            <div class="container">
                                <div class="mt-3">
                                    <img src="icons/history.svg" alt="history icon" width="35px">
                                    <span class="fw-bold fs-7">Latest Transactions</span>
                                </div>

                                <div class="d-flex justify-content-center align-content-center">
                                    <!-- Put if statement here [if no transaction] -->
                                    <img src="icons/no-transaction.svg" alt="no transaction icon" width="150px" style="margin-top: 80px;">
                                </div>
                                <p class="text-center">No transaction</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 transactions mb-5">
                        <div class="container mt-3 ">

                        </div>
                    </div>

                </div>
    </div>
</main>

@endsection
