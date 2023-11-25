<?php
include('./connections/connection.php');
include('./connections/functions.php');
include('./connections/global.php');
include('./components/header.php');
include('./components/sidebar.php');
if (@$_GET['status'] == 1) {
    Toast("black", "You can now login to your account!");
}
?>
<link rel="stylesheet" href="./assets/css/custom/about.css">
<br><br>
<section class="text-justify">
    <div class="container">
        <br><br>
        <h2>
            Renit Terms and Conditions
        </h2>
        
        Effective Date: 16/06/2023
        <div class="text-justify">

            <br>
            Please note that the following terms and conditions (the "Renit T&C") govern your use of our website (the "renit.co.in") and the services provided by us. By accessing or using the website, you agree to be bound by this agreement. If you do not agree with these terms and conditions, please refrain from using the website.
            <br><br>
            <b>1. Acceptance of Terms</b>
            <br>
            1.1. By accessing or using the website, you represent and warrant that you have read, understood, and agreed to be bound by these terms.<br>
            1.2. We reserve the right to modify or update these terms at any time without prior notice. It is your responsibility to review these terms periodically for any changes. Your continued use of the website after any modifications or updates constitutes your acceptance of the revised terms.
            <br><br>
            <b>2. General Terms</b>
            <br>
            2.1 Parties: The terms "we," "us," or "our" refer to the owner/operator of the Website. The term "you" refers to the user or viewer of the Website.
            <br>
            2.2 Age Restriction: By using the Website, you affirm that you are at least 16 years old. If you are under 16, you may only use the Website under the supervision of a parent or legal guardian.
            <br>
            2.3 Compliance with Laws: You agree to comply with all applicable laws and regulations when using the Website.
            <br><br>
            <b>3. User Obligations</b>
            <br>
            3.1. You agree to provide accurate, current, and complete information when using the website.
            <br>
            3.2. You are solely responsible for any content you post on the website, including products, and agree to comply with all applicable laws and regulations.
            <br>
            3.3. You must not post any false, misleading, or fraudulent information on the website.
            <br>
            3.4. You must not engage in any illegal activities or violate the rights of others when using the website.
            <br>
            3.5. In order to access certain features of the website, you may be required to create an account. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.
            <br><br>
            <b>4. User Content</b>
            <br>
            4.1. By posting content on the website, you grant us a non-exclusive, worldwide, royalty-free license to use, copy, modify, distribute, and display that content.
            <br>
            4.2. You retain ownership of the content you post on the website and represent that you have the necessary rights to grant the aforementioned license.
            <br>
            4.3. The availability of products for rental is subject to change without notice. Accordingly, we do not guarantee the availability of the products.
            <br><br>
            <b>5. Prohibited Content</b>
            <br>
            5.1. You must not post any content on the website that is illegal, defamatory, offensive, obscene, or infringing upon the rights of others.
            <br>
            5.2. We reserve the right to remove any content that violates these terms or is deemed inappropriate, without prior notice.
            <br><br>
            <b>6. Intellectual Property Rights</b>
            <br>
            6.1. The website and its contents, including but not limited to text, graphics, logos, and software, are the property of the website owner and are protected by applicable intellectual property laws.
            <br>
            6.2. You may not reproduce, modify, distribute, or display any part of the website without prior written consent from the website owner.
            <br><br>
            <b>7. Disclaimer of Warranty and Limitation of Liability</b>
            <br>
            7.1. The Website is provided "as is" without any warranties, expressed or implied.
            <br>
            7.2. We do not guarantee the accuracy, reliability, or completeness of any content on the website, including products.
            <br>
            7.3. We shall not be liable for any direct, indirect, incidental, consequential, or punitive damages arising from your use of the website.
            <br>
            7.4. We do not guarantee that the website will be error-free or uninterrupted.
            <br><br>
            <b>8. Indemnification</b>
            <br>
            8.1. You agree to indemnify and hold us harmless from any claims, damages, or liabilities arising out of your use of the website or any violation of these terms.
            <br><br>
            <b>9. Third-Party Websites</b>
            <br>
            9.1. The website may contain links to third-party websites. We do not endorse or control the content on these websites and are not responsible for any damages or losses incurred from their use.
            <br><br>
            <b>10. Termination</b>
            <br>
            10.1. We reserve the right to terminate or suspend your access to the website at any time, without prior notice, for any reason or no reason at all.
            <br><br>
            <b>11. Governing Law and Jurisdiction</b>
            <br>
            11.1. These terms shall be governed by and construed in accordance with the laws of [Information Technology Act, 2000 | Information Technology (Intermediaries Guidelines) Rules, 2011 | Information Technology Act, 2000 (IT Act) and General Data Protection Regulations (GDPR) | Consumer Protection Act, 1986].
            <br><br>
        </div>
    </div>
</section>
<?php include('./components/footer.php'); ?>