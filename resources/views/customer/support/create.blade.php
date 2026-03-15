@extends('customer.layouts.app')

@section('title', 'Create Support Ticket')
@section('page-title', 'Create Support Ticket')
@section('icon', 'bi-plus-circle')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <h5 class="card-title mb-0">Submit a Support Request</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('account.customer.support.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="subject">Subject</label>
                        <input
                            type="text"
                            class="form-control @error('subject') is-invalid @enderror"
                            id="subject"
                            name="subject"
                            placeholder="Brief description of your issue"
                            required>
                        @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="category">Category</label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                            <option value="">Select a category...</option>
                            <option value="billing">Billing</option>
                            <option value="technical">Technical</option>
                            <option value="account">Account</option>
                            <option value="other">Other</option>
                        </select>
                        @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="priority">Priority</label>
                        <select class="form-select @error('priority') is-invalid @enderror" id="priority" name="priority" required>
                            <option value="low">Low</option>
                            <option value="medium" selected>Medium</option>
                            <option value="high">High</option>
                        </select>
                        @error('priority')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="message">Message</label>
                        <textarea
                            class="form-control @error('message') is-invalid @enderror"
                            id="message"
                            name="message"
                            rows="6"
                            placeholder="Describe your issue in detail..."
                            required></textarea>
                        @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-send"></i> Submit Ticket
                        </button>
                        <a href="{{ route('account.customer.support.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection