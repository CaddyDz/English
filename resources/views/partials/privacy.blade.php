@extends('layouts.master')

@section('title', 'Privacy Policy')

@section('content')

<div class="ui ui raised very padded  container segment">

    <div class="ui dividing header" style="padding-top: 5%;">
        <div class="ui center aligned container"> Privacy Policy </div>
    </div>
    <p>We welcome you to our website. This privacy policy tells you how we handle and use personal information collected at <span>{{ config('app.url') }}</span>. We advice you to read this privacy policy before using the website or submitting any personal information. By using the website, you are accepting the practices described in this privacy policy. the practices may change with time, but the changes will be posted and you are encouraged to review the privacy policy whenever you visit the website so you can keep track of the latest changes. <br>Note: the privacy practices set forth in this privacy policy are for this website only. if you link to other websites, please review the privacy policies posted at those websites if there are any.</p>
    <h2>Personnal User Information | Collection of Information</h2>
    <p>We collect personally identifiable information like names, email addresses, etc..., when voluntarily submitted by our visitors. This information is only used to fullfill your specific request and to sign you up for our service mailing list, unless you give us permission to use it in other manners.</p>
    <h2>Cookies/Tracking Technology</h2>
    <p>This website may use cookies and tracking technology depending on the features offered. Cookies and tracking technology are useful for gathering information such as browser type and operating system, tracking the number of visitors to the website, and understanding how visitors use the website. Cookies can also help customize the website for visitors. Personal information cannot be collected via cookies and other tracking technology, however, if you previously provided personally identifiable information, cookies may be tied to such information. Aggregate cookie and tracking information may be shared with third parties.</p>
    <h2>Distribution of Information</h2>
    <p>We may share information with governmental agencies or other companies assisting us in fraud prevention or investigation. We may do so when: (1) permitted or required by law; or, (2) trying to protect against or prevent actual or potential fraud or unauthorized transactions; or, (3) investigating fraud which has already taken place. The information is not provided to these companies for marketing purposes.</p>
    <h2>Commitment to Data Security</h2>
    <p>Your personally identifiable information is kept secure. Only authorized employees, agents and contractors (who have agreed to keep information secure and confidential) have access to this information. All emails and newsletters from this website allow you to opt out of further mailings.</p>
    <h2>Privacy Contact Information</h2>
    <p>If you have any questions, concerns, or comments about our privacy policy you may contact us using means provided on this website. We reserve the right to make changes to this policy. Any changes to this policy will be posted.</p>
</div>

@include('layouts.footer')

@endsection
