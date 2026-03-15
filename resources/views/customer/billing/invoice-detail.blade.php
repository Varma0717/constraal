@extends('customer.layouts.app')

@section('title', 'Invoice Detail')
@section('page-title', 'Invoice #' . ($invoice->invoice_number ?? 'INV-' . $invoice->id))
@section('icon', 'bi-file-earmark-text')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card mb-4">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Invoice Details</h5>
                    <span class="badge {{ $invoice->status === 'paid' ? 'bg-success' : ($invoice->status === 'overdue' ? 'bg-danger' : 'bg-warning') }}">
                        {{ ucfirst($invoice->status ?? 'pending') }}
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="text-muted">Invoice Number</h6>
                        <p><code>{{ $invoice->invoice_number ?? 'INV-' . $invoice->id }}</code></p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Date Issued</h6>
                        <p>{{ $invoice->created_at->format('M d, Y') }}</p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="text-muted">Due Date</h6>
                        <p>{{ $invoice->due_date ? \Carbon\Carbon::parse($invoice->due_date)->format('M d, Y') : 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Payment Date</h6>
                        <p>{{ $invoice->paid_at ? \Carbon\Carbon::parse($invoice->paid_at)->format('M d, Y') : '—' }}</p>
                    </div>
                </div>

                <hr>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th class="text-end">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $invoice->description ?? 'Subscription / Service' }}</td>
                                <td class="text-end">${{ number_format($invoice->amount ?? 0, 2) }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th class="text-end">${{ number_format($invoice->amount ?? 0, 2) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('account.customer.billing.invoices') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to Invoices
            </a>
            <a href="{{ route('account.customer.billing.download-invoice', $invoice) }}" class="btn btn-primary">
                <i class="bi bi-download"></i> Download Invoice
            </a>
        </div>
    </div>
</div>
@endsection