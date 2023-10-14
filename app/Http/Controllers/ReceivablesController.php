<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Unit;
use Carbon\Carbon;
use App\Models\Payment;

class ReceivablesController extends Controller
{
    public function show(Request $request) {
        // Get loans that have amortization
        $loans = Loan::whereHas('amortization')->get();

        $units = Unit::all();

        $currentYear = Carbon::now()->year;
        // Define an array to store quarterly payments for each loan
        $quarterlyPayments = [];

        // Calculate quarterly payments for each loan
        foreach ($loans as $loan) {
            $loanId = $loan->id;
            $quarterlyPayments[$loanId] = $this->calculateQuarterlyPayments($loanId);
        }

        $currentYear = Carbon::now()->year;

        // Set the default selected year and unit
        $selectedYear = $request->input('yearSelect') ?? $currentYear;
        $selectedUnit = $request->input('unitSelect') ?? 'All';

        if ($request->has('clearFilterButton')) {
            $selectedYear = $currentYear;
            $selectedUnit = 'All';
        }

        return view('admin-views.admin-receivables.admin-receivables',
            compact(
                'loans',
                'quarterlyPayments',
                'currentYear',
                'selectedYear',
                'selectedUnit',
                'units'
            ));
    }

    // Function to calculate quarterly payments for a loan
    private function calculateQuarterlyPayments($loanId) {
        $payments = Payment::where('loan_id', $loanId)->get();

        $quarterlyPayments = [];

        foreach ($payments as $payment) {

            $paymentDate = $payment->payment_date;
            $quarter = ceil(date('n', strtotime($paymentDate)) / 3);
            $year = date('Y', strtotime($paymentDate));

            // Initialize the quarterly payment for the year if it doesn't exist
            if (!isset($quarterlyPayments[$year])) {
                $quarterlyPayments[$year] = [
                    1 => 0, // Q1
                    2 => 0, // Q2
                    3 => 0, // Q3
                    4 => 0, // Q4
                ];
            }

            // Add the payment amount to the corresponding quarter
            $quarterlyPayments[$year][$quarter] += $payment->principal;
        }

        return $quarterlyPayments;
    }
}
