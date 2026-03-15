@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('page_header')
<div class="page-hero">
    <div class="site-container">
        <p class="text-sm font-semibold text-muted">Legal</p>
        <h1>Privacy Policy</h1>
        <p class="mt-4 text-lg max-w-3xl">
            Your privacy matters to us. This policy explains how Constraal collects, uses, and protects your information.
        </p>
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="site-container">
        <div class="max-w-4xl">
            <p class="text-muted mb-8"><strong>Effective Date:</strong> February 23, 2026</p>

            <h2>1. Information We Collect</h2>
            <p class="text-muted mb-4">We may collect the following types of information when you interact with our website and services:</p>
            <ul class="text-muted mb-8" style="list-style: disc; padding-left: 1.5rem; line-height: 2;">
                <li><strong>Personal Information:</strong> Name, email address, phone number, company name, and country when you submit contact forms or subscribe to updates.</li>
                <li><strong>Account Information:</strong> Email, name, and password when you create a customer portal account.</li>
                <li><strong>Usage Data:</strong> Pages visited, time spent on the site, browser type, device information, and IP address collected automatically through server logs.</li>
                <li><strong>Communication Data:</strong> Messages, inquiries, and job applications you submit through our forms.</li>
            </ul>

            <h2>2. How We Use Your Information</h2>
            <p class="text-muted mb-4">We use the information we collect to:</p>
            <ul class="text-muted mb-8" style="list-style: disc; padding-left: 1.5rem; line-height: 2;">
                <li>Respond to your inquiries and provide customer support.</li>
                <li>Send updates, announcements, and marketing communications you have opted into.</li>
                <li>Process job applications and manage career-related communications.</li>
                <li>Improve our website, services, and user experience.</li>
                <li>Maintain security and prevent fraud.</li>
                <li>Comply with legal obligations.</li>
            </ul>

            <h2>3. Information Sharing</h2>
            <p class="text-muted mb-8">
                We do not sell, trade, or rent your personal information to third parties. We may share information with trusted service providers who assist us in operating our website and conducting business, provided they agree to keep your information confidential. We may also disclose information when required by law or to protect our rights.
            </p>

            <h2>4. Data Security</h2>
            <p class="text-muted mb-8">
                We implement industry-standard security measures to protect your personal information, including encrypted data transmission (SSL/TLS), secure password hashing, and access controls. However, no method of transmission over the internet is 100% secure, and we cannot guarantee absolute security.
            </p>

            <h2>5. Cookies & Tracking</h2>
            <p class="text-muted mb-8">
                Our website may use cookies and similar technologies to enhance your browsing experience. Cookies are small files stored on your device that help us understand how you use our site. You can control cookie preferences through your browser settings. Disabling cookies may affect some functionality of the website.
            </p>

            <h2>6. Data Retention</h2>
            <p class="text-muted mb-8">
                We retain your personal information only for as long as necessary to fulfill the purposes outlined in this policy, unless a longer retention period is required or permitted by law. You may request deletion of your data at any time by contacting us.
            </p>

            <h2>7. Your Rights</h2>
            <p class="text-muted mb-4">Depending on your location, you may have the following rights regarding your personal data:</p>
            <ul class="text-muted mb-8" style="list-style: disc; padding-left: 1.5rem; line-height: 2;">
                <li><strong>Access:</strong> Request a copy of the personal data we hold about you.</li>
                <li><strong>Correction:</strong> Request correction of inaccurate or incomplete data.</li>
                <li><strong>Deletion:</strong> Request deletion of your personal data.</li>
                <li><strong>Opt-out:</strong> Unsubscribe from marketing communications at any time.</li>
                <li><strong>Portability:</strong> Request your data in a structured, machine-readable format.</li>
            </ul>

            <h2>8. Third-Party Links</h2>
            <p class="text-muted mb-8">
                Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of these external sites. We encourage you to review the privacy policies of any third-party sites you visit.
            </p>

            <h2>9. Children's Privacy</h2>
            <p class="text-muted mb-8">
                Our services are not directed at individuals under the age of 16. We do not knowingly collect personal information from children. If we become aware that we have collected data from a child without parental consent, we will take steps to delete that information.
            </p>

            <h2>10. Changes to This Policy</h2>
            <p class="text-muted mb-8">
                We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated effective date. We encourage you to review this page periodically.
            </p>

            <h2>11. Contact Us</h2>
            <p class="text-muted mb-8">
                If you have any questions about this Privacy Policy or your personal data, please contact us at:<br>
                <a href="{{ route('contact') }}" class="text-brand-600 hover:underline">Contact Page</a>
            </p>
        </div>
    </div>
</section>
@endsection