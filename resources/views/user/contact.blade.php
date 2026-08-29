@extends('layouts.app')

@section('title', 'تواصلي معنا')

@section('content')

    <section class="contact-page">


        {{-- Hero --}}
        <div class="contact-hero">

            <div class="contact-hero-content">

                <span class="contact-label">CONTACT US</span>

                <h1>تواصلي معنا</h1>

                <p>
                    نحن هنا للإجابة عن استفساراتكِ ومساعدتكِ في كل ما تحتاجينه.
                    لا تترددي في التواصل معنا.
                </p>

            </div>

        </div>


        {{-- Contact Content --}}
        <div class="contact-container">

            {{-- Intro --}}
            <div class="contact-intro">

                <span>نحن بانتظاركِ</span>

                <h2>كيف يمكننا مساعدتكِ؟</h2>

                <p>
                    سواء كان لديكِ سؤال حول أحد المنتجات، أو طلبكِ،
                    أو الشحن والتوصيل، يمكنكِ التواصل معنا وسنسعد بمساعدتكِ.
                </p>

            </div>


            {{-- Contact Cards --}}
            <div class="contact-info-grid">

                {{-- Phone --}}
                <div class="contact-info-card">

                    <div class="contact-info-icon">
                        <i class="bi bi-telephone"></i>
                    </div>

                    <h3>اتصلي بنا</h3>

                    <p>
                        يسعدنا استقبال استفساراتكِ
                    </p>

                    <a href="tel:+00000000000">
                        951675437 963+
                    </a>

                </div>


                {{-- Email --}}
                <div class="contact-info-card">

                    <div class="contact-info-icon">
                        <i class="bi bi-envelope"></i>
                    </div>

                    <h3>البريد الإلكتروني</h3>

                    <p>
                        أرسلي لنا استفساركِ عبر البريد
                    </p>

                    <a href="mailto:info@example.com">
                        halabatesh@gmail.com
                    </a>

                </div>


                {{-- WhatsApp --}}
                <div class="contact-info-card">

                    <div class="contact-info-icon">
                        <i class="bi bi-whatsapp"></i>
                    </div>

                    <h3>واتساب</h3>

                    <p>
                        تواصلي معنا مباشرة عبر واتساب
                    </p>

                    <a href="#" target="_blank">
                        @Eng_HalaBatsh
                    </a>

                </div>

            </div>


            {{-- Contact Form --}}
            <div class="contact-form-section">

                <div class="contact-form-heading">

                    <span>أرسلي لنا رسالتكِ</span>

                    <h2>يسعدنا أن نسمع منكِ</h2>

                    <p>
                        املئي النموذج وسنتواصل معكِ في أقرب وقت ممكن.
                    </p>

                </div>
                <div id="contactSuccess" class="contact-success-message" style="display: none;">
                    <i class="bi bi-check-circle-fill"></i>

                    <div>
                        <h4>تم إرسال رسالتكِ بنجاح!</h4>
                        <p>
                            شكراً لتواصلكِ معنا، سنراجع رسالتكِ ونتواصل معكِ في أقرب وقت ممكن.
                        </p>
                    </div>
                </div>
                <form action="{{ route('contact.send') }}" method="POST" class="contact-form" id="contactForm">

                    @csrf

                    <div class="contact-form-row">

                        <div class="form-group">

                            <label for="name">الاسم الكامل</label>

                            <input type="text" id="name" name="name" placeholder="اكتبي اسمكِ" required>

                        </div>


                        <div class="form-group">

                            <label for="email">البريد الإلكتروني</label>

                            <input type="email" id="email" name="email" placeholder="example@email.com" required>

                        </div>

                    </div>


                    <div class="form-group">

                        <label for="subject">موضوع الرسالة</label>

                        <input type="text" id="subject" name="subject" placeholder="ما هو استفساركِ؟" required>

                    </div>


                    <div class="form-group">

                        <label for="message">رسالتكِ</label>

                        <textarea id="message" name="message" rows="6" placeholder="اكتبي رسالتكِ هنا..." required></textarea>

                    </div>


                    <button type="submit" class="contact-submit-btn">
                        إرسال الرسالة
                        <i class="bi bi-send"></i>
                    </button>

                </form>

            </div>


            {{-- Bottom Message --}}
            <div class="contact-bottom">

                <div class="contact-bottom-icon">
                    <i class="bi bi-heart"></i>
                </div>

                <div>

                    <h3>نحن نهتم بتجربتكِ</h3>

                    <p>
                        رضاكِ هو ما يجعلنا نسعى دائماً لتقديم الأفضل لكِ.
                    </p>

                </div>

            </div>

        </div>

    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const form = document.getElementById('contactForm');
            const successMessage = document.getElementById('contactSuccess');

            form.addEventListener('submit', async function(e) {

                e.preventDefault();

                const button = form.querySelector('.contact-submit-btn');
                const originalText = button.innerHTML;

                button.disabled = true;
                button.innerHTML = `
            <span>جاري الإرسال...</span>
            <i class="bi bi-arrow-repeat"></i>
        `;

                try {

                    const formData = new FormData(form);

                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    });

                    const data = await response.json();

                    if (response.ok) {

                        form.style.display = 'none';

                        successMessage.style.display = 'flex';

                        successMessage.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });

                        form.reset();

                    } else {

                        button.disabled = false;
                        button.innerHTML = originalText;

                        alert('يرجى التأكد من البيانات المدخلة.');
                    }

                } catch (error) {

                    button.disabled = false;
                    button.innerHTML = originalText;

                    alert('حدث خطأ أثناء إرسال الرسالة، يرجى المحاولة مرة أخرى.');

                }

            });

        });
    </script>
@endsection
