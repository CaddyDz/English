@extends('layouts.master')

@section('title', 'Terms of use')

@section('content')

<div class="ui ui raised very padded container segment">

    <div class="ui dividing header" style="padding-top: 5%;">
        <div class="ui center aligned container"> Terms of use </div>
    </div>
    <p>By using the {{ config('app.name') }} community that {{ config('app.url') }} | '{{ config('app.name') }}' , 'Us' , 'We' , 'The team' | operates on our website, currently located at <a href="{{ config('app.url') }}">{{ config('app.url') }} </a>        | The "Website" , "Site" or "Social Network" | , you agree to be bound by these Terms of Service ( Agreement ), whether or not you register as a member of the {{ config('app.name') }} community | "User" or "Member" | . The {{ config('app.name') }} services |
        The Services | consist of the Community and the Website. If you want to become a Member, interact and communicate with other Members, and use the Service |'Website' , '{{ config('app.name') }}' , 'Site' , 'Community'| , then you have to read this
        Agreement and follow the instructed stated in the registration process. This Agreement set out the legally binding terms for your membership and has to be accepted in order to become a member. The Agreement may be modified or changed by {{ config('app.name')
        }} anytime, without further notice. Registering to the Service as well as signing in to the Service represents the acceptance to the Agreement.</p>
    <div class="ui accordion">
        <div class="title">
            <i class="dropdown icon"></i> ELIGIBILITY
        </div>
        <div class="content">
            <p class="transition slide down">
                The services are intended for all ages, sexual orientations and both genders (female and male). By using the Services, you represent and warrant that you have the right, authority, and capacity to enter into this Agreement and to abide by all of the terms
                and conditions of this Agreement. If you are merely surfing or browsing through the Website and have not yet registered to become a Member, your use of the Website is still subject to this Agreement, if you do not agree to this Agreement,
                do not use the Services.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> PERMISSION
        </div>
        <div class="content">
            <p class="transition slide down">
                You agree that if you are under the age of 18 years, you have first hand permission by a parent/guardian that you are allowed to use this website.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> PASSWORD
        </div>
        <div class="content">
            <p class="transition slide down">
                When you sign up to become a Member, you will also be asked to choose a username and a password for your Member account. You are entirely responsible for keeping your password confidential. You have to make sure that your password is secure and complex.
                You agree not to use any other account, which means username, or password of another Member at any time. You agree to notify us immediately if you suspect any unauthorized use of your Member account or access to your password. You are
                entirely responsible for any and all use of your Member account and profile.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> TERM
        </div>
        <div class="content">
            <p class="transition slide down">
                This Agreement will remain in full force and effect while you use the Services and/or are a Member. You may terminate your membership at any time, for any reason by selecting option |Delete Account| in profile settings.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> YOUR MEMBER PROFILE
        </div>
        <div class="content">
            <p class="transition slide down">
                Any Content used for or photographs posted by you in your Member profile may not contain nudity, violence, sexually explicit (revealing underwear), or offensive subject matter. You may not post a photograph of another person without that person's permission.
                You are to understand that {{ config('app.name') }} reserves the right to ban, or delete any user profile, at any time, for any reason that we choose.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> NON-COMMERCIAL USE BY MEMBERS
        </div>
        <div class="content">
            <p class="transition slide down">
                The Services are for the personal use of individual Members only, and may not be used in connection with any commercial endeavors. This includes providing links to other websites. Organizations, companies, and/or businesses may not become Members of {{
                config('app.name') }} and cannot use the {{ config('app.name') }} Services for any purpose. Illegal and/or unauthorized uses of the Services might be investigated, and appropriate legal action might be taken. Every non-personal profile and account will be suspended and/or deleted.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> PROPRIETARY RIGHTS IN THE SERVICE
        </div>
        <div class="content">
            <p class="transition slide down">
                {{ config('app.name') }} owns and retains all proprietary rights in the Services, including other {{ config('app.name') }} Members. Except for Intellectual Property which is in the public domain or for which you have been given written permission, you may not copy, modify, publish, transmit, distribute, perform, display, or sell any such Intellectual Property and the provision of such Intellectual Property to you through the Services does not transfer to you or any third party any rights, title or interest in or to such Intellectual Property, including, without limitation, any intellectual property rights in any Content and material included therein.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> CONTENT POSTED ON THE SERVICES
        </div>
        <div class="content">
            <p class="transition slide down">
                You understand and agree that {{ config('app.name') }} may (but is not obligated to) review any classified ads, content, communication, information, Intellectual Property, material, messages, photos, videos, URLs, profiles and the like (collectively, "Content") that is published or displayed (hereinafter, "posted") on the Services and delete any such Content that in the sole judgment of {{ config('app.name') }} violates this Agreement or which might be offensive, illegal, or that might violate the rights, harm, or threaten the safety of other Members or third parties. You are solely responsible for the Content that you post on the Services, or transmit to other Members or third parties. By posting Content to any area of the Services, you automatically grant, and you represent and warrant that you have the right to grant, to Crush Zone an irrevocable, perpetual, non-exclusive, royalty-free and fully paid, worldwide license to reproduce, distribute, publicly display and perform (including by means of a digital audio transmission), and otherwise use Content and to prepare derivative works of, or incorporate into other works, such Content, and to grant and authorize sub-licenses of the foregoing. In addition, you represent and warrant that you have the right to post the Content and you will not post any illegal or prohibited Content and will not infringe, misappropriate, violate or contravene any third party rights (including, without limitation, any intellectual property rights). The following is a partial list of the kind of Content that is illegal or prohibited on the Website ("Prohibited Content"). The service reserves the right (but is not obligated) to investigate and to take appropriate legal action in its sole discretion against anyone who violates this provision, including without limitation, removing the offending Content from the Service and terminating the membership of such violators. Upon registering for the service, you agree that some or all of your user information such as email, age, general interests, etc, may be used by 3rd party sources. Prohibited Content includes
                Content that:
            </p>
            <br>
            <p>
                1) is patently offensive to the online community, such as Content that promotes racism, bigotry, hatred or physical harm of any kind against any group or individual.
            </p>
            <br>
            <p>
                2) harasses or advocates harassment of another person.
            </p>
            <br>
            <p>
                3) involves the transmission of "junk mail", "chain letters", or unsolicited mass mailing or "spamming".
            </p>
            <br>
            <p>
                4) promotes information that you know is false, misleading or promotes illegal activities or conduct that is abusive, threatening, obscene, defamatory or libelous.
            </p>
            <br>
            <p>
                5) promotes an illegal and/or unauthorized copy ("pirated") of another person's copyrighted work (whether marked as such, or not), such as, but not limited to, providing pirated computer programs or links to them, providing information to circumvent copy-protection mechanisms, or providing pirated music, video or other pirated Content, or links to such pirated music, video files, or files that contain such other pirated Content.
            </p>
            <br>
            <p>
                6) contains restricted or password only access pages, or hidden pages or images (those not linked to or from another accessible page).
            </p>
            <br>
            <p>
                7) displays pornographic or sexually explicit material of any kind and in any form.
            </p>
            <br>
            <p>
                8) provides material that exploits people under the age of 18 in a sexual or violent manner, or solicits personal information from anyone under the age of 18.
            </p>
            <br>
            <p>
                9) provides instructional information about illegal activities such as, but not limited to, making or buying illegal weapons, violating someone's privacy, or providing or creating computer viruses.
            </p>
            <br>
            <p>
                10) solicits passwords or personal identifying information of any kind for commercial or unlawful purposes from other users; and engages in commercial activities and/or sales without our prior written consent such as contests, sweepstakes, barter, advertising, and pyramid schemes.
            </p>
            <p>
                You must use the Services in a manner consistent with any and all applicable laws and regulations. You may not include in your Member profile any telephone numbers, street addresses, last names, URLs or email addresses. You may not engage in advertising to, or solicitation of, other Members to buy or sell any products or services through the Services. You may not transmit any chain letters or junk email to other Members or other parties. Although {{ config('app.name') }} cannot monitor the conduct of its Members off the Services, it is also a violation of these rules to use any information obtained from the Services in order to harass, abuse, or harm another person, or in order to contact, advertise to, solicit, or sell to any Member without their prior explicit consent. In order to protect our Members from such advertising or solicitation, {{ config('app.name') }} reserves the right to restrict the number of emails and other communications ( including sharing of Content) which a Member may send to other Members in any twenty-four (24) hours period to a number which the service deems appropriate in its sole discretion.
            </p>
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> ACCOUNT PROBLEMS
        </div>
        <div class="content">
            <p class="transition slide down">
                If your account becomes inaccessible temporary or permanently, a loss of data (for example: photos, posts, private conversations history, etc...) occurs or if there is any other technical difficulty that causes problems, we are not to be held responsible for that inconveniences.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> AUTHENTICITY
        </div>
        <div class="content">
            <p class="transition slide down">
                We won’t tolerate fake profiles and/or photos. Do not post photos if you are not the owner of their copyrights.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> RESPECTFULNESS
        </div>
        <div class="content">
            <p class="transition slide down">
                {{ config('app.name') }} community doesn't tolerate mocking, bullying, harassment, nagging, threats, hate speech or any other kind of psychological harming other people. Breaking this rule will get your account suspended or deleted and might be reported to the authorities.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> MEMBER DISPUTES
        </div>
        <div class="content">
            <p class="transition slide down">
                You are entirely responsible for your interactions with other Members. {{ config('app.name') }} reserves the right, but has no obligation, to monitor disputes between you and other Members.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> ELECTRONIC COMMUNICATIONS
        </div>
        <div class="content">
            <p class="transition slide down">
                The communications between you and {{ config('app.name') }} use electronic means, whether you visit the Website or send us emails, or whether {{ config('app.name') }} posts notices on the Services or communicates with you via email. For contractual purposes, you (a) consent to receive communications from {{ config('app.name') }} in an electronic form. and (b) agree that all terms and conditions, agreements, notices, disclosures, and other communications that {{ config('app.name') }} provides to you electronically satisfy any legal requirement that such communications would satisfy if it were be in writing. The foregoing does not affect your nonwaivable rights.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> MAKING SEXUAL PROPOSITIONS
        </div>
        <div class="content">
            <p class="transition slide down">
                Making sexual propositions or sexual innuendos to anyone under the age of 18 years old is against our terms of service. It is also illegal in most of countries, so this is a very serious offence. This kind of activity will get your account suspended or deleted and registered activity will be reported to the local authorities.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> SPAM AND REPETITIVE POSTING
        </div>
        <div class="content">
            <p class="transition slide down">
                Spam is unacceptable. The {{ config('app.name') }} community won’t tolerate it so don't spam. Posting pictures or comments in a repetitive or automated way to in order to advertise things like your account, a website or a product is forbidden and will result in account suspension.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> INDEMNITY
        </div>
        <div class="content">
            <p class="transition slide down">
                You agree to indemnify and hold {{ config('app.name') }}, its subsidiaries, affiliates, officers, agents, and other partners and employees, harmless from any loss, liability, claim, or demand, including reasonable attorney's fees, made by any third party due to or arising out of your use of the Services in violation of this Agreement and/or arising from a breach of this Agreement and/or any breach of your representations and warranties set forth above.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> DISCLAIMER
        </div>
        <div class="content">
            <p class="transition slide down">
                To the extent permitted under applicable laws, the services are provided "as-is" and as available and {{ config('app.name') }} expressly disclaims any warranty and conditions of any kind, whether express or implied, including, but not limited to, the warranties or conditions of merchantability, fitness for a particular purpose, title, quiet enjoyment, accuracy, or non-infringement and {{ config('app.name') }} does not guarantee and does not promise any specific results from the use of the services.
                {{ config('app.name') }} does not assume any obligation to monitor activities on the service. Some jurisdictions do not allow the exclusion of implied warranties or limitations on how long an implied warranty may last, so the above limitations
                may not apply to you.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> RELEASE
        </div>
        <div class="content">
            <p class="transition slide down">
                To the extent permitted under applicable laws, you hereby release {{ config('app.name') }} from any liability related to: (a) any incorrect or inaccurate Content posted on the Services, whether caused by any user of the Services or Member, or by any of the equipment or programming associated with or utilized in the Services. (b) the conduct, whether online or offline, of any user of the Services or Member. (c) any problems or technical malfunction of any telephone network or lines, computer online systems, servers or providers, computer equipment, software, failure of email or Content players on account of technical problems or traffic congestion on the Internet or at any website, or combination thereof, including injury or damage to user's and/or Member's or to any other person's computer related to or resulting from participating or downloading materials in connection with the Services. (d) any loss or damage caused by Content posted on the Services or transmitted by and to Members, or any interactions between users of the Website and/or Members, whether online or offline. and (e) any error, omission, interruption, deletion, defect, delay in operation or transmission, communications line failure, theft or destruction or unauthorized access to, or alteration of, Website user or Member communications.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> COPYRIGHT POLICY
        </div>
        <div class="content">
            <p class="transition slide down">
                You may not post, distribute, or reproduce in any way copyrighted material, trademarks, or other proprietary information without agreement and consent of the owner of rights. Without limiting the foregoing, if you notice that your work has been copied and posted on the Services in a way that constitutes copyright infringement, please let us know by email and we will remove it.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> LIMITATION ON LIABILITY
        </div>
        <div class="content">
            <p class="transition slide down">
                To the extent permitted under applicable laws, {{ config('app.name') }} shall not be liable to you, or any third party, for any indirect, consequential, exemplary, incidental, special or punitive damages (including also lost profits) arising from your use of the services, even if {{ config('app.name') }} has been advised of the possibility of such damages. Some jurisdictions do not allow the exclusion or limitation of liability, so the above limitation or exclusion may not apply to you.
            </p>
        </div>
        <div class="title">
            <i class="dropdown icon"></i> OTHER
        </div>
        <div class="content">
            <p class="transition slide down">
                This Agreement contains the entire agreement between you and {{ config('app.name') }} regarding the use of the Services. If any provision of this Agreement is held invalid, the remainder of this Agreement shall continue in full force and effect. Notwithstanding any other provisions herein, no party will be deemed as a third-party beneficiary to this Agreement and a third party (including another Member) who is not a party to this Agreement has no right to enforce any term of this Agreement. If any provision of this Agreement is found to be invalid or unenforceable, such provision will be changed and interpreted to accomplish the objectives to the greatest extent possible under any applicable law and the remaining provisions will continue in full force and effect. The failure of {{ config('app.name') }} to exercise or enforce any right or provision of this Agreement shall not operate as a waiver of such right or provision. The section titles in this Agreement are for convenience only and have no legal or contractual effect. Please contact us with any questions regarding this Agreement.
            </p>
        </div>
    </div>
</div>
    @include('layouts.footer')
@endsection

@section('scripts')
    @parent
    <script charset="utf-8">
        $(document).ready(function() {
            $('.ui.accordion').accordion();
        });
    </script>
@endsection
