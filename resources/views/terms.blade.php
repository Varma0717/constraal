@extends('layouts.app')

@section('title', 'Terms of Service')

@section('page_header')
<div class="page-hero">
    <div class="site-container">
        <p class="text-sm font-semibold text-muted">Legal</p>
        <h1>Terms of Service</h1>
        <p class="mt-4 text-lg max-w-3xl">
            Please read these terms carefully before using our website and services.
        </p>
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="site-container">
        <div class="max-w-4xl">
            <p class="text-muted mb-8"><strong>Effective Date:</strong> February 23, 2026</p>

            <h2>1. Acceptance of Terms</h2>
            <p class="text-muted mb-8">
                By accessing or using the Constraal website and services, you agree to be bound by these Terms of Service. If you do not agree with any part of these terms, you should not use our website or services.
            </p>

            <h2>2. Description of Services</h2>
            <p class="text-muted mb-8">
                Constraal provides information about our intelligent systems, robotics, smart home, appliance, and construction automation products and services through our website. We also offer a customer portal for account management, subscription management, and support.
            </p>

            <h2>3. User Accounts</h2>
            <p class="text-muted mb-4">When you create an account on our platform, you agree to:</p>
            <ul class="text-muted mb-8" style="list-style: disc; padding-left: 1.5rem; line-height: 2;">
                <li>Provide accurate and complete information during registration.</li>
                <li>Maintain the security of your account credentials.</li>
                <li>Notify us immediately of any unauthorized use of your account.</li>
                <li>Accept responsibility for all activities that occur under your account.</li>
            </ul>

            <h2>4. Acceptable Use</h2>
            <p class="text-muted mb-4">You agree not to use our website or services to:</p>
            <ul class="text-muted mb-8" style="list-style: disc; padding-left: 1.5rem; line-height: 2;">
                <li>Violate any applicable laws or regulations.</li>
                <li>Infringe on the intellectual property rights of others.</li>
                <li>Transmit harmful, threatening, abusive, or otherwise objectionable content.</li>
                <li>Attempt to gain unauthorized access to our systems or other users' accounts.</li>
                <li>Interfere with or disrupt the integrity or performance of our services.</li>
                <li>Use automated systems (bots, scrapers) to access our website without prior consent.</li>
            </ul>

            <h2>5. Intellectual Property</h2>
            <p class="text-muted mb-8">
                All content on the Constraal website — including text, graphics, logos, images, software, and design — is the property of Constraal or its licensors and is protected by intellectual property laws. You may not reproduce, distribute, modify, or create derivative works from our content without express written permission.
            </p>

            <h2>6. Subscriptions & Payments</h2>
            <p class="text-muted mb-4">If you subscribe to any paid services:</p>
            <ul class="text-muted mb-8" style="list-style: disc; padding-left: 1.5rem; line-height: 2;">
                <li>You agree to pay all fees associated with your selected plan.</li>
                <li>Subscriptions may auto-renew unless cancelled before the renewal date.</li>
                <li>Refunds are handled on a case-by-case basis at our discretion.</li>
                <li>We reserve the right to change pricing with reasonable notice.</li>
            </ul>

            <h2>7. Job Applications</h2>
            <p class="text-muted mb-8">
                By submitting a job application through our website, you confirm that all information provided is accurate and complete. We will process your application in accordance with our <a href="{{ route('privacy') }}" class="text-brand-600 hover:underline">Privacy Policy</a>. Submission of an application does not guarantee employment or obligate Constraal to respond.
            </p>

            <h2>8. Disclaimer of Warranties</h2>
            <p class="text-muted mb-8">
                Our website and services are provided "as is" and "as available" without warranties of any kind, either express or implied. We do not guarantee that our services will be uninterrupted, secure, or error-free. Constraal disclaims all warranties, including but not limited to implied warranties of merchantability, fitness for a particular purpose, and non-infringement.
            </p>

            <h2>9. Limitation of Liability</h2>
            <p class="text-muted mb-8">
                To the maximum extent permitted by law, Constraal shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of or related to your use of our website or services. Our total liability shall not exceed the amount you have paid to Constraal in the twelve months preceding the claim.
            </p>

            <h2>10. Indemnification</h2>
            <p class="text-muted mb-8">
                You agree to indemnify and hold harmless Constraal, its officers, employees, and agents from any claims, damages, losses, or expenses (including legal fees) arising from your use of our services, violation of these terms, or infringement of any third-party rights.
            </p>

            <h2>11. Termination</h2>
            <p class="text-muted mb-8">
                We reserve the right to suspend or terminate your access to our services at any time, with or without notice, for any reason, including breach of these terms. Upon termination, your right to use our services will immediately cease.
            </p>

            <h2>12. Governing Law</h2>
            <p class="text-muted mb-8">
                These Terms of Service shall be governed by and construed in accordance with applicable laws. Any disputes arising from these terms shall be resolved through good-faith negotiation, and if necessary, through the appropriate legal channels.
            </p>

            <h2>13. Changes to Terms</h2>
            <p class="text-muted mb-8">
                We may modify these Terms of Service at any time. Changes will be effective immediately upon posting to this page. Your continued use of our website after changes are posted constitutes acceptance of the updated terms.
            </p>

            <h2>14. Contact Us</h2>
            <p class="text-muted mb-8">
                If you have any questions about these Terms of Service, please reach out via our:<br>
                <a href="{{ route('contact') }}" class="text-brand-600 hover:underline">Contact Page</a>
            </p>
        </div>
    </div>
</section>
@endsection