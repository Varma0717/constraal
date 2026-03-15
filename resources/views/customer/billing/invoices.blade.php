@extends('customer.layouts.app')

@section('title', 'Invoices')
@section('page-title', 'Invoices & Payment History')
@section('icon', 'bi-file-earmark-text')

@section('content')
<div class="card">
    <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
        <h5 class="card-title mb-0">All Invoices</h5>
    </div>
    <div class="card-body p-0">
        @if($invoices->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background-color: #f8f9fa;">
                    <tr>
                        <th>Invoice ID</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $invoice)
                    <tr>
                        <td>
                            <code>{{ $invoice->invoice_number ?? 'INV-' . $invoice->id }}</code>
                        </td>
                        <td>{{ $invoice->created_at->format('M d, Y') }}</td>
                        <td>${{ number_format($invoice->amount ?? 0, 2) }}</td>
                        <td>
                            <span class="badge {{ $invoice->status === 'paid' ? 'bg-success' : 'bg-warning' }}">
                                {{ ucfirst($invoice->status ?? 'pending') }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('account.customer.billing.invoice-detail', $invoice) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="{{ route('account.customer.billing.download-invoice', $invoice) }}" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-download"></i> Download
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $invoices->links() }}
        @else
        <div class="text-center py-5">
            <i class="bi bi-file-earmark-x" style="font-size: 2rem; color: #ccc;"></i>
            <p class="text-muted mt-3">No invoices found</p>
        </div>
        @endif
    </div>
</div>
@endsection